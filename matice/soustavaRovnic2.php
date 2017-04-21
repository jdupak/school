<?php
	include '../_include/matrix.function.php';

	$matrix = parseCSV( "matice7.csv" );

	function solveEqSystem2($matrix) {
		for ($i=1; $i < count($matrix); $i++) { 
			for ($y=$i; $y < count($matrix); $y++) { 
				$coef = $matrix[$y][$i-1] / $matrix[$i-1][$i-1];
				foreach ($matrix[$y] as $x => $value) {
					$matrix[$y][$x] -= $matrix[$i-1][$x] * $coef;
				}
			}
		}

		return $matrix;
	}
	echo writeMatrix( solveEqSystem2($matrix),"table" );
?>
