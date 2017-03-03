<!DOCTYPE html>
<html>
<head>
	<title>Test 04</title>
</head>
<body>
	<form action="./save.php" method="post">
		<label for="name">Jméno</label>
		<input type="text" name="name">
		<label for="email">Email</label>
		<input type="text" name="email">
		<label for="header">Typ nadpisu</label>
		<input type="radio" name="header" value="h1"> h1
		<input type="radio" name="header" value="h2"> h2
		<input type="submit" name="submit">
	</form>

	<?php 
		if (file_exists("data.json")) {
			$data = json_decode(file_get_contents("data.json"), true);

			echo "<".$data['header_type'].">".$data['name']."</".$data['header_type'].">\n";
			echo "<div>".$data['email']."</div>";
		}
	?>
</body>
</html>