#!/usr/bin/env php
<?php
$a = [];
unset($argv[0]);
foreach ($argv as $e)
	$a = array_merge($a, explode(" ", $e));
natcasesort($a);
foreach ($a as $e)
	if (ctype_alpha($e[0]))
		echo $e, "\n";
sort($a);
foreach ($a as $e)
	if (ctype_digit($e[0]))
		echo $e, "\n";
foreach ($a as $e)
	if (!ctype_alnum($e[0]))
		echo $e, "\n";
?>