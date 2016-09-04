<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = urlencode(implode(" ", $argv));

if(!empty($query)){
    $url = "https://api.github.com/search/repositories?q=".$query;
    $options = ['http' => ['user_agent' => "Fish/1.0"]];
    $context = stream_context_create($options);
    $result = json_decode(@file_get_contents($url, false, $context), true);
    if($result){
        if(!empty($result["items"][0])){
            $result = $result["items"][0];
            echo $result["name"]." by ".$result["owner"]["login"].": ".$result["description"]." :: ".$result["stargazers_count"]." Stargazers :: ".$result["html_url"];
        } else {
            echo "No results.";
        }
    } else {
        echo "Can't access GitHub API";
    }
} else {
    echo "Missing query.";
}