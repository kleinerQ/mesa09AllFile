<?php
    $counter = array(1=>0,0,0,0,0,0);

    for($i=0;$i<100000;$i++){

        $diceResult=rand(1,9);
        $counter[$diceResult>=7?$diceResult-3:$diceResult ]++;

    }

    for($i=1; $i<=6;$i++){

        echo "{$i}點出現{$counter[$i]}次<br>";

    }
    echo '<hr>';
    for($i=1; $i<=count($counter);$i++){

        echo "{$i}點出現{$counter[$i]}次<br>";

    }

    echo '<hr>';
    foreach($counter as $key){

        echo "{$key} <br>";

    };


    echo '<hr>';

    foreach($counter as $key => $value){

        echo "{$key} : {$value}<br>";

    };






?>