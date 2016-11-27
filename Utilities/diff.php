<?php 

if($argv[3]){
	try {
		if($argv[4]){
			$now = (int)$argv[4];
		} else {
			$now = time();
		}
		$argv[3] = (int)$argv[3];
		$time = new DateTime(date("d.m.Y H:i:s", $now));
		$other = new DateTime(date("d.m.Y H:i:s", $argv[3]));
		$diff = $time->diff($other);
		echo $diff->y." years, ";
		echo $diff->m." months, ";
		echo $diff->d." days, ";
		echo $diff->h." hours, ";
		echo $diff->i." minutes and ";
		echo $diff->s." seconds in the ";
		echo ($diff->invert ? "past" : "future");
		echo " (Total: ".$diff->days." days)";
	} catch (Exception $e){
		echo "Please supply a valid unix timestamp";
	}
} else {
	echo "Please supply a valid unix timestamp";
}