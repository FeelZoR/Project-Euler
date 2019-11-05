<?php

$NO_OVERRIDE_endTime = microtime(true) * 1000000;
echo "\n\n--------------------------";
echo "\nExecution time: " . ($NO_OVERRIDE_endTime - $NO_OVERRIDE_beginTime) . " µs";
