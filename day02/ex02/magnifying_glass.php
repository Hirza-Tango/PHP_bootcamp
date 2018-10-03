#!/usr/bin/env php
<?php
$doc = new DOMDocument();
$doc->loadHTMLFile($argv[1], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
foreach ($doc->getElementsByTagName('a') as $tag)
{
	if ($tag->hasAttribute("title"))
		$tag->setAttribute("title", strtoupper($tag->getAttribute("title")));
	foreach ($tag->childNodes as $child)
	{
		if ($child->nodeType == XML_TEXT_NODE)
			$child->textContent = strtoupper($child->textContent);
		else if ($child->hasAttribute("title"))
			$child->setAttribute("title", strtoupper($child->getAttribute("title")));
	}
}
echo $doc->saveHTML();
?>