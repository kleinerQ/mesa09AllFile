<?php
    $num=49;
    if($_GET['number'] !=''){

        $num=$_GET['number'];

    }

    echo rand(1,$num);


    ?>