<?php

include_once 'sql.php';
include_once 'Product.php';
if(isset($_REQUEST['editid'])){
    $editid =$_REQUEST['editid'];
    $sql="select * from product where id ={$editid}";
    $result=$mysqli->query($sql);
    $product=$result->fetch_object('Product');




}else if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $pname=$_REQUEST['pname'];
    $price=$_REQUEST['price'];
    $qty=$_REQUEST['qty'];
    $sql2="update product set pname= '{$pname}',price={$price}, qty={$qty} where id={$id}";
    //echo $sql2;
    $mysqli->query($sql2);
    header('Location:bmain.php');



}else{

    header('Loctaion:bmain.php');
}

?>
Edit Product:
<hr />

<form>

    <input type="hidden" name="id" value="<?php echo $product->id;?>"/>
    PName: <input name="pname" value="<?php echo $product->pname;?>"/><br>
    Price: <input type="number" name="price" value="<?php echo $product->price;?>"/><br>
    Qty: <input type="number" name="qty" value="<?php echo $product->qty;?>"/><br>
    <input type="submit" name="Edit" />



</form>


