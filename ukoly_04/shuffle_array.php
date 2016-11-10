<?php 
	function shuffle_array($array = ["Adam","Honza","Karel","Jáchym","Michal"])
	{
		while (count($array) > 0) {
			$n = array_rand($array);
			$new_array[] = $array[$n];
			unset($array[$n]);
		}
		return $new_array;
	}
	print_r(shuffle_array());

	//statistics
	for ($i=0; $i < 100; $i++) { 
			$array = shuffle_array();
			foreach ($array as $key => $value) {
				$$value[] = array($key => $$value[$key]++);
			}
		}	
	print_r($karel);
 ?>