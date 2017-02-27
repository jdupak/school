<?php 
	if ($_SERVER['SERVER_NAME'] == "localhost") {
		// LOCAL CONFIG
		require_once __DIR__.'/local.config.php';

	} else {
		// PRODUCTION CONFIG
		require_once __DIR__.'/global.config.php';

	}



	// DB CLASS
	require_once __DIR__."/../server/db.class.php";

?>