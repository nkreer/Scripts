<?php

$data = file_get_contents("http://www.der-postillion.de/ticker/newsticker2.php");
if($data){
	// credit where credit is due: http://stackoverflow.com/questions/36068249/php-json-request-json-decode-unicode-string/36068900
	$data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data), true);
	if(is_array($data)){
		$newsticker = $data["tickers"][array_rand($data["tickers"])];
		echo "+++ ".$newsticker["text"]." +++ (".$newsticker["short"].")";
		if(isset($newsticker["link"])){
			echo " :: Artikel: ".$newsticker["link"];
		}
	} else {
		die("+++ Schweißgebadet: Informatiker ruft: \"Bin gleich fertig mit dem Fix!\" +++");
	}
} else {
	die("+++ Fehler aufgetaucht: Postillon liefert keine Newsticker mehr aus +++");
}

?> 