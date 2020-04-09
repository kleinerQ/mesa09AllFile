<?php
    include_once 'Bike.php';
    $myScooter = new Scooter(4);
    echo $myScooter->getSpeed() . "<br>";
    $myScooter->upSpeed();
    $myScooter->upSpeed();
    echo $myScooter->getSpeed() . "<br>";
    $myScooter->downSpeed();
    echo $myScooter->getSpeed() . "<br>";