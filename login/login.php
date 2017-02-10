<?php 
/*
*	Login system
*/

$db = explode(PHP_EOL, file_get_contents("./users.db"));
foreach ($db as $value) {
	$tmp = explode(";", $value, 2);
	$users[$tmp[0]] = $tmp[1];
}
?>