<?php

    if(!isset($_REQUEST['pid'])) header("Location: bmain.php");

    $pid=$_REQUEST['pid'];

    for($i=0;$i<=4;$i++){
        $pfile= "test3/p_{$pid}_$i.jpg";
        if(is_file($pfile)){

            echo "<img src='{$pfile}'/>";

        }


    }