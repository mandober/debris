# Abstract definitions

https://agda.readthedocs.io/en/latest/language/abstract-definitions.html

Definitions can be marked `abstract`, for the purpose of hiding implementation details, or to speed up type-checking of other parts.

>Like postulates, abstract definitions don't reduce or compute.

For instance, irrelevant proofs can be marked abstract to prevent Agda from unfolding them (which may slow down type-checking).

As a guiding principle, all the rules concerning `abstract` are designed to prevent the leaking of implementation details of abstract definitions.

Similar concepts of other PLs include interfaces (OOP) and signatures (ML), especially when abstract definitions are used in combination with modules.

## Synopsis

* Declarations can be marked as abstract using the `abstract` block keyword.

* Outside of abstract blocks, abstract definitions do not reduce, they are treated as postulates, in particular:
  - Abstract functions never match, thus, do not reduce.
  - Abstract data types do not expose their constructors.
  - Abstract record types do not expose their fields nor constructor.
  - Other declarations cannot be abstract.

* Inside abstract blocks, abstract definitions reduce while type checking definitions, but don't reduce while checking their type signatures. Otherwise, due to dependent types, one could leak implementation details (e.g. expose reduction behavior by using propositional equality). Consequently, information from checking the body of a definition cannot leak into its type signature, effectively disabling type inference for abstract definitions. This means that *all abstract definitions need a complete type signature*.

* The reach of the `abstract` keyword block extends recursively to the `where`-blocks of a function, and the declarations inside of a `record` declaration, but not inside modules declared in an abstract block.
