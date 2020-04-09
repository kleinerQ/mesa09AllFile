<?php
    $cont=file_get_contents('http://gis.taiwan.net.tw/XMLReleaseALL_public/scenic_spot_C_f.xml');
    $xml=simplexml_load_string($cont);
    $errors=libxml_get_errors();

    foreach($errors as $error){

        echo "$error";
    }

    var_dump($xml);
    echo '<hr/>';

    echo $xml->getName() .":". $xml->count();

    echo '<hr/>';

    foreach($xml as $value){

        echo gettype($value).":".$value->getName() ."<br>";
    }

    echo "<hr/>";

    $attrs=$xml->book[0]->attributes();

    foreach($attrs as $k =>$v){

        echo "{$k} : {$v} <br/>";

    }

    echo "<hr/>";

    $cs=$xml->book[0]->children();
    foreach($cs as $k => $v){
//        echo'OK';
        echo "{$k} : {$v} <br>";
    }