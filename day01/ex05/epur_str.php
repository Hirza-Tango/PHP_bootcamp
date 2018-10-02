#!/usr/bin/env php
<?php
if (!$argv[1])
	return;
foreach (explode(" ", trim($argv[1])) as $e)
	echo $e, " ";
echo("\x8\n");
?>