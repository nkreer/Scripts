<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
	$distance = $argv[3] / 0.62137119;
	echo round($distance, 2)." kilometres";
} else {
	die("Error :: Please supply a distance in miles");
}