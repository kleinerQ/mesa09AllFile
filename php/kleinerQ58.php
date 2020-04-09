<?php
    include_once 'MyOOTest3.php';
    include_once 'MyOOTest4.php';

//    $obj1 = new \tw\kleinerQ\utils\Test1();
//    $obj1->m1();
//    echo '<hr>';
//
//
//    $obj2 = new \tw\kleinerQ\tools\Test1();
//    $obj2->m1();
//    echo '<hr>';

    use tw\kleinerQ\utils\test1; //class
    use tw\kleinerQ\tools\test1 as test2; //class
    use function tw\kleinerQ\utils\sayYa;
    $obj3 =new Test1;
    $obj3->m1();

    echo '<br>';

    $obj4 =new Test2();
    $obj4->m1();



