<?php

require_once 'includes/begin.php';

$discoveredPrimes = [2];
$nb = 1;

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

function discoverNextPrime() : int {
    global $discoveredPrimes;
    $found = false;
    $i = $discoveredPrimes[sizeof($discoveredPrimes) - 1];
    while (!$found) {
        $i++;
        if (isPrime($i)) {
            $found = true;
        }
    }

    $discoveredPrimes[] = $i;
    return $i;
}

while ($nb < 10001) {
    discoverNextPrime();
    $nb++;
}

echo $discoveredPrimes[sizeof($discoveredPrimes) - 1];

require_once 'includes/end.php';
