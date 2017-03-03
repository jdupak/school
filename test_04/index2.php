<?php 

	function writeMatrix($matrix)
	{
		foreach ($matrix as $subarray) {
			$result[] = implode(" ", $subarray);
		}
		$result = implode(PHP_EOL, $result);
		return $result;
	}
	/* ======================================== */

	function genMatrixWithDiagonal($input)
	{
		$change = $input - 1;

		for ($i=0; $i < $input; $i++) {
			for ($j=0; $j < $input; $j++) { 
				$result[$i][$j] = 0;
			}

			$result[$i][$change] = 1;
			$change--;
		}
		return $result;
	}	
		

	echo writeMatrix(genMatrixWithDiagonal(20));

?>