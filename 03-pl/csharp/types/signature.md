# Signature

Signatures are usually related to types, as in type signature. Furthermore, most of the time, they refer to function (i.e. method) signatures.

A function's signature is similar to a function's prototype (e.g. in C lang); complete signature, sometimes called a header, includes everyting except the function's body.

Function's complete signature might include:
- Attributes
- Modifiers
- Output type
- Name
- Declaration of generic type params
- Input types
  - parameter order
  - parameter type
  - parameter name


Traditionally (e.g. in functional languages and type theory), the only important pieces (wrt. the list above) are input and output types.

So, a function's signature (its type) could be:

`int -> bool`   
which means it takes a param of int type and returns a value of bool type.

`string -> int -> bool`    
This anonymous function takes a param of string type and returns an anonymous function that takes a param of int type and returns a value of bool type.


# Signatures and overloading

With regards to overloading, only the input params are significant: for overloading to be allowed, the new function has to have something different concerning the input params:
- arity
- params type
- params order (if their types are distinct).


```cs
// this binary function:
int Over(string s, int x);

// can be overloaded by any function of DIFFERENT ARITY:
int Over(string s);
int Over(string s, int x, bool z);
// even with a nullary function that changes a the return type
void Over();
```

