<?php 
function quicksort($array)
{
	function cut($array){
		$pivot = $array[0];
		foreach ($array as $key => $value) {
			if ($value < $pivot) {
				$array_s[] = $value;
			}
			elseif ($value == $pivot) {
				$array_m[] = $value;
			}
			else {
				$array_g[] = $value;
			}
		}
		if (count($array_s) > 1) {
			$array_s = cut($array_s);
		}
		if (count($array_m) > 1) {
			// tady jsou všechny stejný, upravit
			$array_m = cut($array_m);
		}
		if (count($array_g) > 1) {
			$array_g = cut($array_g);
		}
		$array_x = array($array_s,$array_m,$array_g);
		return array_merge($array_x);
	}	
	return cut($array);

}
$array = array("2","8","5","6","4","1");
print_r(quicksort($array));
?>