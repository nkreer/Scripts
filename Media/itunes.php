<?php

include_once("src/IRC/Utils/ArgumentParser.php");
use IRC\Utils\ArgumentParser;

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$info = ArgumentParser::parse(implode(" ", $argv), ["country"]);
$query = urlencode($info["text"]);
if(!empty($info["country"])){
    $country = urlencode($info["country"]);
} else {
    $country = "US";
}

if($query){
    $data = json_decode(@file_get_contents("https://itunes.apple.com/search?limit=1&country=".$country."&term=".$query), true);
    if(!empty($data["results"][0])){
        $result = $data["results"][0];
        echo $result["kind"]." :: ";
        echo $result["artistName"]." :: ";
        echo $result["trackName"]." :: ";
        echo ($result["trackPrice"] > 0 ? $result["trackPrice"]." ".$result["currency"] : "Free")." :: ";
        echo $result["country"]." :: ";
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