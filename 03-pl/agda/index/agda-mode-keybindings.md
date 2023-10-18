# Agda :: Index :: agda-mode :: Keybindings

Commands working with terms or types can be prefixed with
- `C-u`         compute without further normalisation
- `C-u C-u`     compute normal forms
- `C-u C-u C-u` compute WHNFs

## Commands overview

Global commands
- `C-c C-l`         Load
- `C-c C-d`         Deduce
- `C-c C-=`         Show constraints
- `C-c C-s`         Solve constraints
- `C-c C-?`         Show all goals
- `C-c C-f`         Move to next goal (forward)
- `C-c C-b`         Move to previous goal (backwards)
- `C-c C-o`         Module contents
- `C-c C-z`         Search Definitions in Scope

- `C-c C-n`         Compute normal form
- `C-u C-c C-n`     Compute normal form, ignoring abstract
- `C-u C-u C-c C-n` Compute and print normal form of show <show <expression>

- `C-c C-x C-h`     Hidden args
- `C-c C-x C-i`     Irrelevant args
- `C-c C-x C-a`     Abort command
- `C-c C-x C-d`     Deactivate goals
- `C-c C-x C-s`     Switch to a different Agda version
- `C-c C-x C-c`     Compile
- `C-c C-x C-q`     Quit
- `C-c C-x C-r`     Restart
- `C-c C-x M-;`     Comment/uncomment rest of buffer

Goal commands
- `C-c C-SPC`       Give
- `C-c C-a`         Auto
- `C-c C-r`         Refine
- `C-c C-m`         Elaborate and Give
- `C-c C-c`         Case split
- `C-c C-h`         Helper function
- `C-c C-t`         Goal type
- `C-c C-e`         Context (environment)
- `C-c C-d`         Infer (deduce) type
- `C-c C-,`         Goal type and context
- `C-c C-.`         Goal type, context and inferred type
- `C-c C-;`         Goal type, context and checked term
- `C-c C-o`         Module contents
- `C-c C-w`         Why in scope

- `C-c C-n`         Compute normal form
- `C-u C-c C-n`     Compute normal form, ignoring abstract
- `C-u C-u C-c C-n` Compute and print normal form of show <expression>

Other commands
- `TAB`   Indent current line, cycles between points
- `S-TAB` Indent current line, cycles in opposite direction
- `M-*`   Go back (Emacs < 25.1)
- `M-,`   Go back (Emacs ≥ 25.1)
- `M-.`   Jump to definition of identifier under point
- MOUSE3: Jump to definition of identifier clicked on with middle mouse button


## Global commands

Global commands can be triggered anywhere (particularly outside goals)

- `C-c C-l` Load. 
This type-checks the contents of the file, and replaces each occurrence of a question mark or a hole marker `{! !}` by a freshly created hole.

- `C-c C-x C-c` Compile. 
Compiles the Agda program with a `main` function using GHC backend by default.

- `C-c C-x C-q` Quit. 
Kills the Agda process

- `C-c C-x C-r` Restart. 
Kill and restart the Agda process

- `C-c C-x C-a` Abort. 
Abort a command

- `C-c C-x C-d` Deactivate. 
Remove goals and highlighting (deactivate)

- `C-c C-x C-h` Hidden args. 
Toggle display of hidden arguments

- `C-c C-x C-i` Irrelevant args. 
Toggle display of irrelevant arguments

- `C-c C-=` Show constraints
- `C-c C-s` Solve constraints

- `C-c C-?` Show all goals
- `C-c C-f` Move to next goal (forward)
- `C-c C-b` Move to previous goal (backwards)

- `C-c C-o` Module contents

- `C-c C-z` Search Definitions in Scope

- `C-c C-d` Deduce. 
Infer type. The system asks for a term and infers its type. When executed inside a hole, it will instead take the contents of the hole as input (if any).

- `C-c C-n` NF. 
Compute normal form. The system asks for a term which is then evaluated. When executed inside a hole, takes the contents of the hole as input (if any).

- `C-u C-c C-n` NF, ignoring abstract. 
Compute normal form, ignoring abstract

- `C-u C-u C-c C-n` NF of expression
Compute and print normal form of show <expression>

- `C-c C-x M-;` Comment
Comment/uncomment rest of buffer

- `C-c C-x C-s` Version. 
Switch to a different Agda version


## Commands in context of a goal

Commands expecting input (for example which variable to case split) will either use the text inside the goal or ask the user for input.

- `C-c C-SPC` Give
(fill goal)

- `C-c C-a` Auto
Automatic Proof Search

- `C-c C-r` Refine
Checks whether the return type of the expression `e` in the hole matches the expected type. If so, the hole is replaced by `e { }1 ... { }n`, where a sufficient number of new holes have been inserted. If the hole is empty, then the refine command instead inserts a lambda or constructor (if there is a unique type-correct choice).

- `C-c C-m` Elaborate and Give
(fill goal with normalized expression). 
Takes the same `C-u` prefixes as `C-c C-n`.

- `C-c C-c` Case split
If the cursor is positioned in a hole which denotes the right hand side of a definition, then this command automatically performs pattern matching on variables of your choice. When given several variables (separated by spaces) it will case split on the first and then continue by case splitting on the remaining variables in each newly created clause. When given no variables, it will introduce a new variable if the target type is a function type, or introduce a new copattern match if the target type is a record type. When given the **special symbol** `.`, it will expand the ellipsis `...` in the clause (see With-Abstraction).

- `C-c C-h` Helper function
Compute type of helper function and add type signature to kill ring.

- `C-c C-t` Goal type
- `C-c C-e` Context (environment)
- `C-c C-d` Infer (deduce) type

- `C-c C-,` Goal type and context
Shows the goal type, i.e. the type expected in the current hole, along with the types of locally defined identifiers.

- `C-c C-.` Goal type, context and inferred type
- `C-c C-;` Goal type, context and checked term
- `C-c C-o` Module contents

- `C-c C-n`         Compute normal form
- `C-u C-c C-n`     Compute normal form, ignoring abstract
- `C-u C-u C-c C-n` Compute and print normal form of show <expression>

- `C-c C-w` Why in scope
Given a defined name returns how it was brought into scope and its definition

## Other commands

- `TAB`   Indent current line, cycles between points
- `S-TAB` Indent current line, cycles in opposite direction

- `M-*`   Go back (Emacs < 25.1)
- `M-,`   Go back (Emacs ≥ 25.1)

- `M-.`   Jump to definition of identifier under point
- MOUSE3: Jump to definition of identifier clicked on with middle mouse button
