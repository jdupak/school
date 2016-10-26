<style type="text/css">body {word-wrap: break-word;}</style>
<?php
		set_time_limit(2000);
		bcscale(10000);
		function fact($num) {
		    $res = 1;
		    for ($n = $num; $n >= 1; $n--) 
		        $res = bcmul($res,$n);
		    return $res;
		}
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
			/*♀
			pass timer
			if ($k % 10 == 0) {
				echo "nr.";
				echo $k;
				echo " t=";
				echo microtime()-$t."<br>";
			}*/
		}
		echo "execution time microsec= ";
		echo microtime()-$t.";<br>";
		echo "execution time sec= ";
		echo date("U")-$t2."<br>";
		$pi = bcdiv(bcmul(426880,bcsqrt(10005)),$z);
		echo $pi;
?>