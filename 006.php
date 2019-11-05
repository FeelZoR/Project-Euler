<?php

require_once 'includes/begin.php';

$sum = 0;
$squareSum = 0;

for ($i = 0; $i <= 100; $i++) {
    $sum += $i;
    $squareSum += $i*$i;
}

$sum *= $sum;

echo $sum - $squareSum;

require_once 'includes/end.php';
