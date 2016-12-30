<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

$data = @file_get_contents("http://www.transltr.org/api/translate?text=".$query."&to=en");
if($data){
	$data = json_decode($data, true);
	if(isset($data["translationText"]) and strlen($data["translationText"]) <= 300){
		echo "[".strtoupper($data["from"])."-".strtoupper($data["to"])."] ".$data["translationText"];
	} else {
		die("Error :: Translation too long.");
	}
} else {
	die("Error :: Cannot reach translation service");
}