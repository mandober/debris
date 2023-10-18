# Higher-kinded types

Types classify values and *kinds* classify types. Higher-kinded types are *type constructors*. Type constructors come in various kinds, with the simplest ones being kind of the *flat* type ctors like `number`, `string`, etc.; these are unparameterized type ctors and they have the simplest kind, `*` (read "star").

Kinds classsify types, and kind can also be understood as an attribute of type ctors of certain arity. An example of a parameterized type ctor is `Array`, which takes a single type, represented by a type parameter like `A`, to become the complete or saturated type `Array<A>`. So, just `Array` is a type (a type ctor) that has the kind `* -> *`, but `Array<A>` has kind `*`.


 - this type is called 'Array' and the type ctor is called 'Array', but



related to *arity* of type ctors. 


the type ctors (by arity).
