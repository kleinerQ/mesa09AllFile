<?php
    include_once 'kleinerQapis2.php';
    $result='';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result=checkId($id);
    }

?>


<form>

    <input type="text" name="id" />
    <input type="submit" value="check"/>

</form>
<?php echo $result?>