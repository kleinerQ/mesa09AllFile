<?php
include_once 'Bike.php';

//    echo "counter = " . Bike::$counter . "<br>";
//    $myBike= new Bike();
//    echo $myBike ->getSpeed(). "<br>";
//
//    echo "counter = " . Bike::$counter . "<br>";
//
//    $you = new Bike(3);
//    echo $you ->getSpeed() . "<br>";
//
//    echo "counter = " . Bike::$counter . "<br>";
//        if(TWId::checkId('L123979286')=='true'){
//            echo 'OK';
//        }else{
//            echo 'XX';
//        }
        $myId= new TWId('',1,1);


        if(TWId::checkId($myId->getId())=='true'){
            echo $myId->getId(). '<br>';
            echo $myId->getGender();
            echo $myId->getArea();
//            echo 'OK';
        }else{

//            echo'XX';
        }

        echo "<hr />";


        try{
            $urId=new TWId('A123456789');

            echo $urId->getId() . '<br>';
        }catch(Exception $e){
            echo $e->getMessage();

        }

        echo'<hr>';