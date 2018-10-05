#!/usr/bin/env php
<?php
$a = [];
unset($argv[0]);
foreach ($argv as $e)
	$a = array_merge($a, array_filter(explode(" ", $e)));
natcasesort($a);
foreach ($a as $e)
	if (ctype_alpha($e[0]))
		echo $e, "\n";
sort($a, SORT_STRING);
foreach ($a as $e)
	if (ctype_digit($e[0]))
		echo $e, "\n";
foreach ($a as $e)
	if (!ctype_alnum($e[0]))
		echo $e, "\n";
?>