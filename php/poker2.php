<?php

    $poker=range(0,51);
    shuffle($poker);

    foreach($poker as $key =>$value){

            echo "$key => $value</br>";
    }

    $players=array(array(),array(),array(),array());

    foreach($poker as $key=> $card){
        $players[$key%4][]=$card;
    }

//    foreach($players[0] as $card){
//
//        echo "$card<br>";
//    }
    echo '<hr>';
?>

<table border="1" width="100%">

    <?php
        $suited=array('&spades;','&hearts;','&diams;','&clubs;');
        $cardNumber=array('A',2,3,4,5,6,7,8,9,10,'J','Q','K');
        $color=array('black','red','red','black');
        foreach($players as $eachPlay){
            echo "<tr>";
            sort($eachPlay);
            foreach($eachPlay as $card){

                echo"<td style='color:{$color[(int)($card/13)]};'>{$suited[(int)($card/13)]}{$cardNumber[$card%13]}</td>";
//                echo"<td style='color:black;'>$card</td>";
            }
            echo "</tr>";
        }

    ?>

<!--     <tr>-->
<!--         <td></td>-->
<!--     </tr>-->


</table>