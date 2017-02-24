<html>
<head>
<meta charset="utf-8">
</head>
<body>

<form method="post" action="./zpracuj.php">
<input name="mesto" type="text" /><br />
<input name="heslo" type="password" /><br />

Muž <input type="radio" name="pohlavi" value="muz" />
Žena <input type="radio" name="pohlavi" value="zena" /><br /><br />

Fotbal <input type="checkbox" name="sport" value="fotbal" /><br />
Hokej <input type="checkbox" name="sport" value="hokej" /><br />
Basket <input type="checkbox" name="sport" value="basket" /><br />

<select name="tym">
<option value="0">--- vyber tým ---</option>
<option value="sparta">Sparta</option>
<option value="slavie">Slavie</option>
<option value="bohemka">Bohemka</option>
</select><br />

<textarea name="vzkaz" rows="5" cols="40" overflow="auto">

</textarea>

<button type="submit">Odeslat</button>
</form>

<div><?
echo "Město: $_POST[mesto]<br />";
echo "Heslo: $_POST[heslo]";
?></div>

</body>
</html>