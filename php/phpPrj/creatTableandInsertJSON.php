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
$sql = "drop table `member`";
$mysqli->query($sql);
$sql="create table member (`id` int primary key auto_increment,`memberName` varchar(100),`account` varchar(100),`password` varchar(256),`icon` blob)";
$mysqli->query($sql);


$sql2="create table seatMap (TicketId int primary key auto_increment,Train int,StartOrder int, DestOrder int, Seat varchar(10))";
$mysqli->query($sql2);
$sql2="delete from seatMap";
$sql3="insert into seatMap values(1,105,1,2,'A2')";
$sql4="insert into seatMap values(2,105,2,3,'A1')";
$sql5="insert into seatMap values(3,105,3,5,'A3')";
$sql6="insert into seatMap values(4,105,5,15,'A4')";
$sql7="insert into seatMap values(5,105,16,30,'A5')";
$sql8="insert into seatMap values(6,105,3,4,'A6')";

$mysqli->query($sql2);
$mysqli->query($sql3);
$mysqli->query($sql4);
$mysqli->query($sql5);
$mysqli->query($sql6);
$mysqli->query($sql7);
$mysqli->query($sql8);




include_once 'Stationcar.php';
include_once 'sqlTimetable.php';
ini_set('max_execution_time', 30000);

date_default_timezone_set("Asia/Taipei");
$todayDate=date("Ymd");
$url="http://163.29.3.98/json/{$todayDate}.zip";

$zipFile = "./zipfile.zip"; // Local Zip File Path

$zipResource = fopen($zipFile, "w");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_FAILONERROR, true);

curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_AUTOREFERER, true);

curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);

curl_setopt($ch, CURLOPT_TIMEOUT, 10);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_FILE, $zipResource);

$page = curl_exec($ch);

if(!$page) {

    echo "Error :-: ".curl_error($ch);

}

curl_close($ch);


$zip = new ZipArchive;

$extractPath = "./";

if($zip->open($zipFile) != "true"){

    echo "Error :- Unable to open the Zip File";

}

$zip->extractTo($extractPath);

$zip->close();





//var_dump($cont);
//    $obj1 = new MyTest2(1,2,3);
//    foreach ($obj1 as $k => $v){
//        echo "{$k} : {$v}<br>";
//    }



$cont = file_get_contents("{$todayDate}.json");

$root = json_decode($cont);

//var_dump($root);
foreach($root as $k=>$v){
    //infos
    foreach($v as $kk => $vv){
        //car info
        foreach ($vv as $kkk => $vvv){

//            if(is_array($vvv)){
//
//                foreach ($vvv as $field=> $info){
////                        foreach ($vvvv as $kkkkk =>$vvvvv){
////                                echo "$kkkkk : $vvvvv <br>";
//                            $stopInfo=new StopInfo();
//                            $stopInfo=$info;
//
//                            echo "Station:{$stopInfo->station}" .":".$stopInfo->ArrTime."<br>";
////                        }
//
//                }
//
//            }

        }



//        echo "<hr>";
    }

}


$stationCar= new StationCar(); //$stationCar is a obj with Carclass and train two attributes


foreach ($root as $k=> $totalCarInfoArray) {
    //$root is a object within only one array - $totalCarInfoArray[910]
    foreach ($totalCarInfoArray as $carSerial =>$carInfos){
        //$carInfo is Car object with 15 attributes


        foreach ($carInfos as $infoField=> $vvv){
//            echo "$infoField : $vvv <br>";
            //only when $infoField == 'Timeinfos' , $vvv would be array with station objects

            if ($infoField=='CarClass' || $infoField=='Train' || $infoField=='LineDir' || $infoField=='OverNightStn'){
//                echo "$infoField : $vvv <br>";
                $stationCar->$infoField=$vvv;
            }

//            var_dump($stationCar);
//            echo "<hr/>";


            if($infoField=='TimeInfos'){
//                echo gettype($vvv);
                foreach($vvv as $stationInfo){
                    //$stationInfo is a object with 5 attributes
                    //create a new object with 2 more attribute- train no & carClass
//                    $stationCar = $stationInfo;

                    //merge two obj $station_merged is a combined object with 7 attributes
                    $station_mergedObj = (object) array_merge((array) $stationInfo, (array) $stationCar);
//                    var_dump($station_mergedObj);
//                    echo "<hr/>";
                    foreach($station_mergedObj as $stationField =>$stationValue){

                        //compare time tag
                        $stationUserQuery=$station_mergedObj->Station;
                        $timeUserQuery= new DateTime('00:00:00');
                        $timeSearchTarget= new DateTime($station_mergedObj->DepTime);

                        if($station_mergedObj->Station==$stationUserQuery && ($timeSearchTarget>=$timeUserQuery )){
//                            echo "$stationField : $stationValue <br>";



                            $sql ="insert into `{$stationUserQuery}` (`Route`,`Station`,`Order`,`DepTime`,
                                                       `ArrTime`,`Train`,`CarClass`,`LineDir`,`OverNightStn`) 
                                         values('$station_mergedObj->Route',
                                                '$station_mergedObj->Station',
                                                '$station_mergedObj->Order',
                                                '$station_mergedObj->DepTime',
                                                '$station_mergedObj->ArrTime',
                                                '$station_mergedObj->Train',
                                                '$station_mergedObj->CarClass',
                                                '$station_mergedObj->LineDir',
                                                '$station_mergedObj->OverNightStn')";
//                            echo $sql."<br>";

                            $mysqli->query($sql);
//                            echo "$station_mergedObj->Train<br>";

                            break;
                        }



//
                    }

//                    echo "<hr>";
                }
//                echo "<hr>";
            }


        }
        echo "<hr/>";
    }
//    echo "<hr/>";

}