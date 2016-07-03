<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$query = urlencode(implode(" ", $argv));

if(!empty($query)){
    $url = "https://api.spotify.com/v1/search?q=".$query."&type=track&limit=1";
    $data = json_decode(file_get_contents($url), true);
    if($data){
        if(!empty($data["tracks"]["items"])){
            $data = $data["tracks"]["items"][0];
            echo "Song preview for ".$data["name"]." by ".$data["artists"][0]["name"]." :: ".$data["preview_url"];
        } else {
            echo "No results";
        }
    } else {
        echo "Unexpected error.";
    }
} else {
    echo "No search query";
}