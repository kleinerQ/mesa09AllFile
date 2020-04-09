<?php
    class Brad01{
        var $name,$age,$weight;

        function __construct($name, $age,$weight){


            $this->name=$name;
            $this->age=$age;
            $this->weight=$weight;
        }

        function loseWeight(){
            $this->weight -=30;
        }

    }
    // JSON =>[], {}
    //      => ['name' -> 'brad'] not doing this because only accept by php

    $a=array(1,2,3,4,5);
    $json1=json_encode($a);
    //var_dump($json1);
    echo '<hr/>';

    $root = json_decode($json1);
    var_dump($root);

    echo '<hr/>';

    $obj1 = new Brad01('布萊德',18,90);
    $obj1->loseWeight();
    $obj1->loseWeight();

    $obj2 = new Brad01('tony',13,10);
    $obj3 = new Brad01('布朗',11,20);
    $obj4 = new Brad01('ted',20,50);
    $obj5 = new Brad01('tom',19,90);


    $json2=json_encode($obj1);
    echo $json2;
    echo '<hr>';

    $root2 = json_decode($json2);
//    var_dump($root2);
    foreach($root2 as $k =>$v){

        echo "{$k} : {$v}<br>";
    }

    echo '<hr>';

    $b = array($obj1,$obj2,$obj3,$obj4,$obj5);

    $json3 = json_encode($b);
    echo $json3;
    echo "<hr>";

    $root3=json_decode($json3);

    foreach($root3 as $k =>$object){

        foreach ($object as $field =>$value){

            echo "{$field} : {$value} <br>";

        }

        echo "-----<br>";

    }



