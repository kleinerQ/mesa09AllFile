<?php
    $n=$result='';
    if(isset($_GET['n'])){
        $n=$_GET['n'];//string
        $counter=0;
        $result=0;
        while($counter<= $n){

            $result+=$counter;
            $counter++;
        }

    }



?>


<form>

    1+2+3+...+
    <input type="text" name="n" value="<?php echo "$n";   ?>">
    <input type="submit" value="=">
    <?php
        echo "$result";


    ?>
</form>
