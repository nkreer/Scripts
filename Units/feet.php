<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
	$inches = $argv[3] / 2.54;
    $feet = (int)$inches / 12;
    $inches = $inches % 12;
    echo floor($feet)." feet, ".$inches." inches";
} else {
	die("Error :: Please supply a length in centimetres");
}