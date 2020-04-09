<?php
    include_once 'Cart.php';

    session_start();
    $cart=$_SESSION['cart'];
    if($_GET['num'] != ''){

        $num=$_GET['num'];
        $pid=$_GET['pid'];
        $cart->addList($pid,$num);

    }

    foreach ($cart->getList() as $k =>$v){

        echo "$k:$v  ";
    }

    ?>