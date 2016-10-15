<form method="get">
a=<input name="a">
b=<input name="b">
c=<input name="c">
<input type="submit">
</form>

<?php
	$a = $_GET["a"];
	$b = $_GET["b"];
	$c = $_GET["c"];
function is_triangle($a,$b,$c){
	if ((($a + $b) > $c) || (($a + $c) > $b) || (($c + $b) > $a)) {
		echo "Ano";
	}
	else {
		echo "Ne";
	}
}
?>