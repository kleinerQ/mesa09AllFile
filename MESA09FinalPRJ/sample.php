<?php
$mysqli = new mysqli('127.0.0.1','root','root','test');

//    mysqli_set_charset ( $mysqli , "utf8" );
    $mysqli->set_charset ( "utf8" );

    $sql = 'insert into testt (vv) values(123) where kk = 55';
    $sql1 = 'delete from cust where id= 119 ';
    $sql2 = 'update cust set cname="llk",tel="123"  where id= 121';
    $sql3 = 'select * from testt';


    // if($result = $mysqli->query($sql)){
    //     // $result -> mysqli_result class 物件實體
    //         while ( $data = $result->fetch_assoc()){
    //                 foreach ($data as $k => $v) {
    //                     echo "{$k}:{$v}<br>";}
    //             echo "<hr>";
    //             }
    // }else{
    // }
    if ($mysqli->query($sql)){
        echo "1";
    }
    else{
        echo "0";
    }

    ?>
