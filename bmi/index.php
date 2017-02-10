<?php 
/*
*	BMI Calculator
*/

session_start();

function bmiCalculator($weight = 0, $height = 1) {
	return $bmi = round(($weight / $height / $height), 1);
}

function bmiAnalyse($bmi)
{
	if ($bmi <= 16.5) {
		return "Těžká podvýživa";
	} elseif ($bmi > 16.5 AND $bmi <= 18.5) {
		return "Podváha";
	} elseif ($bmi > 18.5 AND $bmi <= 25) {
		return "Zdravá váha";
	} elseif ($bmi > 25 AND $bmi <= 30) {
		return "Nadváha";
	} elseif ($bmi > 30 AND $bmi <= 35) {
		return "Obezita I. stupně";
	} elseif ($bmi > 35 AND $bmi <= 40) {
		return "Obezita II. stupně";
	} elseif ($bmi > 40) {
		return "Obezita III. stupně";
	} else {
		return "ERROR";
	}
}
if (isset($_POST['weight']) AND isset($_POST['height']) ) {
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$weight = preg_replace("/,/", ".", $weight);
	$height = preg_replace("/,/", ".", $height);


	$bmi = bmiCalculator($weight, $height);
	$status = bmiAnalyse($bmi);

	if ($_POST['name'] !== "") {
		$name = $_POST['name'];
	} else {
		$name = "Anonymous";
	}
	$_SESSION[$name] = $bmi;
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BMI Caluculator</title>
</head>
<body>
	<form method="post" >
		<label>Hmotnost [kg]</label>
		<input type="text" name="weight" <? if(isset($_POST['weight'])) {echo("value='".$_POST['weight']."'");} ?>>
		<label>Výška [metr]</label>
		<input type="text" name="height" <? if(isset($_POST['height'])) {echo("value='".$_POST['height']."'");} ?>>
		<label>Jméno</label>
		<input type="text" name="name" <? if(isset($_POST['name'])) {echo("value='".$_POST['name']."'");} ?>>
		<button type="submit">Odeslat</button>
	</form>
	<?php
	echo "<br>";
		echo "Vaše BMI je ".number_format($bmi, 1, ",", " ").". Váš stav je ".$status;

	echo "<br>";
	echo "<br>";
	echo "Historické výsledky:";
	echo "<ul>";
	foreach ($_SESSION as $key => $value) {
		echo "<li>";
		echo $key." má BMI ".$value.". To je ".bmiAnalyse($value);
		echo "</li>";
	}
	echo "</ul>";
	?>
</body>
</html>