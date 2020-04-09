<?php

$cont = file_get_contents("20180517.json");

$root = json_decode($cont);
//var_dump($root);
//echo gettype($root);
include_once "Member.php";


//$member =new Member();
//var_dump($member);

foreach ($root as $k =>$v){

//    echo "$k : ". gettype($v) ;
    foreach($v as $kk=>$vv){

//        echo "$kk : ". gettype($vv) ."<br>";
//            var_dump($vv);
        foreach ($vv as $kkk=>$vvv){

            if(gettype($vvv)== "array"){
//                echo "$kkk:" .'<br>';

                foreach ($vvv as $kkkk =>$vvvv){


                    var_dump($vvvv);
                    foreach ($vvvv as $kkkkk=>$vvvvv){
//                        echo "$kkkkk: $vvvvv<br>";



                    }
                    echo '<hr>';
                }


            }

        }
    }
}