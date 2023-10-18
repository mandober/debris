# Terms and Definitions


## Value Object
In computer science, a value object is a small object that represents a simple entity whose equality is not based on identity: i.e. two value objects are equal when they have the same value, not necessarily being the same object.

## Fixture
Fixtures are used to mock database data to facilitate testing. There are packages that make creating fixtures easy, supporting the ORM and many db types (MySQL, PostgreSQL, SQLite, etc.).

## Emitter
An emitter sits between a webapp and a web server that is supposed to send the response back to the client whose request is being processed. Essentially, an emitter takes the Response object and translates it into instructions that a server API can understand.

## Routing
When an application receives a request, it usually executes a controller action to generate the response. The routing configuration defines which action to run for each incoming URL.

## Controller
A controller is a user-defined function that reads information from the Request object and creates and returns a Response object. The response could be an HTML page, JSON, XML, a file download, a redirect, a 404 error or anything else. The controller executes whatever arbitrary logic your application needs to render the content of a page.

## Argument
A value passed to a function, that is intended to be mapped to the corresponding parameter. An *argument* is the value passed at the call site (the function's call site). A *formal parameter* is declared in a function's head. An *actual parameter* is a reference to a formal parameter within the body of a function. Formal parameter binds a value and the actual parameter marks the place(s) where that value is used.

However, there are many kinds of call semantics, such as call by value, call by name, call by reference, etc., that along with scoping rules, (reference) lifetime, (value) ownership, extent and other language features dictate what is allowed.

For example, if an argument is given as a literal value, then that literal is *moved* and the corresponding parameter receives and has full ownership over that literal value (no trace of it left behind). If an argument is passed as a variable that binds a scalar value, and the call-by-value semantics is in effect, then the formal parameter receives its own copy of the value.


## Behavior
External appearance or action.

**Implementation-defined behavior**   
Behavior specific to an implementation, where that implementation must document that behavior.

**Undefined behavior**   
Behavior which is not guaranteed to produce any specific result. Usually follows an erroneous program construct or data.

**Unspecified behavior**   
Behavior for which this specification provides no requirements.

## Constraint
restriction, either syntactic or semantic, on how language elements
can be used.


## error, fatal
a condition in which the engine cannot continue executing the script
and must terminate.

## error, fatal, catchable
a fatal error that can be caught by a user-defined handler.

## error, non-fatal
an error that is not a fatal error and allows for  the engine to
continue execution.


## lvalue
an expression that designates a location that can store a value.

## lvalue, modifiable
an lvalue whose value can be changed.

## lvalue, non-modifiable
an lvalue whose value cannot be changed.


## notice
An informational message informing user of the code that may not work as intended.


## Parameter
A variable declared in the parameter list of a function that will bind the corresponding argument on function call.

## PHP Run-Time Engine
The software that executes a PHP program. aka *the Engine*

## Value
A primitive unit of data operated by the Engine having a type and potentially other content depending on the type.
