
<!DOCTYPE html>
<html>
<head>
	<title>Vložení autora</title>
</head>
<body>
	<form action="index.php" method="post"><br>
		<label>Jméno</label>
		<input type="text" name="f_jmeno" required><br>
		<label>Příjmení</label>
		<input type="text" name="f_primeni"><br>
		<label>Pohlaví</label><br>
		<input type="radio" name="f_pohlavi" value="1">Muž<br>
		<input type="radio" name="f_pohlavi" value="2">Žena<br>
		<label>Narození</label>
		<input type="date" name="f_narozeni"><br>
		<label>Úmrtí</label>
		<input type="date" name="f_umrti"><br>
		<label>Národnost</label>
		<input type="number" name="f_narodnost" min="0" max="255" step="1"><br>
		<label>Popis</label>
		<textarea name="f_popis"></textarea><br>
		<input type="submit">
	</form>
</body>
</html>