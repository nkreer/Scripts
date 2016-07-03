<?php

$fact = json_decode(file_get_contents("http://catfacts-api.appspot.com/api/facts?number=1"), true);

if($fact and $fact["success"] === "true"){
    echo $fact["facts"][0];
} else {
    echo "Couldn't get a fact.";
}

?>