<?php
	session_start();
	if (!$_SESSION['loggued_on_user'])
		return;
	$arr = unserialize(file_get_contents("../private/passwd"));
	$i = array_search($_SESSION['loggued_on_user'], array_column($arr, "login"));
	$_SESSION['loggued_on_user'] = '';
	if ($i === FALSE)
		return;
	unset($arr[$i]);
	file_put_contents("../private/passwd", serialize(array_values($arr)));
	return;
?>