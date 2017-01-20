<?php 
	$input = array(
		"2",
		"3",
		"4",
		);
	foreach ($input as $key_a => $value_a) {
		$temp = 1;
		foreach ($input as $key => $value) {
			$temp *= $value;
		}
		$result_1[$key_a] =  $temp / $value_a;
	}
	
	$result_2 = $result_1[0] * $input[0];
	
	$result_3 = array_sum($result_1);
	$result = 100 - $result_2 / $result_3 * 100;
	echo round($result)." %";
?>