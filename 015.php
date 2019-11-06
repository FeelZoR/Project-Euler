<?php

require_once 'includes/begin.php';

function factorial(int $n) : float {
    $product = $n;
    for ($n--;$n > 1;$n--) {
        $product *= $n;
    }

    return $product;
}

$gridSize = 20;
echo factorial($gridSize * 2) / (factorial($gridSize) ** 2);

require_once 'includes/end.php';
