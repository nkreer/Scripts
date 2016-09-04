<?php

if(!empty($argv[3])){
	$query = strtoupper($argv[3]);
	$data = json_decode(@file_get_contents("https://raw.githubusercontent.com/HTW-Webtech/KFZ-Kennzeichen/master/data/kennzeichen.json"), true);
	if(isset($data[$query])){
		echo $query." :: ".$data[$query];
	} else {
		$found = false;
		foreach($data as $kfz => $place){
			if(stripos($place, str_replace("_", " ", $query)) !== false){
				$found = true;
				echo $kfz." :: ".$place;
				break;
			}
		}
		if(!$found){
			echo "Keine Ergebnisse";
		}
	}
} else {
	echo "Bitte Suchanfrage übergeben";
}