<?php 
$languages = ["ast-ES", "be-BY", "br-FR", "ca-ES", "ca-ES-valencia", "da-DK", "de", "de-AT", "de-CH", "de-DE", "de-DE-x-simple-language", "el-GR", "en", "en-AU", "en-CA", "en-GB", "en-NZ", "en-US", "en-ZA", "eo", "es", "fa", "fr", "gl-ES", "is-IS", "it", "ja-JP", "km-KH", "lt-LT", "ml-IN", "nl", "pl-PL", "pt", "pt-BR", "pt-PT", "ro-RO", "ru-RU", "sk-SK", "sl-SI", "sv", "ta-IN", "tl-PH", "uk-UA", "zh-CN", "auto"];

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$language = $argv[3];
if(!in_array($language, $languages)) die("Unknown language.");
unset($argv[3]);

$text = implode(" ", $argv);
if(empty($text)) die("No text supplied.");

$post = "language=".urlencode($language)."&text=".urlencode($text);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://languagetool.org/api/v2/check");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

if(empty($result)) die("Error :: Languagetool is unavailable.");
$result = json_decode($result, true);

if(count($result["matches"])){
	$matches = [];
	foreach($result["matches"] as $match){
		$message = (empty($match["shortMessage"]) ? $match["message"] : $match["shortMessage"]);
		@$matches[$message]++;
	}
	$output = "Result (".$result["language"]["code"].")";
	foreach($matches as $title => $matches){
		$output .= " :: ".($matches > 1 ? $matches."x " : "").$title;
	}
	echo $output;
} else {
	die("Result (".$result["language"]["code"].") :: OK");
}