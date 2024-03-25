# Patterns

This page looks at the patterns used in pattern matching as in pertains to TS but also in general.

The concept of pattern matching has originated in FP, where it was used as a mechanism to ensure the language entities, primarily values and types, conform to a particular shape.

The primary place where pattern matching is used is in function definitions. Instead of just declaring a 'bare' parameter (as a variable name), it is possible to specify a pattern so only the arguments that match it are accepted into the function. The primary machanism a function uses to weed out its arguments is through its type signature. If it specifies that its first parameter is a string, then the corresponding argument should and must be a string. The type system acts as a coarse sieve and only lets through values of appropriate type. While that is enough to separate strings from numbers, sometimes a more fine-grained sieve is needed that can differentiate between various shapes values of the same type may have.

## Patterns

Taking functions for example, in a function call, an argument to a function must first pass the type system check, that is, it must have the approapriate type as specified by the function's signature. After passing through the type system, the argument encounters another barrier in the form of a pattern. A match against a pattern may be successful or it may fail.


is matched against a pattern which may result in a succesful or failed match.



A language entity (e.g. a value) must first make it 

In general, patterns can be divided into refutable and irrefutable. Irrefutable patterns are those that accept any shape, 

provided it made it though the first barrier represented by the type system.


restrictions



This is achieved through pattern matching.









at the value-level 



In general, in pattern matching, a function argument can be scrutinized to check if it conforms to a particular pattern.

restrict 

the shape of 

sorts of arguments a fucntion takes.

where it was used to 


and then at the type, or any other level (e.g. kind-level) for that matter, as a mechanism to restrict the arguments (as values, types, etc.) that a fucntion takes.
