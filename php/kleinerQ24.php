


<?php
    function test1($var1){

        $var1+=10;
    //    return $var1;
    }


    //call by address
    function test2(&$var3){

        $var3+=10;
        //    return $var1;
    }
    $var1 =100;
    test1($var1);
    echo "$var1<br>";

    $var4=10;
    test2($var4);
    echo"$var4";
?>