<?php

require_once 'includes/begin.php';

$discoveredPrimes = [2];
$decomposition = [];

function isPrime(int $nb) : bool {
    if ($nb === 2 || $nb === 3) { return true; }
    if ($nb % 2 == 0) { return false; }

    for ($i = 3; $i < sqrt($nb); $i+=2) {
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

function remove(array& $array, int $searched) {
    $i = array_search($searched, $array);
    if ($i !== false) unset($array[$i]);
}

function appendDecomposition(int $n) {
    global $discoveredPrimes;
    global $decomposition;
    $copy = $decomposition;
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

    $decomposition = [];
    foreach ($decompositionOfN as $prime) {
        $decomposition[] = $prime;
        remove($copy, $prime);
    }
    $decomposition = array_merge($decomposition, $copy);
}

$n = 20;
for ($i = 2; $i <= $n; $i++) {
    appendDecomposition($i);
}

$mul = 1;
foreach ($decomposition as $prime) {
    $mul *= $prime;
}

echo $mul;

require_once 'includes/end.php';
