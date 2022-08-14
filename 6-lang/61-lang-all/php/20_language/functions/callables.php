<?php declare(strict_types=1);
/*
Callables
=========

*/

// named function
function fu() {
    echo 'hello world!';
}

// method (prefixed named function)
class MyClass {
    static function cb_method() {
        echo 'Hello World!';
    }
}


// CALL USING:
// call_user_func and call_user_func_array


// 1) call named function
call_user_func('fu');

// 2) call static method
call_user_func('MyClass::cb_method'); // (PHP 5.3)
call_user_func(array('MyClass', 'cb_method'));

// 3) call object method
$obj = new MyClass();
call_user_func(array($obj, 'cb_method'));

class A {
    public static function who() { echo "A\n"; }
}

class B extends A {
    public static function who() { echo "B\n"; }
}

// 4) relative static class method call (PHP 5.3)
call_user_func(array('B', 'parent::who')); // A


// 5) call object that has an __invoke magic
class C {
    public function __invoke($name) { echo 'Hello ', $name, "\n"; }
}
$c = new C();
call_user_func($c, 'PHP!');



// USING A CLOSURE
//
// def a closure
$double = function($a) { return $a * 2; };
//
// range of numbers
$numbers = range(1, 5);
//
// use the closure as a callback
$new_numbers = array_map($double, $numbers);



// Closure::fromCallable() - Converts a callable into a closure

// named function
function foo() { echo 'hello world!'; }

// convert a named func into a closure
$f2 = Closure::fromCallable('foo');

echo $f2(), PHP_EOL;
