<?php
$n=0;
global $n;
echo "<table border='1'>";
for ($i=0; $i < 1000; $i++) { 
	echo "<tr>";
		for ($j=0; $j < 1000; $j++) { 
			echo "<td>".$n."</td>";
			$n++;
		}
	echo "</tr>";
};
echo "</table>";  
?>
