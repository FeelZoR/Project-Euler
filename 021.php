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

function getDivisors(int $n) : array {
    $decomposition = primeDecomposition($n);
    $divisors = [1];
    foreach ($decomposition as $prime) {
        $size = sizeof($divisors);
        for ($i = 0; $i < $size; $i++) {
            $divisor = $prime * $divisors[$i];
            if ($divisor != $n) $divisors[] = $divisor;
        }
    }

    return array_unique($divisors);
}

function d($n) : int {
    $divisors = getDivisors($n);
    $sum = 0;
    foreach ($divisors as $div) {
        $sum += $div;
    }

    return $sum;
}

$visited = [1 => d(1)];
$amicable = [];

for ($i = 1; $i < 10000; $i++) {
    $val = $visited[$i] ?? d($i);
    $val2 = $visited[$val] ?? d($val);

    $visited[$i] = $val;
    $visited[$val] = $val2;
    if ($i === $val2 && $i !== $val) {
        $amicable[] = $i;
        $amicable[] = $val;
    }
}

$amicable = array_unique($amicable);
$sum = 0;
foreach ($amicable as $nb) {
    $sum += $nb;
}

echo $sum;

require_once 'includes/end.php';
