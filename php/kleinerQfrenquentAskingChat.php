<?php

    include_once 'sql.php';
    include_once 'Result.php';
    //$sql2="insert into test values('kleinerQ4','hsdfiisdfisdf')";

//    for($i=0;$i<10;$i++){
//        $mysqli->query($sql2);
//    }


    $sql='select * from test';
    $result=$mysqli->query($sql);
    while($data=$result->fetch_object('Result')){

        echo $data->id . ":" .$data->message . "<br>";

    }
