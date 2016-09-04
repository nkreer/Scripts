<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

include_once("src/IRC/Utils/ArgumentParser.php");

$place = implode(" ", $argv);
$parse = IRC\Utils\ArgumentParser::parse($place, ["forecast"]);
$place = $parse["text"];

if(empty($place)){
    exit("Can't get the weather for nowhere.");
}

$yql_query_url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22".urlencode($place)."%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$result = @file_get_contents($yql_query_url);

if($result === null or $result === false){
    echo "Can't reach Yahoo Weather";
} else {
    $result = json_decode($result, true);
    $result = $result["query"];
    if($result["results"] !== null){
        $result = $result["results"]["channel"];
        if(!empty($parse["forecast"])){
            if(isset($result["item"]["forecast"][$parse["forecast"]])){
                $place = $result["location"];
                $result = $result["item"]["forecast"][$parse["forecast"]];
                echo "Weather for ".$place["city"]." -".$place["region"].", ".$place["country"];
                echo " on ".$result["day"].", ".$result["date"]." :: ";
                echo "High: ".fahrenheitCelsius($result["high"])." :: ";
                echo "Low: ".fahrenheitCelsius($result["low"])." :: ";
                echo $result["text"];
            } else {
                echo "No forecast available.";
            }
        } else {
            echo "Weather for ".$result["location"]["city"]." -".$result["location"]["region"].", ".$result["location"]["country"]." :: ";
            echo fahrenheitCelsius($result["item"]["condition"]["temp"])." :: ";
            echo $result["item"]["condition"]["text"]." :: ";
            echo "Wind Speed: ".$result["wind"]["speed"]." ".$result["units"]["speed"]." :: ";
            echo "Humidity: ".$result["atmosphere"]["humidity"]."%";
        }
    } else {
        echo "No weather data for that location";
    }
    echo " :: Powered by Yahoo";
}

function fahrenheitCelsius($value){
    $celsius = 5 / 9 * ($value - 32);
    return round($celsius, 1)."°C";
}