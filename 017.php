<?php

require_once 'includes/begin.php';

$numbers = [
    1 => 3, 2 => 3, 3 => 5, 4 => 4, 5 => 4, 6 => 3, 7 => 5, 8 => 5, 9 => 4,
    10 => 3, 11 => 6, 12 => 6, 13 => 8, 14 => 8, 15 => 7, 16 => 7, 17 => 9, 18 => 8, 19 => 8,
    20 => 6, 30 => 6, 40 => 5, 50 => 5, 60 => 5, 70 => 7, 80 => 6, 90 => 6, 100 => 7, 1000 => 8
];

function countLetters(int $nb) {
    global $numbers;

    $and = false;
    if ($nb === 0) { return 0; }
    $count = 0;

    $remain = $nb % 1000;
    $thousand = ($nb - $remain) / 1000;
    if ($thousand != 0) {
        $count += $numbers[$thousand] + $numbers[1000];
        $and = true;
    }

    $nb = $remain;
    $remain = $nb % 100;
    $hundreds = ($nb - $remain) / 100;
    if ($hundreds != 0) {
        $count += $numbers[$hundreds] + $numbers[100];
        $and = true;
    }

    if ($and && $remain != 0) {
        $count += 3;
    }

    $nb = $remain;
    if ($nb < 20) { return $count + $numbers[$nb]; }
    else {
        $remain = $nb % 10;
        $tens = $nb - $remain;
        return $count + $numbers[$tens] + $numbers[$remain];
    }
}

$count = 0;
for ($i = 1; $i <= 1000; $i++) {
    $count += countLetters($i);
}

echo $count;
require_once 'includes/end.php';
