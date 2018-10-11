<?php
require_once 'Vector.class.php';

Class Matrix {
	private $_vector;
	static $verbose = false;
	public function __construct(array $arr) {
		//TODO:
		if (Self::$verbose === true)
			echo $this->__tostring(), " constructed\n";
	}
	public function __destruct(){
		if (Self::$verbose === true)
			echo $this->__tostring(), " destructed\n";
	}
	public function __tostring(){
		//TODO:
	}
	static function doc(){
		return file_get_contents("Matrix.doc.txt");
	}
	public function & get($name){
		if (isset($this->{"_".$name}))
			return $this->{"_".$name};
		else
			throw new NotFoundException();
	}
	public function set($name, $value){
		if (isset($this->{"_".$name}))
			$this->{"_".$name} = $value;
		else
			throw new NotFoundException();
	}
}
?>
