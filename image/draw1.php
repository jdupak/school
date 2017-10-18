<?php 
	$image = imagecreate(600,400);

	$color["black"] = imagecolorallocate($image,0,0,0);
	$color["white"] = imagecolorallocate($image,255,255,255);
	$color["yellow"] = imagecolorallocate($image,255,255,0);

	function drawHouse($image,$color,$x,$y,$s)
	{
		imageline($image,$x+50*$s,$y,$x,$y+50*$s,$color);
		imageline($image,$x,$y,$x+50*$s,$y+50*$s,$color);
		imageline($image,$x,$y+50*$s,$x+50*$s,$y+50*$s,$color);
		imageline($image,$x,$y,$x,$y+50*$s,$color);
		imageline($image,$x+50*$s,$y,$x+50*$s,$y+50*$s,$color);
		imageline($image,$x,$y,$x+50*$s,$y,$color);
		imageline($image,$x,$y,$x+25*$s,$y-25*$s,$color);
		imageline($image,$x+25*$s,$y-25*$s,$x+50*$s,$y,$color);
	}

	function drawSun($image,$color,$x,$y,$s)
	{
		imagefilledellipse($image, $x+20, $y+20, 10*$s, 10*$s, $color);
		for ($i=0; $i < 360;) {
			$angle = deg2rad($i);
			$a = $x+20+8*$s*cos($angle);
			$b = $y+20+8*$s*sin($angle);
			imageline($image,$x+20,$y+20,$a,$b,$color);

			$i += 15;
		}
	}

	drawHouse($image,$color["yellow"],100,200,5);
	drawHouse($image,$color["yellow"],500,200,1);

	drawSun($image,$color["yellow"],50,50,5);


	imagejpeg($image, "image.jpeg");

	imagedestroy($image);

 ?>

 <img src="image.jpeg">