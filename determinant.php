<?php 
	include '../_include/matrix.function.php';

	/**
	*	Determinant pro jeden prvek v poli
	*/
	function determinantElement($matrix, $coord_x, $coord_y)
	{
		if ( ($coord_x + $coord_y) % 2 == 0) {
			$result = 1;
		} else {
			$result = -1;
		}

		$result *= $matrix[$coord_y][$coord_x];

		foreach ($matrix as $matrix_coord_y => $row) {
			$submatrix_row = Array();
			unset($submatrix_row);
			foreach ($row as $matrix_coord_x => $value) {
				if (($matrix_coord_y != $coord_y) AND ($matrix_coord_x != $coord_x)) {
					$submatrix_row[] = $value*1;
				}
			}
			if ($submatrix_row != NULL) {
				$submatrix[] = $submatrix_row;
			}
		}

		if (isset($submatrix[1][1])) {
			$result *= determinantElement($submatrix, 1, 1);
		}

		return $result;
	}

	function determinant($matrix, $coord_y)
	{
		foreach ($matrix[$coord_y] as $coord_x => $value) {
			$result += determinantElement($matrix, $coord_x, $coord_y);
			echo determinantElement($matrix, $coord_x, $coord_y).";";
		}

		return $result;
	}

	echo determinant(parseCSV("./matice2.csv"),0);
?>