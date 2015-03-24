<?php

if(!isset($_GET['key'])){
	echo 'key not set';
	exit;
}

//grab captcha and save
$url = "http://www.netgame.com/include/makekey.php?joinKey=" . $_GET['key'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1");
$output = curl_exec($ch);      
curl_close($ch);

$f = fopen("makekey.gif","w");
fputs($f,$output);
fclose($f);

$lil = imagecreatefromgif("makekey.gif");
imagepng($lil,"saved/d3.png");
$lol = imagecreatefrompng("saved/d3.png");
$red = imagecolorallocate($lol,255,255,255);
$green = imagecolorallocate($lol,34,177,76);
$kk = imagecolorallocate($lol, 0, 0, 0);

for ($y = 0; $y < imagesy($lol); $y++) {
	for ($x = 0; $x < imagesx($lol); $x++) {
		$rgb = imagecolorat($lol, $x, $y);
		$colors = imagecolorsforindex($lol, $rgb);
		$r=$colors['red'];
		$g=$colors['green'];
		$b=$colors['blue'];
		if(($r != 252)){
			imagesetpixel($lol,$x,$y,$green);
		}
	}
}


function getlet(){
	global $lol;
	global $black;
	global $green;
	$lolgs = array();
	for ($x = 0; $x < imagesx($lol); $x++) {
		for ($y = 0; $y < imagesy($lol); $y++) {
			$rgb = imagecolorat($lol, $x, $y);
			$colors = imagecolorsforindex($lol, $rgb);
			$r = $colors['red'];
			$g = $colors['green'];
			$b = $colors['blue'];
			if($r==252){
				$img1 = imagecreatetruecolor(12,30);
				imagecopy($img1, $lol, 0, 0, $x-4 , 0, 12, 30);
				$cord = array($x,$y);
				for($i=0;$i<=12;$i++){
					for($z=0;$z<=35;$z++){
						if(($z-4)>=0){
							imagesetpixel($lol,$x+($i-4),$z-4,$black);
						}else{
							imagesetpixel($lol,0,$z,$black);
						}
					}
				}
				break 2;
			}
		}
	}
	return array($img1,$cord);
}


//require captcha pwnz0r
require_once("map.php");

$img1 = getlet();
$img2 = getlet();
$img3 = getlet();
$img4 = getlet();
$img5 = getlet();
$img6 = getlet();


$solved = array();
$solvedz[] = getCap($img1[0]);
$solvedz[] = getCap($img2[0]);
$solvedz[] = getCap($img3[0]);
$solvedz[] = getCap($img4[0]);
$solvedz[] = getCap($img5[0]);
$solvedz[] = getCap($img6[0]);

$solved = implode($solvedz);
echo json_encode(array("challenge" => $_GET['key'],"answer" => $solved));

?>
