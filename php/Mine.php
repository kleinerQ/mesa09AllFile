
<table border="1" width="20%" height="20%">
<?php
    $size=5;
    $mineNumber=3;
    $minePosMatrix=range(0,$size*$size-1);
//    foreach($minePosMatrix as $key =>$value){
//
//        echo "$key : $value<br>";
//    }
    shuffle($minePosMatrix);
    $minePos=$minePosMatrix;
    $minePos=array_splice($minePos,0,$mineNumber);

//    foreach($minePos as $key => $v){
//        echo "$key : $v <br>";
//    }

//    var_dump($minePos);
//    var_dump($minePosMatrix);


//    if(findValueINMatrix($minePos,10)!= -1){
//        echo 'OK';
//    }else{
//        echo'XX';
//    }

    for($i=0;$i<$size;$i++){
        echo "<tr>";
        for($j=0;$j<$size;$j++){
            $nowPos=$i*$size+$j;
//            echo $nowPos;
//            findValueINMatrix($minePos,$nowPos);
            if(findValueINMatrix($minePos,$nowPos) >=0){
//                echo $nowPos ;
                echo "<td>".'B'."</td>";

            }else{

                echo "<td>" . checkMine($size,$minePos,$nowPos) . "</td>";



            }

        }
        echo "</tr>";
    }


    function findValueINMatrix($matrix,$target){
        foreach($matrix as $key => $value){

            if($value==$target){
                return $key;
            }

        }
        return -1;

    }

    function checkMine($size,$minePos,$nowPos){
        $counter=0;
        if($nowPos% $size ==0){
//            echo "$nowPos<br>";
            if(findValueINMatrix($minePos,$nowPos-$size+1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size+1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-$size)>=0) $counter++;

        }else if($nowPos % $size == ($size-1)){

            if(findValueINMatrix($minePos,$nowPos-$size-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-$size)>=0) $counter++;


        }else{


            if(findValueINMatrix($minePos,$nowPos-$size-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-$size)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos-$size+1)>=0) $counter++;
            if(findValueINMatrix($minePos,$nowPos+$size+1)>=0) $counter++;


        }

        return $counter;


    }
  ?>
</table>