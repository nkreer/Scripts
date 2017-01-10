<?php

if(!empty($argv[3])){
	$base = (!empty($argv[4]) ? $argv[4] : "EUR");
	$rates = @file_get_contents("http://api.fixer.io/latest?symbols=".urlencode($argv[3])."&base=".urlencode($base));
	if($rates){
		$rates = json_decode($rates, true);
		if(!empty($rates["rates"][urlencode($argv[3])])){
			echo $rates["date"];
			echo " :: 1 ".urlencode($argv[3])." = ".$rates["rates"][urlencode($argv[3])]." ".$rates["base"];
		} else {
			die("Error :: That symbol can't be found");
		}
	} else {
		die("Error :: Can't reach api.fixer.io");
	}
} else {
	die("Error :: Please supply currencies to get the current exchange rate");
}