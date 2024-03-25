# Callables

`callable` pseudo-type accepts a special: string, array, object

* **string** containing the name of a named function, `"func"`

* **array** with two elements, under indexes `0` and `1`
  * the first element is either a string or an object, second is a string
  * if the first element is a string, the second element must be a string naming a method in a class designated by the first element
  [ 0 => `string`, 1 => `string`]
  * if the first element is an object, the second element must be a string naming a method that can be called on an object designated by the first element, from the context of the function being called
  [ 0 => `object`, 1 => `string`]

* **object**: an instance of the `Closure` class
* **object**: an instance of a class implementing `__invoke`




A **callable** is a type hint and the category of language elements that behave in a function-like manner, that is they are invokeable.

There are numerous callables:
* *anonymous function*: is an object of the `Closure` class
* *invokeable object*, with `__invoke` magic
* *magic class/object*, with `__callStatic`, `__call` magics
* *string*, if it matches a name of a named function
* *arrays* of form `[$obj, 'method']` et al.

Each of these entities has numerous variants shaped by numerous factors, such as: context (static, instance), location (in/outside a class, in/out a function, etc.), employment of magic mathods (`__invoke`, `__callStatic`, `__call`), and other (presence of modifiers, environment captured, etc.).

PHP uses the term *anonymous function* for any type of anonymous function, regardless of whether it captures free variables or not. The proper term for the former is *closure*. PHP implements them (both) via the `Closure` class. Since anon.functions and invokeable objects are objects, they must be assigned to a variable (therefore referenced using a variable).

On the other hand, a **named function** (regardless of the context and possible prefixes) must be passed around as a string; that is, the programmer must manually stringify a function's name to be able to reference it. In case of methods, the stringifying function name also has different prefixes that depend on the context (instance or static context).

The limitations of named functions:
- cannot be destroyed
- the code in the function cannot be changed once defined
- they are harder to pass around - only the name of the function can be assigned to a variable, rather than the function itself
- weak dynamic handling, only `call_user_func()` and `call_user_func_array()`
- Since PHP 7.0, you can also use `fromCallable()` static method of closure object to wrap a named function into a closure.



## List of callables

- named function, proper function outside a class
- anonymous function
- objects as functions, with `__invoke` magic method
- magic object, with `__callStatic`, `__call` magics

Anonymous functions (instances of `Closure` class): ref as var, `$closure`
- Anonymous function (no capturing of free vars)
- Closures (capture free vars from outer scope)
- by value (captures free vars by value), `use ($outer)`
- by reference (captures free vars by ref), `use (&$outer)`

In a class
- method: ref as string, `method`
- static class method
- Anonymous functions are closures, they auto-close over `$this`
- Anonymous static functions avoid auto-binding of `$this`


Callbacks registered with functions such as `call_user_func` and `call_user_func_array` will not be called if there is an uncaught exception thrown in a previous callback.


## Examples


```php

// An example callback function
function my_callback_function() {
    echo 'hello world!';
}

// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!';
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call (As of PHP 5.2.3)
call_user_func('MyClass::myCallbackMethod');

// Type 5: Relative static class method call (As of PHP 5.3.0)
class A {
    public static function who() {
        echo "A\n";
    }
}

class B extends A {
    public static function who() {
        echo "B\n";
    }
}

call_user_func(array('B', 'parent::who')); // A

// Type 6: Objects implementing __invoke can be used as callables (since PHP 5.3)
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');


// Example #2 Callback example using a Closure

// Our closure
$double = function($a) {
    return $a * 2;
};

// This is our range of numbers
$numbers = range(1, 5);

// Use the closure as a callback here to
// double the size of each element in our
// range
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);
//outputs: 2 4 6 8 10
```
