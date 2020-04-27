<?php

require_once 'functions.php';

// creer une chaîne de caractère  qui comprends 6 lettres ou chiffres 
$random= SixRandomChiffre();
session_start();
$_SESSION['codeImg']=$random;

$width=120; $height=40;
$img= imagecreatetruecolor($width, $height);
$color= imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagefilledrectangle($img, 0, 0, $width, $height, $color);

//mettre cette chaîne de caractère
$fontfile="./fonts/CENTURY.TTF";
$color2=imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
imagettftext($img,20,0,10,28, $color2, $fontfile, $random);

// mettre des petits points dans image
for($i=1;$i<100;$i++){
    $color3=imagecolorallocate($img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
    imagesetpixel($img, mt_rand(0,$width), mt_rand(0,$height), $color3);
}
header("content-type:image/png");
imagepng($img);


imagedestroy($img);