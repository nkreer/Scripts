<?php

if(!empty($argv[3])){
	$query = urlencode($argv[3]);
	$data = @file_get_contents("https://api.telegra.ph/getPage/".$query);
	if($data){
		$data = json_decode($data, true);
		if($data["ok"]){
			$data = $data["result"];
			echo $data["title"]." :: ";
			echo $data["author_name"]." :: ";
			echo $data["views"]." Views :: ";
			echo $data["url"];
		} else {
			die("Error :: ".$data["error"]);
		}
	} else {
		die("Can't reach Telegra.ph");
	}
} else {
	die("Nothing to search for");
}
