<?php

require_once 'includes/begin.php';

function double(string $value) {
    $result = "";
    $remain = 0;
    for ($i = strlen($value) - 1; $i >= 0; $i--) {
        $val = intval($value[$i]) * 2 + $remain;
        $digit = $val % 10;
        $result = strval($digit) . $result;
        $remain = ($val - $digit) / 10;
    }

    if ($remain > 0) {
        $result = strval($remain) . $result;
    }

    return $result;
}

function sum(string $value) {
    $sum = 0;
    for ($i = 0; $i < strlen($value); $i++) {
        $sum += intval($value[$i]);
    }

    return $sum;
}

$val = "1";
for ($i = 0; $i < 1000; $i++) {
    $val = double($val);
}

echo sum($val);

require_once 'includes/end.php';
