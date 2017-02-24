<?php 
function parseCSV($path)
{
	$fileContent = file_get_contents($path);
	$rows = explode(PHP_EOL, $fileContent);
	foreach ($rows as $key => $value) {
		$data[] = explode(";",$value);
	}
	return $data;
}

/* ========================================================= */

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
				$result[] = Array("row" => $row+1, "column" => $column+1);
			}
		}
	}
	if (isset($result) == false) {
		return $result['Error'] = "No Match";
	} else {
		return $result;
	}
}
?>