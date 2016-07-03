<?php

$user = file_get_contents("https://randomuser.me/api/");

if($user){
	$user = json_decode($user, true);
	foreach($user["results"] as $identity){
		echo $identity["nat"]." :: ";
		echo ucfirst($identity["name"]["title"])." ";
		echo ucfirst($identity["name"]["first"])." ";
		echo ucfirst($identity["name"]["last"])." :: ";
		echo $identity["cell"]." :: ";
		echo $identity["location"]["street"]." in ".$identity["location"]["postcode"]." ".$identity["location"]["city"].", ".$identity["location"]["state"];
		break;
	}
} else {
	echo "Randomuser.me is down.";
}