<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
	$result = @file_get_contents("http://en.wikipedia.org/w/api.php?action=query&list=allimages&aiprop=url&format=json&ailimit=1&aifrom=".$query);
	if($result){
		$result = json_decode($result, true);
		if(isset($result["query"]["allimages"][0])){
			$image = $result["query"]["allimages"][0];
			echo $image["name"]." :: ";
			echo $image["url"];
		} else {
			die("Nothing found.");
		}
	} else {
		die("Can't reach Wikimedia Commons");
	}
} else {
	die("Missing search query.");
}