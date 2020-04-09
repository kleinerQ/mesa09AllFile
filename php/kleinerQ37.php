<?php

    $fp= fopen("test1/brad02.txt",'a+');
//    $cont= fread($fp,4096);
//    echo $cont;
//    fclose($fp);

    fwrite($fp,"Hello, Brad");
    fclose($fp);

    ?>