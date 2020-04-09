<?php
    $img = imagecreatefromjpeg('image35.jpg');
    $dst = imagecreatetruecolor(100,100);
    $src_w= imagesx($img);
    $src_h= imagesy($img);

    if($src_w < $src_h){
        $dst_h=100;
        $dst_w=$src_w/$src_h *100;
        $dst_y=0;
        $dst_x= 100/2- $dst_w/2;

    }else{
        $dst_w=100;
        $dst_h=$src_h/$src_w*100;
        $dst_x=0;
        $dst_y=100/2-$dst_h/2;

    }


    imagecopyresized ( $dst, $img
        , $dst_x, $dst_y
        , 0, 0
        , $dst_w, $dst_h
        , $src_w,$src_h );


    header("Content-type: image/jpeg");
    imagejpeg($dst,'test3/aaa.jpg');
    imagedestroy($img);
    imagedestroy($dst);