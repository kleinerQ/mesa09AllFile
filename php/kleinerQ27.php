<?php

    include 'kleinerQapis.php';
    //if(isset(''))
    //set answer
    $userGuess='';
    //$answer = createAnswer(4);
    if(!isset($_GET['answer'])){
        $answer = createAnswer(4);


    }else {

        $userGuess=$_GET['userGuess'];
        $answer=$_GET['answer'];
        echo checkAB($userGuess,$answer);
    }

    echo "{$answer}";



?>

<form >

    Guess Number:
    <input type="text" name="userGuess" />
    <input type="submit" value="Guess"/>
    <input type="text" name="answer" value="<?php echo $answer;?>"/>


</form>