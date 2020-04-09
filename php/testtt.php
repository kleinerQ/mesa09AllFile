<?php
$start = microtime(true);
$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'timetable'); //连接耗时仅为0.0025秒.
//$mysqli = new mysqli('localhost', 'root', 'root', 'timetable'); //连接耗时超过1秒,比正常慢了400倍.
echo microtime(true) - $start;

