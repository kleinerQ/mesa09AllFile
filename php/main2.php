<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
    include_once 'sqlkleinerq.php';
    include_once 'Product.php';
    include_once 'Member.php';
    include_once 'Cart.php';

    session_start();
    if(!$_SESSION['member']) header('Location:loginMenu.php');

    $sql="select * from product";
    $result=$mysqli->query($sql);
    $member=$_SESSION['member'];

    $cart=$_SESSION['cart'];
//    echo $cart->getList()['17'];



?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<h1> MAIN MENU QQQ </h1>

<hr />
<script>
    function addCart(pid) {
            var num=$("#num_"+pid).val();
            $.get('addCartList.php?num='+num +'&pid='+pid ,function (data,status) {

                if(status=='success'){
                    alert(data);

                }

            });

            // alert(pid);
            // alert(num);

    }

</script>

<table border="1" width="100%">
    Product List:
    <tr>
        <th>Pname</th>
        <th>Price</th>
        <th>Num.</th>
        <th>Update</th>


    </tr>

    <?php
        while($product=$result->fetch_object()){

            echo '<tr>';
            echo "<td>$product->pname</td>";
            echo "<td>$product->price</td>";
            if(isset($cart->getList()["$product->id"])){
                $inputVaule=$cart->getList()["$product->id"];
            }else{
                $inputVaule=0;
            }
            echo "<td><input id='num_{$product->id}' value='{$inputVaule}'/></td>";
            echo "<td><input type='button' onclick='addCart({$product->id})' value='Update'></td>";



            echo '</tr>';

        }

    ?>



</table>

<a href="checkoutQ.php">Check Out</a>