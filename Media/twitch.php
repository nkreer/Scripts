<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
	$streams = json_decode(file_get_contents("https://api.twitch.tv/kraken/search/streams?q=".$query), true);
	if(!empty($streams["streams"][0])){
		$stream = $streams["streams"][0];
		echo $stream["game"]." :: ";
		echo $stream["viewers"]." viewers :: ";
		echo $stream["channel"]["status"]." :: ";
		echo $stream["channel"]["display_name"]." :: ";
		echo $stream["channel"]["url"];
	} else {
		echo "Nothing found";
	}
} else {
	echo "Search query missing";
}