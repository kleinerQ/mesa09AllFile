<?php

include_once 'sqlTimetable.php';
include_once 'QueryAnswer.php';
$sql="select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`DepTime`,`1319`.`ArrTime` from `1001`,`1008`,`1319` where `1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'18:59:00' and `1001`.`Train`=`1008`.`Train` and `1008`.`Train`=`1319`.`Train` order by `1001`.`DepTime`";
echo $sql ."<br>";
//$sql="select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`from `1001`,`1008` where (`1001`.`DepTime`<`1008`.`DepTime` and `1001`.`DepTime`>'12:01:00' and `1001`.`Train`=`1008`.`Train`) order by `1001`.`DepTime`";
    $result=$mysqli->query($sql);

    if($result){

        while ($data=$result->fetch_object("QueryAnswer")){
//            var_dump($data);
            foreach ($data as $k=> $v){

                echo "$k: $v <br>";
            }

        }



    }