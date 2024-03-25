# WebAssembly Syntax



## Wasm
WebAssembly (abbr. Wasm) is a safe, portable, low-level code format designed for efficient execution and compact representation.

- Its main goal is to enable high performance apps (on the Web).
- WebAssembly is an open standard developed by a W3C Community Group.
- In 2019 version 1.0 of the core WebAssembly standard is the latest.
- At its core, Wasm is a virtual instruction set architecture (virtual ISA).
- WebAssembly is a low-level, assembly-like, programming language.

WebAssembly provides no access to the environment in which code is executed. It can only invoke functions provided by the embedder and imported into a WebAssembly module.

WebAssembly relies on *IEEE 754-2008* standard for the representation of floating-point data and the semantics of respective numeric operations; and on *Unicode* standard for the representation of import/export names and the text format.

Core ISA layer of WebAssembly defines:
- instruction set
- binary encoding
- validation
- execution semantics
- textual representation


* Concepts
  * Values
  * Instructions
  * Traps
  * Functions
  * Tables
  * Linear Memory
  * Modules
  * Embedder
* Semantics
  * Decoding
  * Validation
  * Execution
    * Instantiation
    * Invocation


## Concepts


* Instructions
  - The computational model of WebAssembly is based on a stack machine.
  - Code consists of sequences of instructions that are executed in order.
  - Instructions manipulate values on an implicit operand stack 
  - 2 categories:
    - *Simple instructions* perform basic operations on data. They pop
      arguments from the operand stack and push results back to it.
    - *Control instructions* alter control flow. Control flow is structured,
      meaning it is expressed with well-nested constructs such as blocks,
      loops, and conditionals. Branches can only target such constructs.

* Traps
  - certain instructions may produce a trap, which aborts execution.
  - Traps cannot be handled by WebAssembly code
  - reported to outside env (where they typically can be caught)

* Functions
  - Code is organized into separate functions.
  - Each function takes a sequence of values as parameters 
  - returns a sequence of values as results (for now, 1 result only)
  - Functions can call each other, including recursively, 
    resulting in an implicit call stack that cannot be accessed directly.
  - may declare mutable local vars that are usable as virtual registers.

* Tables
  - **A table is an array of opaque values of a particular element type**.
  - It allows programs to select such values indirectly through a dynamic index operand.
  - Currently, the only available element type is an *untyped function reference*.
  - Thereby, a program can call functions indirectly through a dynamic index into a table. For example, this allows emulating function pointers by way of table indices.

* Linear Memory
  - **linear memory is a contiguous, mutable array of raw bytes**.
  - Such a memory is created with an initial size but can be grown dynamically.
  - A program can load and store values from/to a linear memory at any byte address (including unaligned).
  - Integer loads and stores can specify a storage size which is smaller than the size of the respective value type.
  - A trap occurs if an access is not within the bounds of the current memory size.

* Modules
  - A WebAssembly binary takes the form of a module that contains definitions for functions, tables, and linear memories, as well as mutable or immutable global variables.
  - Definitions can also be imported, specifying a module/name pair and a suitable type.
  - Each definition can optionally be exported under one or more names.
  - In addition to definitions, modules can define initialization data for their memories or tables that takes the form of segments copied to given offsets.
  - They can also define a start function that is automatically executed.

* Embedder
  - A WebAssembly implementation will typically be embedded into a host environment.
  - This environment defines how loading of modules is initiated, how imports are provided (including host-side definitions), and how exports can be accessed.
  - However, the details of any particular embedding are beyond the scope of this specification, and will instead be provided by complementary, environment-specific API definitions.


### Semantic Phases

Semantics
* Decoding
* Validation
* Execution
  * Instantiation
  * Invocation


* Decoding
- WebAssembly modules are distributed in a binary format.
- Decoding processes and converts it into an internal repr of a module.

* Validation
- decoded module has to be valid.
- Validation checks a number of well-formedness conditions to guarantee that the module is meaningful and safe.
- In particular, it performs type checking of functions and the instruction sequences in their bodies, ensuring for example that the operand stack is used consistently.

* **Execution**
  - Finally, a valid module can be executed.
  - Execution can be further divided into two phases:
  - Instantiation and invocation are operations within embedding env.
  1. *Instantiation*
    - A module instance is the dynamic representation of a module, 
      complete with its own state and execution stack.
    - Instantiation executes the module body itself, 
      given definitions for all its imports.
    - It initializes globals, memories and tables and invokes 
      the module’s start function if defined.
    - It returns the instances of the module’s exports.
  2. *Invocation*
    - Once instantiated, further WebAssembly computations can be initiated
      by invoking an exported function on a module instance.
    - Given the required arguments, that executes the respective function
      and returns its results.


WebAssembly, as a programming language,
has multiple concrete representations:
- binary format 
- text format 
- both map to a common structure



## Syntax

Conventions:
https://webassembly.github.io/spec/core/syntax/conventions.html


## WebAssembly Text Format

- WebAssembly Text Format (.wat files)
- S-expression: a parenthesized syntax for representing code as nested trees

```wat
(module
  (func $add (param $lhs i32) (param $rhs i32) (result i32)
    get_local $lhs
    get_local $rhs
    i32.add)
  (export "add" (func $add))
)
```

Module: `(module (...))`
- `module` is the first expr at the top of every module declaration
- there's no module name, package name, namespace.
- There are a number of other things that can go below this declaration


Function: `(func $<fname> (param $<pname> <ptype>) ... ) (result <type>)`
- `func` to create a function
- Each param is indicated with an sexpr: `(param $<pname> <type>)`
- The return value is indicated with `(result <type>)`
- `get_local` retrieves a fn-scoped value, places it on Wasm execution stack.

```wat
(func $<fname> (param $<pname> <ptype>)* ) (result <type>)
```
