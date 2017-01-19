<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
	$temp = $argv[3] / 2.20462262185;
	echo round($temp, 2)." kilograms";
} else {
	die("Error :: Please supply a weight in pounds");
}