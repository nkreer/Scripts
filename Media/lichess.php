<?php

if(!empty($argv[3])){
	$id = $argv[3];
	$url = "https://en.lichess.org/api/game/".urlencode($id);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	if(!empty($data)){
		curl_close($ch);
		$data = json_decode($data, true);
		echo "https://lichess.org/".$data["id"]." :: ";
		echo "Status: ".ucfirst($data["status"])." :: ";
		echo "Variant: ".ucfirst($data["variant"])." :: ";
		echo "Rated: ".(!empty($data["rated"]) ? "Yes" : "No")." :: ";
		echo "(W) ".(!empty($data["players"]["white"]) ? $data["players"]["white"]["userId"] : "Anonymous")." vs. ";
		echo (!empty($data["players"]["black"]) ? $data["players"]["black"]["userId"] : "Anonymous")." (B) :: ";
		echo "Turns: ".$data["turns"];
		if(!empty($data["winner"])){
			echo " :: Winner: ".ucfirst($data["winner"]);
		}
	} else {
		echo "No game with that ID.";
	}
} else {
	echo "Please supply a game ID";
}