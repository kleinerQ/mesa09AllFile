<?php

    include_once 'sql.php';

//    if(isset($_REQUEST['account'])){
//
//        $account=$_REQUEST['account'];
//        $passwd=$_REQUEST['passwd'];
//        $sql="select * from member where account='{$account}' and passwd='{$passwd}'";
//        echo $sql;
//
//        $result=$mysqli->query($sql);
//        echo "<br>";
//        if($result->num_rows>0){
//            echo 'OK';
//
//        }else{
//
//            echo 'XX';
//        }
//    }

    if(isset($_REQUEST['account'])){

        $account=$_REQUEST['account'];
        $passwd=$_REQUEST['passwd'];
        $sql="select * from member where account=? and passwd=?";
        $stmt =$mysqli->prepare($sql);
        $stmt->bind_param("ss",$account,$passwd);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows >0){

            echo 'OK';
        }else{
            echo 'XX';

        }

    }

?>


<h1> KleinerQ Bigggg Company </h1>
<hr/>
<!--//開發階段用get-->

<form action="" method="get">

    Account :<input name="account"/><br>
    Password:<input type="password" name="passwd"/> <br>
    <input type="submit" value="Login"/>
    <button type="button" onclick="location.href='register.php'"> Register</button>

</form>

