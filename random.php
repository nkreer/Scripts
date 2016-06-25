<?php

$rand1 = (empty($argv[3] !== false) ? $args[3] : 1);
$rand2 = (empty($argv[4] !== false) ? $args[4] : 6);

if($rand1 > $rand2){
    $min = $rand2;
    $max = $rand1;
} else {
    $min = $rand1;
    $max = $rand2;
}

$times = (empty($args[3] !== false) ? $args[3] : 1);
$add = (empty($args[4] !== false) ? $args[4] : 0);
$numbers = [];

if($times < 1 or $times > 15){
    $times = 1;
}

if(is_numeric($times) and is_numeric($min) and is_numeric($max) and is_numeric($add)){
    for($i=1;$i<=$times;$i++){
        $numbers[] = mt_rand($min, $max);
    }
    echo implode(", ", $numbers).($times > 1 ? " :: Average: ~".round((array_sum($numbers) / count($numbers)), 2)." :: Sum: ".array_sum($numbers).($add > 0 ? " + ".$add." = ".(array_sum($numbers) + $add) : "") : "");
} else {
    echo "I need numbers";
}