I am kleinerQ62<hr>
<?php
session_start();
    $fp=fopen('kleinerq.txt','w+');
    fwrite($fp,'Hello');
    echo gettype($fp);

    $_SESSION['fp']=$fp;
//    $a=100;

?>


<a href="kleinerQ63.php">KleinerQ63</a>
