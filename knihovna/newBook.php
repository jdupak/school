<?php 
$title = "Vložení knihy";
require_once("./header.php"); ?>
	<form action="addNewBook.php" method="post"><br>
		<label>Název knihy</label>
		<input type="text" name="f_nazev" required><br>
		<label>Jméno autora</label>
		<input type="text" name="f_jmeno" required><br>
		<label>Příjmení autora</label>
		<input type="text" name="f_primeni"><br>
		<label>Počet stran</label><br>
		<input type="number" name="f_stran"><br>
		<label>Jazyk</label>
		<input type="number" name="f_jazyk"><br>
		<label>Počet knih v knihovně</label>
		<input type="number" name="f_pocet"><br>
		<label>ISBN</label>
		<input type="number" name="f_isbn"><br>
		<input type="submit">
	</form>
<?php require_once("./footer.php"); ?>