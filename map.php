<?php

//Known Letter/Number Maps of the 6x8 Space.
$maps = array(
	'a' => array('r' => array(4,4,4,4,6,4,4,4), 'c' => array(7,8,2,2,8,7)),
	'b' => array('r' => array(5,4,4,5,4,4,4,5), 'c' => array(8,8,3,3,8,5)),
	'c' => array('r' => array(4,4,2,2,2,2,4,4), 'c' => array(6,8,2,2,4,2)),
	'd' => array('r' => array(5,4,4,4,4,4,4,5), 'c' => array(8,8,2,2,8,6)),
	'e' => array('r' => array(6,2,2,5,2,2,2,6), 'c' => array(8,8,3,3,3,2)),
	'f' => array('r' => array(6,2,2,5,2,2,2,2), 'c' => array(8,8,2,2,2,1)),
	'g' => array('r' => array(4,4,2,2,5,4,4,5), 'c' => array(6,8,2,3,6,5)),
	'h' => array('r' => array(4,4,4,6,4,4,4,4), 'c' => array(8,8,1,1,8,8)),
	'i' => array('r' => array(6,2,2,2,2,2,2,6), 'c' => array(2,2,8,8,2,2)),
	'j' => array('r' => array(2,2,2,2,2,2,4,4), 'c' => array(1,2,1,1,8,7)),
	'k' => array('r' => array(4,4,4,3,3,4,4,4), 'c' => array(8,8,4,4,4,2)),
	'l' => array('r' => array(2,2,2,2,2,2,2,6), 'c' => array(8,8,1,1,1,1)),
	'm' => array('r' => array(2,4,6,6,4,4,4,4), 'c' => array(8,7,2,2,7,8)),
	'n' => array('r' => array(4,5,5,6,5,5,4,4), 'c' => array(8,8,3,3,8,8)),
	'o' => array('r' => array(4,4,4,4,4,4,4,4), 'c' => array(6,8,2,2,8,6)),
	'p' => array('r' => array(5,4,4,5,2,2,2,2), 'c' => array(8,8,2,2,4,2)),
	'q' => array('r' => array(4,4,4,4,4,5,5,4,2), 'c' => array(6,8,3,3,9,7)),
	'r' => array('r' => array(5,4,4,5,4,4,4,4), 'c' => array(8,8,3,4,7,4)),
	's' => array('r' => array(4,4,2,4,2,2,4,4), 'c' => array(3,6,3,3,7,4)),
	't' => array('r' => array(6,2,2,2,2,2,2,2), 'c' => array(1,1,8,8,1,1)),
	'u' => array('r' => array(4,4,4,4,4,4,4,4), 'c' => array(7,8,1,1,8,7)),
	'v' => array('r' => array(4,4,4,2,2,4,2,2), 'c' => array(3,6,3,3,6,3)),
	'w' => array('r' => array(4,4,4,4,6,6,4,2), 'c' => array(8,7,2,2,7,8)),
	'x' => array('r' => array(2,4,2,2,4,2,4,2), 'c' => array(4,5,2,2,5,4)),
	'y' => array('r' => array(4,4,4,4,2,2,2,2), 'c' => array(2,4,6,6,4,2)),
	'z' => array('r' => array(6,2,2,2,2,2,2,6), 'c' => array(4,5,4,4,4,3)),
	'0' => array('r' => array(4,4,4,5,5,4,4,4), 'c' => array(6,8,3,3,8,6)),
	'1' => array('r' => array(2,3,3,2,2,2,2,6), 'c' => array(2,2,8,8,1,1)),
	'2' => array('r' => array(4,4,4,2,3,2,2,6), 'c' => array(4,6,4,3,6,4)),
	'3' => array('r' => array(4,4,2,4,2,2,4,4), 'c' => array(2,5,3,3,8,5)),
	'4' => array('r' => array(2,3,4,4,4,6,2,2), 'c' => array(2,3,3,3,8,8)),
	'5' => array('r' => array(6,2,5,4,2,2,4,4), 'c' => array(5,6,3,3,7,5)),
	'6' => array('r' => array(4,4,2,5,4,4,4,4), 'c' => array(6,8,3,3,7,4)),
	'7' => array('r' => array(6,2,2,2,2,2,2,2), 'c' => array(1,3,5,5,4,2)),
	'8' => array('r' => array(4,4,4,4,4,4,4,4), 'c' => array(5,8,3,3,8,5)),
	'9' => array('r' => array(4,4,4,4,5,2,4,4), 'c' => array(4,7,3,3,8,6))
	
);

function getCap($the_img){
//$the_img
	global $maps;
	$red = imagecolorallocate($the_img,255,255,255);
	$green = imagecolorallocate($the_img,34,177,76);
	$kk = imagecolorallocate($the_img, 0, 0, 0);
	for ($y = 0; $y < imagesy($the_img); $y++) {
		for ($x = 0; $x < imagesx($the_img); $x++) {
			$rgb = imagecolorat($the_img, $x, $y);
			$colors = imagecolorsforindex($the_img, $rgb);
			$r=$colors['red'];
			$g=$colors['green'];
			$b=$colors['blue'];
			if(($r != 252)){
				imagesetpixel($the_img,$x,$y,$green); 
			}
		}
	}		
	$map = array();
	$col = 0;
	for ($y = 0; $y < imagesy($the_img); $y++) {
		$pix = 0;
		for ($x = 0; $x < imagesx($the_img); $x++) {
			$rgb = imagecolorat($the_img, $x, $y);
			$colors = imagecolorsforindex($the_img, $rgb);
			$r = $colors['red'];
			$g = $colors['green'];
			$b = $colors['blue'];
			if(($r == 252)){
				$pix++;
			}
		}
		if($pix != 0){
			$map[0][$col] = $pix;
			$col++;
		}
	}
	$col = 0;
	for ($x = 0; $x < imagesx($the_img); $x++) {
		$pix = 0;
		for ($y = 0; $y < imagesy($the_img); $y++) {
			$rgb = imagecolorat($the_img, $x, $y);
			$colors = imagecolorsforindex($the_img, $rgb);
			$r = $colors['red'];
			$g = $colors['green'];
			$b = $colors['blue'];
			if(($r == 252)){
				$pix++;
			}
		}
		if($pix != 0){
			$map[1][$col] = $pix;
			$col++;
		}
	}
	//return $map;
	$newmap = array();
	$newmap = $map;
	$keys = array_keys($maps);
	for($w = 0; $w < count($maps); $w++){
		$vals = array_values($maps[$keys[$w]]);
		if($newmap == $vals){ //We've got a match batman.
			return strtoupper($keys[$w]);
			break;
		}
	}	
	
}

