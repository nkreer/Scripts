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
		echo $item["industryIdentifiers"][0]["identifier"]." :: ";
		echo "Category: ".$item["categories"][0];
		if(!empty($item["averageRating"])){
			echo " :: Rating: ".$item["averageRating"];
		}
		echo " :: ".softTrim($item["description"], 180);
	} else {
		echo "No results";
	}
} else {
	echo "Search query missing";
}

/*
 * This code was taken from
 * http://stackoverflow.com/questions/2104653/trim-text-to-340-chars/14896727#14896727
 *
 * All rights belong to it's respective author (Sebastian Hojas)
 */
function softTrim($text, $count, $wrapText = '...'){
    if(strlen($text) > $count){
        preg_match('/^.{0,'.$count.'}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    } else {
        $wrapText = '';
    }
    return $text.$wrapText;
}