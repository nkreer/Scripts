<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
	$data = file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$query);
	$data = json_decode($data, true);
	if(!empty($data["items"][0])){
		$item = $data["items"][0]["volumeInfo"];
		echo $item["title"]." :: ";
		echo $item["authors"][0]." :: ";
		echo $item["publishedDate"]." :: ";
		echo $item["pageCount"]." Pages :: ";
		echo "Category: ".$item["categories"][0];
		if(!empty($item["averageRating"])){
			echo " :: Rating: ".$item["averageRating"];
		}
	} else {
		echo "No results";
	}
} else {
	echo "Search query missing";
}