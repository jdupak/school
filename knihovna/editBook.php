<?php
include './code.php';
Db::connect("localhost","root","","skola_knihovna");

$kniha = new Kniha;
$kniha->ID = 10;
$kniha->loadFromDb();

$title = "Úprava knihy";
require_once("./header.php"); ?>
	<form action="editBookScript.php" method="post"><br>
		<label>Název knihy</label>
		<input type="text" value="<?php echo $kniha->nazev ?>" name="f_nazev" required><br>
		<label>Jméno autora</label>
		<input type="text" value="<?php echo $kniha->jmeno ?>" name="f_jmeno" required><br>
		<label>Příjmení autora</label>
		<input type="text" value="<?php echo $kniha->primeni ?>" name="f_primeni"><br>
		<label>Počet stran</label><br>
		<input type="number" value="<?php echo $kniha->stran ?>" name="f_stran"><br>
		<label>Jazyk</label>
		<input type="number" value="<?php echo $kniha->jazyk ?>" name="f_jazyk"><br>
		<label>Počet knih v knihovně</label>
		<input type="number" value="<?php echo $kniha->pocet ?>" name="f_pocet"><br>
		<label>ISBN</label>
		<input type="number" value="<?php echo $kniha->isbn ?>" name="f_isbn"><br>
		<input type="submit">
	</form>
<?php require_once("./footer.php"); ?>