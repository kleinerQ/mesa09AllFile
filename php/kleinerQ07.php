
<?php
    $z = $x = $y = $op='';
    if( isset($_GET['x']) && isset($_GET['y'])) {
        $x = $_GET['x'];
        $y = $_GET['y'];
        $op = $_GET['op'];
        //var_dump($y);
        //echo "{$x} + {$y} = {$z}";
        if ($op == '1') {
            $z = $x + $y;
        } else if ($op == '2') {
            $z = $x - $y;
        } else if ($op == '3') {
            $z = $x * $y;
        }else if ($op == '4') {
            $resultInteger = (int) ($x / $y);
            $resultMod = $x % $y;
            $z = $resultInteger . '......' .$resultMod;
        }


    }


?>


<form >

    <input type="text" name="x" value="<?php echo $x; ?>"/>
    <select name="op" >
        <option value="1" <?php if($op=='1'){echo 'selected';} ?>>+</option>
        <option value="2" <?php if($op=='2'){echo 'selected';} ?>>-</option>
        <option value="3" <?php if($op=='3'){echo 'selected';} ?>>*</option>
        <option value="4" <?php if($op=='4'){echo 'selected';} ?>>/</option>

    <select>

    <input type="text" name="y" value="<?php echo $y; ?>"/>

    <input type="submit" value="=" />
    <?php
        if( isset($_GET['x'])){
            echo $z;
        }

    ?>

</form>