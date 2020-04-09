<?php

    $mysqli= new mysqli('127.0.0.1','root','root','test');
    //mysqli::set_charset ( "utf8");

    mysqli_set_charset ( $mysqli , "utf8" );

    //$sql1 ='insert into cust (cname,tel,birthday) values("qqq","34567","2000-02-09")';
    $sql2 ='delete from cust where id <107';
    $sql3 ='update';
//    $mysqli->query($sql2);
    $sql4 ='select * from cust';
    if($result=$mysqli->query($sql2)){
        echo 'OK';

    }else{
        echo 'XX';
    }
