<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
	$data = json_decode(@file_get_contents("https://store.steampowered.com/api/storesearch?term=".$query), true);
	if(!empty($data["items"][0])){
		$game = $data["items"][0];
		echo $game["name"]." :: ";
		echo (!empty($game["price"]) ? ($game["price"]["final"] / 100)." ".$game["price"]["currency"] : "Free")." :: ";
		$platforms = [];
		foreach($game["platforms"] as $platform => $status){
			if($status === true){
				$platforms[] = ucfirst($platform);
			}
		}
		echo implode(", ", $platforms)." :: ";
		echo "http://store.steampowered.com/app/".$game["id"];
	} else {
		echo "Nothing found";
	}
} else {
	echo "Search query missing";
}