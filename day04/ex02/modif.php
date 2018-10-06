<?php
	if ($_POST['submit'] !== "OK" || !$_POST['oldpw'] || !$_POST['login'] || !$_POST['newpw'])
	{
		echo "ERROR\n";
		return;
	}
	$arr = unserialize(file_get_contents("../private/passwd"));
	$i = array_search($_POST['login'], array_column($arr, "login"));
	if (($i === FALSE) || $arr[$i]['passwd'] != hash("sha512",$_POST['oldpw']))
	{
		echo "ERROR\n";
		return;
	}
	$arr[$i]['passwd'] = hash("sha512",$_POST['newpw']);
	file_put_contents("../private/passwd", serialize($arr));
	echo "OK\n";
	return;
?>