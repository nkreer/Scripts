<?php

$time = (!empty($argv[3]) && is_numeric($argv[3]) ? $argv[3] : time());
echo date("l", $time).", ".date("F d, Y - H:i:s", $time)." ".date("e");