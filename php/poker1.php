<?php

    for($i=0;$i<10;$i++){

        $randResult=rand(0,9);
        $checkRepeat=false;

        for($j=0;$j<$i;$j++)
        {
            if($randResult==$poker[$j]){
                $checkRepeat=true;

            }

        }

        if($checkRepeat==false){

            $poker[$i]=$randResult;
        }else{

            $i--;
        }

    }

    foreach($poker as $key => $value){
        echo "$key => $value</br>";
    }

?>