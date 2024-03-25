# Functions

- Named functions
- Declaring function and methods
- Scalar type hints
- Anonymous functions
- Closures
- Using objects as functions
- Higher Order Functions
- The callable type hint
- object as a function

> The conditionally defined function comes into existence when the execution flow reaches the point where the function is defined.

Named functions:
- their label is **case-insensitive**
- cannot be destroyed
- function body cannot be changed once defined
- they are referred to by signifying their label
- a string gets passed around, representing a named function
- appending the call operator on a string looks very weird: `"func"();`
- can be nested within one another to no effect: a nested function is considered undefined until the execution reaches it
- a func's name prefixed with `&` indicates the return value is returned byRef


**Nested named functions**    
While it is possible to nest named functions within each other, they behave as if they were defined in the parent scope, no matter how deeply nested. That is, functions nested inside the containing function can be called from outside that containing function. They pollute the namespace so you cannot have nested functions with the same name at any level.




The options for dynamically handling named functions

are down to passing them as strings and through the `call_user_func()` which expects an array of 2 elements where the first param is a function name (a string) and the second element is a scalar or array containing the arguments.

`call_user_func()`
- calls the callback given by the first parameter and passes the remaining parameters as arguments
- there may be zero or more parameters to be passed to the callback
- parameters are not passed by reference
- Returns the return value of the callback
- registered callbacks will not be called if there is an uncaught exception thrown in a previous callback.


## Use case: recursive functions
To go around the possibility that users have renamed functions (when you distribute the code), the `__FUNCTION__` magic constant, that always points to the current function, can be used inside a function to call itself:   
`call_user_func(__FUNCTION__ [, $arg1, $arg2, ...]);` 

```php
// if renamed, this function will fail
function factorial($i=1) {
    return $i==1 ? 1 : $i * factorial($i-1); // the call here fails!
}

// use this to get the fn name dinamically
function whatever($i=1) {
    return($i==1 ? 1 : $i * call_user_func(__FUNCTION__, $i-1));
}
```
