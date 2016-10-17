<?php
	bcscale(1000);
	function fact($num) {
	    $res = 1;
	    for ($n = $num; $n >= 1; $n--) 
	        $res = bcmul($res,$n);
	    return $res;
	}
	for ($k=0; $k < 100; $k++) { 
		$z=bcadd($z,
			bcdiv(
				bcmul(
					fact(6*$k),
					(13591409+545140134*$k)
						),
				bcmul(
					bcmul(
						fact(3*$k),
						bcpow(fact($k), 3)),
					bcpow(-640320,3*$k)
					)
			)
		);
	}
	$pi = bcdiv(bcmul(426880,bcsqrt(10005)),$z);
	echo $pi;
?>