<?php
//controler
    include_once 'kleinerQ81.php';

    $x=$_REQUEST['x'];
    $y=$_REQUEST['y'];

    $result=calXY($x,$y);
//header("location:kleinerQ82.php?result={$result}");
    $view = file_get_contents('kleinerQ82.html');
    $view = str_replace('###',$result,$view);
    echo $view;

