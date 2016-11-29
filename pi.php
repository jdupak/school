<?php 
	$i=0
	$t=2	//doba po kterou pobezi for
	for ($e=time(); time() <= ($e + $t); $i++) { 
		$pi += ((4 - 8 * ($i % 2))/(2*$i+1));
	}
	echo($pi);
?>
