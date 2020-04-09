<?php
    include_once 'sqlkleinerq.php';
    $sql='select * from product where id=17';

    $result=$mysqli->query($sql);
    $data=$result->fetch_assoc();
//    var_dump($data);
//    echo $data['id'];
    while($data=$result->fetch_assoc())
    {


//        foreach ($data as $k => $v) {
//            echo "$k : $v<br>";
//        }
//        echo "<hr />";
    }


    // $result -> mysqli_result class 物件實體
//    while ($data = $result->fetch_assoc()){
//        foreach ($data as $k => $v){
//            echo "{$k} : {$v}<br>";
//        }
//        echo '<hr>';
//    }


