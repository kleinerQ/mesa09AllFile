<?php

    //only for making spec
    interface Shape{
        function calLength();
        function calArea();


    }

    class Rectangle implements Shape{
        function calLength(){

            echo "Rectangle:calLength()<br>";
        }


        function calArea(){

            echo "Rectangle:calArea()<br>";

        }

    }




    class Triangle implements Shape{
        function calLength(){

            echo "Triangle:calLength()<br>";
        }


        function calArea(){
            echo "Triangle:calArea()<br>";

        }

    }

    class Student1 implements iOS,ZCE{

        function exam1()
        {
            // TODO: Implement exam1() method.
        }

        function exam2()
        {
            // TODO: Implement exam2() method.
        }

    }

    interface iOS{
        function exam1();

    }

    interface ZCE{

        function exam2();
    }

    class Student2 implements iOS,ZCE{

        function exam1()
        {
            // TODO: Implement exam1() method.
        }

        function exam2()
        {
            // TODO: Implement exam2() method.
        }

    }





class Student3 implements iOS,ZCE{

    function exam1()
    {
        // TODO: Implement exam1() method.
    }

    function exam2()
    {
        // TODO: Implement exam2() method.
    }

}

abstract class Student4 implements iOS{


}

//trait use for combination
trait Test1 {
        function m1(){

            echo "Test1:m1();";
        }

}

trait Test2 {
    function m2(){

        echo "Test2:m2();";
    }

    function m3(){

        echo "Test2:m3();";
    }
}

class Test3{

        use Test1;
        use Test2;
}