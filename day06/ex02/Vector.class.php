<?php
require_once 'Vertex.class.php';

class Vector{

	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static $verbose = false;
	public function __construct(array $arr){
		if ($arr['orig'] instanceof Vertex)
			$o = $arr['orig'];
		else
			$o = new Vertex(array("x"=>0, "y"=>0, "z"=>0, "w"=>1));
		if ($arr['dest'] instanceof Vertex)
		{
			$this->_x = $arr['dest']->get("x") - $o->get("x");
			$this->_y = $arr['dest']->get("y") - $o->get("y");
			$this->_z = $arr['dest']->get("z") - $o->get("z");
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
		return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
			$this->_x, $this->_y, $this->_z, $this->_w);
	}
	static function doc(){
		return file_get_contents("Vector.doc.txt");
	}
	public function get($name){
		if (isset($this->{"_".$name}))
			return ($this->{"_".$name});
		else
			throw new NotFoundException();
	}
	public function __set($name, $value){
		throw new NotFoundException();
	}
	public function magnitude(){
		return sqrt($this->_x**2 + $this->_y**2 + $this->_z**2);
	}
	public function normalize(){
		return $this->scalarProduct(1/$this->magnitude());
	}
	public function add( Vector $rhs ){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_x+$rhs->_x, "y"=>$this->_y+$rhs->_y, "z"=>$this->_z+$rhs->_z))));
	}
	public function sub( Vector $rhs ){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_x-$rhs->_x, "y"=>$this->_y-$rhs->_y, "z"=>$this->_z-$rhs->_z))));
	}
	public function opposite(){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>-$this->_x, "y"=>-$this->_y, "z"=>-$this->_z))));
	}
	public function scalarProduct( $k ){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_x*$k, "y"=>$this->_y*$k, "z"=>$this->_z*$k))));
	}
	public function dotProduct( Vector $rhs ){
		return ($this->_x*$rhs->_x + $this->_y*$rhs->_y + $this->_z*$rhs->_z);
	}
	public function cos( Vector $rhs ){
		return $this->dotProduct( $rhs ) / ($this->magnitude() * $rhs->magnitude());
	}
	public function crossProduct( Vector $rhs ){
		return new Vector(array("orig"=>$this->_w, "dest"=> new Vertex(array(
			"x"=>$this->_y*$rhs->_z - $this->_z*$rhs->_y,
			"y"=>$this->_z*$rhs->_x - $this->_x*$rhs->_z,
			"z"=>$this->_x*$rhs->_y - $this->_y*$rhs->_x
		))));
	}
}