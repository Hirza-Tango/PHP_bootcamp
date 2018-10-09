<?php
class Color {
	public $red;
	public $green;
	public $blue;
	static $verbose = false;
	public function __construct(array $arr) {
		if (isset($arr["rgb"]))
		{
			$s = intval($arr["rgb"]);
			$this->red = $s / (256*256) % 256;
			$this->green = $s / 256 % 256;
			$this->blue = $s % 256;
		}
		else if (isset($arr["red"], $arr["green"], $arr["blue"]))
		{
			$this->red = intval($arr["red"]);
			$this->green = intval($arr["green"]);
			$this->blue = intval($arr["blue"]);
		}
		else
			throw new NotFoundException();
		if (Self::$verbose === true)
			echo $this->__tostring(), " constructed.\n";
	}
	public function __destruct(){
		if (Self::$verbose === true)
			echo $this->__tostring(), " destructed.\n";
	}
	public function __tostring(){
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}
	public function add(Color $c){
		return new Color(array("red"=>$c->red + $this->red, "green"=>$c->green+$this->green,"blue"=>$c->blue+$this->blue));
	}
	public function sub(Color $c){
		return new Color(Array("red"=>$this->red-$c->red, "green"=>$this->green-$c->green,"blue"=>$this->blue-$c->blue));
	}
	public function mult(float $f){
		return new Color(Array("red"=>intval($this->red * $f), "green"=>intval($this->green * $f),"blue"=>intval($this->blue * $f)));
	}
	static function doc(){
		return file_get_contents("Color.doc.txt");
	}
}