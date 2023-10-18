# Search Definitions in Scope

Docs » Tools » Search Definitions in Scope

https://agda.readthedocs.io/en/latest/tools/search-about.html

Since version 2.5.1 Agda supports the command _Search About_ that searches the objects in scope, looking for definitions matching a set of constraints given by the user.

The command _Search About (normalized)_ is invoked with `C-c C-z` in emacs, 
but in VS Code with the key `C-y C-z`.


Search About | emacs           | vscode
-------------|-----------------|---------------
simplified   | C-c C-z         | C-c C-z
instantiated | C-y C-y C-z     | C-u C-z
normalized   | C-y C-y C-y C-z | C-y C-z


It opens a prompt and users can then input a list of space-separated identifiers and string literals. The search returns the definitions in scope whose type contains all of the mentioned identifiers and whose name contains all of the string literals as substrings.

For instance, in the following module:

```hs agda
open import Agda.Builtin.Char
open import Agda.Builtin.Char.Properties
open import Agda.Builtin.String
open import Agda.Builtin.String.Properties
```

running *Search About* on `Char String` returns:

(dump)
