<?php
    if(!isset($_FILES['upload'])) die("Server busy");  //if not upload file then exit
//    echo "OK";

    $upload =$_FILES['upload'];
//    var_dump($upload);
//    foreach($upload as $k =>$v){
//        if(gettype($v)=='array'){
//            foreach($v as $key=> $value){
//                echo "{$key} : {$value}<br>";
//            }
//        }else{
//            echo "{$k} : {$v}<br>";
//        }
//
//    }


    foreach($upload as $k =>$v){
        if($k=='error'){
            foreach($v as $key=> $value){
                if($value==0){
                    copy($upload['tmp_name'][$key],"test3/{$upload['name'][$key]}");
                    //echo $upload['tmp_name'][$key] . "<br>";
                }

            }

        }
//            if(gettype($v)=='array'){
//                foreach($v as $key=> $value){
//                    echo "{$key} : {$value}<br>";
//                }
//            }else{
//                echo "{$k} : {$v}<br>";
//            }

    }
//
//
//    if($upload['error']==0){
//        copy($upload['tmp_name'],"test3/brad");
//
//    }