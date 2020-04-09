<?php
    include_once 'Cart.php';
    include_once 'ProductInfoQuery.php';
    include_once 'sqlkleinerq.php';
    session_start();
    $query= new ProductInfoQuery($mysqli);

    $cart=$_SESSION['cart'];


?>


<?php
//$queryItem->queryItem(18,'price');
//
//?>

<table border="1" width="100%">
    <tr>
        <th>No.</th>
        <th>Pname</th>
        <th>Price</th>
        <th>Amount</th>
        <th>$</th>


    </tr>

    <?php
        $i=1;
        foreach($cart->getList() as $item => $amount){
            $price=$query->queryItem($item,ProductInfoQuery::QUERY_PRICE);
            $sum=$price*$amount;
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>{$query->queryItem($item,ProductInfoQuery::QUERY_PNAME)}</td>";
            echo "<td>{$price}</td>";
            echo "<td>{$amount}</td>";
            echo "<td>{$sum}</td>";

            echo "</tr>";

            $i++;

        }


    ?>


</table>

<a href="closeQ.php">Close</a>