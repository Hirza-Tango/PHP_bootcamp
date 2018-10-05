<?php
if (!$_GET['name'])
	return;
switch($_GET['action']) {
	case "set":
		setcookie($_GET['name'], $_GET['value'], time()+60*60*24*30);
		break;
	case "get":
		if ($_COOKIE[$_GET['name']])
			echo $_COOKIE[$_GET['name']], PHP_EOL;
		break;
	case "del":
		setcookie($_GET['name'], '', 0);
		unset($_COOKIE[$_GET['name']]);
		break;
	}
?>
