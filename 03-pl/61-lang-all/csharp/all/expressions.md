# Expressions

## Debrief: expressions

- Expression evaluates to a value.
- The simplest kinds of expressions are constants and variables.
- Expressions can be transformed and combined using operators.
- Operator takes one or more input operands to output a new expression.
- constant expression, e.g. `12`
- Operators can be classed as unary, binary, or ternary
- **Primary expressions** include expr composed of operators that are intrinsic to the basic plumbing of the language, e.g. `Math.Log(1)`
- **Void expression** is an expression that has no value.
- **Assignment expression** uses the `=` operator to assign the result of another expression to a variable, e.g. `y = x = x * 5`. Evaluates to what was assigned, e.g. `y = 5 * (x = 2)` or `a = b = c = d = 0`
- **Compound assignment operators** are sugar that combine assignment with another operator, e.g. `x <<= 1` equivalent to `x = x << 1` (unless OL'ed)
- Higher precedence operators execute before lower precedence operators. If tie, operator's associativity determines the order of evaluation.
- Binary operators (except for assignment, lambda, and null coalescing operators) are left-associative, e.g. `8 / 4 / 2` = `(8 / 4) / 2`
- Right-associative: assignment, lambda, null coalescing, conditional



## Kinds of expressions

- Primary expressions
  - Variable definition (returns a defined value, e.g. `int a = b = 7`)
  - Constants
    - Literal (constants) expression:
      - Literal numbers
        - decimal, `10, 10u, 10L, 10ul, 3.4f, 3.4D, 3.4m`
        - hexadecimal, `0x0a`
        - binary, `0b1010`
      - Literal char, `'A'`
      - Literal string, `"word"`
  - Call expression, `Pow(5, 2)`
- Void expression (a stetement)
- Assignment expression, `int a = b = 7`
- Compound assignment operators, `a *= 2`
- Lambda expression, `x => x*2`



## Operators: index

https://docs.microsoft.com/en-us/dotnet/csharp/language-reference/operators/

- Null-conditional, `x?.y`
- bitwise inclusive OR, `p |= q`
- bitwise exclusive OR, `p ^= q`

`is`
Determines whether an object is of a certain type, 
`if(Ford is Car)`

`as`
Cast without raising an exception if the cast fails.
`Object o = new StringReader("Hello");`
`StringReader r = o as StringReader;`


### Primary Operators

These are the highest precedence operators.

x.y   member access
x?.y  null conditional member access. Returns null if x evaluates to null
x?[y] null conditional index access. Returns null if x evaluates to null
f(x)  function invocation
a[x]  aggregate object indexing
x++   postfix increment
x--   postfix decrement
new   type instantiation
typeof      returns the Type object representing the operand
checked     enables overflow checking for integer operations
unchecked   disables overflow checking for integer operations (default)
default(T)  produces the default value of type T
delegate    declares and returns a delegate instance
sizeof      returns the size in bytes of the type operand
->          pointer dereferencing combined with member access

### Unary Operators



### Ternary Operator

Statements in ternary expr can only be:
- assignment
- call
- increment/decrement
- await
- new object expressions


