<?php

if(!empty($argv[3]) and is_numeric($argv[3]) and !empty($argv[4]) and is_numeric($argv[4])){
	$length = $argv[3] / 0.0328084; // Feet
	$length += $argv[4] * 2.54; // Inches
    echo round($length, 2)." centimetres";
} else {
	die("Error :: Please supply a length in feet and inches");
}