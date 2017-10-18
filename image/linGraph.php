<?php 
	
	$graph = imagecreate(600,400);

	$color["black"] = imagecolorallocate($graph,0,0,0);
	$color["white"] = imagecolorallocate($graph,255,255,255);
	$color["yellow"] = imagecolorallocate($graph,255,255,0);
	$color["green"] = imagecolorallocate($graph,0,255,0);

	imageline($graph,0,200,600,200,$color["green"]); //X AXIS
	imageline($graph,300,0,300,400,$color["green"]); //Y AXIS

	function linFunction($x)
	{
		return 2*$x + 70;
	}

	function drawLinGraph($graph,$color)
	{
		$points = Array();
		$minY = -linFunction(-300) + 200;
		$maxY = -linFunction(300) + 200;
		imageline($graph,0,$minY,600,$maxY,$color["white"]);
	}

	drawLinGraph($graph,$color);


	imagejpeg($graph, "graph.jpeg");

	imagedestroy($graph);

 ?>

 <img src="graph.jpeg">
