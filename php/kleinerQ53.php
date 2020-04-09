<?php

    include_once 'Bike.php';
    $m1 = new Member(333);
    $m1->id='123'; $m1->name='kleinerQ';
    echo $m1->id .':' . $m1->name;