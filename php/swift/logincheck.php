<?php

$mysqli= new mysqli('localhost',
    'root','root','membersheet');
$mysqli->set_charset('utf8');

if(isset($_REQUEST['uid']) && isset($_REQUEST['pwd'])){

    $account = $_REQUEST['uid'];
    $password = $_REQUEST['pwd'];

    $sql = "select * from user where uid = '{$account}'";
//    echo $sql;

    $result = $mysqli->query($sql);

    if($result->num_rows > 0){
        $data = $result->fetch_array();
        //var_dump($data);
        if($data['pwd'] == $password){
            echo "1";
        }else{
            echo "0";

        }
    }else{

        echo "0";
    }


}else{

    echo "0";
}




?>
