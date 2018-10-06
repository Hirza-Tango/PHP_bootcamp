<?php
	if ($_POST['submit'] !== "OK" || !$_POST['passwd'] || !$_POST['login']) 
	{
		echo "ERROR\n";
		return;
	}
	if (!file_exists("../private/passwd"))
	{
		@mkdir("..private");
		$arr = [];
	}
	else
		$arr = unserialize(file_get_contents("../private/passwd"));
	foreach ($arr as $e)
		if ($e['login'] === $_POST['login'])
		{
			echo "ERROR\n";
			return;
		}
	$arr[] = Array('login'=>$_POST['login'], 'passwd'=>hash("sha512", $_POST['passwd']));
	file_put_contents("../private/passwd", serialize($arr));
	echo "OK\n";
	return;
?>