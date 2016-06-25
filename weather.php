<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

include_once("src/IRC/ArgumentParser.php");

$place = implode(" ", $argv);
$parse = IRC\ArgumentParser::parse($place, ["forecast"]);
$place = $parse["text"];

$yql_query_url = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22".urlencode($place)."%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";

$result = file_get_contents($yql_query_url);

if($result === null or $result === false){
    echo "Can't reach Yahoo Weather";
} else {
    $result = json_decode($result, true);
    $result = $result["query"];
    if($result["results"] !== null){
        $result = $result["results"]["channel"];
        if(!empty($parse["forecast"])){
            if(isset($result["item"]["forecast"][$parse["forecast"]])){
                $unit = $result["units"]["temperature"];
                $result = $result["item"]["forecast"][$parse["forecast"]];
                $text = "Weather on ".$result["day"].", ".$result["date"]." :: ";
                $text .= "High: ".getTemperature($result["high"], $unit);
                $text .= " :: Low: ".getTemperature($result["low"], $unit);
                $text .= " :: ".$result["text"];
            } else {
                $text = "No forecast available.";
            }
        } else {
            $text = "Weather for ".$result["location"]["city"]." -".$result["location"]["region"].", ".$result["location"]["country"].
                    " :: ".getTemperature($result["item"]["condition"]["temp"], $result["units"]["temperature"]);
            $text .= " :: ".$result["item"]["condition"]["text"]." :: Wind Speed: ".
            $result["wind"]["speed"]." ".$result["units"]["speed"]." :: Humidity: ".$result["atmosphere"]["humidity"]."%";
        }
        echo $text;
    } else {
        echo "No weather data for that location";
    }
}

function getTemperature($temp, $unit){
    switch($unit){
        case 'F':
            return $temp."°F / ".round(fahrenheitCelsius($temp), 1)."°C";
            break;
        default:
            return $temp."°C / ".round(celsiusFahrenheit($temp), 1)."°F";
            break;
    }
}

function fahrenheitCelsius($value){
    $celsius = 5 / 9 * ($value - 32);
    return $celsius;
}

function celsiusFahrenheit($value){
    $fahrenheit = $value * 9 / 5 + 32;
    return $fahrenheit;
}