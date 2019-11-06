<?php

require_once 'includes/begin.php';

$discoveredPrimes = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29];

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

function primeDecomposition(int $n) : array {
    global $discoveredPrimes;
    $decompositionOfN = [];

    $i = 0;
    while ($n != 1) {
        $prime = $discoveredPrimes[$i];
        if ($n % $prime === 0) {
            $decompositionOfN[] = $prime;
            $n /= $prime;
        } else {
            $i++;
            if ($i === sizeof($discoveredPrimes)) discoverNextPrime();
        }
    }

    return $decompositionOfN;
}

function nbDivisors(array $primeDecomposition) : int {
    $nbOccurrences = array_count_values($primeDecomposition);
    $nbDivisors = 1;
    foreach ($nbOccurrences as $prime => $nb) {
        $nbDivisors *= $nb + 1;
    }

    return $nbDivisors;
}

function triangleNumber(int $pos) {
    $sum = 0;
    for ($i = 0; $i <= $pos; $i++) {
        $sum += $i;
    }

    return $sum;
}

$i = 1;
$triangle = 1;
$nbDivisors = 1;
while ($nbDivisors <= 500) {
    $i++;
    $triangle = triangleNumber($i);
    $nbDivisors = nbDivisors(primeDecomposition($triangle));
}

echo $triangle;

require_once 'includes/end.php';
