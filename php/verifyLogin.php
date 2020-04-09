<?php
    include_once "sqlkleinerq.php";
    include_once 'Cart.php';
    include_once 'Member.php';
    session_start();
    if(isset($_REQUEST['account'])){
        $account=$_REQUEST['account'];
        $password=$_REQUEST['password'];

        $sql="select * from member where account='$account'";
//        echo $sql;
        $result=$mysqli->query($sql);
        $member= $result->fetch_object("Member");

        $verifyResult=false;
//        echo "<hr>";
        foreach($result as $key =>$value){

            foreach($value as $k =>$v) {
                if ($k == 'password') {
                    $verifyResult = password_verify($password, $v);
                }
            }
        }



        if($verifyResult){

            $_SESSION['member']=$member;
//            var_dump($member);
            $_SESSION['cart']= new Cart;
            header('Location:main2.php');
//            echo 'OK';
        }else{
            header('Location:loginMenu.php');
//            echo 'Not match';
        }


    }