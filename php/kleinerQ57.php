<?php

    include_once 'MyOOTest2.php';

    $obj1 = new Test3();
    $obj1->m1();
    $obj1->m2();
    $obj1->m3();

    echo '<hr>';

    $obj2 = new Test1();
    $obj2->m1();