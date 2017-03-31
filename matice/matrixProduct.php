<?php 
	include '../_include/matrix.function.php';

	function matrixProduct( $matrix_a,$matrix_b )
	{	
		if (count($matrix_a[0]) == count($matrix_b)) {
			for ( $matrix_b_x = 0; $matrix_b_x < count( $matrix_b[0] ); $matrix_b_x++) {
				$submatrix_row = array(); 
				foreach ( $matrix_a as $matrix_a_y => $matrix_a_row ) {
					$submatrix_element = 0;
					foreach ( $matrix_a_row as $matrix_a_x => $value ) {
						$submatrix_element += $matrix_a[$matrix_a_y][$matrix_a_x] * $matrix_b[$matrix_a_x][$matrix_b_x];
					}
					$submatrix_row[] = $submatrix_element;
				}
				$submatrix[] = $submatrix_row;
			}
		} else {echo 'Nelze';}
		$submatrix = transposeMatrix($submatrix);
		return $submatrix;
	}

	$result = matrixProduct( parseCSV('matice2.csv'),parseCSV('matice3.csv') );
	echo writeMatrix( $result,'table' );
 ?>
