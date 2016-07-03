<?php

include_once("src/IRC/Utils/TextFormat.php");
use IRC\Utils\TextFormat;

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$args = "I".implode(" ", $argv);
if(strlen($args) <= 100 and strlen($args) >= 4){
    $rainbow = [1 => TextFormat::RED,
                2 => TextFormat::ORANGE,
                3 => TextFormat::YELLOW,
                4 => TextFormat::GREEN,
                5 => TextFormat::CYAN,
                6 => TextFormat::BLUE,
                7 => TextFormat::PURPLE];

    $output = "";
    $rainbowKey = 1;
    $charCount = strlen($args);
    for($a = 1; $a < $charCount; $a++){
        if($rainbowKey > count($rainbow)){
            $rainbowKey = 1;
        }
        $char = substr($args, $a, 1);
                        
        if($char == " "){
            $output .= $char;
            continue;
        }
        
        $output .= $rainbow[$rainbowKey].$char;
        $rainbowKey++;
    }
    echo $output.TextFormat::REMOVE;
} else {
    echo "Text missing or too long";
}