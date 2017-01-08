<?php

if(!empty($argv[3]) and strlen($argv[3]) === 2){
	$language = strtolower($argv[3]);
} else {
	$language = "en";
}
echo $language."\n";
$result = @file_get_contents("https://".$language.".wikipedia.org/w/api.php?action=query&meta=siteinfo&siprop=statistics&format=json");
if($result){
	$result = json_decode($result, true)["query"]["statistics"];
	echo $language.".wikipedia.org statistics :: ".$result["articles"]." articles :: ".$result["edits"]." edits :: ".$result["activeusers"]." active users";
} else {
	die("Error :: Wikipedia seems to be down");
}