<?php

if(!empty($argv[3])){
	$nick = urlencode($argv[3]);
	$result = json_decode(file_get_contents("https://api.mojang.com/users/profiles/minecraft/".$nick), true);
	if(!empty($result["id"])){
		echo $result["name"]." :: ".$result["id"];
	} else {
		echo "Couldn't find a user with that name";
	}
} else {
	echo "You must supply a Minecraft player's nickname.";
}