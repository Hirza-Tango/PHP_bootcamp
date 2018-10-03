#!/usr/bin/env php
<?php
if (!filter_var($argv[1], FILTER_VALIDATE_URL))
	return print "Invalid url\n";
$folder = parse_url($argv[1], PHP_URL_HOST)."/";
@mkdir($folder);
$html = file_get_contents($argv[1]);
$dom = new DOMDocument;
$dom->strictErrorChecking = false;
@$dom->loadHTML($html);
foreach ($dom->getElementsByTagName('img') as $tag)
{
	$file = $tag->getAttribute("src");
	if (!filter_var($file, FILTER_VALIDATE_URL))
		file_put_contents($folder.end(explode("/", $file)), file_get_contents($argv[1]."/".$file));
	else
		file_put_contents($folder.end(explode("/", $file)), file_get_contents($file));
}
?>