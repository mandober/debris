# Operators

Operators indicate which operations to apply to the operands.

Operands:
- literals
- fields
- local variables
- expressions

Operators are divided into various categories depending on different criteria.

Operators
* by usage
  - Primary
  - Secundary
* by arity
  - Unary
  - Binary
  - Ternary
* by operands
  - bitwise: shifting, logical, conditional
  - boolean related
  - integer bitwise
* by purpose
  - Logical
  - Arithmetic
* Conditional
  - conditional
  - unconditional

Integer related
  * Bit shifting
  * Relational and type testing
  * Equality

Logical
  - Integer bitwise
  - Boolean logical
  - Logical Conditional (short-cicuited)
  - Logical Conditional (no short cicuit)
  * Logical AND
    - Integer bitwise AND
    - Boolean logical AND
    - Conditional AND
  * Logical OR
    - Integer bitwise OR
    - Boolean logical OR
    - Conditional OR
  * Logical XOR
    - Integer bitwise XOR
    - Boolean logical XOR

Conditional
  * Conditional Ternary
  * Null coalescing

Assignment
  * Assignment
  * Compound assignment

Lambdas
  * Lambda expression
  * Anonymous function



Summary of operators, operator categories in order of precedence from highest to lowest; operators in the same category have equal precedence:

* Primary
  - Member access, `x.m`
  - Method and delegate invocation, `x(...)`
  - Array and indexer access, `x[...]`
  - Post-increment, `x++`
  - Post-decrement, `x--`
  - Object and delegate creation, `new T(...)`
  - Object creation with initializer, `new T(...){...}`
  - Anonymous object initializer, `new {...}`
  - Array creation, `new T[...]`
  - Obtain `System.Type` object for T, `typeof(T)`
  - Evaluate expression in unchecked context, `checked(x)`
  - Evaluate expression in checked context, `unchecked(x)`
  - Get default value of type T, `default(T)` (implicitlly: `int i=default`)
  - Anonymous function, `delegate {...}`
* Unary
  - Identity, `+x`
  - Negation, `-x`
  - Logical negation, `!x`
  - Bitwise negation, `~x`
  - Pre-increment, `++x`
  - Pre-decrement, `--x`
  - Explicitly convert x to type T, `(T)x`
  - Asynchronously wait for x to complete, `await x`
* Multiplicative
  - Multiplication, `x * y`
  - Division, `x / y`
  - Remainder, `x % y`
* Additive
  - Addition, string concatenation, delegate combination, `x + y`
  - Subtraction, delegate removal, `x - y`
* Bit shifting
  - Shift left, `x << y`
  - Shift right, `x >> y`
* Relational and type testing
  - x < y	Less than
  - x > y	Greater than
  - x <= y	Less than or equal
  - x >= y	Greater than or equal
  - x is T	Return true if x is a T, false otherwise
  - x as T	Return x typed as T, or null if x is not a T
* Equality
  - Equal, `x == y`
  - Not equal, `x != y`
* Logical AND
  - Integer bitwise AND, `x & y`
  - Boolean logical AND, `true & false`
  - Conditional AND, eval both sides (no short cicuit), `if (x & y) ...`
* Logical OR
  - Integer bitwise OR, `x | y`
  - Boolean logical OR, `x | y`
  - Conditional OR, eval both sides (no short cicuit), `if (x | y) ...`
* Logical XOR
  - Integer bitwise XOR, `x ^ y`
  - Boolean logical XOR, `true ^ true`
* Conditional AND, `x && y`
  - Short-cicuited: eval y only if x is true
* Conditional OR, `x || y`
  - Short-cicuited: eval y only if x is false
* Null coalescing, `X ?? y` 
  - evaluates to y if x is null, to x otherwise
* Ternary Conditional, `x ? y : z`
* Assignment, `x = y`
* Compound assignment, `x op= y`
  - op: `*= /= %= += -= <<= >>= &= ^= |=`
* Lambda expression (anonymous function), `x => x*2` or `(T x) => y`


## Operator precedence
When an expression contains multiple operators, the precedence of the operators controls the order in which the individual operators are evaluated. For example, the expression x + y * z is evaluated as x + (y * z) because the * operator has higher precedence than the + operator.


## Operator overloading
Most operators can be overloaded. Operator overloading permits user-defined operator implementations to be specified for operations where one or both of the operands are of a user-defined class or struct type.
