<!DOCTYPE html>
<html>
<head>
	<title>GPS Tracker Admin</title>
</head>
<body>
	<?php
		foreach (glob("./data/*") as $filename)
		{	
			$tmp = explode(";", file_get_contents($filename));
		    $data[$filename]["lat"] = $tmp[0];
			$data[$filename]["long"] = $tmp[1];
			$data[$filename]["time"] = $tmp[2];
		}
		var_dump($data);
	?>
</body>
</html>