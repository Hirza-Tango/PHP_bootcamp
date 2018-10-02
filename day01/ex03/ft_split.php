<?php
	function ft_split(string $s) {
		$arr = explode(" ", trim($s));
		sort($arr);
		return $arr;
	}
?>