<?php declare(strict_types=1);

/*
# Arrow functions
=================

https://www.php.net/manual/en/migration74.new-features.php

Arrow functions provide a shorthand syntax for defining
functions with implicit by-value scope binding.

*/

$factor = 10;
$nums = array_map(fn($n) => $n * $factor, [1, 2, 3, 4]); // [10, 20, 30, 40];


$id      = fn($x) => $x;
$kestrel = fn($x) => fn($y) => $x;
$kite    = fn($x) => fn($y) => $y;
