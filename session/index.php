<?php 
/*
*	Session
*/

session_start();
$_SESSION[prihlasen] = "42";

echo $_SESSION[prihlasen];

?>