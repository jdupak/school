<?php
/*
*   Receives AJAX position data and saves them to the DB
*
*   @param {int(9)} id - telephone number as unique identifier
*   @param {string} user - real name
*   @param {float} lat - actual latitude
*   @param {float} long - actual longitude
*/
	
	include_once __DIR__.'/../config/load.config.php';

	$id = $_POST['id'];
    $user = $_POST['user'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$time = date('U');

		// // TESTING DATA
		// $id = 723662388;	
		// $user = "honza";
		// $lat = 50;
		// $long = 14;


	Db::connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);

	$sql = "INSERT INTO $table (id,user,latitude,longitude,time)
	VALUES ('$id','$user','$lat','$long','$time')
	ON DUPLICATE KEY UPDATE
	latitude='$lat', longitude='$long', time='$time'";

	Db::querysingle($sql);
