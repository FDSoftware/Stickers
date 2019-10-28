<?php
 
header("Content-type: image/png");
$img_width = 800;
$img_height = 600;
 
$img = imagecreatetruecolor($img_width, $img_height);
 
$clouds = imagecreatefrompng('clouds.png');
$clouds = imagescale($clouds, 250);
 
imagesetthickness($img, 5);
imagesetbrush($img, $clouds);
 
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$red   = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$blue  = imagecolorallocate($img, 0, 200, 250);
$orange = imagecolorallocate($img, 255, 200, 0);
$brown = imagecolorallocate($img, 220, 110, 0);
 
imagefill($img, 0, 0, $white);
 
imagefilledrectangle($img, 0, 0, $img_width, $img_height*8/10, $blue);
 
imagefilledrectangle($img, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*8/10, $red);
imagefilledrectangle($img, $img_width*4/10 - 2, $img_height*5/10, $img_width*8/10, $img_height*8/10, $red);
 
imagefilledpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 3, $red);
imagefilledpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*7/10, $img_height*2/10, $img_width*8/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 4, $red);
 
imagefilledarc($img, 100, 100, 100, 100, 0, 360, $orange, IMG_ARC_PIE);
imagefilledarc($img, $img_width*3/10, $img_height*8/10, 100, 200, 180, 360, $brown, IMG_ARC_PIE);
 
imagefilledrectangle($img, 0, $img_height*8/10, $img_width, $img_height, $green);
 
imagerectangle($img, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*8/10, $black);
imagerectangle($img, $img_width*4/10 - 2, $img_height*5/10, $img_width*8/10, $img_height*8/10, $black);
 
imagepolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 3, $black);
imageopenpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*7/10, $img_height*2/10, $img_width*8/10, $img_height*5/10], 3, $black);
 
imagearc($img, 100, 100, 100, 100, 0, 360, $black);
imagearc($img, $img_width*3/10, $img_height*8/10, 100, 200, 180, 360, $black);
 
imageline($img, $img_width*9/10, 50, $img_width*9/10, 50, IMG_COLOR_BRUSHED);
 
imagerectangle($img, -100, $img_height*8/10, $img_width*11/10, $img_height*11/10, $black);
 
imagepng($img);
?>