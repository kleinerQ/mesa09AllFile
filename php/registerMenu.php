<?php
    include_once 'sqlkleinerq.php';

    if(isset($_REQUEST['account']) && $_REQUEST['password'] !=''){

        $account=$_REQUEST['account'];
        $password=$_REQUEST['password'];
        $newPassword=password_hash($password, PASSWORD_DEFAULT);
        $memberName=$_REQUEST['memberName'];


        $icon = null;
        var_dump($_FILES['icon']);
        if($_FILES['icon']['error']==0){
            $icon=addcslashes(file_get_contents($_FILES['icon']['tmp_name']));


        }else{


        }
        $sql="insert into member(memberName,account,password,icon) values('{$memberName}','{$account}','{$newPassword}','{$icon}')";

        //$sql="insert into member(memberName,account,password) values('{$memberName}','{$account}','{$newPassword}')";
//        echo $sql;
        if($mysqli->query($sql)){
            header('Location:loginMenu.php');
        }else{
             echo 'insert error';

        }
//

        }

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var xhttp= new XMLHttpRequest();

    xhttp.onreadystatechange=function () {

        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var ret=xhttp.responseText;
            if(ret>0){
                document.getElementById('mesg').innerHTML='XX';
            }else{
                document.getElementById('mesg').innerHTML='OO';

            }
        }

    }




    function isNewAccount() {
        var account=document.getElementById('account').value;
        //alert();
        xhttp.open('GET','isNewAccountCheck.php?account=' + account,true);
        xhttp.send();

    }
</script>



<form>

    Account:
    <input name="account" onchange="isNewAccount()" id="account"/><span id="mesg"></span><br>
    Password:
    <input type="password" name="password"/><br>
    Name:
    <input name="memberName"/><br>
    Icon:
    <input type="file" name="icon"/><br>
    <input type="button" onclick='location.href="loginMenu.php"' value="Cancel"/>
    <input type="submit" value="new"/>

</form>
