<?php

$joke = json_decode(@file_get_contents("http://api.icndb.com/jokes/random"), true);

if($joke){
    if($joke["type"] === "success"){
        echo $joke["value"]["joke"];
    } else {
        echo "Failure: ".$joke["type"]."";
    }
} else {
    echo "Can't reach icndb.com";
}