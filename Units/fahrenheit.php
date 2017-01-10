<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
	$temp = $argv[3] * 1.8 + 32;
	echo round($temp, 2)." degrees Fahrenheit";
} else {
	die("Error :: Please supply a temperature in degrees Celsius");
}