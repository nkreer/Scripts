<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if(!empty($query)){
	$url = "https://haveibeenpwned.com/api/v2/breachedaccount/".$query."?truncateResponse=true";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_USERAGENT, "haveibeenpwnedcommand/1.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	if(!empty($data)){
		curl_close($ch);
		$data = json_decode($data, true);
		$pwned = [];
		foreach($data as $pwn){
			$pwned[] = $pwn["Name"];
		}
		echo "Looks like you've been pwned ".count($data)." time(s)! ".(count($pwned) <= 5 ? "(".implode(", ", $pwned).") " : "").":: ";
		echo "Check haveibeenpwned.com for more details.";
	} else {
		echo "Looks like you haven't been pwned yet.";
	}
} else {
	echo "Search query missing";
}