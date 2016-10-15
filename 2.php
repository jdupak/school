<?php
$pole = array("Jmeno"=>"Karel","Prijmeni"=>"Honza","Druhe jmeno"=>"Martin");

function tabulka_kontaktu($pole) {
	echo "<table>";
	foreach ($pole as $key => $value) {
		echo("<tr><td>".$key."</td><td>".$value."<td></tr>\n");
	}
	echo "</table>";
}; //end of tabulka_kontaktu

tabulka_kontaktu($pole);
?>