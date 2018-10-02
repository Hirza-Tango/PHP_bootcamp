#!/usr/bin/env php
<?php
if ($argc != 4)
	return print "Incorrect Parameters\n";
$left = trim($argv[1]);
$right = trim($argv[3]);
$op = trim($argv[2]);
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