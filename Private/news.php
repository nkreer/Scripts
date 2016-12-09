<?php 

// Jeez newsapi.org developer, why do you even require an api key if you post one on the internet yourself o.O
// Source: https://www.quora.com/Are-there-any-APIs-for-news-headlines
define("API_KEY", "3e22f2fcc1344975ae2b2e69379e2a6e"); // Use this at your own risk. It could be disabled at any time.

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$source = (!empty($argv[3]) ? urlencode($argv[3]) : "reuters");	// Default to reuters
$article = (!empty($argv[4]) ? urlencode(((int)$argv[4] - 1)) : 0);

$data = @file_get_contents("https://newsapi.org/v1/articles?source=".$source."&sortBy=latest&apikey=".API_KEY);
if($data){
	$data = json_decode($data, true);
	if($data["status"] === "ok"){
		if(!empty($data["articles"][$article])){
			$article = $data["articles"][$article];
			echo $article["publishedAt"];
			echo " :: ".$article["title"];
			echo " :: ".$article["url"];
		}
	} else {
		echo "Please check that your provided news source is supported.";
	}
} else {
	echo "+++ Breaking news: An error occured. +++";
}