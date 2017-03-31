<?php 
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
	include '../_include/matrix.function.php';
	echo det( parseCSV("./matice1.csv") );
 ?>