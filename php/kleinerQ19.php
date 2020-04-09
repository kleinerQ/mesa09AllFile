<?php
    $a[] = array(4,8,9,11);
    $a[] = array(1,2,3);
    var_dump($a);
    echo '<hr>';

    foreach($a as $key => $value){

        foreach($a[$key] as $key2 => $value2 ){

            echo "$value2 ";
        }
        echo "<br>";
    }

    foreach($a as $sub){

        foreach($sub as $value2 ){

            echo "$value2 ";
        }
        echo "<br>";
    }


?>