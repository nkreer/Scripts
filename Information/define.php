<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$word = str_replace("&", "", implode("-", $argv));
$result = json_decode(file_get_contents("http://api.urbandictionary.com/v0/define?term=".$word), true);

if(isset($result["list"][0])){
    $result = $result["list"][0];
    $data = str_replace("\n", " | ", $result["definition"]);
    $link = " [...] <".$result["permalink"].">";
    $definition = $result["word"]." :: ".softTrim($data, 250, $link);
    if($result["thumbs_up"] !== 0 or $result["thumbs_down"] !== 0){
            $definition .= " :: Rating: ".round($result["thumbs_down"] / $result["thumbs_up"] * 10)."% positive";
    }
    echo $definition;
} else {
    echo "Nothing found!";
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