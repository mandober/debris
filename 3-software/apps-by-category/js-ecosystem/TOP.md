# TOP



JavaScript Foundations

object wrappers
coercion
scope, 
closure, 
types, 
prototype system, 
ES6 features, 
== vs === 
JavaScript engine
function and block scope
var, let and const

Scope
Scopes and Closures Introduction
Lexical scope, 
Nested Scope, 
Hoisting, 
Closure

Compiling Function Scope
As the JavaScript compiler enters a function, it will begin looking for declaration inside that scope and recursively process them. Once all scopes have been compiled, the execution phase can begin.

Execution of Function Code
As the execution phase continues within the function scope, the same Left-Hand Side (LHS) and Right-Hand Side (RHS) operations are applied. Things get a little interesting with undeclared variables. They are automatically declared in the global scope.

Strict Mode
Kyle recommends using Strict Mode, which is done by putting "use strict" before any other statemnts.

Scope and Execution Example
Kyle walks the audience through another example of how the JavaScript compiler will declare and execute variables and functions. This example includes a nested function which creates a nested scope.



Named Function Expressions
A function declaration occurs when the function keyword is the first word of the statement. Functions assigned to a variable become function expressions. Kyle explains these difference while also describing the benefits of function expressions. Kyle also answers questions from students.

Lexical Scope
Kyle reviews Lexical Scope and Dynamic Scope, which are two models of scope programming languages.

Function Scoping
Kyle discusses function scoping as a method to use a function to create scope to protect variables from collision or access. To keep the function name from potentially causing a collision, Kyle creates an anonymous function expression.

IIFE Pattern
To create an object in their scope without polluting the outer scope, Kyle demonstrates the Immediately Invoked Function Expressions (IIFE) Pattern, a technique used to hide scope involving wrapping code inside a function that is immediately called. Kyle answers questions from students.

Block Scoping
Kyle reviews the ES6 "let" keyword that will implicitly create a block-level scope and add declarations to that scope rather than the enclosing function. The most common use-case for the let keyword is for loops.

Problems with let Keyword
Kyle describes a few issues he has with the let keyword. Some of his issues are stylistic, but others are related to common variable functionality like hoisting.

Const Keyword
Kyle introduces const, which also creates a block-scoped variable, but whose value is fixed or constant. Any attempt to change that value at a later time results in an error.

Hoisting
Kyle explains "hoisting," which is the moving of declarations to the top of the scope block during the compiling phase. Hoisting applies to both variable declarations and functions. Kyle spends some time explaining why hoisting exists in JavaScript and the problems surrounding it.


Closure
Closure Introduction
Kyle introduces closures, which are when a function remembers its lexical scope even when the function is executed outside that lexical scope. Kyle shows examples using some common JavaScript structures like setTimeout and click events. He also demonstrates closure in shared scopes and nested scopes.


Closure Examples
Kyle demonstrates a few additional closure examples inside loops and the misconceptions that arise. He also compares closure to traditional object references to explain the difference.

Module Patterns
Kyle reviews modules, which let you define private implementation details that are invisible to the outside world. Kyle reviews different module patterns: classic, modern, and ES6 module patterns.

Object-Orienting

Object-Oriented Introduction
Kyle introduces the next core foundation to cover in the course, Object-Orienting: this, Prototypes, class {}, and "Inheritfance" vs. "Behavior Delegation."

this
Kyle reviews the "this" function. Every function, while it's executing, has a reference to its current execution context called "this." The "this" reference is JavaScript's version of dynamic scope. Kyle explains the "this" keyword's relationship to the call site of the function.

Binding Confusion
Kyle demonstrates that attempting to force the "this" keyword into a different lexical scope can lead to some binding confusion.

Explicit Binding
Kyle explains explicit bindings and also detours into a discussion about a technique he calls "hard binding." The explicit binding rule allows developers to use the "call" method and pass an explicit reference for the "this" binding. Explicit bindings can also be set using the "apply" method. Hard binding is available in the form of the "bind" method.

The new Keyword
Kyle explains the functionality of the "new" keyword and the effects it has when placed in front of a function call. JavaScript does not have classes and the "new" keyword does not do any instantiation.

this Review
In reviewing "this," Kyle quizzes the students.


Prototypes
Prototypes Introduction

In JavaScript, every object is built by a constructor function and does not mean classes are being instantiated. When a constructor function is called, a new object is created with a link to the object's prototype.

diagramming the relationship between an object and its prototype.
Kyle explains the relationship between __proto__ (dunder-proto) and the prototype keyword and how both reference the underlining prototype.

Prototype Linkages
Prototype linkages allow delegation to other objects to hand method calls or property references. This process allows additional objects to be created from a prototype with duplication of the function code. This binding is beneficial as long as developers don't break any rules.

Prototype: Objects Linked
Prototypes in JavaScript can be linked and share a parent-child relationship similar to a subclass and superclass. This relationship is beneficial when extending a prototype to add additional methods. However, there are issues with constructor references.

Linked Prototype Diagram
Kyle revisits the prototype diagram he drew on the whiteboard earlier. This time, however, he shows a more sophisticated version outlining the relationship of the two linked prototypes.

Prototype Review
In reviewing Prototype, Kyle quizzes the students.

module factory function
prototype-style constructor function

ES6 Class
Kyle dives into E6S class, stating that it's "syntactic sugar" and still prototype system.


Inheritance
In classical inheritance, properties and methods of a class are copied to object instantiated from that class. Subclasses inherit the properties and methods of a parent class and copy them to their instantiated objects. Kyle contrasts that with JavaScript's "prototypal inheritance" or "behavior delegation."

Objects Linked as Other Objects
Rather than relating prototypes to inheritance, Kyle demonstrates that prototypes allow actions to be delegated to other objects. Kyle refers to this a Objects Linked to Other Objects (OLOO) and simplifies a coding example by using this OLOO technique. Kyle compares object-oriented (OO), and OLOO approaches.

Delegation: Design Pattern
Kyle discusses the need to change our thinking from the class/inheritance design pattern to the behavior delegation design pattern.

Convert Modules to Objects

Introducing Types and Coercion

Primitive Types Introduction
built-in types:
undefined, string, number, boolean, object
symbol
function is a subtype of the object type

special values in primitive types
NaN, Infinity, null, undefined (void)
positive zero or +0
negative zero or -0

Native Functions
native functions or "natives"
built-in JavaScript functions

Coercion

Abstract Value Operations
how values become either a string, number, or boolean
abstract operations or internal-only operations:
ToString, ToNumber, ToBoolean, ToPrimitive.

Explicit Coercion

Date to number coercion methods
Date.now() static function
tilde ~ operator, or "bitwise NOT"

The Bad Parts of Value Coercion

Implicit Coercion: Strings & Numbers
Kyle defines implicit coercion as a side-effect of some other operation or as something that is not clear when looking at the code that coercion will occur. Kyle introduces implicit coercion with a few examples using String and Number values.

Implicit Coercion: Booleans
the boolean() native function and how booleans behave in JavaScript.

Implicit Coercion: Loose Equals
Mentioning that the most common complaint against implicit coercion in loose equals, == comparisons, comes from how falsy values surprisingly act when compared to each other, Kyle shows that == operator is used for checking values for equality comparison.

Implicit vs Explicit Coercion
Double vs. Triple Equal
double-equal operator allows coercion in a comparison while triple equal operator, ===, does not.
performance impacts of double and triple equal operator. 
