#!/usr/bin/env php
<?php
function getUnixTime (string $a){
	$now = new DateTime;
	return DateTime::createFromFormat("G:i:s,u", $a)->getTimestamp() - $now->getTimestamp();
}

function getFirstTimestamp (array $a, array $b){
	return getUnixTime($a["times"][0]) - getUnixTime($b["times"][0]);
}

if ($argc != 2)
	return;
if (!(file_exists($argv[1])))
	return;
$srt = file_get_contents($argv[1]);
foreach (explode("\n\n", trim($srt)) as $line)
{
	$a = explode("\n", $line);
	$number = intval(each($a)['value']);
	$times = explode(" --> ", each($a)['value']);
	reset($a);
	$text = implode("\n", array_slice($a, 2));
	$arr[$number - 1] = array("times"=>$times, "text"=>$text);
}
usort($arr, getFirstTimestamp);
foreach ($arr as $i=>$e)
	echo ($i+1).PHP_EOL.$e["times"][0]." --> ".$e["times"][1].PHP_EOL.$e["text"].PHP_EOL.PHP_EOL;
?>