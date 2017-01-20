<?php 
function euklidovskaNorma($array)
{	
	$result = 0;
	foreach ($array as $key => $value) {
		$result += $value * $value;
	}
	return sqrt($result);
}

function delitelnost($number)
{
	if (($number%6 == 0) AND ($number > 40)) {
		return 1;
	} else {
		return 0;
	}
}

function countDelitelnost($array)
{
	$result = 0;
	foreach ($array as $key => $value) {
		$result += delitelnost($value);
	}
	return $result;
}

echo(euklidovskaNorma(array(2,4,5)));
echo "<br>\n";
echo(countDelitelnost(array(15,60,121,600)));

?>