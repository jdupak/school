<?php

	$data['KO'] = 200;
	$data['AKO'] = 300;
	$data['HAHA'] = 3000;
	$data['TROLO'] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;
	$data[] = 500;


	function volbyGrafSoupcovy($data,$width,$height)
	{
		$graph = imagecreate($width,$height);
		$wc = $width / 600; //width coeficient
		$hc = $height / 400; //height coeficient

		$color["white"] = imagecolorallocate($graph,255,255,255);
		$color["black"] = imagecolorallocate($graph,0,0,0);

		$sum = 0;
		foreach ($data as $value) {
			$sum += $value;
		}

		$max__percent = max($data)/$sum;
		$coef =  1/($max__percent); //to make highest value 100

		arsort($data);

		foreach ($data as $key => $value) {
			$data__percent[$key] = $value / $sum * $coef;
		}

		if (count($data__percent) > 8) {
			$otherCounter = 0;
			$other = 0;
			foreach ($data__percent as $key => $value) {
				$otherCounter++;
				if ($otherCounter > 7) {
					$other += $data__percent[$key];
					unset($data__percent[$key]);
				}
			}
			$data__percent["Ostatní"] = $other;
		}

		//axises
		imageline($graph,10*$wc,10*$hc,10*$wc,360*$hc,$color["black"]);
		imageline($graph,10*$wc,360*$hc,590*$wc,360*$hc,$color["black"]);
		imageline($graph,10*$wc,10*$hc,20*$wc,10*$hc,$color["black"]);
		imageline($graph,590*$wc,360*$hc,590*$wc,350*$hc,$color["black"]);


		//title
		$title = "Volby XXXX";
		$titleWidth = imagettfbbox(20,0, "../font/Roboto/Roboto-Regular.ttf", $title);
		imagefttext($graph,20*$hc,0,(580 - $titleWidth[2])*$wc,40*$hc,$color["black"],"../font/Roboto/Roboto-Regular.ttf",$title);

		//max
		imagefttext($graph,12*$hc,0,25*$wc,15*$hc,$color["black"],"../font/Roboto/Roboto-Regular.ttf",round($max__percent*100)."%");

		$x = 60*$wc;
		$y = 359*$hc;
		$colWidth = 50*$wc;
		foreach ($data__percent as $party => $percent) {
			imagefilledrectangle($graph, $x, $y, $x+$colWidth, $y-349*$percent, $color["black"]);
			imagefttext($graph,12*$hc,0,$x,380*$hc,$color["black"],"../font/Roboto/Roboto-Regular.ttf",$party);
			imagefttext($graph,10*$hc,0,$x,392*$hc,$color["black"],"../font/Roboto/Roboto-Regular.ttf",round($percent/$coef*100)."%");
			$x += 60*$wc;
		}

		imagejpeg($graph, "graph.jpeg");

		imagedestroy($graph);
	}

	volbyGrafSoupcovy($data,600,400);
 ?>

 <img src="graph.jpeg">