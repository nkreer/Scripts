<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
    $data = json_decode(file_get_contents("https://itunes.apple.com/search?term=".$query), true);
    if(!empty($data["results"][0])){
        $result = $data["results"][0];
        echo $result["kind"]." :: ";
        echo $result["artistName"]." :: ";
        echo $result["trackName"]." :: ";
        echo ($result["trackPrice"] > 0 ? $result["trackPrice"]." ".$result["currency"] : "Free")." :: ";
        echo $result["primaryGenreName"];
        if(!empty($result["shortDescription"])){
            echo " :: ".$result["shortDescription"];
        }
    } else {
        echo "No results";
    }
} else {
    echo "Search query missing";
}