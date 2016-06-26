<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = implode(" ", $argv);

$data = str_ireplace(["warnWetter.loadWarnings(", ");"], ["", ""], file_get_contents("http://www.dwd.de//DWD/warnungen/warnapp/json/warnings.json"));
$data = json_decode($data, true);

if(empty($query)){
	echo "Aktuell ".count($data["warnings"])." Wetterwarnungen";
} else {
	$warn = ["percentage" => 0, "place" => "Nowhere", "warning" => "Keine Wetterwarnung", "instruction" => "Bleiben Sie cool!"];
	foreach($data["warnings"] as $warning){
		similar_text($warning[0]["regionName"], $query, $percentage);
		if($percentage > $warn["percentage"]){
			$warn["place"] = $warning[0]["regionName"];
			$warn["warning"] = $warning[0]["headline"];
			$warn["description"] = $warning[0]["description"];
			$warn["start"] = $warning[0]["start"] / 1000;
			$warn["end"] = $warning[0]["end"] / 1000;#
			$warn["percentage"] = $percentage;
		}
		if($percentage === 100){
			break; //Cancel loop, we have an exact result
		}
	}
	echo $warn["place"]." :: ";
	echo $warn["warning"]." :: ";
	echo date("d.m.y H:i:s", $warn["start"]).($warn["end"] ? " - ".date("d.m.y H:i:s", $warn["end"]) : "");
	echo " :: ".$warn["description"];
}