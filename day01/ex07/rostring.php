#!/usr/bin/env php
<?php
if (!$argv[1])
	return;
$a = array_filter(explode(" ", trim($argv[1])));
array_push($a, array_shift($a));
foreach ($a as $e)
	echo $e, " ";
echo("\x8\n");
?>