<?php 
	$array = [",5","4","6","12","9"];
	function my_sort($array){
		$n = count($array)-1;
		for ($i=0; $i < $n; $i++) { 
			if ($array[$i] > $array[$i+1]){
				$x = $array[$i];
				$y = $array[$i+1];
				$array[$i] = $y;
				$array[$i+1] = $x;
			}	
		}
		return $array;
		
	}
	print_r(my_sort($array));

?>
