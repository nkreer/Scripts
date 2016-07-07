<?php

$category = (!empty($argv[3]) ? urlencode($argv[3]) : "inspire");
$quote = json_decode(file_get_contents("http://quotes.rest/qod.json?category=".$category), true);

if($quote){
    $quote = $quote["contents"]["quotes"][0];
    echo $quote["quote"];
    echo " - ".$quote["author"];
} else {
    echo "Can't find a quote";
}