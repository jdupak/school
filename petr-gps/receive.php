<?php
	$user = $_POST['user'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	//$data = $lat.";".$long.";".date('U').";";
	//file_put_contents("./data/".$user, $data);

$host = "sql307.rf.gd";
$username = "rfgd_19708632";
$password = "117hovno";
$database = "rfgd_19708632_gpsData";

include "./Db.php";

Db::connect($host, $user, $password, $database);

?>