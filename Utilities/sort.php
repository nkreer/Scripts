<?php

if(!empty($argv[3])){
	for($i = 0; $i <= 2; $i++) unset($argv[$i]);
	sort($argv);
	echo implode(" ", $argv);
} else {
	echo "Input missing";	
}