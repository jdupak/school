<?php
	include '../_include/matrix.function.php';

	$matrix = parseCSV("./matice5.csv");

	$newMatrix = matrixProduct( $matrix, inverseMatrix($matrix) );

	echo writeMatrix( $newMatrix,"table" );

?>
