# PL :: Index :: By paradigm

Major paradigm        | Primary unit of code
----------------------|----------------------------
procedural            | statement-orientated
object-orientated     | classes and objects, methods, properties
functional            | functions, expressions
logic                 | relations, clause
array-orientated      | array
concatenative         | stack, point-free functions
expression-orientated | expression

Routines
- procedure (returns nothing)
- function (must return something)
- pure function (must and return take something, side-effects free)
- subroutine
- block
- generator function


- logic-functional language
- function language
- purely-functional language
- concatenative language


- *By common features*
  - evaluation strategy
  - purity, mutability
  - infinite data structures
  - self-reference
  - polymorphism
  - type system
  - lifetime (vars), [scoping feature]
  - scope: dynamic, lexical
  - sigils (obligatory signs on vars to indicate type or scope)
    - VimL: s:foo, v:bar, p:baz, &opt, defopt&, opt&:vim, opt&:vi
    - Perl: %scalar, &name, $name
    - in shell: `$` is dereference operator (partly in PHP also)
  - declaration:
    - vars: needs keyword (JS) vs direct (Haskell)
    - fns:  needs keyword (VimL) vs direct (Haskell)
  - forward declaration
    - required: C (requires stating a fn's prototype)
    - not required: Haskell
    - hoisting: JS (for `var` and `function`, but not for `let` and `const`)
  - ternary conditional
    - C form: `b ? t : e`
    - Python form: `t if b else e`
    - Lisp form: `(cond (x > y) (t) (e) )`
    - function form: `ifte b t e`
  - defining new operators
    - Agda: `_+_` (infix), `_!` (suffix), `if_then_else_`, `_?_:_` (mixfix)
    - Haskell: `x + y` (infix), op as prefix `(+) x y`, fn as infix: x `div` y
    - overloading
    - ad hoc polymorphism

- *by type system*
  - dynamic, static (strong, weak)
  - type params
  - generics
  - polymorphism

- *by polymorphism*
  - parametric
  - ad hoc
  - enumerative
  - row polymorphism

- *by orientation*
  - prototypical inheritence
  - class-orientated
  - object-orientated
  - class-orientated
  - prototype-orientated
  - aspect-orientated
  - contract-orientated
  - array-orientated

- *by OO features*
  - class
    - classes as objects
  - object (class instance)
  - interface
  - traits
  - inheritance
    - single inheritance model
    - multiple inheritance model
    - class implementing a class
    - class implementing an interface
    - class implementing a class and interfaces
    - prototype chain
  - dispatching model
    - static dispatch
    - dynamic dispatch

- *by datatypes*
  - booleans
  - numbers
  - strings


*by various features*
  - has null
  - has recursion
  - has tail-call optimization (TCO)
  - has continuations
  - supports parallelization
  - concurrent programming
  - signals, channels


*by feature-categories*
  - by name binding
    - static name binding
    - dynamic name binding
    - late name binding
  - by mutability
    - pure
    - mutable
    - semi-muable
  - by eval strategy
    - lazy
    - eager


- *by misc-features*
  - comments
    - block comments
    - multi-line comments
    - doc comments
  - code block delineation
    - by layout (whitespace)
    - offside rule (or semicolons)
    - semicolons
    - newlines (and semicolons)
    - dot
  - has NULL
  - has sum types
  - has generics
  - has pattern matching
