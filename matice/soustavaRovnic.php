<?php
	include '../_include/matrix.function.php';

	$matrixLeft = parseCSV( "matice7.csv" );
	$matrixRight = parseCSV( "matice7B.csv" );

	function solveEqSystem($matrixLeft, $matrixRight)
	{
		if ( determinant($matrixLeft) == 0 ) {
			return "ZERO DETERMINANT";
		}

		return $result = matrixProduct( inverseMatrix( $matrixLeft ),$matrixRight );
	}

	echo writeMatrix( solveEqSystem($matrixLeft,$matrixRight),"table" );
?>
