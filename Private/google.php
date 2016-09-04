<?php

define("CSE_API_KEY", ""); // Your API key here
define("CSE_CX_ID", ""); // Your Custom Search Engine ID

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));
if(!empty($query)){
	$data = json_decode(@file_get_contents("https://www.googleapis.com/customsearch/v1?q=".$query."&key=".CSE_API_KEY."&cx=".CSE_CX_ID), true);
	if(!empty($data["items"][0])){
		$result = $data["items"][0];
		echo $result["formattedUrl"]." :: ";
		echo $result["title"];
	} else {
		echo "No results";
	}
} else {
	echo "Cannot search for nothing.";
}