<?php

    include_once 'sql.php';
    include_once 'Result.php';
    $sql='select * from test1';
    $result=$mysqli->query($sql);
    while($data=$result->fetch_object('Result')){

        echo $data->num;

    }
