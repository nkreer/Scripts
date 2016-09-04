<?php

//This is using a private api - use at your own risk

for($i = 0; $i <= 2; $i++) unset($argv[$i]);
$query = urlencode(implode(" ", $argv));

if($query){
    $data = json_decode(@file_get_contents("http://api.chefkoch.de/api/1.1/api-recipe-search.php?Suchbegriff=".$query."&i=0&z=1&m=0&o=0&t=&limit=1"), true);
    if($data["total"] > 0 and !empty($data["result"][0])){
        $result = $data["result"][0];
        echo $result["RezeptName"]." :: ";
        echo $result["RezeptName2"]." :: ";
        echo $result["Minuten"]." Minuten :: ";
        echo "Schwierigkeitsgrad: ".$result["SchwierigkeitsgradName"]." :: ";
        echo "http://www.chefkoch.de/rezepte/".$result["RezeptShowID"]; //Shame on you, Chefkoch. Not even https...
    } else {
        echo "Keine Rezepte gefunden";
    }
} else {
    echo "Suchbegriff fehlt";
}