<?php 
	foreach ($_POST as $key => $value) {
		$$key = $value;
	}

	echo "<div style='color:".$color.";'>Lorem ipsum dolor sit amet a</div>";
	echo $color;
?>