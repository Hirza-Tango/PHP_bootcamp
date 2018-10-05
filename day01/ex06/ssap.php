#!/usr/bin/env php
<?php
$a = [];
unset($argv[0]);
foreach ($argv as $e)
	$a = array_merge($a, array_filter(explode(" ", $e)));
sort($a);
foreach ($a as $e)
	echo $e, "\n";
?>