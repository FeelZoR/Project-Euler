<?php

require_once 'includes/begin.php';

function resToNumberArray() : void {
    global $resContent;
    for ($i = 0; $i < sizeof($resContent); $i++) {
        $line = $resContent[$i];
        $resContent[$i] = explode(' ', $line);
    }
}

resToNumberArray();
function calculate(int $i) : void {
    global $resContent;
    $row = $resContent[$i];
    $rowBelow = $resContent[$i + 1];
    for ($j = 0; $j < sizeof($row); $j++) {
        $row[$j] += max($rowBelow[$j], $rowBelow[$j + 1]);
    }

    $resContent[$i] = $row;

    if ($i !== 0) calculate($i - 1);
}

calculate(sizeof($resContent) - 1);
echo $resContent[0][0];

require_once 'includes/end.php';
