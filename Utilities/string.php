<?php

if($argv[3] and is_numeric($argv[3]) and $argv[3] > 0 and $argv[3] <= 300){
	$length = $argv[3];
} else {
	$length = 32;
}

if($argv[4] and is_string($argv[4])){
	$chars = $argv[4];
} else {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
}
$chars = str_split($chars);

for($i = 1; $i <= $length; $i++){
	echo $chars[array_rand($chars)];
}