<?php
include_once 'sql.php';
include_once 'member.php';
$account = $_POST['account'];
$password = $_POST['password'];

$sql = "select * from member " .
    "where binary account=?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s",$account);
$stmt->execute();


$result = $stmt->get_result();


if($result->num_rows>0){
    $member=$result->fetch_object('member');
    if(password_verify($password,$member->password)){
        $_SESSION['member']=$member;
//        if(isset($_SESSION['member'])){
        $sql="update member set online='on' where id={$member->id}";
        $mysqli->query($sql);

        $jsonData = array("status"=>"0", "id"=>"{$member->id}", "account"=>"{$member->account}", "rname"=>"{$member->username}");
        $json = json_encode($jsonData);
        echo $json;


//        }
    }else{

        $jsonData = array("status"=>"1");
        $json = json_encode($jsonData);
        echo $json;
    }
}else{
    $jsonData = array("status"=>"2");
    $json = json_encode($jsonData);
    echo $json;
}

