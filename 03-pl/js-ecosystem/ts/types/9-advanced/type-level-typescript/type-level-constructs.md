# TS :: Ref :: Types :: Type-level constructions




The term *generics* is used to announce that some language constructions, such as classes and objects, but particularly functions, have evolved from their monomorphic roots (and being able to handle one specific data type), into the polymorphic versions of themselves (which can now work with many different data types).

A *monomorphic function* can only handle a single (mono) data type. Sure, this makes more sense in a statically-, strongly-typed language like Haskell, where a functions signature specifies the input data types the function consumes as well as the data type it produces.

A *polymorphic function*, on the other hand, is not constrained to work with a single input data type, but can handle many different data types, and can produce a data type that is almost always related to the type of the input.

JS is dynamic language and is thus polymorphic by default, but this is not the safe or even practical version of polymorphism it was invented to address.
