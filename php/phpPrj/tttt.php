<?php
include_once 'sqlTimetable.php';
include_once 'stationRef.php';

ini_set('max_execution_time', 3000);



//foreach ($tableName as $value){
//    $sql = "drop table `{$value}`";
//    $mysqli->query($sql);
//    $sql = "create table `{$value}` (`Train` int,`OverNightStn` int,`CarClass` int,`Route` int,`Station` int,`Order` int,`DepTime` time,`ArrTime` time, `LineDir` int);";
//    echo $sql."<br>";
//    $mysqli->query($sql);
//}

$sql="create table member (`id` int,`memberName` varchar(100),`account` varchar(100),`password` varchar(256),`icon` blob)";
$mysqli->query($sql);