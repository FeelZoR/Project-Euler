<?php

require_once 'includes/begin.php';

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

$n = 600851475143;
$prime = 1;
$sqrt = floor(sqrt($n));

for ($i = 2; $i < $sqrt; $i++) {
    if (isPrime($i) && $n % $i === 0) {
        $prime = $i;
    }
}

echo $prime;

require_once 'includes/end.php';
