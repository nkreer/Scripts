<?php

$query = urlencode($argv[3]);

if(!empty($query)){
	$info = json_decode(file_get_contents("https://finance.yahoo.com/webservice/v1/symbols/".$query."/quote?format=json"), true);
	if(!empty($info["list"]["resources"][0])){
		$info = $info["list"]["resources"][0]["resource"]["fields"];
		echo $info["symbol"]." :: ";
		echo $info["name"]." :: ";
		echo round($info["price"], 2)." USD :: ";
		echo "Volume: ".$info["volume"];
		echo " (".$info["utctime"].")";
	} else {
		echo "Nothing found";
	}
} else {
	echo "Search query missing";
}