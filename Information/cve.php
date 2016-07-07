<?php

$query = urlencode($argv[3]);

if($query){
    $data = json_decode(file_get_contents("http://cve.circl.lu/api/cve/".$query), true);
    if(!empty($data)){
        echo $data["vulnerable_configuration"][0]["title"]." :: ";
        if(!empty($data["access"])){
            echo "Complexity: ".$data["access"]["complexity"]." :: ";
        }
        echo "CVSS: ".$data["cvss"]." :: ";
        echo softTrim($data["summary"], 200);
    } else {
        echo "Nothing found";
    }
} else {
    echo "CVE-ID missing";
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