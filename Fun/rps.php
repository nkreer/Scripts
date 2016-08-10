<?php

$beats = ["r" => "s", "p" => "r", "s" => "p"]; // Rock, Paper, Scissors
$names = ["r" => "ROCK", "p" => "PAPER", "s" => "SCISSORS"];

if(!empty($argv[3]) and isset($beats[$argv[3]])){
	$user = $argv[3];
	$choice = array_rand($beats);
	echo "You: ".$names[$user]." :: ";
	echo "Me: ".$names[$choice]." :: ";
	if($choice === $user){
		echo "DRAW";
	} elseif($beats[$choice] === $user){
		echo "YOU LOSE";
	} elseif($beats[$user] === $choice){
		echo "YOU WIN";
	}
} else {
	die("Usage: rps <r/p/s>");
}