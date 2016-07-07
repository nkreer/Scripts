<?php

$user = $argv[2];
for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$content = urlencode(implode(" ", $argv));

if($content){
    $url = "http://dpaste.com/api/v2/";
    $args = "content=".$content."&poster=".$user;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    $response = curl_exec($ch);
    echo $response;
} else {
    echo "Text missing";
}