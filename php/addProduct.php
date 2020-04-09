<?php

    include_once 'sql.php';

    if(isset($_REQUEST['pname'])){
        $pname=$_REQUEST['pname'];
        $price=$_REQUEST['price'];
        $qty=$_REQUEST['qty'];
        $sql ="insert into product (`pname`,`price`,`qty`) values('{$pname}',{$price},{$qty})";
        $mysqli->query($sql);
        $newId=$mysqli->insert_id;
        echo $newId;
        //deal with image
        if(isset($_FILES['pimg'])){

            $pimg=$_FILES['pimg']; $x=1;

            foreach($pimg['error'] as $k =>$v){

                if($v==0){

                    copy($pimg['tmp_name'][$k],"test3/p_{$newId}_{$x}.jpg");
                }
                echo"OK";
                $x++;

            }


        }
//
//
//        if($mysqli->query($sql)){
//
//            header('Location:bmain.php');
//        }else{
//
//            header('Location:addProduct.php');
//        }


    }

?>



<form method="POST" enctype="multipart/form-data">


    PName: <input name="pname" /><br>
    Price: <input type="number" name="price" /><br>
    Qty: <input type="number" name="qty" /><br>
    <input type="file" name="pimg[]" /><br>
    <input type="file" name="pimg[]" /><br>
    <input type="file" name="pimg[]" /><br>
    <input type="file" name="pimg[]" /><br>
    <input type="submit" name="Add" />



</form>


