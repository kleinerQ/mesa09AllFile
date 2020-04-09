<?php

    include_once 'sqlTRA.php';
    include_once 'QueryAnswer.php';
    include_once "stationRef.php";
ini_set('max_execution_time', 300000);
if(isset($_REQUEST['userQueryTime'])) {
    $userQueryTime=$_REQUEST['userQueryTime'];


}
//if (!isset($_SESSION['member'])){
//    header('Location:TRAlogin.php');
//
//}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<form>

    列出出發時間3小時內出發的所有車次<br>
    起站:
    <?php
    echo "<select class=\"js-example-basic-single\" name='userQueryStart'>";
    foreach($stationName as $key => $value){
        if(isset($_REQUEST['userQueryStart'])){
            $v=$_REQUEST['userQueryStart'];
            $stationN=numberSearchStation($tableName,$stationName,$v);
            if($value==$stationN){

                //echo "OKKK";
                echo "<option value='{$tableName[$key]}' selected>$value</option>";
            }else{

//                echo $v;
                echo "<option value='{$tableName[$key]}'>$value</option>";

            }
        }else{

            echo "<option value='{$tableName[$key]}'>$value</option>";
        }



    }


    echo "</select>";
    ?>






<!--    TransferStation:-->
<!--    --><?php
//    echo "<select class=\"js-example-basic-single\" name='userQueryTransfer'>";
//    foreach($stationName as $key => $value){
//
//        if(isset($_REQUEST['userQueryTransfer'])){
//            $v=$_REQUEST['userQueryTransfer'];
//            $stationN=numberSearchStation($tableName,$stationName,$v);
//            if($value==$stationN){
//
//                //echo "OKKK";
//                echo "<option value='{$tableName[$key]}' selected>$value</option>";
//            }else{
//
////                echo $v;
//                echo "<option value='{$tableName[$key]}'>$value</option>";
//
//            }
//        }else{
//
//            echo "<option value='{$tableName[$key]}'>$value</option>";
//        }
//
//
//    }
//
//
//
//    echo "</select>";
//    ?>



    迄站:
    <?php
    echo "<select class=\"js-example-basic-single\" name='userQueryDest'>";
    foreach($stationName as $key => $value){

        if(isset($_REQUEST['userQueryDest'])){
            $v=$_REQUEST['userQueryDest'];
            $stationN=numberSearchStation($tableName,$stationName,$v);
            if($value==$stationN){

                //echo "OKKK";
                echo "<option value='{$tableName[$key]}' selected>$value</option>";
            }else{

//                echo $v;
                echo "<option value='{$tableName[$key]}'>$value</option>";

            }
        }else{

            echo "<option value='{$tableName[$key]}'>$value</option>";
        }


    }



    echo "</select>";
    ?>


    <!--<input name="userQueryDest"/><br>-->

    出發時間:
    <input type="time" name="userQueryTime" value="<?php if(isset($_REQUEST['userQueryTime'])){ echo $userQueryTime;}?>" required>
    <!--<input name="userQueryTime"/><br>-->




    <input type="submit" value="Enter"/>

</form>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });


</script>

<?php

