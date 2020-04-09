<?php

    include_once 'Product.php';
    include_once 'Cart.php';
    include_once 'sql.php';
    include_once 'MyQuery.php';

    session_start();
//
    $cart=$_SESSION['cart'];

    $myquery= new MyQuery($mysqli);
//    var_dump($myquery);
    ?>

<table border="1" width="100%">
  <tr>
    <th>No.</th>
    <th>Pname</th>
    <th>Price</th>
    <th>num</th>
    <th>$</th>

  </tr>

    <?php
        $i=1;
        foreach($cart->getList() as $item => $num){
            $price =$myquery->getPinfo($item,MyQuery::QUERY_PRICE);

            $sum=$num*$price;
            echo '<tr>';
            echo "<td>{$i}</td>";
            echo "<td>{$myquery->getPinfo($item,MyQuery::QUERY_PNAME)}</td>";
            echo "<td>{$price}</td>";
            echo "<td>{$num}</td>";
            echo "<td>{$sum}</td>";


            echo '</tr>';
            $i++;

        }


    ?>


</table>

<a href="close.php">Close</a>