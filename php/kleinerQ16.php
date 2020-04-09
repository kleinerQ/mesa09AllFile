<?php
    $counter1=0;
    $counter2=0;
    $counter3=0;
    $counter4=0;
    $counter5=0;
    $counter6=0;

    for($i=0;$i<100;$i++){

        $diceResult=rand(1,6);

        switch($diceResult){

            case 1:
                $counter1++;
                break;
            case 2:
                $counter2++;
                break;

            case 3:
                $counter3++;
                break;

            case 4:
                $counter4++;
                break;
            case 5:
                $counter5++;
                break;
            case 6:
                $counter6++;
                break;

            default:
                echo 'XX';
                break;
        }

    }

    echo "1點出現{$counter1}次<br>";
    echo "2點出現{$counter2}次<br>";
    echo "3點出現{$counter3}次<br>";
    echo "4點出現{$counter4}次<br>";
    echo "5點出現{$counter5}次<br>";
    echo "6點出現{$counter6}次<br>";

?>