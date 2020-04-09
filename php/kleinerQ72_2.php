<?php
    $cont = file_get_contents("http://gis.taiwan.net.tw/XMLReleaseALL_public/scenic_spot_C_f.json");
    //var_dump($cont);
    //    $obj1 = new MyTest2(1,2,3);
    //    foreach ($obj1 as $k => $v){
    //        echo "{$k} : {$v}<br>";

strip_tags();
    //    }
    $root = json_decode($cont);

    echo 'Decoding: ' . $string;
    json_decode($string);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - No errors';
            break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
            break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
            break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
            break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
        default:
            echo ' - Unknown error';
            break;
    }

    echo PHP_EOL;
}

    class MyTest2 {
        var $x, $y, $z;
        function __construct($x,$y,$z){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }
    }