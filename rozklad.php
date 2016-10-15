<?php
function rozklad($n){
	$sq_n = sqrt($n);
	for ($i=2; $i <= $sq_n; $i++) { 
		if ($n % $i == 0) {
			$prvocisla_a[] = $i;
		}
	}
	$prvocisla = Array();
	foreach ($prvocisla_a as $key => $value) {
		$mark_r = 1;
		for ($j=2; $j <= sqrt($value); $j++) { 
			if ($value % $j == 0) {
				$mark_r = 0;
				break;
			}
		}
			if ($mark_r == 1) {
				$prvocisla[] = $value;
			}	
	}
	$n_act = $n;
	$vysledek = Array();
	foreach ($prvocisla as $key => $value) {
		while (($n_act % $value) == 0) {
			$vysledek[] = $value;
			$n_act /= $value; 
		}
	}
	print_r($vysledek);
}
rozklad(125);
?>