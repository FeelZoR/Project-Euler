<?php

require_once 'includes/begin.php';

function isPalindrome(int $i) : bool {
    $s = strval($i);
    return $s === strrev($s);
}

$i1 = 100;
$i2 = 100;
$palindrome = 0;

while ($i1 < 1000) {
    if ($i1 % 10 !== 0 && $i1 % 100 !== 0 && $i2 % 10 !== 0 && $i2 % 100 !== 0) { // On ne peut pas faire un palindrome qui finit par 0
        $n = $i1 * $i2;
        if (isPalindrome($n) && $n > $palindrome) {
            $palindrome = $n;
        }
    }

    $i2++;
    if ($i2 === 1000) {
        $i1++;
        $i2 = $i1;
    }
}

echo $palindrome;

require_once 'includes/end.php';
