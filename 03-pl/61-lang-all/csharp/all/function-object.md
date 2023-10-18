# Function object


## Function types

Function objects must have some type. In C# we can define:
- **Delegates**
- **Generic functions**


## Generic Function Types

`System.Func<T, U, R>`
* Encapsulates a method that has
  - two params of types `T` and `U` and
  - returns a value of the type specified by `R` type parameter.
* Type Parameters:
  - `T`: type of 1.param
  - `U`: type of 2.param
  - `R`: type of the return value
* Parameters:
  - `p1`: name of 1.param
  - `p2`: name of 2.param
* Returns:
  - return value of the method

(from `BCL/system/action.cs`): Action/Func delegates first shipped with *.NET Framework 3.5* in `System.Core.dll` as part of LINQ. These were type forwarded to `mscorlib.dll` in *.NET Framework 4.0*.





The `Func<T1, T2, ...,Tn, TR>` is equivalent to:

```cs
Func<double, double> f2 = Math.Sin;
double result3 = f(4);
f2 = Math.Exp;
result4 = f(4);
```

There are also 2 specific generic fn types, `Predicate` and `Action`.
- **Predicate** always returns a `bool`
- **Action** always returns `void`

Both can be expressed as `Func`:
- predicate: Predicate<T1, T2, ...,Tn>
- action: Action<T1, T2, ...,Tn>




## Function Values

Once you define function objects, you can assign them other existing functions 
as shown in the previous listings or other function variables. Also, you can 
pass them to other functions as standard variables. If you want to assign a 
value to a function, you have the following possibilities:
  - Point the function object to reference some existing method by name,
  - Create an anonymous function using the lambda expression or delegate and
    assign it to the function object
  - Create a function expression where you can add or subtract a function and 
    assign that kind of multicast delegate to the function object.
*/

// Examples

Func<double, double> f1 = Math.Sin;
Func<double, double> f2 = Math.Exp;

double y = f1(4) + f2(5); //y=sin(3) + exp(5)
f2 = f1;
y = f2(9); //y=sin(9)

/*
In this case, methods are referred as `ClassName.MethodName`
Instead of existing functions you can dynamically create functions
  and assign them to variables.
In this case you can use either anonymous delegates or lambda expressions. 
*/

// example
Func<double, double> f = delegate(double x) { return 3*x+1; }
double y = f(4); //y=13
f = x => 3*x+1;
y = f(5); //y=16 

/*
In this code we have assigned a delegate that accepts a double argument x and 
returns a double value 3*x+1.
As this dynamically created function matches Func<double, double>, it can be 
assigned to the function variable.

In the third line is assigned an equivalent lambda expression.
As you can see, the lambda expression is identical to the function: 
  it is just a function representation in the format 
    parameters => return-expression


This shows some lambda expressions and equivalent delegates:
*/

















