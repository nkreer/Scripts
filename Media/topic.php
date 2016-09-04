<?php

if(!empty($argv[3])){
    $set = $argv[3];
} else {
    $set = 1;
}

$data = json_decode(@file_get_contents("http://hawttrends.appspot.com/api/terms/"), true);
if(!empty($data[$set])){
    echo "Trending topic: ".$data[$set][array_rand($data[$set])];
} else {
    echo "No hot topics.";
}