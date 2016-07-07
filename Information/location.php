<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
    $data = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$query."&sensor=true"), true);
    if(!empty($data["results"][0]) and $data["status"] === "OK"){
        $data = $data["results"][0];
        echo $data["formatted_address"]." :: ";
        echo "Latitude: ".$data["geometry"]["location"]["lat"]." :: ";
        echo "Longitude: ".$data["geometry"]["location"]["lng"];
    } else {
        echo "Can't find that place";
    }
} else {
    echo "Search query missing";
}