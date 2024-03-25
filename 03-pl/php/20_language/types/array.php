<?php declare(strict_types=1);

// Arrays

// Indexed Arrays

// create an indexed array, old style
// array() is not a func but a lang construct
$r = array ("red", "white", "blue");

// create an indexed array, new style
$r = ["red", "white", "blue"];
print_r($r);

// insert new element: if an index is not explicit, an element is
// automatically assigned with the next index in sequence,
// which is the value of the biggest index so far plus one.
$r[] = "green";
print_r($r);




// print_r(array_map(function($value) {
//     return $value * 2;
// }, range(1, 5)));


// construct an array of arrays by using NULL as the name of the callback
$a = [1, 2, 3, 4, 5];
$b = ['one', 'two', 'three', 'four', 'five'];
$c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];
$d = array_map(null, $a, $b, $c);
// print_r($d);
