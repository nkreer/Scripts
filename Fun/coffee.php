<?php

if(!empty($argv[3]) and strlen($argv[3]) <= 40){
    $user = $argv[3];
} else {
    $user = $argv[2];
}

$messages = ["*hands ".$user." a cup of coffee*",
    "*puts a coffee on the table for ".$user."*",
    "A coffee for ".$user.", please!"];

echo $messages[array_rand($messages)];