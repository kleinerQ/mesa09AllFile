<?php
include_once 'sqlTimetable.php';
include_once 'stationRef.php';

ini_set('max_execution_time', 3000);



foreach ($tableName as $value){
    $sql = "drop table `{$value}`";
    $mysqli->query($sql);
    $sql = "create table `{$value}` (`Train` int,`OverNightStn` int,`CarClass` int,`Route` int,`Station` int,`Order` int,`DepTime` time,`ArrTime` time, `LineDir` int);";
    echo $sql."<br>";
    $mysqli->query($sql);
}

//$sql2="create table seatMap (TicketId int primary key auto_increment,Train int,StartOrder int, DestOrder int, Seat varchar(10))";
//$mysqli->query($sql2);
//$sql2="delete from seatMap";
//$sql3="insert into seatMap values(1,105,1,2,'A2')";
//$sql4="insert into seatMap values(2,105,2,3,'A1')";
//$sql5="insert into seatMap values(3,105,3,5,'A3')";
//$sql6="insert into seatMap values(4,105,5,15,'A4')";
//$sql7="insert into seatMap values(5,105,16,30,'A5')";
//$sql8="insert into seatMap values(6,105,3,4,'A6')";
//$mysqli->query($sql2);
//$mysqli->query($sql3);
//$mysqli->query($sql4);
//$mysqli->query($sql5);
//$mysqli->query($sql6);
//$mysqli->query($sql7);
//$mysqli->query($sql8);




