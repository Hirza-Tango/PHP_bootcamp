#!/usr/bin/env php
<?php
	$file = fopen("/var/run/utmpx", "r");
	$entries = [];
	while ($s = fread($file, 628))
	{
		$entry = unpack("a256user/a4id/a32line/Lpid/Stype/Lnsec/Lsec/a256host", $s);
		if ($entry["type"] == 7)
			array_push($entries, $entry);
	}
	fclose($file);
	array_multisort(array_column($entries, "nsec"), SORT_ASC, $entries);
	date_default_timezone_set("Europe/Paris");
	foreach ($entries as $entry)
		printf("%s %s  %s %s\n", $entry["user"], $entry["line"], date("M  j H:i", $entry["sec"]), $host);
?>