<?php
    //creat canvas
    $rate=$_GET['percentage'];
    $img=ImageCreateTrueColor(400,40);

    //start to draw
    $yellow = imagecolorallocate($img,255 , 255,0);
    $red = imagecolorallocate($img,255,0,0);
    imagefill($img,0,0,$yellow);
    imagefilledrectangle($img,0,0,$rate/100*400,40,$red);
    //output

    header('Content-Type: image/jpeg');
    imagejpeg($img);




    //clear the cache
    imagedestroy($img);

    ?>



