<?php

$data = json_decode(file_get_contents("https://api.imgur.com/3/gallery/hot/viral/0.json"), true);

if($data["status"] == 200){
    $image = $data["data"][array_rand($data["data"])];
    echo $image["title"]." :: ";
    echo $image["account_url"]." :: ";
    echo $image["views"]." views :: ";
    echo ($image["nsfw"] == false ? "SFW" : "NSFW")." :: ";
    echo $image["ups"]." thumbs up :: ";
    echo $image["downs"]." thumbs down :: ";
    echo $image["link"];
} else {
    echo "Can't reach imgur";
}