<?php 
	function fact($num) {
	    $res = 1;
	    for ($n = $num; $n >= 1; $n--) 
	        $res = $res*$n;
	    return $res;
	}

	for ($k=0; $k < 10; $k++) { 
		$z += (fact(6*$k)*(13591409+545140134*$k)/(fact(3*$k)*pow(fact($k), 3)*pow(-640320,3*$k)));
	}
	echo $z;
	echo "<br>";
	$pi = (426880*sqrt(10005))/$z;
	echo($pi);
	$k=0;
	echo "<br>".(fact(3*$k)*pow(fact($k), 3)*pow(-640320,3*$k));
	echo "<br>".fact(6*$k)*(13591409+545140134*$k);
	?>