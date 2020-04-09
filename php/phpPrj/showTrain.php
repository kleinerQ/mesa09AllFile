<?php
include_once "sqlTimetable.php";
include_once "QueryAnswer.php";
include_once  "stationRef.php";

session_start();

if (!isset($_SESSION['member'])){
    header('Location:TRAlogin.php');

}

if(isset($_REQUEST['userQueryTime'])) {
    $userQueryTime = $_REQUEST['userQueryTime'];

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




    <!--<input name="userQueryStart"/><br>-->



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
include_once "sqlTimetable.php";
include_once "QueryAnswer.php";
include_once  "stationRef.php";


if(isset($_REQUEST['userQueryStart']) && isset($_REQUEST['userQueryDest']) && isset($_REQUEST['userQueryTime'])){
    echo '<table border="1" width="50%">';
    $userQueryStart = $_REQUEST['userQueryStart']; //1008
    $userQueryDest = $_REQUEST['userQueryDest'];    //1319
    $userQueryTime = $_REQUEST['userQueryTime'] ;//10:00:00

    $_SESSION['userQueryStart']=$userQueryStart;
    $_SESSION['userQueryDest']=$userQueryDest;
    $_SESSION['userQueryTime']=$userQueryTime;

 //   $sql1="select `{$userQueryStart}`.`Train`,`{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`DepTime` as `StartDeptime`,`{$userQueryDest}`.`ArrTime` as `DestArrTime` from `{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`DepTime` > '{$userQueryTime}' and `{$userQueryStart}`.`ArrTime` < `{$userQueryDest}`.`DepTime` and `{$userQueryStart}`.`Order`< `{$userQueryDest}`.`Order` and `{$userQueryStart}`.`Train`= `{$userQueryDest}`.`Train` order by `{$userQueryStart}`.`DepTime`";
    $sql1="select `{$userQueryStart}`.`Train`,`{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`DepTime` as `StartDeptime`,`{$userQueryDest}`.`ArrTime` as `DestArrTime` from `{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`DepTime` > '{$userQueryTime}'  and `{$userQueryStart}`.`Order`< `{$userQueryDest}`.`Order` and `{$userQueryStart}`.`Train`= `{$userQueryDest}`.`Train` order by `{$userQueryStart}`.`DepTime`";

//    echo $sql1;
///$sql="select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`from `1001`,`1008` where (`1001`.`DepTime`<`1008`.`DepTime` and `1001`.`DepTime`>'12:01:00' and `1001`.`Train`=`1008`.`Train`) order by `1001`.`DepTime`";
//        echo $sql1 ."<br>";

    $result2=$mysqli->query($sql1);
//    var_dump($result2);
    if($result2) {
        echo "<table border='1' width='50%'>";

        while($data = $result2->fetch_object("QueryAnswer")){

//                        var_dump($data);
            echo "<tr>";

            foreach ($data as $k => $v) {
                echo "<td>";
//            echo "$k : $v<br>";
                if ($k == 'Train') {


                    echo "<a href=\"searchTicket.php?Train={$v}\">$k : $v</a><br>";
                }
                if ($k == 'CarClass'){

                    echo numberSearchCarClass($v);
                }


                if ($k == 'StartDeptime') {
                    $stationN=numberSearchStation($tableName,$stationName,$userQueryStart);
                    echo "Start: {$stationN}<br>";

                    echo "DepTime : $v<br>";
                }
                if ($k == 'DestArrTime') {
                    $stationN=numberSearchStation($tableName,$stationName,$userQueryDest);
                    echo "Dest: {$stationN}<br>";
                    echo "ArrTime : $v<br>";
                }
                echo "</td>";


            }
            echo "</tr>";





        }

        echo "</table>";
    }
    //





}







?>