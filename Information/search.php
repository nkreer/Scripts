<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$args = implode(" ", $argv);
if(!empty($args)){
    echo str_replace("\n", " | ", queryDDG($args));
} else {
    echo "Missing query";
}

function queryDDG($query){
    $url = "http://api.duckduckgo.com/?format=json&q=".urlencode($query);
    $result = @file_get_contents($url);
    if($result !== false and $result !== null){
        $result = json_decode($result, true);
        if(!empty($result["AbstractText"])){
            return softTrim($result["AbstractText"], 200).(!empty($result["AbstractURL"]) ? " <".$result["AbstractURL"].">" : "");
        } elseif(!empty($result["AbstractURL"])) {
            return $result["AbstractURL"];
        } else {
            return "No information available. Be more precise or try searching yourself: https://duckduckgo.com/?q=".urlencode($query);
        }
    } else {
        return "Can't reach DuckDuckGo.";
    }
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