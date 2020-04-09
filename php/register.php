<?php
    include_once 'sql.php';

    if(isset($_REQUEST['account'])) {
        $account = $_REQUEST['account'];
        $passwd = $_REQUEST['passwd'];
        $newpasswd=password_hash($passwd,PASSWORD_DEFAULT);
        $name = $_REQUEST['name'];

        $icon = null;
        var_dump($_FILES['icon']);
        if($_FILES['icon']['error']==0) {

            $icon=addslashes(file_get_contents($_FILES['icon']['tmp_name']));

        }

        $sql = 'insert into `member` (`account`,`passwd`,`name`,`icon`) ' . "values ('{$account}','{$newpasswd}','{$name}','{$icon}')";





        if($mysqli->query($sql)){
            header('Location:login.php');

        }else{
            echo 'insert error';
        }

    }
?>
<script>

    var xhttp= new XMLHttpRequest();

    xhttp.onreadystatechange  = function () {

        if (xhttp.readyState == 4 && xhttp.status == 200) {


            var ret=xhttp.responseText;

            if(ret !=0){
                document.getElementById("mesg").innerHTML = 'XXX';

            }else{
                document.getElementById("mesg").innerHTML = 'OOO';



            }
        }

    }


    function isNewAccount(){
        var account = document.getElementById("account").value;
        // alert(account);
        xhttp.open('GET','isNewAccount.php?account=' + account,true);
        xhttp.send();

    }

</script>

<form method="post" enctype="multipart/form-data">


    Account :<input name="account" onchange="isNewAccount()" id="account"/><span id="mesg"></span><br>
    Password:<input type="password" name="passwd"/> <br>
    Real Name:<input name="name"/> <br>
    Icon: <input type="file" name="icon"><br>
    <input type="submit" value="New"/>
</form>