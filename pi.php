<?php 
	for ($i=0; $i < 1000000; $i++) { 
		$pi += (4*pow(-1, $i)/(2*$i+1));
	}
	echo($pi);
?>