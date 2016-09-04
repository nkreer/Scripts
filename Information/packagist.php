<?php

if($argv[3]){
    $query = urlencode($argv[3]);
    $data = json_decode(@file_get_contents("https://packagist.org/search.json?q=".$query), true);
    if(!empty($data["results"][0])){
        $result = $data["results"][0];
        echo $result["name"]." :: ";
        echo $result["description"]." :: ";
        echo $result["repository"]." :: ";
        echo $result["downloads"]." downloads :: ";
        echo $result["favers"]." favers";
    } else {
        echo "Nothing found";
    }
} else {
    echo "Search query missing";
}