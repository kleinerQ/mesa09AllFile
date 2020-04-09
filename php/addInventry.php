<?php
    include_once 'sqlkleinerq.php';
    if(isset($_REQUEST['pname'])){
        $pname=$_REQUEST['pname'];
        $price=$_REQUEST['price'];
        $qty=$_REQUEST['qty'];

        $sql="insert into product (pname,price,qty) values('{$pname}',{$price},{$qty})";
//        echo $sql;
        $mysqli->query($sql);
    }


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form method="get">
    pname:
    <input name="pname"/><br>
    price:
    <input name="price"/><br>
    qty
    <input name="qty"/><br>
    <input type="button" onclick='location.href="inventry.php"' value="Go back"/>
    <input type="submit" value="Add"/>

</form>