<?php 
function myfactor($x=0)
{	
	if ($x == 0) {$x = 1;} 
	for ($i=$x-1; $i > 1; $i--) { 
		$x *= $i;
	}
return $x;
}

echo myfactor(0);
?>