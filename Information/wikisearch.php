<?php

include("src/IRC/Utils/ArgumentParser.php");
use IRC\Utils\ArgumentParser;

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = ArgumentParser::parse(implode(" ", $argv), ["language"]);

if(empty($query["text"])){
    exit("Search query missing.");
}

$lang = (empty($query["language"]) ? "en" : $query["language"]);
$url = "https://".$lang.".wikipedia.org/w/api.php?action=query&list=search&srsearch=".urlencode($query["text"])."&utf8=&format=json";
$data = json_decode(@file_get_contents($url), true);

if($data){
    if(!empty($data["query"]["search"])){
        $articles = $data["query"]["search"];
        $count = 1;
        echo count($articles)." Results :: ";
        foreach($articles as $article){
            echo $article["title"];
            $count++;
            if($count >= 5){
                break;
            } else {
                echo " :: ";
            }
        }
    } else {
        echo "Error :: The search didn't return any results";
    }
} else {
    echo "Error :: Wikipedia seems to be down";
}