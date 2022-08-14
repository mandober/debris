# Programming language features

PL features
  - Syntax
  - Semantics
  - Pragmatics

* Crucial features
  - stronk type system (at least HM)
  - first-class functions, closures, lambdas
  - algebraic types (particularly sum types), no null
  - module system
  - pattern matching
  - async, futures, promises
  - immutability (makes parallelism resonable)


* Types (naive, preliminary aspect)
  - machine primitive types
  - machine integers corr to arch (bitness)
    - 64-bits @ x86_64 (older: 32-bit @ x86)
    - floating-point numbers
      - binary32 (Float)
      - binary64 (Double)
      - binary128
  - language primitive types
    - may corr to machine prims
  - base lang types (mostly scalars, based on integers)
    - Nat{,8,16,32,64,128}
    - Int{,8,16,32,64,128}
    - Word{,8,16,32,64,128}
    - Bool (= Int2, Word2)
    - Char
    - floating-point numbers
    - More complicated types (but provided as prim)
      - string
      - pointer, reference
      - function type
  - user-defined types
  - builtin types
  - exotic types (js)
  - compound types
    - <AND>
      - record
      - object
      - struct
      - product type
    - <OR>
      - enum
      - enumeration
      - sum type
      - union
      - disjoint union
      - tagged union


* Subroutines (generic term for grouping code into a new unit)
  - procedures (generally return nothing)
  - functions (generally must return something)
    - first-class functions
    - closures (lexical closure = captures env at the definition time)
    - anonymous functions
    - lambda functions
  - code block, `{ … }` (does it intro new scope?)


* Phases
  - crucial phases (full of actions)
    - compile-time
    - run-time
    - link-time
  - misc phases (only as moment markers)
    - authoring time
    - design time
    - definition time
    - declaration time
  - compilation related
    - first pass
    - second pass
    - multi pass compilers
    - lexing
    - tokenization
    - AST construction
    - desugaring
    - lowering
    - optimization
    - translation (into intermediary lang)
