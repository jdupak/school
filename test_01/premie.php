<?php
	function toDec($input, $base)
	{
		$array = str_split($input);
		array_reverse($array);
   foreach ($array as $key =>  $value) {
   	  if (is_integer($value) == false) {
   	  	$value = ord(strtoupper($value)) - ord('A') + 11;
   	  }
   }           
		foreach ($array as $key => $value) {
			$result += $value*pow($base, $key);
		}
		return $result;
	}
	echo(toDec(111111111,2));
?>
