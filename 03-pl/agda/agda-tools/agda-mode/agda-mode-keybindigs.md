# agda-mode keybindigs

The commands on terms or types can be *prefixed* with
-           C-u …    To compute without normalisation
-      C-u C-u …    To compute to normal form
- C-u C-u C-u …    To compute to WHNF


## Global commands

- `C-c C-l`           l̲oad and type-check the file
- `C-c C-s`           s̲olve constraints
- `C-c C-=`           show constraints
- `C-c C-?`           show all goals
- `C-c C-f`           f̲ocus a hole
- `C-c C-b`           b̲ack to hole
- `C-c C-d`           d̲educe the type of the given exp
- `C-c C-o`           mo̲dule contents
- `C-c C-z`           search z̲e scope for definitions
- `C-c C-n`           Computes n̲ormal form
- `C-u C-c C-n`       Computes n̲ormal form, ignoring `abstract`
- `C-u C-u C-c C-n`   Computes n̲ormal form, printing `show <exp>`
- `C-c C-x M-;`       un/comment the rest of the buffer
- `C-c C-x C-d`       d̲eactivate holes
- `C-c C-x C-h`       toggle h̲idden args
- `C-c C-x C-i`       toggle i̲rrelevant args
- `C-c C-x C-a`       a̲bort command
- `C-c C-x C-c`       c̲ompile the file
- `C-c C-x C-q`       q̲uit agda process
- `C-c C-x C-r`       r̲estart agda process
- `C-c C-x C-s`       s̲witch agda version

## Global commands: Descriptions

`C-c C-l`
- Type-checks the code; also replaces each occurrence of a question mark `?`, or a hole marker `{! !}`, by a freshly created and enumerated hole, `{! !}0`

`C-c C-d`
- Infers the type. 
- The system asks for a term and infers its type. 
- In a hole, it takes the hole's contents as input.

`C-c C-n`
- Computes normal form. 
- The system asks for a term which is then evaluated to a normal form.
- In a hole, it takes the hole's contents as input.

`C-c C-x C-c`
- Compiles a program, with a `main` function, 
- using a given backend (GHC default).



## Commands for goals

Commands expecting input (e.g. name of var to case split) will either use the text inside the goal or ask the user for input.

- `C-c C-SPC` Give (fill goal).
- `C-c C-r` Refine.
- `C-c C-m` Elaborate and Give.
- `C-c C-a` Automatic Proof Search (Auto)
- `C-c C-c` Case split.
- `C-c C-h` Compute type of helper function and add type signature to kill ring
- `C-c C-t` Goal type
- `C-c C-e` Context (environment)
- `C-c C-d` Infer (deduce) type
- `C-c C-,` Goal type and context.
- `C-c C-.` Goal type, context and inferred type
- `C-c C-;` Goal type, context and checked term
- `C-c C-o` Module contents
- `C-c C-w` Why in scope.
- `C-c C-z` Search About.

- `C-c C-n`         Computes n̲ormal form
- `C-u C-c C-n`     Computes n̲ormal form, ignoring `abstract`
- `C-u C-u C-c C-n` Computes n̲ormal form, printing `show <exp>`


## Commands for goals: Descriptions

`C-c C-r`
- Refine
- Checks whether the return type of the expression `e` in the hole 
  matches the expected type.
- If so, the hole is replaced by `e { }1 ... { }n`, where a sufficient number
  of new holes have been inserted.
- If the hole is empty, then the refine command instead inserts a lambda or
  constructor (if there is a unique type-correct choice).

`C-c C-m`
- Elaborate and Give
- Fill goal with normalized expression
- Takes the same `C-u` prefixes as `C-c C-n`

`C-c C-c` Case split    
- If the cursor is positioned in a hole which denotes the right hand side of 
  a definition, then this command automatically performs pattern matching on variables of your choice.
- When given several variables (separated by spaces), it will case split on 
  the first and then continue by case splitting on the remaining variables in each newly created clause.
- When given no variables:
  - it will introduce a new variable if the target type is a function type
  - or introduce a new copattern match if the target type is a record type
- When given the special symbol `.`, it expands the ellipsis `…` in the clause
  (see `With-Abstraction`).

`C-c C-h`
- Computes the type of helper function
- adds the computed type signature to the kill ring

`C-c C-,`
- Goal type and context
- Shows the goal type, i.e. the type expected in the current hole
- along with the types of locally defined identifiers.

`C-c C-w`
- Why in scope
- Given a defined name, returns how it was brought into scope and definition
- https://agda.readthedocs.io/en/latest/tools/search-about.html#search-about

`C-c C-z`
- 'Search About' command
- search z̲e scope for definitions
- https://agda.readthedocs.io/en/latest/tools/search-about.html#search-about
- Since version 2.5.1 Agda supports the command `Search About` that searches 
  the objects in scope, looking for definitions matching a set of constraints given by the user.
- The tool is invoked by choosing `Search About` in the goal menu
- It opens a prompt and users can then input a list of space-separated 
  identifiers and string literals.
- The search returns the definitions in scope whose type contains all of the
  mentioned identifiers and whose name contains all of the string literals as substrings.


## Other emacs commands

`M-,`             Go back
`M-.`             Go to the definition of the identifier (or middle-mouse)
`TAB`             Indent current line, cycles between points
`S-TAB`           Indent current line, cycles in opposite direction
