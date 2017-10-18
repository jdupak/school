<?php
	$gen_p_f = ["A"=>0.75,"B"=>0.25,"AB"=>0,"0"=>0.75];

	function groupGenerationF ($gen_p_f)
	{
		$gen_p_g["AA"] = $gen_p_f["A"] / 3;
		$gen_p_g["A0"] = $gen_p_f["A"] / 3 * 2;
		$gen_p_g["BB"] = $gen_p_f["B"] / 3;
		$gen_p_g["B0"] = $gen_p_f["B"] / 3 * 2;
		$gen_p_g["AB"] = $gen_p_f["AB"];
		$gen_p_g["00"] = $gen_p_f["0"];

		return $gen_p_g;
	}

	function groupMixing($gen_p_g)
	{
		$gen_f_g["AA"] = 0;
		$gen_f_g["A0"] = 0;
		$gen_f_g["0A"] = 0;
		$gen_f_g["BB"] = 0;
		$gen_f_g["B0"] = 0;
		$gen_f_g["0B"] = 0;
		$gen_f_g["AB"] = 0;
		$gen_f_g["BA"] = 0;
		$gen_f_g["00"] = 0;

		foreach ($gen_p_g as $genotype_1 => $percentage_1) {
			foreach ($gen_p_g as $genotype_2 => $percentage_2) {
				$father = str_split($genotype_1);
				$mother = str_split($genotype_2);

				$gen_f_g[$father[0].$mother[0]] += $percentage_1 * $percentage_2;
				$gen_f_g[$father[0].$mother[1]] += $percentage_1 * $percentage_2;
				$gen_f_g[$father[1].$mother[0]] += $percentage_1 * $percentage_2;
				$gen_f_g[$father[1].$mother[1]] += $percentage_1 * $percentage_2;
			}
		}
			$sum = 0;
			foreach ($gen_f_g as $value) {
				$sum += $value;
			}

			foreach ($gen_f_g as $key => $value) {
				$gen_f_g[$key] = $value / $sum;
			}
			$gen_f_g["A0"] += $gen_f_g["0A"];
			unset($gen_f_g["0A"]);
			$gen_f_g["B0"] += $gen_f_g["0B"];
			unset($gen_f_g["0B"]);
			$gen_f_g["AB"] += $gen_f_g["BA"];
			unset($gen_f_g["BA"]);
		return $gen_f_g;
	}


	function groupSuply($gen_p_f,$genAmount)
	{
		$gen_f_g = groupGenerationF($gen_p_f);
		for ($i=0; $i < $genAmount; $i++) { 
			$gen_f_g = groupMixing($gen_f_g);
		}
		return $gen_f_g;
	}

	function groupDecide($gen_f_g)
	{
		$gen_f_f["A"] = $gen_f_g["AA"];
		$gen_f_f["A"] += $gen_f_g["A0"];
		$gen_f_f["B"] = $gen_f_g["BB"];
		$gen_f_f["B"] += $gen_f_g["B0"];
		$gen_f_f["AB"] = $gen_f_g["AB"];
		$gen_f_f["0"] = $gen_f_g["00"];

		return $gen_f_f;
	}

	var_dump(groupDecide(groupSuply($gen_p_f,1000)));
 ?>