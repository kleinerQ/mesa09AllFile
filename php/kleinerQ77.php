<?php
    $cont=file_get_contents('http://gis.taiwan.net.tw/XMLReleaseALL_public/scenic_spot_C_f.xml');
    $xml=simplexml_load_string($cont);
    $errors=libxml_get_errors();

    foreach($errors as $error){

        echo "$error";
    }
//    var_dump($xml);


    echo $xml->getName() .":". $xml->count();

    echo '<hr/>';

    foreach($xml as $key=>$value){

//        echo gettype($value) . ":" . $xml->getName(). "</br>";
        foreach($value as $kk=>$vv){

            //echo gettype($vv) . ":" . $vv->getName(). "</br>";
            $attrs=$vv->attributes();
            foreach($attrs as $field => $values){

                echo "$field : $values<br/>";

            }
            echo "<hr/>";
        }

    }
