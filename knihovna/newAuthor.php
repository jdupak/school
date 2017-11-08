<?php 
$title = "Vložení autora";
require_once("./header.php"); 
if ($_GET['s'] == 1) {
	?>
	<div class="alert alert-success">
		Fachá to, vole!
	</div>
	<?php
}?>
	<form action="addNewAuthor.php" method="post" class="form-horizontal">
		<label class="control-label">Jméno</label>
		<input type="text" name="f_jmeno" required><br>
		<label class="control-label">Příjmení</label>
		<input type="text" name="f_primeni"><br>
		<label class="control-label">Pohlaví</label><br>
		<input type="radio" name="f_pohlavi" value="1">Muž<br>
		<input type="radio" name="f_pohlavi" value="2">Žena<br>
		<label class="control-label">Narození</label>
		<input type="date" name="f_narozeni"><br>
		<label class="control-label">Úmrtí</label>
		<input type="date" name="f_umrti"><br>
		<label class="control-label">Národnost</label>
		<input type="number" name="f_narodnost" min="0" max="255" step="1"><br>
		<label class="control-label">Popis</label>
		<textarea name="f_popis"></textarea><br>
		<input type="submit">
	</form>
<?php require_once("./footer.php"); ?>
