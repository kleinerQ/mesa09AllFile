<?php

    $upload = $_FILES['upload'];

    foreach ($upload as $key => $value){

        echo "{$key} :"
             .var_dump($value) . "<br>";

        echo  "<hr />";

    }

    foreach ($upload['error'] as $key =>$value){
        if($value==0){
            if(copy($upload['tmp_name'][$key],"test3/{$upload['name'][$key]}")){
                //upload success
                echo "{$upload['name'][$key]}Upload OK!<br>";

            }else{

                //upload fail
                echo "{$upload['name'][$key]}Upload Fail!";
            }


        }

    }