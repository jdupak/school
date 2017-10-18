<?php 
	
	$graph = imagecreate(600,400);

	$color["black"] = imagecolorallocate($graph,0,0,0);
	$color["white"] = imagecolorallocate($graph,255,255,255);
	$color["yellow"] = imagecolorallocate($graph,255,255,0);
	$color["green"] = imagecolorallocate($graph,0,255,0);

	imageline($graph,0,200,600,200,$color["green"]); //X AXIS
	imageline($graph,300,0,300,400,$color["green"]); //Y AXIS

	function polyFunction($x)
	{
		return -$x^4+2*$x^2;
	}

	function drawLinGraph($graph,$color)
	{
		$points = Array();
		for ($x_coord=-300; $x_coord < 300; $x_coord+=0.001) { 
			$points[] = $x_coord+300;
			$points[] = -polyFunction($x_coord/50)*50 + 200;
		}
		
		imagepolygon($graph, $points,count($points)/2, $color["yellow"]);
	}

	drawLinGraph($graph,$color);


	imagejpeg($graph, "graph.jpeg");

	imagedestroy($graph);

 ?>

 <img src="graph.jpeg">
