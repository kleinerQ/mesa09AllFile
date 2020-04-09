<?php


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





$cont = file_get_contents("{$todayDate}.json");
//var_dump($cont);
//    $obj1 = new MyTest2(1,2,3);
//    foreach ($obj1 as $k => $v){
//        echo "{$k} : {$v}<br>";
//    }




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



//mysql> create table `1002` (`Train` int,`OverNightStn` int,`CarClass` int,`Route` int,`Station` int,`Order` int,`DepTime` time,`ArrTime` time, `LineDir` int);
//mysql> select * from`1008`,`1319` where `1008`.`Train`=`1319`.`Train` and `1008`.`DepTime` < `1319`.`DepTime` and `1008`.`LineDir`=`1319`.`LineDir` order by `1008`.`DepTime`;


//Type : 0
//Train : 101
//BreastFeed : Y
//Route :
//Package : N
//OverNightStn : 0
//LineDir : 1
//Line : 1
//Dinning : N
//Cripple : Y
//CarClass : 1108
//Bike : N
//Note : 每日行駛。
//NoteEng : Runs Daily.Accessible Car.
//
//Notice: Array to string conversion in /Applications/MAMP/htdocs/inputJSONData.php on line 58
//TimeInfos : Array



//OverNightStn : 0
//LineDir : 1
//Train : 101
//Route :
//Station : 1319
//Order : 1
//DepTime : 05:42:00
//ArrTime : 05:40:00


//1008-台北-Taipei
//1319-台中-Taichung