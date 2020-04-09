<?php

    $passwd='123456';
    $newpasswd=password_hash($passwd,PASSWORD_DEFAULT);
    echo $passwd. "<br>";
    echo $newpasswd. "<br>";
    if(password_verify($passwd,$newpasswd)){
        echo 'OK<br>';
    }else{
        echo 'Not OK<br>';

    }