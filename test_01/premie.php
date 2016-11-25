<?php
	function toDec($input, $base)
	{
		$array = str_split($input);
		$array = array_reverse($array);
		foreach ($array as $key =>  $value) {
			if (is_numeric($value) == false) {
		   		$array["$key"] = ord(strtoupper($value)) - ord('A') + 10;
		   	 }
		}         
		foreach ($array as $key => $value) {
			$result += $value*pow($base, $key);
		}
		return $result;
	}
	echo(toDec(a5b7e9d3f789,16));
?>
