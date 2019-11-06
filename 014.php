<?php

require_once 'includes/begin.php';

function chainLength(int $nb) : int {
    $i = 1;
    while ($nb != 1) {
        if ($nb % 2 == 0) {
            $nb /= 2;
        } else {
            $nb = $nb * 3 + 1;
        }
        $i++;
    }

    return $i;
}

$largestChain = 1;
$nb = 1;
for ($i = 2; $i < 1000000 ; $i++) {
    $length = chainLength($i);
    if ($length > $largestChain) {
        $nb = $i;
        $largestChain = $length;
    }
}

echo $nb;

require_once 'includes/end.php';
