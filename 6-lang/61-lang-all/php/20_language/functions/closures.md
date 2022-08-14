# Closures

Unlike JS closures, in PHP you must explicitly import with `use` free vars from outer scopes. PHP calls anonymous functions and closure using the later term.


```php
$free = 42;

// use free var by importing it
$closure = function($bound_var) use($free) {
  return [$free, $bound_var];
};

[$a, $b] = $closure(52);



// escaped scope via closure
$adder = function($a) {
    return function($b) use($a) {
        return $a + $b;
    };
};

$add7 = $adder(7);

echo $add7(8); // 15

// compressed
$d = function($a){return function($b)use($a){return $a+$b;};};



// pass a function, import fn into closure
$g = function($f){return function($a,$b)use($f){return $f($a,$b);};};
$h = $g(function($x,$y){return $x+$y;});
echo $h(6,8); // 14
$h = $g( ($x,$y) => $x+$y; );
```


PHP closures use *early-binding*, meaning the variables referenced by the closure will have the value they had at the time of closure's creation.

If you change the variable afterward, the change will not be seen from within the closure:

```php
$s = 'orange';
$my_closure = function() use($s) { echo $s; };
$my_closure(); // 'orange'
$s = 'banana';
$my_closure(); // 'orange'
```

To enable the closure to see potential variable mutation, *import the free variable by reference*. This also means that if you import an object in a closure, any modification done to object are reflected, i.e. *objects are passed by reference*, not by value.

```php
$my_closure2 = function() use(&$s) { echo $s; };
$my_closure2(); // banana
$s = 'kiwi';
$my_closure2(); // kiwi
```

## Static closures

Every instance of a lambda has own instance of static variables. This provides for great event handlers, accumulators, etc.

Creating new lambda with `function() { ... };` expression creates new instance of its static variables, but assigning a lambda to a variable **does not** create a new instance.

A lambda is object of class `Closure`, and assigning lambdas to variables has the same semantics as assigning object instance to variables, that is, *by reference*.

For example:

`$a` and `$b` have separate instances of static variables, thus produce different output. However `$b` and `$c` share their instance of static variables because `$c` refers to the same object of class `Closure` as `$b`, thus they produce the same output.

```php
function generate_lambda() : Closure
{
    # creates new instance of lambda
    return function($v = null) {
        static $stored;
        if ($v !== null) $stored = $v;
        return $stored;
    };
}

# creates new instance of statics
$a = generate_lambda();
# creates new instance of statics
$b = generate_lambda();
# but this uses the same instance of statics as $b
$c = $b;

$a('test AAA');
$b('test BBB');
# but this overwrites content held by $b because it refers to the same object
$c('test CCC');

var_dump([ $a(), $b(), $c() ]);
```

This test script outputs:
```php
array(3) {
  [0]=> string(8) "test AAA"
  [1]=> string(8) "test CCC"
  [2]=> string(8) "test CCC"
}
```



## Closure in a class

Anonymous functions (lambda, closure) **cannot be members of a class directly**, e.g. by binding a lambda to a property. Neither static nor instance property may bind a lambda.

However, lambdas can be returned from methods. Anonymous functions declared in the context of a class (inside a non-static method) automatically get access to the `$this`.

```php
class ClosureInsideClass 
{
    public function testing() 
    {
        // returning a lambda
        return function() {
            var_dump($this);
        };
    }
}

$object = new ClosureInsideClass();
$test = $object->testing();
$test();
```

To avoid this automatic binding, declare a `static` anonymous function:

```php
class ClosureInsideClass {
    public function testing() {
        return (static function() {
            // no access to $this here - results in an error
        });
    }
};
$object = new ClosureInsideClass();
$test = $object->testing();
$test();
```


## Binding closure to an instance variable

You may have been disappointed if you tried to call a closure stored in an instance variable as you would regularly do with methods:

```php
// instantiate the builtin class
$obj = new StdClass();

// you can bind a closure to the instance variable, $obj
$obj->func = function(){
  echo "hello";
};

// but you cannot call it directly: $obj->func() doesn't work!
// because PHP tries to match an instance method called `func`
// because class members (props and methods) can have the same name
// and which one is called depends on the call context:
//      `$obj->meth()` or `$obj->prop`
// that is, on the use of the call operator, `(...)`

// So, to call the closure bound to an instace var, you have to alias it
// to a free variable and then call it off of it:

// A lambda is an obj of the Closure class, so bound by reference (aliased)

// alias the closure to a free var:
$func = $obj->func;
// and then call it using the free var:
$func();
// or use
call_user_func($obj->func);


// However, check this out:

// Binding a closure to an array's element
$array['func'] = function(){
    echo "hello";
};

// this works!
$array['func']();
```

Now, coming back to the problem of assigning functions/methods "on the fly" to an object and being able to call them as if they were regular methods, you could trick php with this lawbreaker-code:

