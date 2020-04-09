<?php

    include_once 'kleinerQapis.php';
    $userGuessHistory='';

    if(isset($_POST['answer'])){
        if(isset($_POST['userGuessHistory'])){
            $userGuessHistory=$_POST['userGuessHistory'];
        }
        $answer=$_POST['answer'];
        if(isset($_POST['userGuess'])){
            $userGuess=$_POST['userGuess'];
            $result=checkNumber($userGuess,$answer);
            $userGuessHistory .= "{$userGuess}  :  {$result}<br>";
            //echo $userGuessHistory;
        }


    }else{
        $answer=generateAnswer(4);

    }






    ?>


    <form method="post">
        Guess non-repeated Number:
        <input type="text" name="userGuess"/>
        <input type="submit" value="check"/>
        <input type="hidden" name="answer" value="<?php echo $answer?>"/>
        <input type="hidden" name="userGuessHistory" value="<?php echo $userGuessHistory?>"/>
    </form>

<div><?php echo $userGuessHistory?></div>