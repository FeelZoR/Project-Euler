<?php

require_once 'includes/begin.php';

function multiply(string $value, int $mul) {
    $result = "";
    $remain = 0;
    for ($i = strlen($value) - 1; $i >= 0; $i--) {
        $val = intval($value[$i]) * $mul + $remain;
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

function factorial(int $n) : string {
    $product = strval($n);
    for ($n--;$n > 1;$n--) {
        $product = multiply($product, $n);
    }

    return $product;
}

echo sum(factorial(100));

require_once 'includes/end.php';
