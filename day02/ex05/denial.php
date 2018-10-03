#!/usr/bin/env php
<?php
function catch_parse($code, $message, $file, $line) {

}

function dont_shutdown()
{
	$last_error = error_get_last();
	if ($last_error['type'] === E_PARSE)
		catch_parse(E_PARSE, $last_error['message'], $last_error['file'], $last_error['line']);
}

if ($argc != 3)
	return;
if (!(file_exists($argv[1])))
	return;
$file = fopen($argv[1], 'r');
$tab = [];
while ($line = fgetcsv($file, 0,';'))
	$tab[] = $line;
fclose($file);
$headers = array_shift($tab);
if (($index = array_search($argv[2], $headers)) === false)
	return;
for ($i = 0; $headers[$i]; $i++)
	foreach ($tab as $e)
		${$headers[$i]}[$e[$index]] = $e[$i];
$stdin = fopen("php://stdin", 'r');
set_error_handler('catch_parse');
register_shutdown_function('dont_shutdown');
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
?>