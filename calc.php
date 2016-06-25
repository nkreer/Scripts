<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$calc = implode(" ", $argv);
$response = file_get_contents('https://www.calcatraz.com/calculator/api?c='.urlencode($calc));
if($response !== false and $response !== null){
    if(stripos($response, "answer") === false){
        echo $calc." = ".str_replace("  ", "", $response);
    } else {
        echo "Unable to calculate";
    }
} else {
    echo "calcatraz.com is unavailable right now.";
}