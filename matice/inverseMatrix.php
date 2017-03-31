<?php
	include '../_include/matrix.function.php';

	function det($a){
	    if(count($a)<2) return $a[0][0];
	    $det = 0;
	    for($k=0;$k<count($a[0]);$k++):
	        $znamenko = ($k%2) ? -1 : 1;
	        $sub = array();
	        for($i=1;$i<count($a);$i++):
	            for($j=0;$j<count($a);$j++):
	                if($j==$k) $j++; 
	                $sub[$i-1][] = $a[$i][$j];
	            endfor;
	        endfor;
	        $det += $a[0][$k] * $znamenko * det($sub);
	    endfor;
	    return $det;
	}

	function submatrix($matrix, $coord_y, $coord_x)
	{
		foreach ($matrix as $matrix_coord_y => $row) {
			$submatrix_row = Array();
			foreach ($row as $matrix_coord_x => $value) {
				if (($matrix_coord_y != $coord_y) AND ($matrix_coord_x != $coord_x)) {
					$submatrix_row[] = $value*1;
				}
			}
			if ($submatrix_row != NULL) {
				$submatrix[] = $submatrix_row;
			}
		}

		return $submatrix;
	}

	function inverseMatrix($matrix)
	{
		$det = det($matrix);

		if ($det == 0) {
			return $matrix;
		}

		for ($y=0; $y < count($matrix); $y++) { 
			for ($x=0; $x < count($matrix[0]); $x++) {

				if ( ($x + $y) % 2 == 0) {
					$result = 1;
				} else {
					$result = -1;
				}

				$result *= det(submatrix($matrix, $y, $x)) / $det;
				$newMatrix[$x][$y] = $result;
			}
		}
		return $newMatrix;
	}

	echo writeMatrix( inverseMatrix( parseCSV("./matice4.csv") ),"table");
?>
