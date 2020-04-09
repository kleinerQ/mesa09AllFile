<?php


function generateAnswer($number){
    $numberString=range(0,9);
    shuffle($numberString);
    $answer='';
    for($i=0; $i<$number;$i++){
        $answer .= $numberString[$i];

    }
    //var_dump($answer);
    return $answer;


}

function checkNumber($userGuess,$answer){
    $answerLength=strlen($answer);

    $aCounter=$bCounter=0;
    //length verify
    if(strlen($answer) != strlen($userGuess)){
        return "Pleaase enter exact $answerLength digits. ";
    }
    //repeat verify
    for($i=0;$i<$answerLength;$i++){
        if(strpos($userGuess,substr($userGuess,$i,1)) ==strrpos($userGuess,substr($userGuess,$i,1))){

        }else{
            return "Oops! You enter the repeated Numbers!!";
        }

    }

    for($i=0;$i<$answerLength;$i++){
        if(substr($answer,$i,1)==substr($userGuess,$i,1)){
            $aCounter++;
        }else{
            if(strpos($answer,substr($userGuess,$i,1))===false){

            }else{
                $bCounter++;
            }

        }

    }
   return $aCounter . 'A' . $bCounter . 'B';


}


function checkId($id){

    if(preg_match('/^[A-Z][1,2][0-9]{8}$/',$id)){
        $letterString='ABCDEFGHJKLMNPQRSTUVXYWZIO';
        $n12=strpos($letterString,substr($id,0,1)) + 10;
        $n1=(int)($n12/10);
        $n2=$n12%10;
        $n3=substr($id,1,1);
        $n4=substr($id,2,1);
        $n5=substr($id,3,1);
        $n6=substr($id,4,1);
        $n7=substr($id,5,1);
        $n8=substr($id,6,1);
        $n9=substr($id,7,1);
        $n10=substr($id,8,1);
        $n11=substr($id,9,1);
        $sum = 1*$n1 + 9*$n2 + 8*$n3 + 7*$n4 + 6*$n5 + 5*$n6 + 4*$n7 + 3*$n8 + 2*$n9 + 1*$n10 + 1*$n11;
        if ($sum %10 ==0){
            return 'true';
        }else{
            return 'false';
        }



    }else{
        return 'false';

    }

}