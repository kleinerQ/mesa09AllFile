<?php
$max=49;
if(isset($_POST['max'])) {
    $max=$_POST['max'];


}

echo rand(1, $max);

?>