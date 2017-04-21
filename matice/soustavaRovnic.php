<?php
	include '../_include/matrix.function.php';

	$matrixLeft = parseCSV( "matice7.csv" );
	$matrixRight = parseCSV( "matice7B.csv" );

	echo writeMatrix( solveEqSystem($matrixLeft,$matrixRight),"table" );

?>
