<?php
    include_once "sqlTimetable.php";
    include_once "QueryAnswer.php";
    include_once "stationRef.php";


if(isset($_REQUEST['userQueryStart']) && isset($_REQUEST['userQueryDest']) && isset($_REQUEST['userQueryTime'])){

        $userQueryStart = $_REQUEST['userQueryStart']; //1008
        $userQueryDest = $_REQUEST['userQueryDest'];    //1319
        $userQueryTime = $_REQUEST['userQueryTime'] . ':00';//10:00:00
        $sql1="select `{$userQueryStart}`.`Train`,`{$userQueryStart}`.`Order` as `StartOrder`,`{$userQueryDest}`.`Order` as `DestOrder` from `{$userQueryStart}`,`{$userQueryDest}` where `{$userQueryStart}`.`DepTime` > '{$userQueryTime}' and `{$userQueryStart}`.`ArrTime` < `{$userQueryDest}`.`DepTime` and `{$userQueryStart}`.`Order`< `{$userQueryDest}`.`Order` and `{$userQueryStart}`.`Train`= `{$userQueryDest}`.`Train` order by `{$userQueryStart}`.`DepTime`";
        //echo $sql1;
///$sql="select `1001`.`Train`,`1001`.`DepTime`,`1008`.`ArrTime`,`1008`.`Train`from `1001`,`1008` where (`1001`.`DepTime`<`1008`.`DepTime` and `1001`.`DepTime`>'12:01:00' and `1001`.`Train`=`1008`.`Train`) order by `1001`.`DepTime`";
//        echo $sql1 ."<br>";

        $result2=$mysqli->query($sql1);
        if($result2->num_rows>0) {

            $data = $result2->fetch_object("QueryAnswer");
//            var_dump($data);
            foreach ($data as $k => $v) {

//            echo "$k : $v<br>";
                if ($k == 'Train') {

                    $queryTrain = $v;
                echo "$k : $v<br>";
                }
                if ($k == 'StartOrder') {
                    $startOrder = $v;
                echo "$k : $v<br>";
                }
                if ($k == 'DestOrder') {
                    $destOrder = $v;
                echo "$k : $v<br>";
                }


            }
        }
        //


    $queryTrain = 105;
    $startOrder =15 ;
    $destOrder =29 ;
    echo "Train: {$queryTrain}<br> Start: {$startOrder} <br> Dest: {$destOrder}<hr>";





    function searchTicket($queryTrain,$startOrder,$destOrder,$mysqli){


        $searchFlag=false;
        while (!$searchFlag) {


            //fullMatch- only fetch one object
            $sql = "select * from seatMap where `StartOrder`='{$startOrder}' and `DestOrder`='{$destOrder}' and `Train`='{$queryTrain}'";
            $result = $mysqli->query($sql);

            if($result->num_rows>0) {
                $data = $result->fetch_object("QueryAnswer");

                foreach ($data as $k => $v) {

                    echo "{$k} : {$v} OK1<br>";
                }
                echo "<hr>";


                $sqlDelete = "delete from seatMap where TicketId={$data->TicketId}";
                $mysqli->query($sqlDelete);
                $searchFlag=true;
                continue;
            }




            //overMatch only fetch one object
            $sql = "select * from seatMap where `StartOrder`<='{$startOrder}' and `DestOrder`>='{$destOrder}' and `Train`='{$queryTrain}' ";
            $result = $mysqli->query($sql);

            if($result->num_rows>0) {
                    $data = $result->fetch_object("QueryAnswer");

                    foreach ($data as $k => $v) {

                        echo "{$k} : {$v} OK2<br>";
                    }
                    $sqlDelete = "delete from seatMap where TicketId={$data->TicketId}";
                    $mysqli->query($sqlDelete);

                    echo 'OK22';
                    $sqlAdd = "insert into `seatMap` (`Train`,`StartOrder`,`DestOrder`,`Seat`) values({$queryTrain},{$data->StartOrder},{$startOrder},'{$data->Seat}'),
                                                                                                     ({$queryTrain},{$destOrder},{$data->DestOrder},'{$data->Seat}')";

                    $mysqli->query($sqlAdd);
                    echo "<hr>";


                $searchFlag=true;
                continue;


            }




            // the range cross either StartOrder or DestOrder

            // contain lower bounder

            $sql = "select *,(`DestOrder`-GREATEST(`StartOrder`,{$startOrder})) as `OrderDiff` from seatMap where `StartOrder`<'{$startOrder}' and `DestOrder`>'{$startOrder}' and `Train`='{$queryTrain}' order by `OrderDiff` DESC ";

            $result = $mysqli->query($sql);
            if($result->num_rows>0){

                $data1 = $result->fetch_object("QueryAnswer");

//            foreach ($data1 as $k => $v) {
//
//                echo "{$k} : {$v} OK3<br>";
//            }
//
//            echo "<hr>";



//            var_dump($data1);



            }



            // contain upper bounder


            $sql = "select *,(least(`DestOrder`,{$destOrder})-`StartOrder`) as `OrderDiff` from seatMap where `StartOrder`<'{$destOrder}' and `DestOrder`>'{$destOrder}'  and `Train`='{$queryTrain}' order by `OrderDiff` DESC ";
            $result2 = $mysqli->query($sql);
            if($result2->num_rows>0){

                $data2 = $result2->fetch_object("QueryAnswer");

//            foreach ($data2 as $k => $v) {
//
//                echo "{$k} : {$v} OK4<br>";
//            }
//
//            echo "<hr>";



            }




            // between bounder

            $sql = "select *,(`DestOrder`-`StartOrder`) as `OrderDiff` from seatMap where `StartOrder`>='{$startOrder}' and `DestOrder`<='{$destOrder}'  and `Train`='{$queryTrain}' order by `OrderDiff` DESC ";
            $result3 = $mysqli->query($sql);
            if($result3->num_rows>0) {
                $data3 = $result3->fetch_object("QueryAnswer");

//                foreach ($data3 as $k => $v) {
//
//                    echo "{$k} : {$v} OK4<br>";
//                }
//
//                echo "<hr>";


            }



            //compare OrderDiff choose the largest one
            if(!isset($data1) && !isset($data2) && !isset($data3)){
                $searchFlag=true;

                continue;

            }

            if(!isset($data1)){
                $data1=new QueryAnswer;
                $data1->OrderDiff=0;
//                echo 'OK33';
            }

            if(!isset($data2)){
                $data2=new QueryAnswer;
                $data2->OrderDiff=0;
//                echo 'OK34';
            }

            if(!isset($data3)){
                $data3=new QueryAnswer;
                $data3->OrderDiff=0;
//                echo 'OK35';
            }

            $dataTmp=$data1->OrderDiff >= $data2->OrderDiff ? $data1 : $data2;
            $data   =$dataTmp->OrderDiff >= $data3->OrderDiff? $dataTmp: $data3;


            foreach ($data as $k => $v) {

                echo "{$k} : {$v} OK5<br>";

            }


            if($data->StartOrder <= $startOrder){    //contain lower bounder
                echo 'OK10';

                if($data->StartOrder == $startOrder){
                    $sqlDelete="delete from seatMap where TicketId={$data->TicketId}";
                    $mysqli->query($sqlDelete);

                }else{
                    echo 'OK21';
                    $sqlAdd=$sqlAdd = "insert into `seatMap` (`Train`,`StartOrder`,`DestOrder`,`Seat`) values({$queryTrain},{$data->StartOrder},{$startOrder},'{$data->Seat}')";
                    $mysqli->query($sqlAdd);
                }



                searchTicket($queryTrain,$data->DestOrder,$destOrder,$mysqli);
                $searchFlag=true;
                continue;

            }else if($data->DestOrder >= $destOrder){   // contaion upper bounder

                if($data->DestOrder == $destOrder){
                    $sqlDelete="delete from seatMap where TicketId={$data->TicketId}";
                    $mysqli->query($sqlDelete);


                }else{
                    echo 'OK20';
                    $sqlAdd=$sqlAdd = "insert into `seatMap` (`Train`,`StartOrder`,`DestOrder`,`Seat`) values({$queryTrain},{$destOrder},{$data->DestOrder},'{$data->Seat}')";
                    echo $sqlAdd;
                    $mysqli->query($sqlAdd);

                }

                echo 'OK11';


                $sqlDelete="delete from seatMap where TicketId={$data->TicketId}";
                $mysqli->query($sqlDelete);
                echo "searchTicket($queryTrain,$startOrder,$data->StartOrder,aa);";
                searchTicket($queryTrain,$startOrder,$data->StartOrder,$mysqli);
                $searchFlag=true;
                continue;

            }else{                    //within bounder
                echo 'OK12';

                $sqlDelete="delete from seatMap where TicketId={$data->TicketId}";
                $mysqli->query($sqlDelete);


                searchTicket($queryTrain,$startOrder,$data->StartOrder,$mysqli);
                searchTicket($queryTrain,$data->DestOrder,$destOrder,$mysqli);
                $searchFlag=true;
                continue;

            }





        }


    }

    searchTicket($queryTrain,$startOrder,$destOrder,$mysqli);


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
