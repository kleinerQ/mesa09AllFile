<?php
    $cont = file_get_contents("https://cloud.culture.tw/frontsite/trans/SearchShowAction.do?method=doFindTypeJ&category=6");
    //var_dump($cont);
    //    $obj1 = new MyTest2(1,2,3);
    //    foreach ($obj1 as $k => $v){
    //        echo "{$k} : {$v}<br>";
    //    }
    $root = json_decode($cont);
        foreach ($root as $k => $v){           // visit all the element=>eacho is object
            foreach($v as $key =>$value){       //vist every object attribute
                echo $key . ":";
                if(is_array($value)){
                    //echo 'array';
                    foreach($value as $arrayIndex => $arrayValue){
                        //$arrayIndex = 0  only one element,   $arrayValue is a object
//                        foreach($arrayValue as $kk => $vv) {
//                            echo "<li> {$kk} : {$vv} </li>";
//                        }
                        if(is_array($arrayValue)||is_object($arrayValue))
                            foreach($arrayValue as $kk => $vv){
                            echo "<li> {$kk} : {$vv} </li>";

                        }else{
                            echo $arrayValue;

                        }
                    }

                }else{

                    echo $value;
                }

                echo "<br>";
            }
            echo "<hr>";
        }

    class MyTest2 {
        var $x, $y, $z;
        function __construct($x,$y,$z){
            $this->x = $x;
            $this->y = $y;
            $this->z = $z;
        }
    }