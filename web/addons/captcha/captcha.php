<?php
session_start();
header("Content-type: image/png");

$md5=md5(microtime() * mktime());
$string=strtolower(substr($md5,0,5));
$captcha=imagecreatefrompng("./images/captcha.png");

$blue=imagecolorallocate($captcha, 19, 63, 107);
$gold=imagecolorallocate($captcha, 170, 110, 15);
$green=imagecolorallocate($captcha, 103, 154, 23);
$white=imagecolorallocate($captcha, 255, 255, 255);
$line=imagecolorallocate($captcha,233,239,239);
$line2=imagecolorallocate($captcha,198,224,224);

//imageline($captcha,0,0,39,29,$line2);
//imageline($captcha,3,0,69,15,$line2);
//imageline($captcha,40,0,64,29,$line2);
//imageline($captcha,80,0,14,23,$line2);

$image_source=$captcha;
$font_size=4;
$x_position=43;
$y_position=4;
$string_text=$string;
$color=$white;

imagestring($image_source,$font_size,$x_position,$y_position,$string_text,$color);
$_SESSION['captcha']=$string;
imagepng($captcha);
?>