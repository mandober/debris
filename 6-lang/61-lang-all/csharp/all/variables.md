# Variables and Parameters

- variables
- parameters
- arguments
- `ref` parameter/argument
- `out` parameter/argument
- discard argument(s)
- optional (default) parameters
- named arguments
- `params` parameter modifier



## The out modifier

- `out` argument is similar to a `ref` argument, except:
- needs to be declared before 
- need not be assigned before going into the function
- must be assigned before it comes out of the function
- need not be declared at all (new in C#7)
- like a `ref`, `out` is passed by reference.

Discard:
- use `_` as `out` param's anme to discard the value (new in C#7)
- when using multiple `out` params, discard value(s) with an underscore.
- compiler treats the underscore as a special symbol, called a *discard*.
- for backward compatibility, wont work if var named `_` (!) is in scope.


```cs
class Egout 
{
  static void Split (string n, out string f, out string l)
  {
    int i = n.LastIndexOf (' ');
    f = n.Substring (0, i);
    l = n.Substring (i + 1);
  }
  
  static void Main()
  {
    string a, b;
    Split ("John Paul Jones", out a, out b);
    Console.WriteLine (b + " " + a);

    // From C#7, declare out vars on the fly:
    Split("John Paul Jones", out string c, out string d);
    Console.WriteLine (d + " " + c);
    
    Split("John Paul Jones", out string c, out string _);
  }
}
```


## Implications of passing by reference

When you pass an argument by reference, you **alias** the storage location of an existing variable rather than create a new storage location (and mutable aliases are hazardous).

In this example, the vars x and y represent the same instance:

```cs
class Test
{
  static int x;

  static void Main() {
    Foo(out x);
  }

  static void Foo (out int y) {
    Console.WriteLine (x); // x is 0
    y = 1; // Mutate y
    Console.WriteLine (x); // x is 1
  }
}
```

## The params modifier

The `params` parameter modifier may be specified on the last parameter of a method so that the method accepts any number of arguments of a particular type. The parameter type must be declared as an array.

```cs
static int Sum(params int[] xs) {
  int sum = 0;
  for (int i = 0; i < xs.Length; i++)
    sum += xs[i];
  return sum;
}

static void Main() {
  int total = Sum(1, 2, 3, 4);
  Console.WriteLine(total); // 10
}
```

You can also supply a params argument as an ordinary array. The first line in Main is semantically equivalent to this:

```cs
int total = Sum(new int[] { 1, 2, 3, 4 } );
```


## Optional parameters

Methods, ctors and indexers can declare optional parameters. A parameter is optional if it specifies a default value in its declaration.

    void Foo (int x = 23) { Write(x); }

Optional parameters may be omitted when calling the method:

    Foo();

The default argument (23) is *actually passed* to the optional parameter `x`: the compiler **injects the value** 23 into the compiled code at the **call site**.

The call `Foo()` is semantically identical to `Foo(23)` because the compiler simply substitutes the default value of an optional parameter wherever it is used.

Adding an optional parameter to a public method that's called from another assembly requires recompilation of both assemblies - just as if the parameter were mandatory.

The default value of an optional parameter must be specified by a **constant expression** or a parameter-less ctor of a value type.

Optional parameters cannot be marked with `ref` or `out`.

Mandatory must occur before optional parameters in both method declaration and method call (the exception is with `params` arguments, which always comes last).

In the following example, the explicit value of 1 is passed to x, and the default value of 0 is passed to y:

```cs
void Foo (int x = 0, int y = 0) {
  WriteLine (x + ", " + y);
}

void Test() {
  Foo(1);
}
```

To do the converse (pass a default value to x and an explicit value to y) you must combine optional parameters with named arguments.


## Named Arguments
Rather than identifying an argument by position, you can identify an argument by name.

```cs
void Foo (int x, int y) { Console.WriteLine (x + ", " + y); }
void Test() { Foo (x:1, y:2); }
```

Named arguments can occur in any order. The following calls to Foo are semantically identical:

```cs
Foo (x:1, y:2);
Foo (y:2, x:1);
```

A subtle difference is that argument expressions are evaluated in the order in which they appear at the calling site. In general, this makes a difference only with interdependent sideeffecting expressions such as the following, which writes 0, 1:

```cs
int a = 0;
Foo (y: ++a, x: --a); // ++a is evaluated first
```

You can mix named and positional arguments: `Foo(1, y:2)`

However, there is a restriction: positional arguments must come before named arguments. So we couldn't call Foo like this:
```cs
Foo (x:1, 2); // Compile-time error
```

Named arguments are particularly useful in conjunction with optional parameters.
```cs
void Bar (int a = 0, int b = 0, int c = 0, int d = 0) { ... }
```

We can call this supplying only a value for d: `Bar(d:3)`
