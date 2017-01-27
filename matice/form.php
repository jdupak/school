<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulář</title>
</head>
<body>

	<form method="post" >
		<input type="text" name="searched">
		<button type="submit">Tohle to určitě neodešle</button>
	</form>

<?php 
	$searched = $_POST['nic'];

	include 'parseCSV.php';
	$data = parseCSV('data.csv');

	include 'searchArrayReturnCoord.php';
	$searchResult = searchArrayReturnCoord($data);
?>

</body>
</html>