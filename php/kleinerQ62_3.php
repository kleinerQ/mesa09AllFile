I am kleinerQ62<hr>
<?php
    include_once 'MyOOTest.php';
    session_start();

    $s1 =new Student(90,87,60);
    echo $s1->calSum() . ":" . $s1->calAvg();

    $_SESSION['s1']=$s1;
    $s1->ch=100;
    $s1->eng=47;


?>

<br>
<a href="kleinerQ63_3.php">KleinerQ63</a>
<br>
<a href="kleinerQ64.php">KleinerQ64</a>

