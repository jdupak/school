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

		foreach ($data as $user) {
			echo '
			<div class="User">
				<div class="User-name"></div>
				<div class="User-tel"></div>
				<div class="User-dist"></div>
		</div>';
		}
		//gps-tracker-160119

	?>
	<div id="map" width="100px" height="100px"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
<script src="https://maps.googleapis.com/maps/api/js?key=gps-tracker-160119&callback=initMap" async defer></script>
</body>
</html>