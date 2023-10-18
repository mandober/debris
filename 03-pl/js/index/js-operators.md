# JS :: Index :: Operators


## Properties of JS operators

* Name (Naming Scheme)
  * Number of characters
    * 1 single char:
      - ops: `+`, `!`, …
      - special: `;`, `{}`, `:`
        - repeating (unsemantic but valid): `;;;;;`
    * 2 chars
      - same: `++`, `--`, `??`, …
      - diff: `+=`, `=>`, `.?`, `()`, …
    * 3 chars
      - same chars
        - semantic: `...`
        - unsemantic: `!!!`
      - diff chars:
        - semantic: `>>=`, `<<=`, `**=`, …
        - unsemantic: `-+-`, `+-+`, …
    * ∞ chars (unsemantic):
      - `!!!!!!…`
      - `+-+-+-+-…`
    * confusers (valid expressions):
      - `++x+x++`
  * Reserved
  * Restricted
* Fixity
  * Position
  * Associativity
  * Precedence
* Arity
* Coercing, force conversion
* Returned value
  * Type of input value(s)
  * Type of returned value
* Sort
* Class


## Classification of JS operators

* Fixity
  * Position
    - prefix operators
    - sufix operators
    - infix operators
    - mixfix operators
  * Associativity
  * Precedence
* Naming Scheme
  - alphabetic name
  - symbolic name
* Arity
  - unary operators
  - binary operators
  - ternary operators
* Evaluation
  * Coercion, conversion
  * Short-circuiting
* Type
  * Input type
  * Returned type
  * Return value?
  * Polymorphic
    * Triple roled operators
    * Double roled operators
      - `+`, `-`
      - `+` (string, number, bits)
  * Overridable operators
    - numeric ops
    - string concat (+)
* Sort
  * Assignment operators
  * Increment operators
  * Decrement operators
  * Querying operators
* Class
  - Arithemtical operators
  - Logical operators, `||`, `&&`
  - Bitwise, `|`, `&`, `^`
  - Relational operators, `<`, `<=`, `>`, `>=`
  - Comparision operators, `==`, `===`
    - Loose comparision operator (performs conversion), `==`
    - Strict comparision operator (no conversion), `===`
  - Guard operators
    - Guard operator, `&&`
    - Fallback operator, `||`
    - Nullish coalescing operator, `??`
    - Nullish property, `.?`
* Reserved, Restricted



  - =, +=, -=, *=, **=, %=, =&, =|
      - prefix
        - ++x, --x
      - postfix
        - x++, x--
    - increment operators
    - decrement operators
  - return value
  - right-associative



The following binary operators coerce:
- arithmetical: + - * ** / %
- bitwise:      & | ^ << >> >>>
- relational:   < <= > >=

These can work with objects and thus don't coerce:
- assignment, =, +=, -=, *=, **=, &=, |=, <<=, >>=, %=, ||=, &&=
- Equality operators, ==, ===
- inequality operators
- boolean operators, ||, &&
- nullish, `??`, `.?`


https://2ality.com/2011/12/fake-operator-overloading.html


## List of JS operators

- *unary operators*
  - *unary prefix operators*
    - `+` (unary plus)
    - `-` (unary minus)
    - `typeof`
    - `delete`
    - `void`
    - `++` (increment prefix op)
    - `--` (decrement prefix op)
  - *unary postfix operators*
    - `++` (increment postfix op)
    - `--` (decrement postfix op)
- binary operators
  - binary infix operators
  - binary infix operators
    - `+` (addition in numeric contexts)
    - `+` (concatenation in string contexts)
    - `-`
    - `/`
    - `%`
    - `*`
    - `**`
    - `in`
    - `??` (nullish coalescent)
    - `.?` (nullish property)
    - `==`
    - `!=`
    - `===`
    - `!==`
    - `&&` (guard operator)
    - `||` (fallback operator)
  - ternary mixfix operators
    - `_ ? _ : _`


## List of JS operators


- S1, Single symbol, `.`, `,`, `!`, `~`, `+`, …
  - Homogeneric
  - S2, Doubled symbol, ||, &&, **, ??, ++, --, <<, >>, …
    - infinitely concanatable (different semantics)
    ;, ;;, ;;;, ;;;, …
    !, !!, !!!, …
    -, --, - - -, - - - -, …
    +, ++, +++, ++++, …
- Heterogeneric
    - `+=`
    - `+-`
    - infinitely concanatable (possibly diff semantics)
      - `(+-)*`
      - `(-+)*`
      - `-+-+-+-+-+-+-+3`



Single-symbol
```
!
~
@
#
$
%
^
&
*
[]
-
+
{}
|
()
/
;
"
:
'
<
>
?
,
.
\
-
+



+       Addition
+=      Addition assignment
=       Assignment
&       Bitwise AND
&=      Bitwise AND assignment
~       Bitwise NOT
|       Bitwise OR
|=      Bitwise OR assignment
^       Bitwise XOR
^=      Bitwise XOR assignment
_, _    Comma operator
_, _    Comma separator, trailing comma separator
_?_:_   Conditional (ternary) operator
--      Decrement
/       Division
/=      Division assignment
==      Equality
**      Exponentiation
**=     Exponentiation assignment
*       Generator marker: function*, yield*
>       Greater than
>=      Greater than or equal
(…)     Grouping operator
++      Increment
!=      Inequality
<<      Left shift
<<=     Left shift assignment
<       Less than
<=      Less than or equal
&&      Logical AND
&&=     Logical AND assignment
!       Logical NOT
||      Logical OR
||=     Logical OR assignment
*       Multiplication
*=      Multiplication assignment
??=     Nullish coalescing assignment
??      Nullish coalescing operator
?.      Optional chaining
.       Property accessors
...     Rest syntax
%       Remainder
%=      Remainder assignment
>>      Right shift
>>=     Right shift assignment
...     Spread syntax
===     Strict equality
!==     Strict inequality
-       Subtraction
-=      Subtraction assignment
-       Unary negation
+       Unary plus
>>>     Unsigned right shift
>>>=    Unsigned right shift assignment



;       Statement terminator
;;      Statement (empty)
{}      Statement block (empty)
=>      Function expression
[]      Array (empty)
[…]     Array indexing operator
[…]     Computed property access
{…}     Block

_()     Function: empty param list declaration
_()     Function call (empty arg list)
_(…)    Function: param list declaration
_(…)    Function call

_:      Label
_: …    Labelled statement block
_: {}   Labelled empty statement block


async function expression
async function* expression
await
class expression
delete  Delete operator
Destructuring assignment
Function expression
function* expression
import.meta
import()
in      Element operator
instanceof
new
new.target
null
super
this
typeof      Operator typeof
void        Operator void
yield
yield*
```
