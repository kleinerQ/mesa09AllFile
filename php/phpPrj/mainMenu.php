<?php

include_once  "stationRef.php";
include_once  "sqlTimetable.php";
include_once  "QueryAnswer.php";
session_start();

if (!isset($_SESSION['member'])){
    header('Location:TRAlogin.php');

}

?>

<input type="button" id="searchTicket" name="searchTicket" onclick="location.href = 'showTrain.php'" value="Search & Book Ticket">
<input type="button" id="searchTransfer" name="searchTransfer" onclick="location.href = 'findTransferInfo.php'" value="Search Transfer">
