<?php
    include_once 'sqlkleinerq.php';
    if(!isset($_GET['account'])) die();


    $account=$_GET['account'];
    $sql="select id from member where account='{$account}'";
    $result=$mysqli->query($sql);

    echo $result->num_rows;
    ?>


