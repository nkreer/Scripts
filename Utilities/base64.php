<?php

if($argv[3]){
	$method = strtolower($argv[3]);
	for($i = 0; $i <= 3; $i++) unset($argv[$i]);
	$text = implode(" ", $argv);
	if($text){
		switch($method){
			case 'encode':
				echo base64_encode($text);
				break;
			case 'decode':
				echo base64_decode($text);
				break;	
			default:
				echo "Invalid method.";
		}
	} else {
		echo "Text can't be empty!";
	}
} else {
	echo "Method missing: encode/decode";
}