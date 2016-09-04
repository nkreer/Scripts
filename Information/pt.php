<?php

if($argv[3]){
	$search = strtolower($argv[3]);
	$data = json_decode(@file_get_contents("https://raw.githubusercontent.com/Bowserinator/Periodic-Table-JSON/master/PeriodicTableJSON.json"), true);
	$found = false;
	foreach($data as $element => $info){
		if($search === strtolower($element) or strtolower($info["symbol"]) === $search or $search === $info["number"]){
			echo $element." :: ";
			echo $info["symbol"]." :: ";
			echo $info["number"]." :: ";
			echo "Density: ".$info["density"]." :: ";
			echo "Mass: ".$info["atomic_mass"]." u :: ";
			echo $info["phase"]." :: ";
			echo "Period: ".$info["period"]." :: ";
			echo "Melting temperature: ".$info["melt"]." :: ";
			echo "Boiling temperature: ".$info["boil"];
			$found = true;
			break;
		}
	}
	if(!$found){
		echo "Nothing found";
	}
} else {
	echo "Search query missing";
}