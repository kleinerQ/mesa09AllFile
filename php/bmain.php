<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
        include_once 'sql.php';
        include_once 'Product.php';
        include_once  'myconfig.php';


        if(isset($_REQUEST['delid'])){
//            echo 'OK';
            $delid=$_REQUEST['delid'];
            $sql="delete from product where id={$delid}";
            $mysqli->query($sql);
        }
//        $pageNumber=4;
//        $pageShowItemNumber=3;
        $sql = 'select count(*) as `sum` from product';
        $result=$mysqli->query($sql);
        $data=$result->fetch_assoc();
        $sum=$data['sum'];

//        echo $sum;


//        $sql='select id from product';
//        $result=$mysqli->query($sql);
//        $sum=$result->num_rows;
//        echo $sum;

        $totalPage= ceil($sum/RPP);

        $page=1;
        if(isset($_REQUEST['page'])){
            $page =$_REQUEST['page'];

        }

        $start=($page-1)*RPP;
//        echo $start;

        $sql="select * from product order by id limit {$start}," . RPP;
        $result=$mysqli->query($sql);

        //$sql="select * from product order by id limit {$pageNumber},{$pageShowItemNumber}";   //default asc
        //$result=$mysqli->query($sql);

?>
<script>
    function confirmDelete(pname) {
        return confirm('Delete' + pname + '?');
    }

</script>


<a href="addProduct.php">Add New</a>
<hr />

Product List:<br>

<table border="1" width="100%">
    <tr>
    <td>id</td>
    <td>pname</td>
    <td>price</td>
    <td>qty</td>
    <td>edit</td>
    <td>delete</td>

    </tr>

    <?php
        while($product=$result->fetch_object('Product')){

            echo '<tr>';
            echo "<td>{$product->id}</td>";
            echo "<td><a href='showimage.php?pid={$product->id}'>{$product->pname}</a></td>";
            echo "<td>{$product->price}</td>";
            echo "<td>{$product->qty}</td>";
            //echo "<td><a href='?delid={$product->id}'>Delete</a></td>";
            echo "<td><a href='editProduct_2.php?editid={$product->id}' 
                         onclick='return true' >Edit</a></td>";

            echo "<td><a href='?delid={$product->id}' 
                         onclick='return confirmDelete(\"$product->pname\")' >Delete</a></td>";

            echo '</tr>';
        }

    ?>

</table>

<a href="?page=<?php echo $page==1? 1: ($page-1); ?>">Pre</a>
<?php echo $page?>
<a href="?page=<?php echo $page==$totalPage? $totalPage: ($page+1); ?>">Next</a>
