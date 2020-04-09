<?php



session_start();

//if (!isset($_SESSION['member'])){
//    header('Location:TRAlogin.php');
//
//}

    if(!isset($_GET['account'])) die();

    include_once 'sqlTimetable.php';
    $account=$_GET['account'];
    $sql="select account from member where account='{$account}'";
    $result=$mysqli->query($sql);

    echo $result->num_rows;
    ?>



