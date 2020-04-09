<?php
    $a1[0]=123;
    $a1[1]=12.3;
    $a1[2]='kleinerQ';
    var_dump($a1);

    echo '<hr>';

    $a2[0]=123;
    $a2[1]=12.3;
    $a2[4]='kleinerQ';
    var_dump($a2);

    echo '<hr>';

    $a3['name']='kleinerQ';
    $a3['weight']=80;
    $a3['gender']=true;
    $a3['age']=53;
    $a3[123]=456;

    foreach($a3 as $key => $value){

        echo "{$key} : {$value}<br>";

    }


    echo '<hr>';


    $a4 =array(12,34,56,'III',false);
    var_dump($a4);