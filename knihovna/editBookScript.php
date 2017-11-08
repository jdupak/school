<?php

include '../_include/db.class.php';
Db::connect("localhost","root","","skola_knihovna");
include './code.php';

if (true) {
	$kniha = new Kniha;
	$kniha->loadFromDb();
	$err = false;
	if ($err) {$status=2;} else $status=1;
}

?>
<meta http-equiv="refresh" content="1;url=./editBook.php?s=<?php echo $status ?>">