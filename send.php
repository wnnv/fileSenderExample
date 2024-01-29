<?php

$strFilePath = 'image.png';

$strUrl = 'https://httpbin.org/anything';


$strSecret = 'test_secret_key';

$mixData = file_get_contents($strFilePath);

$strHash = hash_hmac('sha256', $mixData, $strSecret);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $strUrl);

curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, [

    'file' => curl_file_create($strFilePath),
    'hash' => $strHash
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);

curl_close($ch);


echo $response;

?>