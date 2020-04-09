<?php
    $num=49;
    if($_POST['number'] !=''){

        $num=$_POST['number'];

    }

    echo rand(1,$num);


    ?>