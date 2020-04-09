<?php

    include_once 'sqlTimetable.php';
    include_once 'QueryAnswer.php';
    include_once "stationRef.php";
    session_start();
if(isset($_REQUEST['userQueryTime'])) {
    $userQueryTime=$_REQUEST['userQueryTime'];


}
if (!isset($_SESSION['member'])){
    header('Location:TRAlogin.php');

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<form>


    Start:
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






    TransferStation:
    <?php
    echo "<select class=\"js-example-basic-single\" name='userQueryTransfer'>";
    foreach($stationName as $key => $value){

        if(isset($_REQUEST['userQueryTransfer'])){
            $v=$_REQUEST['userQueryTransfer'];
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



    Destination:
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

    Time:
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
    if(isset($_REQUEST['userQueryStart']) && isset($_REQUEST['userQueryTransfer']) && isset($_REQUEST['userQueryDest']) && isset($_REQUEST['userQueryTime'])) {

        $userQueryStart=$_REQUEST['userQueryStart'];
        $userQueryTransfer=$_REQUEST['userQueryTransfer'];
        $userQueryDest=$_REQUEST['userQueryDest'];
        $userQueryTime=$_REQUEST['userQueryTime'];



        $startN=numberSearchStation($tableName,$stationName,$userQueryStart);
        $destN=numberSearchStation($tableName,$stationName,$userQueryDest);
        $transferN=numberSearchStation($tableName,$stationName,$userQueryTransfer);




        $sql = "select `{$userQueryStart}`.`Train`,`{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`DepTime`,`{$userQueryTransfer}`.`ArrTime`from `{$userQueryStart}`,`{$userQueryTransfer}` where (`{$userQueryStart}`.`DepTime`<`{$userQueryTransfer}`.`DepTime` and `{$userQueryStart}`.`DepTime`>'{$userQueryTime}' and `{$userQueryStart}`.`Train`=`{$userQueryTransfer}`.`Train`) order by `{$userQueryStart}`.`ArrTime`";
        //$sql2="select `1008`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime`,`1319`.`Train`from `1008`,`1319` where (`1008`.`DepTime`<`1319`.`DepTime` and `1008`.`DepTime`>'18:59:00' and `1008`.`Train`=`1319`.`Train`) order by `1008`.`DepTime`";
        echo $sql ."<br>";
        $firstTrainResult = $mysqli->query($sql);


        if ($firstTrainResult) {
            while ($firstTrain = $firstTrainResult->fetch_object("QueryAnswer")) {


                $transferDepTime = $firstTrain->ArrTime;
                $timeStringTep=substr($transferDepTime,0,2)+2;
//                var_dump($timeStringTep);
                $transferDepTimeLimit= $timeStringTep.":00:00";

//                var_dump($transferDepTimeLimit);
                $sql2 = "select `{$userQueryTransfer}`.`Train`,`{$userQueryTransfer}`.`CarClass`,`{$userQueryTransfer}`.`DepTime`,`$userQueryDest`.`ArrTime`from `{$userQueryTransfer}`,`$userQueryDest` where `{$userQueryTransfer}`.`DepTime`<`$userQueryDest`.`DepTime` and `{$userQueryTransfer}`.`DepTime`< '{$transferDepTimeLimit}' and `{$userQueryTransfer}`.`DepTime`>'{$transferDepTime}' and `{$userQueryTransfer}`.`Train`=`$userQueryDest`.`Train` order by `$userQueryDest`.`ArrTime`";
//            echo $sql2."<br>";
            //echo "<hr>";

//
//            echo "<br>";
                $secondTrainResult = $mysqli->query($sql2);
                if ($secondTrainResult->num_rows>0) {
                    echo "<table  width='30%'>";

                    while ($secondTrain = $secondTrainResult->fetch_object("QueryAnswer")) {

                        echo '<tr >';
                        echo '<td style="border:5px solid; border-right: 0px;">';

                        foreach ($firstTrain as $key => $value) {


                            if($key=='CarClass') {


                                $carN=numberSearchCarClass($value);

                                echo "$key : ". $carN ."<br/>";
                            }else if($key=='DepTime'){


                                echo "Start: {$startN}<br>";
                                echo "$key : $value <br/>";

                            }else if($key=='ArrTime'){


                                echo "Dest: {$transferN}<br>";
                                echo "$key : $value <br/>";
                            }else{

                                echo "$key : $value <br/>";
                            }


                        }

                        echo '</td>';

                        echo '<td style="border:5px solid; border-left:5px dotted;">';
                        foreach ($secondTrain as $k => $v) {


                            if($k=='CarClass') {


                                $carN=numberSearchCarClass($v);

                                echo "$k : ". $carN ."<br/>";
                            }else if($k=='DepTime'){


                                echo "Start: {$transferN}<br>";
                                echo "$k : $v <br/>";

                            }else if($k=='ArrTime'){


                                echo "Dest: {$destN}<br>";
                                echo "<span style='color: red;'>$k : $v </span><br/>";
                            }else{

                                echo "$k : $v <br/>";
                            }

                        }
                        echo '</td>';
                        echo '</tr>';

//

                    }
                    echo "</table>";
                    echo "<hr>";
                }


            }


        }
    }
    ?>



