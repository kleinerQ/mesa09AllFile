<?php

sayYa();
sayYa();
sayYa();
sayHello('kleinerQ');
sayHelloV2('kleinerQ');
sayHelloV2();
sayHelloV3(3);
sayHelloV3(3,'Worlddd');
sayHelloV4();
sayHelloV4(123);
sayHelloV4('brad');
sayHelloV4(1,'klein',true);
    function sayYa(){

        echo 'Ya<br>';
    }

    function sayHello($name){
        echo "Hello, {$name}<br>";

    }

    function sayHelloV2($name='World'){
        echo "Hello, {$name}<br>";

    }

    function sayHelloV3($numberOfCounter,$name='World'){
        for($i=0;$i<$numberOfCounter;$i++)
        echo "Hello, {$name}<br>";

    }
    function sayHelloV4(){
        $ps=func_get_args(); //get all the input as array;
        foreach($ps as $k =>$v){

            echo "$k : $v <br>";
        }

    }


?>