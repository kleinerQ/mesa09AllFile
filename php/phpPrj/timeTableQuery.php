<?php
    include_once 'sqlTimetable.php';
    include_once "QueryAnswer.php";
    include_once 'stationRef.php';
    if(isset($_REQUEST['usr_time'])){
        echo $_REQUEST['usr_time'];

    }
    if(isset($_REQUEST['userQueryStart']) && isset($_REQUEST['userQueryDest']) && isset($_REQUEST['userQueryTime'])) {
        $userQueryStart = $_REQUEST['userQueryStart']; //1008
        $userQueryDest = $_REQUEST['userQueryDest'];    //1319
        $userQueryTransfer = $_REQUEST['userQueryTransfer'];    //1319
        $userQueryTime = $_REQUEST['userQueryTime'] . ':00';//10:00:00

//        $sql = "select * from`{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`Train`=`{$userQueryDest}`.`Train` and `{$userQueryStart}`.`DepTime` < `{$userQueryDest}`.`DepTime` and `{$userQueryStart}`.`LineDir`=`{$userQueryDest}`.`LineDir` order by `{$userQueryStart}`.`DepTime`;";
//        $sql = "select `{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`Train`,`{$userQueryStart}`.`DepTime`,`{$userQueryDest}`.`ArrTime` from`{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`Train`=`{$userQueryDest}`.`Train` and `{$userQueryStart}`.`DepTime` < `{$userQueryDest}`.`DepTime` and `{$userQueryStart}`.`LineDir`=`{$userQueryDest}`.`LineDir` order by `{$userQueryStart}`.`DepTime`;";

        //$sql = "select `{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`Train`,`{$userQueryStart}`.`DepTime`,`{$userQueryDest}`.`ArrTime` from`{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`Train`=`{$userQueryDest}`.`Train` and `{$userQueryStart}`.`DepTime` < `{$userQueryDest}`.`DepTime` and `{$userQueryStart}`.`LineDir`=`{$userQueryDest}`.`LineDir` and `{$userQueryStart}`.`DepTime`>'{$userQueryTime}' order by `{$userQueryStart}`.`DepTime`;";

        // OK $sql = "select `{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`Train`,`{$userQueryStart}`.`DepTime`,`{$userQueryDest}`.`ArrTime` from`{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`Train`=`{$userQueryDest}`.`Train` and `{$userQueryStart}`.`Order` < `{$userQueryDest}`.`Order` and `{$userQueryStart}`.`LineDir`=`{$userQueryDest}`.`LineDir` and `{$userQueryStart}`.`DepTime`>'{$userQueryTime}' order by `{$userQueryStart}`.`DepTime`;";

        $sql = "select `{$userQueryStart}`.`CarClass`,`{$userQueryStart}`.`Train`,`{$userQueryStart}`.`DepTime`,`{$userQueryTransfer}`.`ArrTime` from`{$userQueryStart}`,`{$userQueryTransfer}` where `{$userQueryStart}`.`Train`=`{$userQueryTransfer}`.`Train` and `{$userQueryStart}`.`Order` < `{$userQueryTransfer}`.`Order` and `{$userQueryStart}`.`LineDir`=`{$userQueryTransfer}`.`LineDir` and `{$userQueryStart}`.`DepTime`>'{$userQueryTime}' order by `{$userQueryStart}`.`DepTime`;";
        $sql2 = "select `{$userQueryTransfer}`.`CarClass`,`{$userQueryTransfer}`.`Train`,`{$userQueryTransfer}`.`DepTime`,`{$userQueryDest}`.`ArrTime` from`{$userQueryTransfer}`,`{$userQueryDest}` where `{$userQueryTransfer}`.`Train`=`{$userQueryDest}`.`Train` and `{$userQueryTransfer}`.`Order` < `{$userQueryDest}`.`Order` and `{$userQueryTransfer}`.`LineDir`=`{$userQueryDest}`.`LineDir` and `{$userQueryTransfer}`.`DepTime`>'{$userQueryTime}' order by `{$userQueryTransfer}`.`DepTime`;";
//        $sql="select * from `{$userQueryStart}`";

        echo $sql. "<br>";


        $result = $mysqli->query($sql2);
        //$result2= $mysqli->query($sql2);

        if($result){

            while ($data = $result->fetch_object("QueryAnswer")) {


                foreach ($data as $k => $v) {
                    if($k=='CarClass'  && substr($v,0,3)=='110') {

                        echo "$k : 自強 <br/>";
                    }else if($k=='CarClass'  && substr($v,0,3)=='111'){

                        echo "$k : 莒光 <br/>";
                    }else if($k=='CarClass'  && substr($v,0,3)=='112'){

                        echo "$k : 復興 <br/>";
                    }else if($k=='CarClass'  && substr($v,0,3)=='113'){

                        echo "$k : 區間 <br/>";
                    }else if($k=='CarClass'  && substr($v,0,3)=='114'){


                        echo "$k : 普快 <br/>";
                    }else{

                        echo "$k : $v <br/>";
                    }


                }

                echo "<hr>";
            }

        }else{

            echo "No Match";
        }

    }

    ?>
<form>

    Start:
    <?php
        echo "<select name='userQueryStart'>";
        foreach($stationName as $key => $value){

            echo "<option value='{$tableName[$key]}'>$value</option>";


        }


        echo "</select>";
    ?>




<!--<input name="userQueryStart"/><br>-->


    TransferStation:
    <?php
    echo "<select name='userQueryTransfer'>";
    foreach($stationName as $key => $value){

        echo "<option value='{$tableName[$key]}'>$value</option>";


    }


    echo "</select>";
    ?>


Destination:
    <?php
    echo "<select name='userQueryDest'>";
    foreach($stationName as $key => $value){

        echo "<option value='{$tableName[$key]}'>$value</option>";


    }


    echo "</select>";
    ?>


<!--<input name="userQueryDest"/><br>-->

Time:
<input type="time" name="userQueryTime" required>
<!--<input name="userQueryTime"/><br>-->




<input type="submit" value="Enter"/>

</form>


<!--//select the same route train-->
<!--mysql> select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`,`1008`.`DepTime`,`1319`.`ArrTime` from `1001`,`1008`,`1319` where `1001`.`DepTime`<`1008`.`DepTime` and `1008`.`DepTime` < `1319`.`DepTime` and `1001`.`DepTime`>'12:00:00' and `1001`.`Train`=`1008`.`Train` and `1008`.`Train`= `1319`.`Train` order by `1001`.`DepTime`;-->