<?php
	include '../_include/matrix.function.php';

	function determinant($matrix)
	{
		if ( isset($matrix[1][1]) === false ) {
			return $matrix[0][0];
		}

		$result = 0;

		for ($x=0; $x < count($matrix[0]); $x++) { 

			if ($x % 2 == 0) {
				$direction = 1;
			} else {
				$direction = -1;
			}

			foreach ($matrix as $matrix_coord_y => $row) {
				$submatrix_row = Array();
				foreach ($row as $matrix_coord_x => $value) {
					if (($matrix_coord_y != 0) AND ($matrix_coord_x != $x)) {
						$submatrix_row[] = $value*1;
					}
				}
				if ($submatrix_row != NULL) {
					$submatrix[] = $submatrix_row;
				}
			}

			$result += $matrix[0][$x] * $direction * determinant($submatrix);

		}

		return $result;
	}

	echo determinant( parseCSV("./matice1.csv") );
 ?>