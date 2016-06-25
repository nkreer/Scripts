<?php

$one = (!empty($argv[3]) ? $argv[3] : false);
$two = (!empty($argv[4]) ? $argv[4] : false);
$mode = (!empty($argv[5]) ? $argv[5] : "driving");

if(!$one or !$two){
    echo "Missing places";
} else {
    $distance = getDistance($one, $two, $mode);
    if($distance){
        echo $distance;
    } else {
        echo "Unable to find a route.";
    }
}

function getDistance($one, $two, $mode = "driving"){
    $link = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".urlencode($one)."&destinations=".urlencode($two)."&language=en-GB&sensor=false&mode=".urlencode($mode);
    $file = file_get_contents($link);
    file_put_contents("test.json", $file);
    if($file !== null and $file !== false){
        $file = json_decode($file, true);
        if($file["status"] === "OK"){
            foreach($file["rows"] as $row){
                foreach($row["elements"] as $element){
                    $text = "";
                    if(!empty($file["destination_addresses"]) and !empty($file["origin_addresses"])){
                        $text .= $file["destination_addresses"][0]." to ".$file["origin_addresses"][0].": ";
                    }
                    if(!empty($element["distance"])){
                        $text .= $element["distance"]["text"];
                        $text .= " (approx. ".$element["duration"]["text"]." of ".$mode.")";
                    } else {
                        $text .= "Unable to find a route.";
                    }
                    return $text;
                }
            }
        }
    }
    return false;
}
