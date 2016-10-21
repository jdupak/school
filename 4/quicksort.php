<?php 
function quicksort($array)
{
	function cut($array){
		$pivot = $array[round(count($array)/2)];
		foreach ($array as $key => $value) {
			if ($value < $pivot) {
				$array_s[] = $value;
			}
			else {
				$array_g[] = $value;
			}
		}
		//if (count($array_s) > 1) {cut($array_s);}
		//if (count($array_g) > 1) {cut($array_g);}
		return $array = array($array_s,$array_g);
	}
	return cut($array);

}
$array = array("2","8","5");
print_r(quicksort($array));

?>