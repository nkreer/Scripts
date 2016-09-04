<?php

$pic = @file_get_contents("http://thecatapi.com/api/images/get?format=xml");
if($pic){
	$xml = simplexml_load_string($pic);
	$pic = $xml->data->images->image->url; // I hate working with XML in PHP.
	if($pic){
		echo $pic;
	} else {
		echo "Something broke";
	}
} else {
	echo "No cute cats for you now.";
}