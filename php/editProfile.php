<?php
    include_once 'Member.php';
    include_once 'sql.php';
    session_start();
    if(!isset($_SESSION['member'])) header ("Location:login.php");

    $member=$_SESSION['member'];

    if(isset($_FILES['icon']) && $_FILES['icon']['error']==0){
//        echo 'OK';
        $icon=addslashes(file_get_contents($_FILES['icon']['tmp_name']));
        $sql="update member set icon='{$icon}' where id={$member->id}";
        $mysqli->query($sql);


        $sql = "select * from member where id={$member->id}";
        $result = $mysqli->query($sql);
        $member = $result->fetch_object("Member");
//    $member->icon = $icon;
        $_SESSION['member'] = $member;

        header('Location:main.php');
    }

    ?>


<form method="POST" enctype="multipart/form-data">

    <input type="file" name="icon"/> <br>
    <input type="submit" value="OK"/>



</form>
