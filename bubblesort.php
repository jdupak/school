<?php 
function bubbleSort($array = array("22","8","5","6","4","1","12","55","89","-258"))
{
	$n = count($array);
	for ($k=0; $k < $n-1; $k++) {
		for ($j=0; $j < $n - $k - 1; $j++) { 
			if ($array[$j+1] < $array[$j]) {
				$temp = $array[$j + 1];
				$array[$j + 1] = $array[$j];
				$array[$j] = $temp;
			}
		}
	}
	return $array;
}
print_r(bubbleSort());
?>