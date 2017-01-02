<?php

if(!empty($argv[3]) and !empty($argv[4]) and !empty($argv[5])){
	$fromLang = $argv[3];
	$toLang = $argv[4];
	for($i = 0; $i <= 4; $i++) unset($argv[$i]);
	$query = urlencode(implode(" ", $argv));
	$data = @file_get_contents("https://glosbe.com/gapi/translate?from=".$fromLang."&dest=".$toLang."&format=json&phrase=".$query);
	if($data){
		$data = json_decode($data, true);
		print_r($data);
		if(!empty($data["tuc"])){
			echo $data["tuc"][0]["phrase"]["text"]." :: ";
			echo $data["tuc"][0]["meanings"][0]["text"];
		} else {
			die("Error :: No translation found");
		}
	} else {
		die("Error :: Something went wrong");
	}
} else {
	die("Error :: Required input missing");
}