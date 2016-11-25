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

if (isset($_GET["month"])) 
{$month = $_GET["month"];}
else {$month = date("n");};

if (isset($_GET["year"])) 
{$year = $_GET["year"];}
else {$year = date("Y");}	

$countDays = date("t");
$first = date("N",mktime(0,0,0,$month,1,$year));

//table echo
echo "<table>\n";
?>
	<tr>
		<td>
			<a href="?month=<?php
			 	if ($month < 2) {
			 		echo "12";
			 		$year_temp = true;
			 	}
			 	else {
			 		echo ($month-1);
			 	}
			?>
			&year=<?php
				echo (($year_temp) ? $year-1 : $year);
				unset($year_temp);
			?>">&lt;</a>
		</td>
		<td colspan="5">
			<?php 
			echo $months[$month-1]." ".$year;
			?>
		</td>
		<td>
			<a href="?month=<?php
			 	if ($month > 11) {
			 		echo "1";
			 		$year_temp = true;
			 	}
			 	else {
			 		echo ($month+1);
			 	}
			?>
			&year=<?php
				echo (($year_temp) ? $year+1 : $year);
				unset($year_temp);
			?>">&gt;</a>
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