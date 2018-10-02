#!/usr/bin/env php
<?php
	if ($argc != 2)
		return print "Incorrect Parameters\n";
	if (!preg_match("/^\s*(\-?\d+)\s*([\+\-\*\/\%])\s*(\-?\d+)\s*$/", $argv[1],
		$matches))
		return print "Syntax Error\n";
	$left = $matches[1];
	$op = $matches[2];
	$right = $matches[3];
	if ($op === "+")
		$result = $left + $right;
	else if ($op === "-")
		$result = $left - $right;
	else if ($op === "*")
		$result = $left * $right;
	else if ($op === "/")
		$result = $left / $right;
	else if ($op === "%")
		$result = $left % $right;
	echo $result, "\n";
?>