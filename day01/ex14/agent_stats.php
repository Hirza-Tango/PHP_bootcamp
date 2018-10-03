#!/usr/bin/env php
<?php
	$stdin = fopen('php://stdin', 'r');
	$tab = [];
	if ($argv[1] != "average" && $argv[1] != "average_user" && $argv[1] != "moulinette_variance")
		return 1;
	while ($line = fgetcsv($stdin, 0,';'))
		array_push($tab, $line);
	fclose($stdin);
	array_shift($tab);
	if ($argv[1] == "average")
	{
		$total = 0;
		$count = 0;
		foreach($tab as $entry)
			if ($entry[2] != "moulinette" && strlen(trim($entry[1])))
			{
				$total += intval($entry[1]);
				$count++;
			}
		if ($count)
			echo $total / $count, "\n";
	}
	else if ($argv[1] == "average_user")
	{
		$users = [];
		sort($tab);
		foreach($tab as $entry)
		{
			if (!strlen(trim($entry[1])) || $entry[2] == "moulinette")
				continue;
			$users[$entry[0]][0] += intval($entry[1]);
			$users[$entry[0]][1] += 1;
		}
		foreach($users as $username => $value)
			echo $username, ":", $value[0] / $value[1], "\n";
	}
	else if ($argv[1] == "moulinette_variance")
	{
		$users = [];
		sort($tab);
		foreach($tab as $entry)
		{
			if (!strlen(trim($entry[1])))
				continue;
			if ($entry[2] == "moulinette")
			{
				$users[$entry[0]][2] += intval($entry[1]);
				$users[$entry[0]][3] += 1;
			}
			else
			{
				$users[$entry[0]][0] += intval($entry[1]);
				$users[$entry[0]][1] += 1;
			}
		}
		foreach($users as $username => $value)
			echo $username, ":", ($value[0] / $value[1]) - ($value[2] / $value[3]), "\n";
	}
?>