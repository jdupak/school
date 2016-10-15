<?php
$n = 2;
$sqr_n = sqrt($n);
$found = 0;
for ($i=1; $i < $sqr_n; $i++) { 
	if ($n % $i == 0 ) {
		$found = 1;
		break;
	}
}
if ($found = 1) {
	echo "Neni prvocislo";
} else {
	echo "Je prvocislo";
}


?>