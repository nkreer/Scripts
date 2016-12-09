<?php

$data = @file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY");
if($data){
	$data = json_decode($data, true);
	if(!empty($data["url"])){
		echo $data["date"];
		echo " :: ".$data["title"];
		echo " :: ".(!empty($data["hdurl"]) ? $data["hdurl"] : $data["url"]);
		echo " :: ".(!empty($data["copyright"]) ? "© ".$data["copyright"] : "Public Domain");
	} else {
		echo "Couldn't download information about today's Astronomy Picture of the Day.";
	}
} else {
	echo "An error occured.";
}