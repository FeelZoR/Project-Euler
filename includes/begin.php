<?php

$resContent = [];

$fileName = basename($_SERVER['PHP_SELF'], '.php');
$path = 'resources/' . $fileName . '.txt';
if (file_exists($path)) {
    $resFile = fopen($path, 'r');
    while (($line = fgets($resFile)) !== false) {
        $resContent[] = str_replace("\n","", $line);
    }
}

$NO_OVERRIDE_beginTime = microtime(true) * 1000000;
