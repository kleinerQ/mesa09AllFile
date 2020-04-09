<?php
include_once 'sql.php';
include_once 'Member.php';
include_once 'Cart.php';
    //account =xxx;

    //passwd =xxx;
    //return {'status':'0', 'id':'12','name':'brad'};
    //{'status':'1','message':'account not exist'};
    //{'status':'2','message':'password error'};
    //{'status':'3','message':'data error'};


//    $account=$_REQUEST['account'];
//    //    echo $account . "aa<br>";
//    $passwd=$_REQUEST['passwd'];
    //    echo $passwd . "bb<br>";
    //    $sql= "select * from member where account='{$account}'";
    //    $result=$mysqli->query($sql);
    $mesg = new ReturnMessage();

//    if(isset($_REQUEST['account']) && isset($_REQUEST['passwd'])){
//
//
//
//        $account=$_REQUEST['account'];
//        $passwd=$_REQUEST['passwd'];
//
//        $sql="select * from member where account='$account'";
//
//
//        $result=$mysqli->query($sql);
//
//        $member= $result->fetch_object("Member");
//        echo gettype($member);
////        var_dump($member);
//        $verifyResult=false;//        echo "<hr>";
//
//
//        if($result->num_rows >0){
//
//
//
////          e
//            if(password_verify($passwd,$member->passwd)){
//                $_SESSION['member']=$member;
//                $_SESSION['cart']=new Cart;
//                $mesg->status='0';
//                $mesg->message='log success';
//                $mesg->id=$member->id;
//                $mesg->name=$member->name;
//
//            }else{
//
//                $mesg->status='2';
//                $mesg->message='password error';
//
//            }
//
//        }else{
////        echo 'xx2';
//
//            $mesg->status='1';
//            $mesg->message='account not exists';
////            header('Location:login.php');
//        }
//
//
//
//
//
//    }else{
//        $mesg->status='3';
//        $mesg->message='data error';
//
//
//    }


if(isset($_REQUEST['account'])){
    $account=$_REQUEST['account'];
    $password=$_REQUEST['password'];

    $sql="select * from member where account='$account'";
//        echo $sql;
    $result=$mysqli->query($sql);
    $member= $result->fetch_object("Member");
    //var_dump($member);
    $verifyResult=false;
//        echo "<hr>";
    foreach($result as $key =>$value){

        foreach($value as $k =>$v) {
            if ($k == 'passwd') {
                $verifyResult = password_verify($password, $v);
            }
        }
    }



    if($verifyResult){

        $_SESSION['member']=$member;
//            var_dump($member);
        $_SESSION['cart']= new Cart;
        //echo 'OK';
        //header('Location:main2.php');
//            echo 'OK';
    }else{
        //header('Location:loginMenu.php');
//            echo 'Not match';
    }


}



    echo json_encode($mesg);


    $sql= "select * from member where account=?";



    class ReturnMessage{

        var $message,$status;



    }

