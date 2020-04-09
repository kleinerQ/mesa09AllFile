<?php
    include_once 'sql.php';
//    include_once 'sqlkleinerq.php';
    $sql='select * from test1';
    $result=$mysqli->query($sql);
    $data=$result->fetch_assoc();
    echo 'num:' . $data['num'];