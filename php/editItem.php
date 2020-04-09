<?php
    include_once 'sqlkleinerq.php';
    include_once 'Product.php';
    session_start();
    if(isset($_REQUEST['editid'])){
        $editid=$_REQUEST['editid'];

        $sql="select * from product where id={$editid}";

        $result=$mysqli->query($sql);
        $data=$result->fetch_object('Product');


        $pname=$data->pname;
        $price=$data->price;
        $qty=$data->qty;
        $id=$data->id;
        $_SESSION['product']=$data;




    }else{
            $product=$_SESSION['product'];

            $id=$product->id;

            $pname=$_REQUEST['pname'];
            //echo $pname."<br>";
            $price=$_REQUEST['price'];
            $qty=$_REQUEST['qty'];



    //        update product set pname=111,price=10,qty=3 where id=9;
            $sql2="update product set pname='{$pname}',price={$price},qty={$qty} where id={$id}";
            echo $sql2;
            $mysqli->query($sql2);
            header('Location:inventry.php');
    }


?>
<h1>Edit Item:</h1>
<hr />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form method="get">

    pname:
    <input name="pname" value ="<?php echo $pname;?>" /><br>
    price:
    <input name="price" value ="<?php echo $price;?>"/><br>
    qty
    <input name="qty" value ="<?php echo $qty;?>"/><br>
    <input type="button" onclick='location.href="inventry.php"' value="Go back"/>
    <input type="submit" value="Edit"/>

</form>