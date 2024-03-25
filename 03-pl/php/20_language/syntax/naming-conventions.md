# Naming Conventions

Global Namespace
Rules
Tips

The following is a guide for how to best choose names for identifiers in userland PHP code. When choosing names for any code that creates symbols in the global namespace, it is important to take into account the following guidelines to prevent future versions of PHP from clashing with your symbols.


## Global Namespace
Here is an overview of code constructs that go into the global namespace:
- functions
- classes
- interfaces
- constants (not class constants)
- variables defined outside of functions/methods
- traits

Naming
- function names use underscores between words
- class names use both the camelCase and PascalCase rules
- PHP will prefix any global symbols of an extension with the name of the extension
- Iterators and Exceptions are however simply postfixed with "Iterator" and "Exception"
- PHP reserves all symbols starting with `__` as magical, e.g. `__get()`