//select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`,`1319`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime` from `1001`,`1008`,`1319` where (`1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'18:59:00' and `1001`.`Train`=`1008`.`Train`) and (`1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'18:59:00' and `1008`.`Train`=`1319`.`Train`) order by `1001`.`DepTime`;
    if(isset($_REQUEST['userQueryStart']) && isset($_REQUEST['userQueryDest']) && isset($_REQUEST['userQueryTime'])) {

        $userQueryStart=$_REQUEST['userQueryStart'];
        //$userQueryTransfer=$_REQUEST['userQueryTransfer'];
        $userQueryDest=$_REQUEST['userQueryDest'];
        $userQueryTime=$_REQUEST['userQueryTime'];



        $startN=numberSearchStation($tableName,$stationName,$userQueryStart);
        $destN=numberSearchStation($tableName,$stationName,$userQueryDest);


        $userQueryTimeStringTep = substr($userQueryTime, 0, 2) + 8;
//                var_dump($timeStringTep);
        $arrvTrainTimeLimit = $userQueryTimeStringTep . ":00:00";



        // search for all the train, which are on the Dest Trainlist, and its all stop
        //$sql = "select * from trainInfos where Train IN (select Train from trainInfos where Station={$userQueryDest}) and ArrTime < '{$arrvTrainTimeLimit}' and DepTime > '{$userQueryTime}' order by DepTime";
        //mysql> select * from (select Train, `Order` from trainInfos where Train in (select Train from trainInfos where Station={$userQueryDest}))as a, (select Train,ArrTime from traininfos where Station={$userQueryDest}) as b where a.Train=b.Train order by b.ArrTime;

        $sql= "select a.* from (select * from trainInfos where Train in (select Train from traininfos where  Station={$userQueryDest}))as a, (select Train,ArrTime from traininfos where  Station={$userQueryDest}) as b where a.Train=b.Train and a.ArrTime < '{$arrvTrainTimeLimit}' and a.DepTime > '{$userQueryTime}'order by b.ArrTime, a.`Order`";
        //$sql2="select `1008`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime`,`1319`.`Train`from `1008`,`1319` where (`1008`.`DepTime`<`1319`.`DepTime` and `1008`.`DepTime`>'18:59:00' and `1008`.`Train`=`1319`.`Train`) order by `1008`.`DepTime`";
//        echo $sql ."No1<br>";
        $arrvTrainResult = $mysqli->query($sql);



        if ($arrvTrainResult->num_rows>0) {
            while ($arrvTrain = $arrvTrainResult->fetch_object("QueryAnswer")) {
                echo "<table  width='30%'>";


                //find the Train info in Dest Location
                $sql3 = "select * from trainInfos where Station={$userQueryDest} and Train={$arrvTrain->Train}";
//                echo $sql3 ."No2<br>";
                $filterResult = $mysqli->query($sql3);
                $filter = $filterResult->fetch_object("QueryAnswer");


                if ($arrvTrain->Order < $filter->Order) {
                    //train goes to Dest not from Dest
                    // echo 'OO<br>';


                    $sql4="select * from trainInfos where Train={$arrvTrain->Train} and Station={$userQueryStart}";
                    $stopCheck=$mysqli->query($sql4);
//                    echo "$sql4<br>";

                    if($stopCheck->num_rows>0){
                        $stopData = $stopCheck->fetch_object("QueryAnswer");
                        if($arrvTrain->DepTime > $stopData->DepTime){





                            $firstTrainArrvTime = $arrvTrain->DepTime;
                            $firstTrainArrvStation = $arrvTrain->Station;
                            $transferN = numberSearchStation($tableName, $stationName, $arrvTrain->Station);


                            $firstTrainDepTimeTep = substr($userQueryTime, 0, 2) + 3;
                            $firstTrainDepTimeLimit = $firstTrainDepTimeTep . ":00:00";

//                var_dump($transferDepTimeLimit);
//                    echo "<br>{$arrvTrain->DepTime}"."<br>";
                            //find all the connector train that reach to the Dest
                            $sql2 = "select a.Train,a.CarClass ,a.DepTime,b.ArrTime,a.LineDir from (select * from trainInfos where Station='{$userQueryStart}') as a, 
                                                               (select * from trainInfos where Station='{$firstTrainArrvStation}') as b 
                                                               where a.Train=b.Train and a.`Order` < b.`Order` and a.DepTime < b.DepTime and a.DepTime >'{$userQueryTime}' and a.DepTime < '{$firstTrainDepTimeLimit}' and b.ArrTime < '{$arrvTrain->DepTime}' and b.ArrTime > '{$firstTrainDepTimeLimit}'
                                                               order by a.DepTime";


//                                echo $firstTrainArrvStationql2."<br>";
//                    echo $sql2 ."No3<br>";

//
//            echo "<br>";
                            $firstTrainResult = $mysqli->query($sql2);
                            if ($firstTrainResult->num_rows > 0 ) {
                                while ($firstTrain = $firstTrainResult->fetch_object("QueryAnswer") ) {

                                    if ($firstTrain->Train != $arrvTrain->Train) {

                                        echo '<tr >';
                                        echo '<td style="border:5px solid; border-right: 0px;">';
                                        foreach ($firstTrain as $key => $value) {
                                            if ($key == 'CarClass') {
                                                $carN = numberSearchCarClass($value);
                                                echo "車種 : " . $carN . "<br/>";
                                            } else if ($key == 'DepTime') {
                                                echo "起站: {$startN}<br>";
                                                echo "出發時間: $value <br/>";
                                            } else if ($key == 'ArrTime') {
                                                echo "迄站: {$transferN}<br>";
                                                echo "抵達時間: $value <br/>";
                                            } else if ($key == 'Train') {
                                                echo "車次 : $value <br/>";
                                            } else if ($key == 'LineDir') {
//                                                echo "LineDir : $value <br/>";
                                            }
                                        }
                                        echo '</td>';
                                        echo '<td style="border:5px solid; border-left:5px dotted;">';
                                        foreach ($arrvTrain as $k => $v) {
                                            if ($k == 'CarClass') {
                                                $carN = numberSearchCarClass($v);
                                                echo "車種 : " . $carN . "<br/>";
                                            } else if ($k == 'DepTime') {
                                                echo "起站: {$transferN}<br>";
                                                echo "出發時間:$v <br/>";
                                            } else if ($k == 'ArrTime') {
                                                echo "迄站: {$destN}<br>";
                                                echo "<span style='color: red;'>抵達時間: $filter->ArrTime </span><br/>";
                                            } else if ($k == 'Train') {
                                                echo "車次 : $v <br/>";
                                            } else if ($k == 'LineDir') {
//                                                echo "LineDir : $v <br/>";
                                            }
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                        echo "</hr>";
                                    }

                                }


                            }






                        }else if($arrvTrain->DepTime == $stopData->DepTime ){



                            echo '<tr >';
                            echo '<td style="border:5px solid;">';

                            foreach ($arrvTrain as $key => $value) {


                                if ($key == 'CarClass') {


                                    $carN = numberSearchCarClass($value);

                                    echo "車種 : " . $carN . "<br/>";
                                } else if ($key == 'DepTime') {


                                    echo "起站: {$startN}<br>";
                                    echo "出發時間: $value <br/>";

                                } else if ($key == 'ArrTime') {


                                    echo "迄站: {$destN}<br>";
                                    echo "抵達時間: {$filter->ArrTime} <br/>";
                                } else if ($key == 'Train') {

                                    echo "車次 : $value <br/>";
                                } else if ($key == 'LineDir') {

//                                        echo "LineDir : $value <br/>";
                                }


                            }

                            echo '</td>';

                            echo '</tr>';
                            echo '</hr>';



                        }else{


                        }



                    }else {



                        $firstTrainArrvTime = $arrvTrain->DepTime;
                        $firstTrainArrvStation = $arrvTrain->Station;
                        $transferN = numberSearchStation($tableName, $stationName, $arrvTrain->Station);
                        $timeStringTep = substr($arrvTrain->DepTime, 0, 2) - 3;
//                var_dump($timeStringTep);
                        $transferDepTimeLimit = $timeStringTep . ":00:00";
                        $firstTrainDepTimeTep = substr($userQueryTime, 0, 2) + 3;
                        $firstTrainDepTimeLimit = $firstTrainDepTimeTep . ":00:00";

//                var_dump($transferDepTimeLimit);
//                    echo "<br>{$arrvTrain->DepTime}"."<br>";
                        //find all the connector train that reach to the Dest
                        $sql2 = "select a.Train,a.CarClass ,a.DepTime,b.ArrTime, a.`Order` as StartOrder,a.LineDir from (select * from trainInfos where Station='{$userQueryStart}') as a, 
                                                               (select * from trainInfos where Station='{$firstTrainArrvStation}') as b 
                                                               where a.Train=b.Train and a.`Order` < b.`Order` and a.DepTime < b.DepTime and a.DepTime >'{$userQueryTime}' and a.DepTime < '{$firstTrainDepTimeLimit}' and b.ArrTime < '{$arrvTrain->DepTime}' and b.ArrTime > '{$transferDepTimeLimit}'
                                                               order by a.DepTime";


//                                echo $firstTrainArrvStationql2."<br>";
//                    echo $sql2 ."No4<br>";

//
//            echo "<br>";
                        $firstTrainResult = $mysqli->query($sql2);
                        if ($firstTrainResult->num_rows > 0) {
                            while ($firstTrain = $firstTrainResult->fetch_object("QueryAnswer") ) {



                                $sql5="select * from trainInfos where Train={$firstTrain->Train} and Station={$userQueryDest}";
                                $stopCheck=$mysqli->query($sql5);
//                    echo "$sql4<br>";

                                if($stopCheck->num_rows == 0) {

                                    echo '<tr >';
                                    echo '<td style="border:5px solid; border-right: 0px;">';
                                    foreach ($firstTrain as $key => $value) {
                                        if ($key == 'CarClass') {
                                            $carN = numberSearchCarClass($value);
                                            echo "車種 : " . $carN . "<br/>";
                                        } else if ($key == 'DepTime') {
                                            echo "起站: {$startN}<br>";
                                            echo "出發時間: $value <br/>";
                                        } else if ($key == 'ArrTime') {
                                            echo "迄站: {$transferN}<br>";
                                            echo "抵達時間: $value <br/>";
                                        } else if ($key == 'Train') {
                                            echo "車次 : $value <br/>";
                                        } else if ($key == 'LineDir') {
//                                            echo "LineDir : $value <br/>";
                                        }
                                    }
                                    echo '</td>';
                                    echo '<td style="border:5px solid; border-left:5px dotted;">';
                                    foreach ($arrvTrain as $k => $v) {
                                        if ($k == 'CarClass') {
                                            $carN = numberSearchCarClass($v);
                                            echo "車種 : " . $carN . "<br/>";
                                        } else if ($k == 'DepTime') {
                                            echo "起站: {$transferN}<br>";
                                            echo "出發時間:$v <br/>";
                                        } else if ($k == 'ArrTime') {
                                            echo "迄站: {$destN}<br>";
                                            echo "<span style='color: red;'>抵達時間: $filter->ArrTime </span><br/>";
                                        } else if ($k == 'Train') {
                                            echo "車次 : $v <br/>";
                                        } else if ($k == 'LineDir') {
//                                            echo "LineDir : $v <br/>";
                                        }
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                    echo "</hr>";


                                }else{

                                    $stopData = $stopCheck->fetch_object("QueryAnswer");
                                    //echo "$firstTrain->DepTime" . "$stopData->DepTime<br>";

//                                    var_dump($stopData);
                                    if($firstTrain->StartOrder > $stopData->Order){
                                        //echo "$firstTrain->DepTime" . "$stopData->DepTime<br>";
//
//                                    var_dump($firstTrain);
//                                    var_dump($stopData);

//                                        echo "OOO<br>";
                                        echo '<tr >';
                                        echo '<td style="border:5px solid; border-right: 0px;">';
                                        foreach ($firstTrain as $key => $value) {
                                            if ($key == 'CarClass') {
                                                $carN = numberSearchCarClass($value);
                                                echo "車種 : " . $carN . "<br/>";
                                            } else if ($key == 'DepTime') {
                                                echo "起站: {$startN}<br>";
                                                echo "出發時間: $value <br/>";
                                            } else if ($key == 'ArrTime') {
                                                echo "迄站: {$transferN}<br>";
                                                echo "抵達時間: $value <br/>";
                                            } else if ($key == 'Train') {
                                                echo "車次 : $value <br/>";
                                            } else if ($key == 'LineDir') {
//                                                echo "LineDir : $value <br/>";
                                            }
                                        }
                                        echo '</td>';
                                        echo '<td style="border:5px solid; border-left:5px dotted;">';
                                        foreach ($arrvTrain as $k => $v) {
                                            if ($k == 'CarClass') {
                                                $carN = numberSearchCarClass($v);
                                                echo "車種 : " . $carN . "<br/>";
                                            } else if ($k == 'DepTime') {
                                                echo "起站: {$transferN}<br>";
                                                echo "出發時間:$v <br/>";
                                            } else if ($k == 'ArrTime') {
                                                echo "迄站: {$destN}<br>";
                                                echo "<span style='color: red;'>抵達時間: $filter->ArrTime </span><br/>";
                                            } else if ($k == 'Train') {
                                                echo "車次 : $v <br/>";
                                            } else if ($k == 'LineDir') {
//                                                echo "LineDir : $v <br/>";
                                            }
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                        echo "</hr>";









                                    }




                                }








                            }


                        }

                    }



                }

            echo "</table>";

            }


        }
    }
    ?>



