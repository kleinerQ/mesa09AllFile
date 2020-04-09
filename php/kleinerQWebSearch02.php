<style type="text/css">

</style>

<?php
include_once "simple_html_dom.php";
$html = file_get_html('http://www.taifex.com.tw/chinese/3/7_12_5.asp');

$ret = $html->find('table');
//var_dump($ret);
foreach($ret as $key=> $value){
    if ($key==2)
    echo "$key: $value<br>";
}

?>


