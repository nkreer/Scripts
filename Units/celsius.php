<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
	$temp = ($argv[3] - 32) * 5/9;
	echo round($temp, 2)." degrees Celsius";
} else {
	die("Error :: Please supply a temperature in degrees Fahrenheit");
}