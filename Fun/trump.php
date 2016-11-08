<?php

if(!empty($argv[3]) and strlen($argv[3]) <= 32){
	$result = @file_get_contents("https://api.whatdoestrumpthink.com/api/v1/quotes/personalized?q=".urlencode($argv[3]));
} else {
	$result = @file_get_contents("https://api.whatdoestrumpthink.com/api/v1/quotes/random");
}

if($result){
	$result = json_decode($result, true);
	if(!empty($result["message"])){
		echo $result["message"]." -Donald Trump";
	} else {
		echo "Make America Great Again. -Donald Trump";
	}
} else {
	echo "Donald Trump doesn't have to say anything right now.";
}