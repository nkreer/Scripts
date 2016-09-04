<?php

if(!empty($argv[3])){
	$query = $argv[3];
	$data = json_decode(@file_get_contents("https://raw.githubusercontent.com/nkreer/miscellaneous/master/data/languages.json"), true);
	$found = false;
	foreach($data as $code => $language){
		if(stripos($code, $query) !== false or
		   stripos($language, $query) !== false){
			echo $code." :: ".$language;
			$found = true;
			break;
		}
	}
	if(!$found){
		echo "No results";
	}
} else {
	echo "You must search for something.";
}