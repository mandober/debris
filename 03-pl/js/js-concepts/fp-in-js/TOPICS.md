# JS :: Concepts:: FP

## TOPICS

- Introduction to FP
  - key FP concepts
- Functional languages
  - pure functional language
  - purely functional language
  - function-orientated language
- FP requirements: JS support for FP
  - requirements met by JS
    - first-class functions
    - closures
  - missing but definable requirements
    - turning statements into expressions
    - ADTs
    - pattern matching
  - missing requirements
    - purity
    - laziness¹
      ¹laziness is not strictly required although it seems purity depends on it
- laziness in JS
  - lazy evaluation
  - can be modelled via thunks
- recursion
  - call stack
    - stack frames
    - arguments
    - local variables
    - return value
    - return address/location
    - yielding control back to the caller
  - tail calls, PTC, TCE, TCO, STC
  - dealing with recursion
    - accumulators
    - continuations and CPS
    - trampolining
    - lambda lifting
    - lambda dropping
    - defunctionalization
- purity
- pure functions
- side-effects
- referential transparency
- immutability
- expression-orientated programming
  - point-free
  - arrow functions
  - HOF, functionals
  - closures
  - ternary conditional
  - spread/rest
  - comma operator
  - direct vs continuation-based style of programming
  - order of function parameters
- combinators
  - S K I
  - B composition
  - C flip
- fundamental functions
  - pipe
  - currying
  - folding
    - foldr, foldl
    - Foldables
    - Traversables
- functions as data structure
  - List
  - Tree
- type classes
  - fundamental type classes
    - Eq
    - Ord
    - Integral
    - Num
    - Bounded
    - Enum
    - Semigroup
  - categorical type classes
    - Monoid
    - Functor
    - Applicative
    - Monad
    - Foldable
    - Traversable, Iterable, Iterator
- tuples
- polymorphism, generics
  - ad hoc polymorphism
  - parametric polymorphism
- lambda calculus
- type system
  - reasoning with types
  - static type system, statically-typed language
    - weakly typed language
    - stronkly typed language
    - type inference
    - HM type system
    - lambda cube: extensions of λ in 3 dimensions
      - polymorphism
      - type functions
      - dependent types
  - dynamic type system, dynamically-typed language
  - compile-time execution
  - run-time execution
  - TypeScript's type system




## TERMS

functional programming (FP)
laziness
call-by-name
declarative programming
memoization
infinite data structures
purity, pure function
immutability
referential transparency
side-effects
peristant data structures
polymorphic data structures
destructuring
algebraic data types
folding of data structures
pattern matching
data transformation pipeline

strong type system
type inference
type signatures
type annotations

polymorphic functions
first class functions
higher-order functions
currying
partial application
sectioning
operation-first data-last
point-free style ("never say data")
arity
composition
recursion
tail-call recursion
trampoline



## functional programming concepts

pure functions
currying
composition
functors
monads
Either
Task monad

Mathematical Pure Functions
  tests to determine if one is writing a function: the object needs to be total, have an input for every output, be deterministic, and have no observable side effects.
Pure Functions Checklist
  the checklist of what makes a mathematical, pure function
Pure Functions Advantages
  how the mathematics used in functions can be useful when programming. Pure functions are reliable, portable, reusable, testable, and composable.
Currying
  Properties, Arguments & Currying
  explores the properties of a few calculation functions, and demonstrates how to write a curried function.
Currying Example & Argument Order
  Brian gives the example of the filter function, curries it, explains the argument order, and imports the currying function from the Ramda library to be able to curry with more than two arguments.
Ramda Generalized Currying
  Brian explains how to use the Ramba library while currying a function, and demonstrates how to write point free functions.
Partial Application vs Currying
  Brian explains that partial application and curried functions are dual functions. Partial application only uses one of its arguments, a curried function uses one argument at a time. The two functions have the same effect, but are written differently.
Composition
  Brian defines composition and gives examples of composed functions. A function is composed when it contains one function nested in the other, and returns a new function.
Creating Programs with Curry & Compose
  Brian demonstrates how to build a simple program using currying and compose, and argues that this way of writing code leads to consistent state mutations, but not efficient programming because of the absence of a clean data pipeline.
Composition is Dot Chaining
  Brian explains that composition and dot chaining are the same, and says that dot chaining is more ergonomic in JavaScript.
Logging in Composition
  Brian demonstrates how to use logging in function composition to debug code. Brian demonstrates how to use compose in various examples, and rewrites functions into pipelines, making code easier to read.
Refactoring with Compose
  Brian demonstrates how refactoring with function composition can make code easier to understand.
Refactoring to Point Free Style
  Brian demonstrates how to refactor functions using the point free style, explains that it allows parallelization and a better data processing workflow thanks to the high level declarative syntax.
Functors
Creating the Identity Functor
  Brian explains that a functor is a container that holds an object that is mapped over, demonstrates how to dot chain a function into a linear control flow, and explains that a functor is an object that has a map method. A functor is useful in functional programming because it abstracts function application.
Refactoring to Dot Chaining
  Brian demonstrates how to use dot chaining with a functor and refactors the code written in the previous lesson.
Functor Practices
  Brian demonstrates how to use composition and sub-composition to nest functions. Nested functions are useful to have a clear idea of the data flow.
Adding Chain for Nested Functors
  Brian demonstrates how to write a function that allows for chaining methods and argues that one could use promise.then instead, but in an effort to stay deterministic and mathematical, the use of chaining is better.
Either Monad
  Brian explains that the type Either is a functor and a monad, it has both a map, a chain method, and a fold method. The Either type respects function purity and is effectively an if else statement, but inverted.
fromNullable
  Brian explains that fromNullable is useful because it is a definitive null check for every function, and avoids repetition.
Refactoring Using the Either Monad
  Brian demonstrates through a server example how to use the Either monad to refactor code.
Flattening Either Monads with Chain
  Brian demonstrates how to flatten the Either monad using both the chain and map methods.
Adding Syntax vs Generalized Solutions
  Brian recommends using the Either type instead of exploring specific syntax that only covers one unique way of using the type.
  Brian goes over examples of using the Either type using the dot syntax, and explains that, when working with Either, it is not possible to flatten an array of another type.
Debugging with Logging
  Brian demonstrates how to use logs to debug the code, and answers questions about the Writer monad, a monad that, along with values, returns an error message.
Task
Task Monad
  Brian explains that the Task monad is the functional equivalent of promise. Similarly to promise, Task takes resolve and reject functions, but in reversed order. A Task monad only starts running once it reaches the fork method, and this way avoids race conditions.
Refactoring Node IO with Task
  Brian explains that Node IO, although commonly used, does not bring in any asynchronicity, and demonstrates how to use Task instead which gives a clean control flow.
Task Practices
  Brian goes over different Task monad examples and familiarizes the audience with the Task syntax, and characteristics.
Transforms & Monad Patterns
  Brian explores various transformations, such as type transformations, free monads, and monoids with both the either and task monad.
Inspecting the Weather API
  demonstrates how to fetch weather data from the weather API, and explains the next data parsing steps.
Separate Pure & Impure Code
  Brian builds a task monad to fetch data from an API and refactors the code using the Task monad.
Creating a Weather Module
  Brian demonstrates how to use the Task monad when creating a weather module, and how to use the monad in different places within the same application.
Parsing Weather API Data into HTML
  Brian uses HTML to show some of the results gathered through the weather API on the screen, live codes a weather data type, and refactors the code into new types, making the application cleaner, and the functions within it more accessible.
