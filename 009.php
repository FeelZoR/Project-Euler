<?php

require_once 'includes/begin.php';

$a = 1;
$b = 2;
$c = 998;

while ($a**2 + $b**2 != $c**2 || $a + $b + $c != 1000) {
    $b++;
    $c--;

    if ($b >= $c) {
        $a++;
        $b = $a + 1;
        $c = 1000 - $b - $a;
    }
}

echo $a * $b * $c;

require_once 'includes/end.php';
