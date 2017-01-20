<?php

	function f($x)
	{
		return -$x-20;
	}

	function mpi($f, $target, $x1, $x2, $p)
	{
		$i = 0;					// interation counter

		do {
			$pivot = ($x2 + $x1)/2;
			if ($f($pivot) > $target) {
				$x2 = $pivot;
			}
			else {
				$x1 = $pivot;
			}

			$i++;
			if ($i > 1000) {
				break;
			}
		} while (abs($f($pivot)-$target) > $p);
		return $pivot;
	}

	print(mpi(f,$input['searchedValue'],$input['bottomLimit'],$input['topLimit'],$input['accuracy']));
	//print(mpi(f,0,4,5,0.01));
 ?>