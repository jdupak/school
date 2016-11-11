<?php 
	function rectAnalysis($a=1,$b=1)
	{
		if (is_integer($a) == false OR is_integer($b) == false) {
			$result["error_message"] = "Zadání musí být číslo";
		}
		elseif ($a < 0 OR $b < 0) {
			$result["error_message"] = "Zadání musí být kladné";
		}
		else {
			$result["circumfence"] = 2 * ($a + $b);
			$result["area"] = $a * $b;
			$result["diagonal"] = sqrt($a*$a + $b*$b);
		}
		return $result;
	}

	function countOddsSmallerThan($array,$pivot=10)
	{
		foreach ($array as $key => $value) {
			if (($key % 2 > 0) AND ($value < $pivot)) {
				$total += $value;
			}
		}
		return $total;
	}

	function countAgeInMinutes($birth_day=1,$birth_month=1,$birth_year=1970)
	{
		if (is_integer($birth_day) AND ($birth_day > 0) AND ($birth_day <= 31)AND
			is_integer($birth_month) AND ($birth_month > 0) AND ($birth_month <= 12)
			AND
			is_integer($birth_year) AND ($birth_year >= 1970)
			)
		{
			$now = date("U");
			$birth_date = mktime(0,0,0,$birth_month,$birth_day,$birth_year);
			$age = round(($now - $birth_date)/60);
			return $age;
		}
		else {
			return "ERROR Zadání musí být platné datum";
		}
	}


//INPUT
//obdélník
	print_r(rectAnalysis(2,3));
	echo "\n<br>";
//součet lichých prvků pole menších než
	$array = array("1","6","3","4","7","7","8");
	echo("součet = ".countOddsSmallerThan($array,5)."<br>\n");
//věk v minutách (zanedbáva první den --> čas narození 00:00)
	echo("věk v minutách = ".countAgeInMinutes(12,11,2000)."<br>\n") //day,month,year

?>