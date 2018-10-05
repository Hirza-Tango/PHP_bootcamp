<?php
function ft_split(string $s) {
	$arr = array_filter(explode(" ", trim($s)));
	sort($arr);
	return $arr;
}
?>