```php
class test{
private $functions = array();
private $vars = array();

function __set($name,$data)
{
  if(is_callable($data))
    $this->functions[$name] = $data;
  else
   $this->vars[$name] = $data;
}

function __get($name)
{
  if(isset($this->vars[$name]))
   return $this->vars[$name];
}

function __call($method,$args)
{
  if(isset($this->functions[$method]))
  {
   call_user_func_array($this->functions[$method],$args);
  } else {
   // error out
  }
}
}

// LET'S BREAK SOME LAW NOW!
$obj = new test;

$obj->sayHelloWithMyName = function($name){
echo "Hello $name!";
};

$obj->sayHelloWithMyName('Fabio'); // Hello Fabio!

// THE OLD WAY (NON-CLOSURE) ALSO WORKS:

function sayHello()
{
echo "Hello!";
}

$obj->justSayHello = 'sayHello';
$obj->justSayHello(); // Hello!
```

NOTICE: of course this is very bad practice since you cannot refere to protected or private fields/methods inside these pseudo "methods" as they are not instance methods at all but rather ordinary functions/closures assigned to the object's instance variables "on the fly". But I hope you've enjoyed the jurney ;)





## Using objects as functions

Sometimes, you might want to split your function into smaller parts, but without those parts being accessible to everyone. When this is the case, you can leverage the `__invoke` magic method on any object that lets you use an instance as a function and hide that helper function as private methods inside your object:

```php
class ObjectAsFunction {
    private function helper(int $a, int $b): int {
        return $a + $b;
    }

    public function __invoke(int $a, int $b): int {
      return $this->helper($a, $b);
    }
}
$instance = new ObjectAsFunction();
echo $instance(5, 10);
```

The `__invoke` method will be called with any parameters you pass to the instance. If you want, you can also add a constructor to your object and use any methods and properties that it contains. Just try to keep it as pure as possible, because as soon as you use mutable properties, your function will be harder to understand.


## The Closure Class

All anonymous functions are in fact an instance of the Closure class. However, as stated in the documentation (http://php.net/manual/en/class.closure.php), this class does not use the aforementioned `__invoke` method; it's a special case in the PHP interpreter; besides the listed methods, this class also has an `__invoke` method, just for consistency with other classes that implement the calling magic (this method is not used for calling the function).

This method on the class allows you to change to which object the `$this` variable will be bound inside the closure. You can even *bind an object to a closure created outside of the class*.

If you start using the features of the Closure class, keep in mind that the *call method* was just recently added in PHP 7.



## Callable

The `callable` is a *parameter type hint* that can be used to enforce that the parameter of a function is something that can be called (like a function).

Beginning with PHP 7, it can also be used as a *return value type hint*:

```php
function test_callable(callable $callback) : callable {
    $callback();
    return function() {
        // [...]
    };
}
```

However, what you cannot enforce with the type hint is the number and type of arguments your callable should have. But it is already great to guarantee to have something you can call.

A callable can take multiple forms:
- A string for named functions
- An array for class methods or static functions
- A variable for anonymous functions or closures
- An object with a __invoke method


Let's start with calling a simple function by name:

```php
$callback = 'strtoupper';
$callback('Hello World !');
```

We can also do the same for functions inside of classes. 
Let's declare an A class with some functions and use an array to call it.

```php
class A {
    static function hello($name) { 
        return "Hello $name !\n"; 
    }
    
    function __invoke($name) { 
        return self::hello($name); 
    }
}

// array with class name and static method name
$callback = ['A', 'hello'];
$callback('World');
```


Using a string will only work for the static method, as other methods will need 
an object to use as their context. In the case of a static method, you can also use a simple string directly, this will, however, only work starting with PHP 7;the previous version didn't support this syntax:

```php
$callback = 'A::hello';
$callback('World');

// You can call a method on a class instance as easily:
$a = new A();
$callback = [$a, 'hello'];
$callback('World');

// Since our A class has an __invoke method,we can use it as callable directly:
$callback = $a;
$callback('World');

// You can also use any var to which an anonymous fn is assigned as callable:
$callback = function(string s) {
    return "Multi ${s}s!\n";
}
$callback('World');
```


PHP also provides you with two helpers to call functions in the form of `call_user_func_array` and `call_user_func`. They take a `callable` as a parameter and you can also pass parameters. For the first helper, you pass an array with all the parameters. For the second one, you pass them separately.

```php
call_user_func_array($callback, ['World']);
```

A final word of caution, if you are using the `callable` type hint: any string that contains a function name that has been declared is considered valid; this can lead to some unexpected behavior sometimes.

A somewhat contrived example would be a test suite where you check that some functions only accept valid `callable`s by passing it some strings and catching the resulting exception. At some point, you introduce a library and this test is now failing, although both should be unrelated. What is happening is that the library in question declares a function with the exact name that your string contained. Now, the function exists and no exception is raised anymore.
