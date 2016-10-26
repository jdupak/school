<?php 
$a = 0;
$b = 0;
$c = 0;

function solve($a,$b,$c)
{
	if ($a == 0) {
		if ($b == 0 AND $c !== 0) {
			echo "Nemá řešení <br>\n";
		}
		elseif ($b == 0 AND $c == 0) {
			echo " x = R <br>\n";
		}
		else {
			$x1 = -$c/$b;
			echo "x = ".$x1."<br>\n";
		}
	}
	else {
		$d = $b*$b - 4*$a*$c;
		$sqr_d = sqrt($d);
		$x1 = (-$b+$sqr_d)/(2*$a);
		$x2 = (-$b-$sqr_d)/(2*$a);
		if ($d < 0) {
			echo "Nemá řešení <br>\n";
		}
		elseif ($d > 0) {
			echo "x1 = ".$x1."<br>\n x2 = ".$x2."<br>\n";
		}
		else {
			echo "x = ".$x."<br>\n";
		}
	}
}

solve($a,$b,$c);
?>