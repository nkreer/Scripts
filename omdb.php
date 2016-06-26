<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = urlencode(implode(" ", $argv));
if(empty($query)){
	exit("Search query missing.");
}

$url = "https://www.omdbapi.com/?t=".$query."&plot=short&r=json&v=1";
$data = json_decode(file_get_contents($url), true);

if($data){
	if($data["Response"] !== "False"){
		$text = $data["Title"]." :: ";
		$text .= $data["Rated"]." :: ";
		$text .= $data["Genre"]." :: ";
		$text .= $data["Runtime"]." :: ";
		$text .= "Rating: ".$data["imdbRating"]." :: ";
		$text .= $data["Plot"];
		echo $text;
	} else {
		echo "Movie not found.";
	}
} else {
	echo "OMDB is unavailable at the moment.";
}