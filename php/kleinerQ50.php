<?php

    include_once 'Bike.php';

    $kleinerQ=new People();
    $kleinerQ->setBike();
    echo $kleinerQ->bike->getSpeed() .'<br>';


    $you=new People();
    $you->setBike();
    $you->bike->upSpeed();
    $you->bike->upSpeed();
    $you->bike->upSpeed();



    echo $you->bike->getSpeed();