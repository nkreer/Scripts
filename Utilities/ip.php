<?php

if(!empty($argv[3])){
    $ip = gethostbyname($argv[3]);
    if($ip and $ip !== $argv[3]){
        echo $ip;
    } else {
        echo "No IP";
    }
} else {
    echo "Argument 1 missing.";
}