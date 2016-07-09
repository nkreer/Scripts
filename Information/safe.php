<?php

if($argv[3]){
    $data = file_get_contents("https://www.google.com/safebrowsing/diagnostic?output=jsonp&site=".urlencode($argv[3]));
    if(strpos($data, '"listed"')){
        echo "That URL looks suspicious";
    } else {
        echo "That URL looks alright";
    }
} else {
    echo "URL missing";
}