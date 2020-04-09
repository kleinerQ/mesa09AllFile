<?php
    function test1($x, $y){
       return $x / $y . "<br>";

    }

//force to be int
    function test11($x, $y): int{
        return $x / $y ;

    }

    echo test1(10,3);
    echo test11(10,3);