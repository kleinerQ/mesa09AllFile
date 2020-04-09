I am kleinerQ62<hr>
<?php
    session_start();
    $a=rand(1,49);
    $a=true;
    $a=array(1,2,3,4);
    //echo $a .'<br>';

    $_SESSION['a']=$a;
    $a[2]=100;
    foreach($a as $k =>$v){
        echo"{$k} : {$v}<br>";
    }




//    $a=100;

?>


<a href="kleinerQ63.php">KleinerQ63</a>
