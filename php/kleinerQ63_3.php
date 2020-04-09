I am kleinerQ63<hr>
<?php
include_once 'MyOOTest.php';
session_start();

if(!isset($_SESSION['s1'])) header('Location:kleinerQ62_3.php');

$s1=$_SESSION['s1'];
echo $s1->calSum() . ":" . $s1->calAvg();

?>

<br>
<a href="kleinerQ64.php">KleinerQ64</a>
