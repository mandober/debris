## Functional PHP
Functional PHP (Gilles Crettenand, Feb 2017)


In PHP, you usually declare a function using the function keyword:

function my_function($parameter, $second_parameter)
{
    // [...]
}


A function declared inside a class is called a method. It differs from a traditional function as it can access the object properties, have visibility modifiers, and can be declared static.

As we will try to write code as pure as possible, our properties will be of private type:


class SomeClass
{
   private $some_property;

   // a public function
   public function some_function()
   {
       // [...]
   }

   // a protected static function
   static protected function other_function()
   {
       // [...]
   }
}



## PHP 7 scalar type hints

You were already able to declare type hints for classes, callables, and arrays in PHP 5. PHP 7 introduces the idea of scalar type hints. This means you can now say that you want a string, an int, a float, or a bool data type, both for parameters and return types. The syntax is roughly similar to what can be found in other languages.

Contrary to class type hints, you can also choose between two modes: the strict mode and the non-strict mode, the latter being the default. This means PHP will try to cast the values to the desired type. The casts will happen silently if there is no loss of information, otherwise, a warning will be raised. This can lead to the same strange results you can have with string to numbers conversion or true and false values.
*/

function add(float $a, int $b): float {
    return $a + $b;
}

echo add(3.5, 1); // 4.5
echo add(3, 1);  // 4
echo add("3.5", 1); // 4.5
echo add(3.5, 1.2); // 1.2 gets casted to 1  // 4.5
echo add("1 week", 1); // "1 week" gets casted to 1.0
// PHP Notice:  A non well formed numeric value encountered    // 2
echo add("some string", 1); // Uncaught TypeError Argument 1 passed to add() must be of the type float, string given


function test_bool(bool $a): string {
    return $a ? 'true' : 'false';
}
echo test_bool(true);  // true
echo test_bool(false); // false
echo test_bool("");    // false
echo test_bool("some string"); // true
echo test_bool(0);  // false
echo test_bool(1);  // true
echo test_bool([]); // Uncaught TypeError: Argument 1 passed to test_bool() must be of the type Boolean

/*
If you want to avoid issues with casting, you can opt-in for the strict mode. 
This way PHP will raise an error each time the values do not exactly conform to the
desired type. In order to do so, the declare(strict_types=1) directive must be ADDED
TO THE VERY FIRST LINE OF YOUR FILE. NOTHING MUST PRECEDE IT.
The only cast that PHP allows itself is from int to float by adding .0 as there is 
absolutely no risk of data loss.
Here are the same examples as before, but with strict mode activated:
*/
declare(strict_types=1);

function add(float $a, int $b): float {
    return $a + $b;
}
echo add(3.5, 1); // 4.5
echo add(3, 1);   // 4
echo add("3.5", 1); // Uncaught TypeError: Argument 1 passed to add() must be of the type float, string given
echo add(3.5, 1.2); // 1.2 gets casted to 1
// Uncaught TypeError: Argument 2 passed to add() must be of the type integer, float given
echo add("1 week", 1); // "1 week" gets casted to 1.0
// Uncaught TypeError: Argument 1 passed to add() must be of the type float, string given
echo add("some string", 1); // Uncaught TypeError: Argument 1 passed to add() must be of the type float, string given


function test_bool(bool $a): string {
    return $a ? 'true' : 'false';
}
echo test_bool(true);  // true
echo test_bool(false); // false
echo test_bool(""); // Uncaught TypeError: Argument 1 passed to test_bool() must be of the type boolean, string given
echo test_bool(0);  // Uncaught TypeError: Argument 1 passed to test_bool() must be of the type boolean, integer given
echo test_bool([]); // Uncaught TypeError: Argument 1 passed to test_bool() must be of the type boolean, array given

/*
Although not demonstrated here, the same casting rules apply for return types. 
Depending on the mode, PHP will happily perform the same casting and display the
same warning and errors as for parameters hints.

Also, another subtlety is that the mode that is applied is the one being declared at
the top of the file where the function call is made. This means that when you call a 
function that was declared in another file, the mode this file was in is not taken 
into account. Only the directive at the top of the current file matters.
*/


# Anonymous function

Declare an anonymous function and assigned it to a variable, then call it off of it or pass the var as parameter.

```php
// af bound to a var
$add = function(float $a, float $b): float {
    return $a + $b;
};
$add(5, 10);
$sum = array_reduce([1, 2, 3, 4, 5], $add, 0);

// anonymous function as a parameter:
$uppercase = array_map(function(string $s): string {
  return strtoupper($s);
}, ['hello', 'world']);

// anonymous function as a return value:
function return_af() {
  return function($a, $b, $c) {};
}
```
