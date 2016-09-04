<?php

if(!empty($argv[3]) and !empty($argv[4])){
	if(is_numeric($argv[3]) and is_numeric($argv[4])){
		$episode = json_decode(@file_get_contents("https://ponyapi.apps.xeserv.us/season/".urlencode($argv[3])."/episode/".urlencode($argv[4])), true);
		if(empty($episode["error"])){
			$episode = $episode["episode"];
			echo $episode["name"]." :: ";
			echo "S".$episode["season"]."E".$episode["episode"]." :: ";
			echo date("l, F d, Y", $episode["air_date"]);
		} else {
			echo "Error: ".$episode["error"];
		}
	} else {
		echo "Season and episode need to be numerical";
	}
} else {
	echo "Season and/or episode missing";
}