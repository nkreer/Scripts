<?php

//This script is made for people living in germany, so string are in Deutsch.
include_once("src/IRC/Utils/ArgumentParser.php");
use IRC\Utils\ArgumentParser;

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$check = ["warnings", "vorabInformation"];
$query = implode(" ", $argv);
$parse = ArgumentParser::parse($query, ["warning"]);

$data = str_ireplace(["warnWetter.loadWarnings(", ");"], ["", ""], @file_get_contents("http://www.dwd.de//DWD/warnungen/warnapp_landkreise/json/warnings.json"));
$data = json_decode($data, true);

if(empty($parse["text"])){
    echo "Aktuell ".count($data["warnings"])." amtliche Wetterwarnungen und ".count($data["vorabInformation"])." Vorabinformationen";
} else {
    if(empty($parse["warning"])){
        $wn = 0;
    } else {
        $wn = (int)$parse["warning"] - 1;
    }
    foreach($check as $info){
        $warn = [];
        foreach($data[$info] as $warning){
            if(stripos($warning[$wn]["regionName"], $parse["text"]) !== false){
                $warn["warnings"] = count($warning);
                $warn["place"] = $warning[$wn]["regionName"];
                $warn["state"] = $warning[$wn]["stateShort"];
                $warn["warning"] = $warning[$wn]["event"];
                $warn["description"] = $warning[$wn]["description"];
                $warn["start"] = $warning[$wn]["start"] / 1000;
                $warn["end"] = $warning[$wn]["end"] / 1000;
                break;
            }
        }
        if(!empty($warn)){
            echo ($wn + 1)."/".$warn["warnings"]." Warnungen :: ";
            echo $warn["place"].", ".$warn["state"]." :: ";
            echo $warn["warning"]." :: ";
            echo date("d.m.y H:i:s e", $warn["start"]).($warn["end"] ? " - ".date("d.m.y H:i:s e", $warn["end"]) : "");
            echo " :: ".$warn["description"];
            break;
        } elseif($info === $check[1]){
            echo "Aktuell liegt keine Wetterwarnung oder Vorabinformation für diesen Ort vor.";
        }
    }
}