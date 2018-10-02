#!/usr/bin/env php
<?php
echo "Enter a number: ";
while (strlen($line = fgets(STDIN)))
{
	$line = trim($line);
	if (is_numeric($line))
	{
		echo "The number ", $line, " is ";
		if ($line % 2)
			echo "odd";
		else
			echo "even";
	}
	else
		print("'$line' is not a number");
	echo "\nEnter a number: ";
}
echo "\n";
?>