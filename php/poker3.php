<?php

for($i=0;$i<52;$i++){
    do {
        $randResult = rand(0, 51);
        $checkRepeat = false;

        for ($j = 0; $j < $i; $j++) {
            if ($randResult == $poker[$j]) {
                $checkRepeat = true;

            }

        }
    }while($checkRepeat==true);


        $poker[$i]=$randResult;


}

foreach($poker as $key => $value){
    echo "$key => $value</br>";
}

?>