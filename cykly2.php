<?php
global $n;
$array = array();
for ($i="a";$i<="z";$i++) { 
	for ($j=0; $j < 50; $j++) { 
			$array[$i][$j] = $n;
			$n++;
		}
};
print_r($array);

?>
