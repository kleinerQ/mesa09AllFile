<?php
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