<?php

    $dsn="mysql:host=localhost;dbname=apple";
    //$dsn='dblib:host=$hostname:$port;dbname=$dbname'  mssql
    $pdo =new PDO($dsn,'root','root');
    $stmt =$pdo->query("select * from product");
    echo $stmt->rowCount() ."<br>";

    foreach($stmt as $k => $v){

        $id= $v['id'];
        $pname= $v['pname'];
        $price= $v['price'];
        $qty= $v['qty'];

        echo "{$id}:{$pname}:{$price}:{$qty}<br>";
    }