<?php

$data = @file_get_contents("http://xkcd.com/".(!empty($argv[3]) ? urlencode((int)$argv[3])."/" : "")."info.0.json");
if($data){
	$data = json_decode($data, true);
	echo "xkcd ".$data["num"]." (".$data["year"]."-".$data["month"]."-".$data["day"].") :: ";
	echo $data["safe_title"]." :: ";
	echo $data["alt"]." :: ";
	echo $data["img"];
} else {
	die("Error :: Something went wrong");
}