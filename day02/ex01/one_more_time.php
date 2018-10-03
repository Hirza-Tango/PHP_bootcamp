#!/usr/bin/env php
<?php
if (!$argv[1])
	return;
if (!preg_match("/(?:[Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) (\d\d? ([Jj]anvier|[Ff]évrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]oût|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) \d{4} \d\d:\d\d:\d\d)/", $argv[1], $matches))
	return print "Wrong Format\n";
$french_months = [
	"/[Jj]anvier/","/[Ff][eé]vrier/","/[Mm]ars/","/[Aa]vril/","/[Mm]ai/",
	"/[Jj]uin/","/[Jj]uillet/","/[Aa]o[uû]t/","/[Ss]eptembre/","/[Oo]ctobre/",
	"/[Nn]ovembre/","/[Dd][eé]cembre/"
];
$english_months = [
	"January","February","March","April","May","June","July","August",
	"September","October","November","December"
];
$matches[1] = preg_replace($french_months, $english_months, $matches[1]);
setlocale (LC_TIME, "fr_FR.utf8");
date_default_timezone_set("Europe/Paris");
echo strtotime($matches[1]), "\n";
?>