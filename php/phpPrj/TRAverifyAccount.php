<?php
    include_once 'sqlTimetable.php';
    include_once 'Member.php';

    session_start();
    if($_REQUEST['account'] != '') {
        $account = $_REQUEST['account'];
//        echo $account;
//    echo $account . "aa<br>";
        $passwd = $_REQUEST['passwd'];
//    echo $passwd . "bb<br>";
//    $sql= "select * from member where account='{$account}'";
//    $result=$mysqli->query($sql);

        $sql = "select * from member where account=?";

//        $sql2="select * from member where account=$account";
//        echo $sql2;
        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param('s', $account);

        $stmt->execute();
        $result = $stmt->get_result();


        //$checkResult=password_verify($passwd,$result);
//    if($result->num_rows>0){
//        echo $result->num_rows . "<br>";
//        echo 'OK';
//
//    }else{
//
//        echo 'Not match';
//    }

        if ($result->num_rows > 0) {
//        $data= $result->fetch_array();

//        foreach($data as $key=>$value){
//          echo "{$key} : {$value}<br>";
//        }
//
//        if(password_verify($passwd,$data['passwd'])){
//           echo 'OK';
//        }else{
//
//            echo 'XX1';
//        }
            $member = $result->fetch_object("Member");
//            var_dump($member);
//        if($member instanceof Member){
//            echo 'OK';
//        }else{
//            echo 'Not OK';
//
//        }
//        echo "$member->id<br>";
//        echo "$member->name<br>";
//        echo "$member->account<br>";
//        echo "$member->passwd<br>";
//
            if (password_verify($passwd, $member->password)) {

                $_SESSION['member'] = $member;
//                echo 'OK';
                header('Location:mainMenu.php');
            } else {
//                echo 'Not OK';
                header('Location:TRAlogin.php');
            }

        } else {
//        echo 'xx2';

            header('Location:TRAlogin.php');
        }

    }else{
        header('Location:TRAlogin.php');
    }