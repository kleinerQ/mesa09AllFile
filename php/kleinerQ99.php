<?php


?>



<table border="1" width="100%">


            <?php
            for($k=0; $k<4; $k++) {
                echo '<tr>';
                for ($j = 2; $j <= 5; $j++) {
                    $newj= $j + $k *4;
                    echo '<td bgcolor="'.((($newj+$k)%2==0)?'red':'yellow').'">';

                    for ($i = 1; $i <= 9; $i++) {
                        $r = $newj * $i;
                        echo "{$newj} * {$i} = {$r}<br>";

                    }

                    echo '</td>';
                }
                echo '</tr>';
            }
            ?>







</table>
