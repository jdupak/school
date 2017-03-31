<?php
/*
*   Content
        __Transform
        __Math
*/

/* =====================
    __Transformation
  
*/

    /*
    *	Retrives datafile in csv format and transforms it to multidimenstional array
    *
    *	@param {string} $target - value to be searched
    *	@param {string} $array - array to be searched
    */
    	function parseCSV($path)
    	{
    		$fileContent = file_get_contents($path);
    		$rows = explode(PHP_EOL, $fileContent);
    		foreach ($rows as $key => $value) {
    			$data[] = explode(";",$value);
    		}
    		return $data;
    	}

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

    /*
    * Generate matrix with specified type from multidimensional array
    *
    * @param {text} $type - spaces,breaks,csv,table
    * @param {array} $matrix
    *
    */

    	function writeMatrix($matrix, $type = "spaces")
    	{
    		switch ($type) {
    			case 'spaces':
    				$element_separator = " ";
    				$line_separator = PHP_EOL;
    				break;

    			case 'breaks':
    				$element_separator = " ";
    				$line_separator = "<br>";
    				break;

    			case 'csv':
    				$element_separator = ";";
    				$line_separator = PHP_EOL;
    				break;

    			case 'table':
    				return writeMatrixAsTable($matrix);
    				break;
    		}

    		foreach ($matrix as $subarray) {
    			$result[] = implode($element_separator, $subarray);
    		}
    		$result = implode($line_separator, $result);
    		return $result;
    	}

    /*
    * Generate matrix as table from multidimensional array
    *
    * @param {array} $matrix
    *
    */

    	function writeMatrixAsTable($matrix)
    	{
    		$result = "<table>\n";
    		foreach ($matrix as $row) {
    			$result .= "\t<tr>\n";

    			foreach ($row as $element) {
    				$result .= "\t\t<td>".$element."</td>\n";
    			}

    			$result .= "\t</tr>\n";
    		}
    		$result .= "</table>\n";

    		return $result;
    	}

    /*
    * Transposes matrix
    *
    * @param {array} $matrix
    *
    */

    	function transposeMatrix($array)
    	{	
    		foreach ($array as $key => $sub_a) {
    			foreach ($sub_a as $sub_key => $sub_value) {
    				$result[$sub_key][$key] = $array[$key][$sub_key];
    			}
    		}

    		return $result;
    	}

    /*
    * Generate matrix without given line and column
    * 
    * @param {array}
    */
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

/* =====================
    __MATH
*/


?>