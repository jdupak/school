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
	print_r(shuffle_array())
 ?>