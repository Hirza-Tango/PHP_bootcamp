#!/usr/bin/env php
<?php
if ($s = preg_replace("/\s+/", " ", trim($argv[1])))
	echo $s, "\n";
?>
