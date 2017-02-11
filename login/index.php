<?php 
/*
*	Login interface
*/
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<?php
if (isset($_GET['error'])) {
	echo $_GET['error'];
}
if (isset($_SESSION['session'])) {
	function checkSession($user, $currentSession) {
		if (file_exists("./sessions/".$_SESSION['user']) == false) {return false;};
		$session = file_get_contents("./sessions/".$_SESSION['user']);
		$session = explode(";", $session);
		if ($currentSession == $session[0]) {
			if (date('U')-$session[1] < 300) {
				return true;
			} else {
				unlink("./sessions/".$_SESSION['user']);
			}
		} else {
			return false;
		}
	}

	$authorised = checkSession($_SESSION['user'], $_SESSION['session']);
	if ($authorised) {
		echo "Logged in as ".$_SESSION['user'];
		echo " <a href='./logout.php'>[logout]</a>";
	} 
}
?>
	<form method="post" action="./login.php">
		<label>Username:</label>
		<input type="text" name="username">
		<label>Password:</label>
		<input type="password" name="password">
		<input type="submit" value="Login">
	</form>
</body>
</html>