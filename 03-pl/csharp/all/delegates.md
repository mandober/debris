# Delegates

https://docs.microsoft.com/en-us/dotnet/api/system.delegate?view=netstandard-2.0

A delegate is similar to a function pointer. 

Delegates allows the programmer to encapsulate a reference to a method inside a **delegate object**.

The delegate object can then be passed to code which can call the referenced method, without having to know at compile time which method will be invoked.



---

Delegates are similar to function prototypes, that only define the function's signature.

Instance objects of delegate types are basically *pointers to functions* i.e. 
methods that have a matching signature as the delegate declaration.

A delegate can attach to more than one function with the matching signature.

Delegate declaration:     
`delegate <returnType> <DName>(<p1Ty> p1, <p2Ty> p2, ..., <pNTy> pN)`

Names (`x`, `y`) are required but arbitrary - they don't need to match with a method this delegate will attach to.

*It's important the types match*, anything else is not (names of formal params, name of method, method's param names).

Declare instance object of this delegate type:    
`<DName> <fnName>`

```cs
// method:
int Add(int a, int b) => a + b;

// declaration of delegate with a matching sig as the method
delegate int DAdd(int x, int y);

// declare instance object of this delegate type:
DAdd Add;
```

The delegate `DAdd` declares that it can be _attached_ to any method that takes an int and returns an int. 


## Using delegates

**Example**

Defines a function variable that references a math function, executes it via that variable and puts the result in another variable:

```cs
// declare a delegate
delegate double DeDoubleDouble(double x);

// declare instance object of the delegate type
DeDoubleDouble f1;

// ATTACH a fn with matching signature
f1 = Math.Sin;
// btw, more than one fn can be attached.

// use var as fn:
double result1 = f1(4); // result1 = sin(4)

// ATTACH another fn (clearing the old one)
f1 = Math.Exp;

// use var as a new fn
result2 = f1(4); // result2 = exp(4) 
```



**Example**

To use a delegate, you first need to declare it; it must be declared outside of method, as a member of a class.


```cs
// Optional: declare some methods to test, with sig matching the delegate sig:
public static int FnSum(int a, int b) => a + b; // (int, int) -> int
public static int FnMul(int a, int b) => a * b; // (int, int) -> int

// 1. Declare a delegate (in outter space)
public delegate int DAdd(int x, int y);         // (int, int) -> int
// with this, the name "DAdd" becomes the type `DAdd`.
// It becomes a KIND OF TYPE - it will be used in type positions,
// similar to other user-defined types like class, struct, interface


// 2. Declare an instance object (variable) of the delegate type
//    That variable is function variable.
DDbl ddbl;

// 3. ATTACH inst.obj to the method with a matching sig:
ddbl = Math.Sin;

// or do 2/3 together:
//   DECLARE inst.obj (fn var) of the delegate type and
//   ATTACH it to the method with the matching sig:
DAdd dadd = FnSum;

// 4. USE inst.obj/fn.var as a function
double res = ddbl(4);

// 5.1. Attach another (keeping also the initial)
ddbl += Math.Exp;

// 5.2. Attach another (clearing the old one)
ddbl = Math.Exp;

// 6. Use inst.obj/fn.var as a function
res = ddbl(4);
```


