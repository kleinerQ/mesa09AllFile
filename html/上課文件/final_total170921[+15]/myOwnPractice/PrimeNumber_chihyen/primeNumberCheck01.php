<?php
    include_once 'kleinerQapis.php';



?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<form>
欲顯示的質數範圍到
<select name="number">
    <option value="100"<?php if(isset($_GET['number'])){if($_GET['number']==100)echo 'selected';}?>>100</option>
    <option value="500"<?php if(isset($_GET['number'])){if($_GET['number']==500)echo 'selected';}?>>500</option>
    <option value="1000"<?php if(isset($_GET['number'])){if($_GET['number']==1000)echo 'selected';}?>>1000</option>
</select>
<input type="submit" value="按我顯示結果">
</form>
    <table border="1" width="100%">

        <?php
            if(isset($_GET['number'])) {
                $showNumber=$_GET['number'];
                for ($i = 0; $i < ($showNumber/10); $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 10; $j++) {

                        $showChar = $i * 10 + $j;
                        $primeResult = primeNumberCheck($showChar);
                        if ($primeResult) {
                            //primeNumber
                            echo "<td style=\"width:45px; background-color:red;font-size:30px;\" align=\"center\">$showChar</td>";
                        } else {
                            echo "<td style=\"width:45px; background-color:green;font-size:30px;\" align=\"center\">$showChar</td>";

                        }
                    }
                    echo "</tr>";
                }
            }
        ?>

</table>
<h1>說明: 紅色背景為質數</h1>


