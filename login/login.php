<?php 
/*
*	Login system
*/
$username = $_POST['username'];
$hash = md5($_POST['password']);

$db = explode(PHP_EOL, file_get_contents("./users.db"));
foreach ($db as $value) {
	$tmp = explode(";", $value);
	$users[$tmp[0]] = $tmp[1];
}

if ($users[$username] == $hash) {
	$session = md5($username.rand(10000000, 999999999));
	file_put_contents("./sessions/".$username, $session.";".date('U').";\n");
	session_start();
	$_SESSION['user'] = $username;
	$_SESSION['session'] = $session;
} 

header("Location: http://school/login/index.php?error=Access denied");





?>