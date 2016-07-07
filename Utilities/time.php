<?php

$timezone = $argv[3];
if(!empty($timezone)){
    try {
        $time = new \DateTime(date("F d, Y H:i:s"));
        $time->setTimezone(new \DateTimeZone($timezone));
    } catch(\Exception $e) {
        $time = new \DateTime(date("F d, Y H:i:s"));
    }
} else {
    $time = new \DateTime(date("F d, Y H:i:s"));
}
echo $time->format("l, F d, Y - H:i:s")." ".$time->getTimezone()->getName()." (Unix: ".$time->getTimestamp().")";                