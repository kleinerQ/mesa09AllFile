<?php
    include_once 'sql.php';

//    $sql ="insert into product (pname, price,qty) values('test1',123,12)";
//    $mysqli->query($sql);

    $sql ="insert into product (pname, price,qty) values(?,?,?)";
    $stmt=$mysqli->prepare($sql);
    $var1='test2';
    $var2=123;
    $var3=12;
    //s:string  i:interger d:double b:blob
    $stmt->bind_param("sii",$var1,$var2,$var3);
    $stmt->execute();


