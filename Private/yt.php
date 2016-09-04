<?php

define("YT_API_KEY", ""); // Your API Key

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if(!empty($query)){
	$result = json_decode(@file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&type=video&key=".YT_API_KEY."&q=".$query), true);
	if(!empty($result["items"][0])){
		$video = $result["items"][0];
		echo "https://youtu.be/".$video["id"]["videoId"]." :: ";
		echo $video["snippet"]["title"]." :: ";
		echo $video["snippet"]["channelTitle"];
	} else {
		echo "No videos found.";
	}
} else {
	echo "Please provide a search query.";
}