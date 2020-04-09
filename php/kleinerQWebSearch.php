<?php

$fp= fopen("http://www.taifex.com.tw/chinese/3/7_12_5_tbl.asp",'r');

while($c=fgets($fp)){
    if(preg_match('/<span class="right">日期/',$c)){
        $result=substr($c,strpos($c,'<span class="right">'));

            echo "{$result}";

    }

}
fclose($fp);

?>