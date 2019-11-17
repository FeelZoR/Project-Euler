<?php

// 1 jan 1901 => tuesday

require_once 'includes/begin.php';

// Only works with dates between 1900-01-01 and 2099-12-31
function wasSunday($year, $month, $day) {
    $monthsCodes = [0, 3, 3, 6, 1, 4, 6, 2, 5, 0, 3, 5];

    $res = 0;
    $res += ($year % 100 + ($year % 100) / 4) % 7; // Year code
    $res += $monthsCodes[$month - 1]; // Month code
    if ($year >= 2000) { $res += 6; } // Century code
    $res += $day; // Day code
    if ($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0) && ($month === 1 || $month === 2)) {
        $res--; // Leap code
    }

    return $res % 7 === 0;
}

$nbSundays = 0;
for ($year = 1901; $year <= 2000; $year++) {
    for ($month = 1; $month <= 12; $month++) {
        if (wasSunday($year, $month, 1)) $nbSundays++;
    }
}

echo $nbSundays;

require_once 'includes/end.php';
