<?php
include 'parseCSV.php';
$array_a = parseCSV('data.csv');
$array_b = parseCSV('data.csv');

function writeMatrix($matrix)
{
	foreach ($matrix as $subarray) {
		$result[] = implode(" ", $subarray);
	}
	$result = implode(PHP_EOL, $result);
	return $result;
}

function sumMatrix($array_a,$array_b)
{	
	if (count($array_a) != count($array_b)) {
		return false;
	}

	foreach ($array_a as $key => $sub_a) {
		foreach ($sub_a as $sub_key => $sub_value) {
			$c[$key][$sub_key] = $array_a[$key][$sub_key] + $array_b[$key][$sub_key];
		}
	}

	return $c;
}

function transposeMatrix($array_a)
{	
	foreach ($array_a as $key => $sub_a) {
		foreach ($sub_a as $sub_key => $sub_value) {
			$c[$sub_key][$key] = $array_a[$key][$sub_key];
		}
	}

	return $c;
}

function productScalarMatrix($array_a,$array_b)
{
	if (count($array_a) != count($array_b)) {
		return false;
	}

	$result = 0;

	foreach ($array_a as $key => $value) {
		$result += $value * $array_b[$key];
	}

	return $result;
}

$matice2 = parseCSV('matice2.csv');
$matice3 = parseCSV('matice3.csv');
echo productScalarMatrix($matice2[0],$matice3[0])
?>