<?php

    include_once 'sqlTimetable.php';
    include_once 'QueryAnswer.php';
//select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`,`1319`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime` from `1001`,`1008`,`1319` where (`1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'18:59:00' and `1001`.`Train`=`1008`.`Train`) and (`1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'18:59:00' and `1008`.`Train`=`1319`.`Train`) order by `1001`.`DepTime`;

    $sql="select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`from `1001`,`1008` where (`1001`.`DepTime`<`1008`.`DepTime` and `1001`.`DepTime`>'12:01:00' and `1001`.`Train`=`1008`.`Train`) order by `1001`.`DepTime`";
    //$sql2="select `1008`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime`,`1319`.`Train`from `1008`,`1319` where (`1008`.`DepTime`<`1319`.`DepTime` and `1008`.`DepTime`>'18:59:00' and `1008`.`Train`=`1319`.`Train`) order by `1008`.`DepTime`";
    //echo $sql ."<br>";
    $firstTrainResult=$mysqli->query($sql);


    if($firstTrainResult){
        while($firstTrain=$firstTrainResult->fetch_object("QueryAnswer")){
            $transferDepTime=$firstTrain->ArrTime;
            $sql2="select `1008`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime`,`1319`.`Train`from `1008`,`1319` where `1008`.`DepTime`<`1319`.`DepTime` and `1008`.`DepTime`>'{$transferDepTime}' and `1008`.`Train`=`1319`.`Train` order by `1319`.`ArrTime`";
//            echo $sql2."<br>";

//
//            echo "<br>";
            $secondTrainResult=$mysqli->query($sql2);
            if($secondTrainResult){

                while($secondTrain=$secondTrainResult->fetch_object("QueryAnswer")){

                    foreach ($firstTrain as $key => $value){
                        echo "$key : $value <br>";
                    }

                    foreach ($secondTrain as $k => $v){


                        echo "$k : $v <br>";
                    }

                    echo "<hr>";

                }
            }



        }



    }
