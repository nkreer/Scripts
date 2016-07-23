<?php

if(!empty($argv[3])){
    $url = $argv[3];
    if(!filter_var($url, FILTER_VALIDATE_URL) === false){
        pingPage($url);
    } else {
        echo "Invalid URL.";
    }
} else {
    echo "Please supply a URL to test.";
}

function pingPage($url){
    $ch = curl_init();
    $uagent = "StatusBot/1.0";

    curl_setopt($ch, CURLOPT_USERAGENT, $uagent);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_exec($ch);

    $result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($result >= 200 and $result < 400){
        echo "Page is UP :: Ping: ".curl_getinfo($ch, CURLINFO_CONNECT_TIME);
    } else {
        echo "Page seems to be DOWN";
    }
        
    curl_close($ch);
}