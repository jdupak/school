<?php 
	/*
	*	Searches array and returns coorrdinates of matches
	*	@param {string} $target - value to be searched
	*	@param {string} $array - array to be searched
	*/

	function searchArrayReturnCoord($target, $array)
	{
		foreach ($array as $row => $subarray) {
			foreach ($subarray as $column => $value) {
				if ($value == $target) {
					$result[] = ["row" => $row+1, "column" => $column+1];
				}
			}
		}
		if (isset($result) == false) {
			return $result['Error'] = "No Match"
		} else {
			return $result;
		}
	}
?>