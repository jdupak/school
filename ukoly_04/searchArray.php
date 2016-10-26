<?php 
	function searchArray($target, $array)
	{
		foreach ($array as $key => $value) {
			if ($value == $target) {
				return $key;
			}
		}
		return "Nenalezeno";
	}
	$array = array("1","2","3","4","5","6");
	$target = 1;
	echo(searchArray($target,$array));
?>