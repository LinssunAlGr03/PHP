<?php

$site = file_get_contents('https://www.cbr.ru/scripts/XML_daily.asp?date_req=');

$var = json_decode(json_encode(simplexml_load_string($site)), true);

$message = $var['Valute']['10']['Name']. ": ".$var['Valute']['10']['Value']."\n".$var['Valute']['11']['Name'].": ".$var['Valute']['11']['Value'];


$arr = [
    'chat_id' => -849795283,
    'text' => $message
];

$token = "5669889399:AAHSVcGW1ZlNVWl-TUNISnWC_rKXlcbasWA";
$send = "https://api.telegram.org/bot".$token;

$curl = curl_init($send . '/sendMessage');
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, ($arr));
curl_exec($curl);
curl_close($curl);
