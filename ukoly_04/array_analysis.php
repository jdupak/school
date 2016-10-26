<?php 
	$array = [",5","4","4","50","9"];
	function array_analysis($array)
	{
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
		$result = array();
		$array = my_sort($array);

		$result["min"] = $array["0"];

		$result["max"] = $array[count($array)-1];

		$sum = 0;
		foreach ($array as $key => $value) {
			$sum += $value;
		}
		$result["ave"] = $sum / count($array);

		return $result;
	}
	print_r(array_analysis($array));
?>