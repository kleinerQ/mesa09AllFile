<?php

    $img =imagecreatefromjpeg("coffee.jpeg");
    $string="adsdf";
    $blue =imagecolorallocate($img,0,0,255);
    $stringLength=strlen($string);
    for($i=0; $i < $stringLength; $i++){
        $locationX=($i+1)*50;
        $angel=rand(0,360);
        imagettftext ( $img , 24 ,
            $angel, $locationX , 70 , $blue , "kleinerQ.ttf" , substr($string,$i,1));

    }
//
//    imagettftext ( $img , 24 ,
//                    45 , 100 , 70 , $blue , "kleinerQ.ttf" , "Hello World!");


    header("Content-type: image/jpeg");
    imagejpeg($img);
    imagedestroy($img);