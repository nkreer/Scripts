<?php

//This script is made for people living in germany, so string are in Deutsch.

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$check = ["warnings", "vorabInformation"];
$query = implode(" ", $argv);

$data = str_ireplace(["warnWetter.loadWarnings(", ");"], ["", ""], file_get_contents("http://www.dwd.de//DWD/warnungen/warnapp/json/warnings.json"));
$data = json_decode($data, true);

if(empty($query)){
    echo "Aktuell ".count($data["warnings"])." amtliche Wetterwarnungen und ".count($data["vorabInformation"])." Vorabinformationen";
} else {
    foreach($check as $info){
        $warn = [];
        foreach($data[$info] as $warning){
            if(stripos($warning[0]["regionName"], $query) !== false){
                $warn["place"] = $warning[0]["regionName"];
                $warn["warning"] = $warning[0]["event"];
                $warn["description"] = $warning[0]["description"];
                $warn["start"] = $warning[0]["start"] / 1000;
                $warn["end"] = $warning[0]["end"] / 1000;#
                break;
            }
        }
        if(!empty($warn)){
            echo $warn["place"]." :: ";
            echo $warn["warning"]." :: ";
            echo date("d.m.y H:i:s", $warn["start"]).($warn["end"] ? " - ".date("d.m.y H:i:s", $warn["end"]) : "");
            echo " :: ".$warn["description"];
            break;
        } elseif($info === $check[1]){
            echo "Aktuell liegen keine Wetterwarnungen oder Vorabinformationen für diesen Ort vor.";
        }
    }
    
}