<?php
    $max=49;
    if(isset($_GET['max'])) {
        $max=$_GET['max'];


    }
    echo rand(1, $max);

?>