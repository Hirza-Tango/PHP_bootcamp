#!/usr/bin/env php
<?php
if ($argc != 3)
	return;
if (!(file_exists($argv[1])))
	return;
$file = fopen($argv[1], 'r');
$headers = fgetcsv($file, 0,';');
while ($tab[] = fgetcsv($file, 0,';'));
fclose($file);
if (($index = array_search($argv[2], $headers)) === false)
	return;
foreach ($headers as $i=>$h)
	foreach ($tab as $e)
		$$h[$e[$index]] = $e[$i];
$stdin = fopen("php://stdin", 'r');
echo "Enter your command: ";
while ($command = fgets($stdin))
{
	try {
		eval($command);
	} catch (ParseError $t) {
		echo "Parse error: ", $t->getMessage(), " in ",$t->getFile(), " on line ",  $t->getLine(), PHP_EOL;
	}
	echo "Enter your command: ";
}
echo PHP_EOL;
fclose($stdin);
?>