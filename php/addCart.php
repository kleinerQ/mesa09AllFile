<?php
include_once 'sql.php';
include_once  'Cart.php';
include_once 'Product.php';
session_start();
$cart=$_SESSION['cart'];
$pid=$_REQUEST['pid'];
$num=$_REQUEST['num'];

$cart->addList($pid,$num);

foreach($cart->getList() as $key =>$value){

    echo "{$key} : {$value}  ";
}