<?php


include_once 'sql.php';
include_once 'Cart.php';
include_once 'Member.php';
session_start();
$cart=$_SESSION['cart'];
$member=$_SESSION['member'];
foreach($cart->getList() as $pid=>$num){

    $cid=$member->id;
    $sql="insert into `order` (pid,cid,amount,odate) values($pid,$cid,$num,now())";
    $mysqli->query($sql);

}