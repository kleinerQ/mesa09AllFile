<?php
    date_default_timezone_set("Asia/Taipei");
    $fileptr=opendir("test1");
    while($file=readdir($fileptr)){

        if(is_dir("test1/{$file}")){
            echo '[dir]';
        }else if (is_file("test1/{$file}")){
            echo '[file]';

        }

        echo $file . ':' . filesize("test1/{$file}"). ':' .

            date("Y-m-d H:i:s", filemtime("test1/{$file}")) . "<br>";
    }

    closedir($fileptr);
//    unlink("test1/brad.txt");
    mkdir("test2");

//    $s1=readdir($fileptr);
//    echo $s1 . '<br>';
//    $s1=readdir($fileptr);
//    echo $s1 . '<br>';
//    $s1=readdir($fileptr);
//    echo $s1 . '<br>';
//    $s1=readdir($fileptr);
//    echo $s1 . '<br>';