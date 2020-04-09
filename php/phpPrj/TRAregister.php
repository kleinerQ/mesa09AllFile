<?php
    include_once 'sqlTimetable.php';

    if(isset($_REQUEST['account'])) {
        $account = $_REQUEST['account'];
        $passwd = $_REQUEST['passwd'];
        $newpasswd=password_hash($passwd,PASSWORD_DEFAULT);
        $name = $_REQUEST['name'];

        $icon = null;
//        var_dump($_FILES['icon']);
        if($_FILES['icon']['error']==0) {

            $icon=addslashes(file_get_contents($_FILES['icon']['tmp_name']));

        }

        $sql = 'insert into `member` (`account`,`password`,`memberName`,`icon`) ' . "values ('{$account}','{$newpasswd}','{$name}','{$icon}')";


//echo $sql;


        if($mysqli->query($sql)){
            header('Location:TRAlogin.php');

        }else{
            echo 'Data is NOT completed!!';
        }

    }
?>
<script>

    var xhttp= new XMLHttpRequest();

    xhttp.onreadystatechange  = function () {

        if (xhttp.readyState == 4 && xhttp.status == 200) {


            var ret=xhttp.responseText;
            // alert(ret.length);

            if(ret.length>10){
                document.getElementById("mesg").innerHTML = 'Something Wrong try Later !!';
            }else if(ret !=0){
                document.getElementById("mesg").innerHTML = 'Someone Taken !!';

            }else{
                document.getElementById("mesg").innerHTML = 'OK~';



            }
        }

    }


    function isNewAccount(){
        var account = document.getElementById("account").value;
        // alert(account);
        xhttp.open('GET','TRAisNewAccount.php?account=' + account,true);
        xhttp.send();

    }

</script>

<form method="post" enctype="multipart/form-data">


    Account :<input name="account" onchange="isNewAccount()" id="account"/><span id="mesg"></span><br>
    Password:<input type="password" name="passwd"/> <br>
    Real Name:<input name="name"/> <br>
<!--    Icon: <input type="file" name="icon"><br>-->
    <input type="button" onclick="location='TRAlogin.php'" value="Cancel">
    <input type="submit" value="New"/>
</form>