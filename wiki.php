<?php

include("src/IRC/ArgumentParser.php");
use IRC\ArgumentParser;

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = ArgumentParser::parse(implode(" ", $argv), ["language"]);

if(empty($query["text"])){
    exit("Search query missing.");
}

$lang = (empty($query["language"]) ? "en" : $query["language"]);
$url = "https://".$lang.".wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=".urlencode($query["text"]);
$data = json_decode(file_get_contents($url), true);

if($data){
    if(!empty($data["query"]["pages"])){
        $articles = $data["query"]["pages"];
        if(count($articles) >= 1){
            foreach($articles as $article){
                $title = $article["title"];
                $text = str_replace("\n", " | ", str_replace("\n\n", "", softTrim($article["extract"], 280, " [...]")));
                if(!empty($text)){
                    echo $title." :: ".$text." :: <https://en.wikipedia.org/wiki/".urlencode($title).">";
                } else {
                    echo "No article found.";
                }
                break;
            }
        } else {
            echo "Nothing found but emptyness.";
        }
    } else {
        echo "Nothing found.";
    }
} else {
    echo "Unexpected error.";
}

/*
 * This code was taken from
 * http://stackoverflow.com/questions/2104653/trim-text-to-340-chars/14896727#14896727
 *
 * All rights belong to it's respective author (Sebastian Hojas)
 */
function softTrim($text, $count, $wrapText = '...'){
    if(strlen($text) > $count){
        preg_match('/^.{0,'.$count.'}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    } else {
        $wrapText = '';
    }
    return $text.$wrapText;
}