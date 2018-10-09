<?php
require_once 'Color.class.php';

Class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	static $verbose = false;
	public function __construct(array $arr) {
		if (isset($arr['x'], $arr['y'], $arr['z']))
		{
			$this->_x = floatval($arr['x']);
			$this->_y = floatval($arr['y']);
			$this->_z = floatval($arr['z']);
		}
		else
			throw new NotFoundException();
		if (isset($arr['w']))
			$this->_w = doubleval($arr['w']);
		if (isset($arr['color']))
			$this->_color = $arr['color'];
		else
			$this->_color = new Color(array("rgb"=>0xFFFFFF));
		if (Self::$verbose === true)
			echo $this->__tostring(), " constructed\n";
	}
	public function __destruct(){
		if (Self::$verbose === true)
			echo $this->__tostring(), " destructed\n";
	}
	public function __tostring(){
		$s = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f",
			$this->_x, $this->_y, $this->_z, $this->_w);
		if (Self::$verbose === true)
			$s .= ", ".$this->_color;
		return $s." )";
	}
	static function doc(){
		return file_get_contents("Vertex.doc.txt");
	}
	public function & __get($name){
		if (isset($this->$$name))
			return ($this->$$name);
		else
			throw new NotFoundException();
	}
	public function __set($name, $value){
		if (isset($this->$$name))
			$this->$$name = $value;
		else
			throw new NotFoundException();
	}
}