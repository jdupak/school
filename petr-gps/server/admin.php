<!DOCTYPE html>
<html>
<head>
	<title>GPS Tracker Admin</title>
</head>
<body>
	<?php

		include_once __DIR__.'/../config/load.config.php';
		
		$table = "game_x0";

		Db::connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);

		$sql = "SELECT `id`, `user`, `latitude`, `longitude`, `time` FROM `game_x0`";

		$data = Db::queryAll($sql);

		var_dump($data);
	?>
</body>
</html>