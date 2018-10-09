<?php
require_once 'Vertex.class.php';

class Vertex{

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	static $verbose = false;
	public function __construct(array $arr){
		//TODO: fix this
		if ($arr['orig'] instanceof Vertex)
			$_w = $arr['orig'];
		else
			$_w = new Vertex(array("x"=>0, "y"=>0, "z"=>0, "w"=>1));
		if ($arr['dest'] instanceof Vertex)
		{
			$_x = $arr['dest']->__get($_x) - $arr['orig']->__get($_x);
			$_y = $arr['dest']->__get($_y) - $arr['orig']->__get($_y);
			$_z = $arr['dest']->__get($_z) - $arr['orig']->__get($_z);
		}
		else
			throw new NotFoundException();
		if (Self::$verbose === true)
			echo $this->__tostring(), " constructed\n";
	}
	public function __destruct(){
		if (Self::$verbose === true)
			echo $this->__tostring(), " destructed\n";
	}
	public function __tostring(){
		return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
			$this->_x, $this->_y, $this->_z, $this->_w);
	}
	static function doc(){
		return file_get_contents("Vector.doc.txt");
	}
	public function __get($name){
		if (isset($this->$$name))
			return ($this->$$name);
		else
			throw new NotFoundException();
	}
	public function __set($name, $value){
		throw new NotFoundException();
	}
	public function magnitude(){
		return sqrt($_x**2 + $_y**2 + $_z**2);
	}
	public function normalize(){
		$norm = $this->magnitude();
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_x/$norm, "y"=>$this->_y/$norm, "z"=>$this->_z/$norm))));
	}
	public function add(Vector $rhs){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_x+$rhs->_x, "y"=>$this->_y/$rhs->_y, "z"=>$this->_z/$rhs->_z))));
	}
}