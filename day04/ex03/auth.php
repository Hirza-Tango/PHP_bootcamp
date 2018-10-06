<?php
function auth($login, $passwd) {
	if (!$login || !$passwd)
		return FALSE;
	$arr = unserialize(file_get_contents("../private/passwd"));
	$i = array_search($login, array_column($arr, "login"));
	if ($i === FALSE || $arr[$i]['passwd'] != hash("sha512", $passwd))
		return (FALSE);
	return TRUE;
}
?>