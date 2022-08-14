# Traversable

- https://www.php.net/manual/en/class.traversable.php
- `Traversable` interface is the base for `Iterable` and array types
- if a class impl it, it is traversable using `foreach`
- `Traversable` is an *abstract base interface* cannot be implemented alone, but must be impl by either `IteratorAggregate` or `Iterator`.

Note:

Internal (built-in) classes that implement this interface can be used in a foreach construct and do not need to implement IteratorAggregate or Iterator.

Note:

This is an internal engine interface which cannot be implemented in PHP scripts. Either IteratorAggregate or Iterator must be used instead. When implementing an interface which extends Traversable, make sure to list IteratorAggregate or Iterator before its name in the implements clause.
