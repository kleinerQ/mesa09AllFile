<?php
include_once 'sqlTimetable.php';
include_once 'stationRef.php';

ini_set('max_execution_time', 3000);


$sql="drop table seatMap";
$sql2="create table seatMap (TicketId int primary key auto_increment,Train int,StartOrder int, DestOrder int, Seat varchar(10))";
$mysqli->query($sql2);
$sql2="delete from seatMap";
$sql3="insert into seatMap values(1,105,1,2,'A2')";
$sql4="insert into seatMap values(2,105,2,3,'A1')";
$sql5="insert into seatMap values(3,105,3,5,'A3')";
$sql6="insert into seatMap values(4,105,5,15,'A4')";
$sql7="insert into seatMap values(5,105,16,19,'A5')";
$sql8="insert into seatMap values(6,105,8,9,'A6')";
$sql9="insert into seatMap values(7,105,3,9,'A7')";
$sql10="insert into seatMap values(8,105,5,10,'A8')";
$sql11="insert into seatMap values(9,105,15,19,'A9')";
$sql12="insert into seatMap values(10,105,16,17,'A10')";
$sql13="insert into seatMap values(11,105,20,26,'A10')";
$mysqli->query($sql2);
$mysqli->query($sql3);
$mysqli->query($sql4);
$mysqli->query($sql5);
$mysqli->query($sql6);
$mysqli->query($sql7);
$mysqli->query($sql8);
$mysqli->query($sql9);
$mysqli->query($sql10);
$mysqli->query($sql11);
$mysqli->query($sql12);
$mysqli->query($sql13);