<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
<?php
$days = array("Po","Út","St","Čt","Pá","So","Ne");
$months = array('leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec');

$month = date("n");
$year = date("Y");
$countDays = date("t");
$first = date("N",mktime(0,0,0,$month,1,$year));


//table echo
echo "<table>\n";
?>
	<tr>
		<td>
			<a href="#">&lt;</a>
		</td>
		<td colspan="5">
			<?php 
			echo $months[$month-1]." ".$year;
			?>
		</td>
		<td>
			<a href="?month=<?php $month+1 ?>?">&gt;</a>
		</td>
	</tr>
<?php
foreach ($days as $key => $value) {
	echo ("\t\t<th>".$value."</th>\n");
}
echo "\t</tr>\n";
for ($week=1; $week <= 6; $week++) { 
	echo "\t<tr>\n";
	for ($dayInWeek=1; $dayInWeek <= 7; $dayInWeek++) { 
		$day = 7*($week - 1) + $dayInWeek - $first + 1;
		if ($day <= 0 OR $day > $countDays) {
			$day = "&nbsp;";
		};
		echo("\t\t<td>".$day."</td>\n");
	}
	echo "\t</tr>\n";
	if(!checkdate($month, $day-1, $year)) {break;};
}
echo "</table>\n";
?>
</body>
</html>