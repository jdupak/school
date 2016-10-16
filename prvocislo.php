<form method="get">
<input name="n">
<input type="submit">
</form>
<?php 
// zjištění prvočísla
$n = $_GET["n"];

function prvociclo($n){
	$sq_n = sqrt($n);
	for ($i=2; $i <= $sq_n; $i++) { 
		if ($n % $i == 0) {
			return 1;
		}
	}
}
$mark = prvociclo($n);
if ($mark == 1) {
	echo "Neni prvocislo";
} else {
	echo "Je prvocislo"
}

?>