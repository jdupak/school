<?php
	include '../_include/matrix.function.php';

	$matrix = parseCSV( "matice7C.csv" );
	$results = parseCSV( "matice7B.csv" );

	function solveEqSystem2($matrix) {

		for ($i=1; $i < count($matrix); $i++) { 
			for ($y=$i; $y < count($matrix); $y++) {
				if ($matrix[$y][$i-1] == 0) {
					for ($j=$y; $j < count($matrix); $j++) { 
						if ($matrix[$j][$i-1] != 0) {
							break;
						}
					}
					$temp = $matrix[$y][$i-1];
					$matrix[$y][$i-1] = $matrix[$j][$i-1];
					$matrix[$j][$i-1] = $temp;
				}
				$coef = $matrix[$y][$i-1] / $matrix[$i-1][$i-1];
				foreach ($matrix[$y] as $x => $value) {
					$matrix[$y][$x] -= $matrix[$i-1][$x] * $coef;
				}
			}
		}

		echo writeMatrix($matrix,"table");

		$j = 1;
		for ($i = count($matrix)-1; $i >= 0; $i--) { 
			$count = count($matrix[$i])-1;
			if (isset($result)) {
				foreach ($result as $key => $value) {
					$matrix[$i][$count] -= $matrix[$i][$key] * $value;
				}
			}
			$result[$count-$j] = $matrix[$i][$count] / $matrix[$i][$count-$j];
			$j++;
		}

		sort($result);

		return $result;
	}


	function EQS_suplyResults($matrix,$results)
	{
		for ($res_index = 0; $res_index < count($results); $res_index++) {
			$matrix_temp = $matrix;
			foreach ($matrix_temp as $m_key => $m_value) {
				$matrix_temp[$m_key][count($matrix[$m_key])] = $results[$res_index][$m_key];
			}
			print_r( solveEqSystem2($matrix_temp));
		}
	}

	EQS_suplyResults($matrix,$results);
?>
