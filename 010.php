<?php

require_once 'includes/begin.php';

$discoveredPrimes = [2];

function isPrime(int $nb) : bool {
    if ($nb === 2 || $nb === 3) { return true; }
    if ($nb % 2 == 0) { return false; }

    for ($i = 3; $i <= sqrt($nb); $i+=2) {
        if ($nb % $i === 0) {
            return false;
        }
    }

    return true;
}

function discoverNextPrime() {
    global $discoveredPrimes;
    $found = false;
    $i = $discoveredPrimes[sizeof($discoveredPrimes) - 1];
    while (!$found) {
        $i++;
        if (isPrime($i)) {
            $found = true;
        }
    }

    if ($i < 2000000) {
        $discoveredPrimes[] = $i;
        return $i;
    } else {
        return false;
    }
}

$end = false;
while (!$end) {
    $end = discoverNextPrime() === false;
}

$sum = 0;
foreach ($discoveredPrimes as $prime) {
    $sum += $prime;
}

echo $sum;

require_once 'includes/end.php';
