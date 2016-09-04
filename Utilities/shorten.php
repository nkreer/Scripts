<?php

$url = urlencode($argv[3]);

if($url){
    $short = @file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    if($short){
        echo $short;
    } else {
        echo "Error.";
    }
} else {
    echo "URL to shorten is missing";
}