<?php

for($i = 0; $i <= 2; $i++) unset($argv[$i]);

$search = urlencode(implode(" ", $argv));
if(!empty($search)){
    $data = json_decode(@file_get_contents("http://api.giphy.com/v1/gifs/search?api_key=dc6zaTOxFJmzC&q=".$search), true);
    if(!empty($data["data"][0])){
        $data = $data["data"][0];
        if(!empty($data["images"]["fixed_height"]["url"])){
            echo $data["images"]["fixed_height"]["url"]." (Powered by Giphy)";
        } else {
            echo "Can't get gif url";
        }
    } else {
        echo "No gifs found.";
    }
} else {
    echo "Search query missing";
}