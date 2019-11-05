<?php

require_once 'includes/begin.php';

$i1 = 1;
$i2 = 2;

$sum = 2;

while ($i2 < 4000000) {
    $tmp = $i2;
    $i2 = $i2 + $i1;
    $i1 = $tmp;
    if ($i2 % 2 == 0) { $sum += $i2; }
}

echo $sum;

require_once 'includes/end.php';
