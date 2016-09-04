<?php

$question = json_decode(@file_get_contents("http://jservice.io/api/random?count=1"), true);
$question = $question[0];
echo $question["category"]["title"]." :: ";
echo $question["question"]." :: ";
echo (!empty($question["value"]) ? $question["value"]." Dollars :: " : "");
echo $question["id"]." :: ";
echo $question["answer"];