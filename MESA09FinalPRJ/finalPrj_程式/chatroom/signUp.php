<?php
include_once 'sql.php';
if (isset($_POST['account']) && isset($_POST['password'])) {
    $rName = $_POST['realName'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    $newPassword = password_hash($password, PASSWORD_DEFAULT);



    $sql = "insert into member (`username`,`account`,`password`) values (?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss",$rName,$account,$newPassword);




    if($stmt->execute()){
        $result = $stmt->get_result();
        echo 1;
    }else {
    	echo 2;
    }


}else{
    echo 3;
}

?>
