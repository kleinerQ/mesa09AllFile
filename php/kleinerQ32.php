<?php

    include_once 'kleinerQapis.php';

    if (isset($_GET['id'])){
            $id = $_GET['id'];

            $isValid= checkTWId($id);
            if($isValid){
                echo 'OK';

            }else{

                echo 'Not valid!!';
            }
    }

?>

<form>

    <input type="text" name="id"/>
    <input type="submit" value="check"/>


</form>