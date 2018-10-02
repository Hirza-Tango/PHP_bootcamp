#!/usr/bin/env php
<?php
$key = $argv[1];
foreach (array_slice($argv, 2) as $e)
	if (preg_match("/^(\w+):(\w+)$/", $e, $matches))
		if ($key === $matches[1])
			$value = $matches[2];
if ($value)
	echo $value, "\n";
?>