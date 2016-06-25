<?php

$nouns = explode("\n", file_get_contents("noun.txt"));
$adjectives = explode("\n", file_get_contents("adjectives.txt"));

$name = $argv[2];
if(!empty($argv[3])){
    $name = $argv[3];
}

$vowels = ["a", "e", "i", "o", "u"];
$adjective = $adjectives[array_rand($adjectives)];
$noun = $nouns[array_rand($nouns)];

$text = "*slaps ".$name." around a bit with ".(in_array(strtolower($adjective[0]), $vowels) ? "an" : "a")." ".$adjective." ".$noun."*";
echo $text;