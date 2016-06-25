<?php

if(!empty($argv[3]) and is_numeric($argv[3])){
    $number = $argv[3];
} else {
    $number = "random";
}

$result = file_get_contents("http://numbersapi.com/".$number."/trivia");

if($result){
    echo $result;
} else {
    echo "Error.";
}