<?php
/*
*   Content
        __Transform
        __Math
*/

/* =====================
    __Transformation
  
*/

    /**
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

    /**
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

    /**
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

    /**
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

    /**
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

    /**
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
    /**
    * Returns determinant of square matrix
    * 
    * @param {array} matrix
    */
        function determinant($matrix)
        {
            if ( isset($matrix[1][1]) === false ) {
                return $matrix[0][0];
            }

            $result = 0;

            for ($x=0; $x < count($matrix[0]); $x++) { 

                if ($x % 2 == 0) {
                    $direction = 1;
                } else {
                    $direction = -1;
                }

                $submatrix = array();
                foreach ($matrix as $matrix_coord_y => $row) {
                    $submatrix_row = Array();
                    foreach ($row as $matrix_coord_x => $value) {
                        if (($matrix_coord_y != 0) AND ($matrix_coord_x != $x)) {
                            $submatrix_row[] = $value*1;
                        }
                    }
                    if ($submatrix_row != NULL) {
                        $submatrix[] = $submatrix_row;
                    }
                }

                $result += $matrix[0][$x] * $direction * determinant($submatrix);

            }

            return $result;
        }

    /**
    * Multiplies two matrixes. Matrix A width must fit matrix B height.
    * 
    * @param {array} matrix_a
    * @param {array} matrix_b
    * @return {array}
    */
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

    /**
    * Returns matrix with excluded column and row of given coordinates
    * 
    * @param {array} matrix
    * @param {integer} coord_x
    * @param {integer} coord_y
    * @return {array}
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
    /**
    * Returns inverse matrix
    * 
    * @param {array} matrix
    * @return {array}
    */
        function inverseMatrix($matrix)
        {
            $determinant_whole_matrix = determinant($matrix);

            if ($determinant_whole_matrix == 0) {
                return $matrix;
            }

            for ($y=0; $y < count($matrix); $y++) { 
                for ($x=0; $x < count($matrix[0]); $x++) {

                    if ( ($x + $y) % 2 == 0) {
                        $result = 1;
                    } else {
                        $result = -1;
                    }

                    $result *= determinant(submatrix($matrix, $y, $x)) / $determinant_whole_matrix;
                    $newMatrix[$x][$y] = $result;
                }
            }
            return $newMatrix;
        }




?>