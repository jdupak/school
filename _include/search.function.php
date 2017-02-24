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

?>