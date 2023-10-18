*Programming Languages: Principles and Paradigms*
Maurizio Gabbrielli and Simone Martini

Programming_Languages_Principles_and_Paradigms

1. Abstract Machines
  1.1 The Concepts of Abstract Machine and of Interpreter
    1.1.1 The Interpreter
    1.1.2 An Example of an Abstract Machine: The Hardware Machine
  1.2 Implementation of a Language
    1.2.1 Implementation of an Abstract Machine
    1.2.2 Implementation: The Ideal Case
    1.2.3 Implementation: The Real Case and The Intermediate Machine
  1.3 Hierarchies of Abstract Machines

2. How to Describe a Programming Language
  2.1 Levels of Description
  2.2 Grammar and Syntax
    2.2.1 Context-Free Grammars
  2.3 Contextual Syntactic Constraints
  2.4 Compilers
  2.5 Semantics
  2.6 Pragmatics
  2.7 Implementation

3. Foundations
  3.1 The Halting Problem
  3.2 Expressiveness of programming languages
  3.3 Formalisms for computability
  3.4 There are more functions than algorithms

4. Names and the environment
  4.1 Names and Denotable Objects
    4.1.1 Denotable Objects
  4.2 Environments and Blocks
    4.2.1 Blocks
    4.2.2 Types of Environment
    4.2.3 Operations on Environments
  4.3 Scope Rules
    4.3.1 Static Scope
    4.3.2 Dynamic Scope
    4.3.3 Some Scope Problems

5. Memory Management
  5.1 Techniques for Memory Management
  5.2 Static Memory Management
  5.3 Dynamic Memory Management Using Stacks
    5.3.1 Activation Records for In-line Blocks
    5.3.2 Activation Records for Procedures
    5.3.3 Stack Management
  5.4 Dynamic Management Using a Heap
    5.4.1 Fixed-Length Blocks
    5.4.2 Variable-Length Blocks
  5.5 Implementation of Scope Rules
    5.5.1 Static Scope: The Static Chain
    5.5.2 Static Scope: The Display
    5.5.3 Dynamic Scope: Association Lists and CRT

6. Control Structure
  6.1 Expressions
    6.1.1 Expression Syntax
    6.1.2 Semantics of Expressions
    6.1.3 Evaluation of Expressions
  6.2 The Concept of Command
    6.2.1 The Variable
    6.2.2 Assignment
  6.3 Sequence Control Commands
    6.3.1 Commands for Explicit Sequence Control
    6.3.2 Conditional Commands
    6.3.3 Iterative Commands
  6.4 Structured Programming
  6.5 Recursion
    6.5.1 Tail Recursion
    6.5.2 Recursion or Iteration?

7. Control Abstraction
  7.1 Subprograms
    7.1.1 Functional Abstraction
    7.1.2 Parameter Passing
  7.2 Higher-Order Functions
    7.2.1 Functions as Parameters
    7.2.2 Functions as Results
  7.3 Exceptions
    7.3.1 Implementing Exceptions

8. Structuring Data
  8.1 Data Types
    8.1.1 Types as Support for Conceptual Organisation
    8.1.2 Types for Correctness
    8.1.3 Types and Implementation
  8.2 Type Systems
    8.2.1 Static and Dynamic Checking
  8.3 Scalar Types
    8.3.1 Booleans
    8.3.2 Characters
    8.3.3 Integers
    8.3.4 Reals
    8.3.5 Fixed Point
    8.3.6 Complex
    8.3.7 Void
    8.3.8 Enumerations
    8.3.9 Intervals
    8.3.10 Ordered Types
  8.4 Composite Types
    8.4.1 Records
    8.4.2 Variant Records and Unions
    8.4.3 Arrays
    8.4.4 Sets
    8.4.5 Pointers
    8.4.6 Recursive Types
    8.4.7 Functions
  8.5 Equivalence
    8.5.1 Equivalence by Name
    8.5.2 Structural Equivalence
  8.6 Compatibility and Conversion
  8.7 Polymorphism
    8.7.1 Overloading
    8.7.2 Universal Parametric Polymorphism
    8.7.3 Subtype Universal Polymorphism
    8.7.4 Remarks on the Implementation
  8.8 Type Checking and Inference
  8.9 Safety: An Evaluation
  8.10 Avoiding Dangling References
    8.10.1 Tombstone
    8.10.2 Locks and Keys
  8.11 Garbage Collection
    8.11.1 Reference Counting
    8.11.2 Mark and Sweep
    8.11.3 Interlude: Pointer Reversal
    8.11.4 Mark and Compact
    8.11.5 Copy

9. Data Abstraction
  9.1 Abstract Data Types
  9.2 Information Hiding
    9.2.1 Representation Independence
  9.3 Modules

10. The Object-Oriented Paradigm
  10.1 The Limits of Abstract Data Types
    10.1.1 A First Review
  10.2 Fundamental Concepts
    10.2.1 Objects
    10.2.2 Classes
    10.2.3 Encapsulation
    10.2.4 Subtypes
    10.2.5 Inheritance
    10.2.6 Dynamic Method Lookup
  10.3 Implementation Aspects
    10.3.1 Single Inheritance
    10.3.2 The Problem of Fragile Base Class
    10.3.3 Dynamic Method Dispatch in the JVM
    10.3.4 Multiple Inheritance
  10.4 Polymorphism and Generics
    10.4.1 Subtype Polymorphism
    10.4.2 Generics in Java
    10.4.3 Implementation of Generics in Java
    10.4.4 Generics, Arrays and Subtype Hierarchy
    10.4.5 Covariant and Contravariant Overriding

11. The Functional Paradigm
  11.1 Computations without State
    11.1.1 Expressions and Functions
    11.1.2 Computation as Reduction
    11.1.3 The Fundamental Ingredients
  11.2 Evaluation
    11.2.1 Values
    11.2.2 Capture-Free Substitution
    11.2.3 Evaluation Strategies
    11.2.4 Comparison of the Strategies
  11.3 Programming in a Functional Language
    11.3.1 Local Environment
    11.3.2 Interactiveness
    11.3.3 Types
    11.3.4 Pattern Matching
    11.3.5 Infinite Objects
    11.3.6 Imperative Aspects
  11.4 Implementation: The SECD Machine
  11.5 The Functional Paradigm: An Assessment
  11.6 Fundamentals: The λ-calculus

12. The Logic Programming Paradigm
  12.1 Deduction as Computation
    12.1.1 An Example
  12.2 Syntax
    12.2.1 The Language of First-Order Logic
    12.2.2 Logic Programs
  12.3 Theory of Unification
    12.3.1 The Logic Variable
    12.3.2 Substitution
    12.3.3 Most General Unifier
    12.3.4 A Unification Algorithm
  12.4 The Computational Model
    12.4.1 The Herbrand Universe
    12.4.2 Declarative and Procedural Interpretation
    12.4.3 Procedure Calls
    12.4.4 Control: Non-determinism
    12.4.5 Some Examples
  12.5 Extensions
    12.5.1 Prolog
    12.5.2 Logic Programming and Databases
    12.5.3 Logic Programming with Constraints
  12.6 Advantages and Disadvantages of the Logic Paradigm

13. A Short Historical Perspective
  13.1 Beginnings
  13.2 Factors in the Development of Languages
  13.3 1950s and 60s
  13.4 The 1970s
  13.5 The 1980s
  13.6 1990s
