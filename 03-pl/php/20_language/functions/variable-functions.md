# Variable functions

PHP has the strange concept of *variable functions*: if a variable is suffixed with the call operator (i.e. appended with a pair of parentheses), **PHP will look for a function with the same name as whatever the variable evaluates to**, and will attempt to execute it.

More fundamentally, a named function cannot be directly referenced by its name. In fact, names, or better called *labels*, of named functions live in a separate namespace, apart from variable or constant labels (each has its own namespace) and the only way to refer to a function directly (which is a completely different thing from calling the it) is to manually stringify that label and slap the call operator on it. Calling a string (*!?%$*) looks strange and weird and sad and propels a person toward Haskell if only to admire the syntax.

Variable functions won't work with language constructs (such as echo, print, unset(), isset(), empty(), include, require, etc) because they are no functions but the so-called *language constructs* (wrap 'em in a function if you insist).
