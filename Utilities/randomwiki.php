<?php

$result = @file_get_contents("https://en.wikipedia.org/w/api.php?action=query&list=random&rnlimit=1&format=json&rnfilterredir=redirects");
if($result){
	$result = json_decode($result, true);
	if(!empty($result["query"]["random"][0]["title"])){
		echo $result["query"]["random"][0]["title"];
	}
} else {
	die("Error :: Wikipedia seems to be down");
}