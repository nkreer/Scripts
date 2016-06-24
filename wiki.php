<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = urlencode(implode(" ", $argv));
$url = "https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=".$query;
$data = json_decode(file_get_contents($url), true);

if($data){
	if(!empty($data["query"]["pages"])){
		$articles = $data["query"]["pages"];
		if(count($articles) >= 1){
			foreach($articles as $article){
				$title = $article["title"];
				$text = str_replace("\n", " | ", str_replace("\n\n", "", softTrim($article["extract"], 280, " [...]")));
				if(!empty($text)){
					echo $title." :: ".$text." :: <https://en.wikipedia.org/wiki/".urlencode($title).">";
				} else {
					echo "No article found.";
				}
				break;
			}
		} else {
			echo "Nothing found but emptyness.";
		}
	} else {
		echo "Nothing found.";
	}
} else {
	echo "Unexpected error.";
}

function softTrim($text, $count, $wrapText='...'){
    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}