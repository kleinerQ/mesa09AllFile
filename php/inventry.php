<?php
    include_once'sqlkleinerq.php' ;
    include_once "Product.php";
    include_once 'myconfig.php';



    if(isset($_REQUEST['delid'])) {
//        echo'OK';
        $delid = $_REQUEST['delid'];
        $sql2 = "delete from product where id={$delid}";
        $mysqli->query($sql2);
    }

    $sql2="select id from product";
    $result2 = $mysqli->query($sql2);
    $numData=$result2->num_rows;
    $totalPage=ceil($numData/RPP);
    $page=1;

    if(isset($_GET['page'])) $page=$_GET['page'];


    $start=($page-1)*RPP;

    $sql3="select * from product limit {$start}," . RPP;

    $result = $mysqli->query($sql3);




//    $sql="select * from product";
//    $result = $mysqli->query($sql);
    ?>







<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
    function confirmMessage($messageName) {

        return confirm('Delete '+ $messageName + "?");

    }


</script>


<a href="addInventry.php">Add Goods Item</a>
<hr/>
<table border="1" width="100%">
    <tr>
        <td>id</td>
        <td>pname</td>
        <td>price</td>
        <td>qty</td>
        <td>Delete</td>
        <td>Edit</td>



    </tr>
    <?php

        while($prodcut=$result->fetch_object('Product')){
            echo "<tr>";
            echo "<td>{$prodcut->id}</td>";
            echo "<td>{$prodcut->pname}</td>";
            echo "<td>{$prodcut->price}</td>";
            echo "<td>{$prodcut->qty}</td>";
            echo "<td><a href='?delid={$prodcut->id}' onclick='return confirmMessage(\"{$prodcut->pname}\")'>Delete</a></td>";
            echo "<td><a href='editItem.php?editid={$prodcut->id}'>Edit</a></td>";
            echo "</tr>";

        }


    ?>

</table>

<a href="?page=<?php echo $page==1? 1 :$page-1; ?>">Pre</a>
<?php echo $page;?>
<a href="?page=<?php echo $page==$totalPage? $totalPage:$page+1; ?>"> Next</a>
