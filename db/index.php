<?php 
include '../_include/db.class.php';
Db::connect("localhost","database","database","knihovna");

//$sql = "SELECT * FROM `autori`";
	$sql = "INSERT INTO `autori`(`ID`, `jmeno`, `primeni`, `pohlavi`, `nazozeni`, `umrti`, `narodnost`, `popis`)
	VALUES (NULL,
	$_POST['f_jmeno'],
	$_POST['f_primeni'],
	$_POST['f_pohlavi'],
	$_POST['f_nazozeni'],
	$_POST['f_umrti'],
	$_POST['f_narodnost'],
	$_POST['f_popis'])";

	$q = Db::queryall($sql);
?>