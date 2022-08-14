# Emacs key bindings for agda2-mode

C-c C-c : case split on a given variable
C-c C-n : evaluate an expression (to its final value)
C-c C-d : query expression's type

Take infer type for example:

Level of normalization                   VS Code       Emacs
----------------------------------------------------------------
simplified (default)                     C-c C-d       C-c C-d
instantiated (no further normalisation)  C-u C-d       C-u C-c C-d
normalized (fully normalized)            C-y C-d       C-u C-u C-c C-d


## commands

## Emacs key bindings

- `C-c C-l`       Load the file and type-check it.
- `C-c C-d`       Infer (deduce) the type of the exp.
- `C-c C-n`       Normalize a given exp (eval a term to NF).

- `C-c C-?`       Show goals.
- `C-c C-f`       Next goal.
- `C-c C-b`       Prev goal.
- `C-c C-x C-d`   Remove goals and highlight (deactivate).

- `C-c C-,`       Shows expected type in the current hole.
- `C-c C-c`       Case split on a given var.
- `C-c C-a`       Auto (fill in the hole with inferred exp).
- `C-c C-SPC`     Prompt for expr to replace the hole with.

- `C-c C-r`       Refine the hole by replacing it with the input exp
                  applied to an appropriate number of new holes.

- `C-c C-s`       Solve constraints.
- `C-c C-=`       Show constraints.
- `C-c C-w`       Explain why name is in scope
- `C-c C-z`       Search about
- `C-c C-o`       Module contents

- `C-c C-x C-h`   Toggle display of hidden args.
- `C-c C-x TAB`   Toggle display of irrelevant args.
- `C-c C-x C-c`   Compile Agda program (`C-x C-c` in VS Code)
- `C-c C-x C-a`   Abort a command
- `C-c C-x M-;`   Toggle commenting the rest of buffer
- `C-c C-x C-s`   Switch to another version of Agda
- `C-c C-x C-r`   Kill and Restart Agda
- `C-c C-x C-q`   Quit


## Emacs Cheat Sheet

This document will give you an overview of commonly used Agda, as well as Emacs, commands.

C-     = Ctrl
M-     = Alt/Esc
buffer = file
hole   = place where an expression is expected.

* Emacs

C-x C-f   : find a file to load
C-x C-s   : Save buffer
C-x C-c   : Exit emacs

C-s       : Search forward for some text
C-r       : Search backward for some text
C-/       : Undo
C-a       : Jump to start of the line
C-e       : Jump to end of the line
M-<       : Jump to top of the buffer
M->       : Jump to end of the buffer
M-}       : Jump forwards a paragraph (blank line after block of text)
M-{       : Jump backwards a paragraph

* Agda

C-c C-l   : Load (type check) the current buffer.
C-c C-f   : Jump (forward) to active hole
C-c C-b   : Jump (backward) to active hole
C-c C-,   : Show goal type, and context of current hole
C-c C-.   : Show goal type, context, and type of expression in the hole.
C-c C-spc : Fill the hole with the given expression
C-c C-r   : Refine the hole
C-c C-a   : Search for a proof and fill it in the hole if there is at least 1.
            -l       : list the possible proofs
            -s 10 -l : skip the first 10 proofs
C-c C-c   : Case split the given variable(s) into its possible constructors
C-c C-n   : Evaluate an expression
C-c C-d   : Infer a type for an expression

C-c C-x C-d : Kill Agda - useful if agda gets a bit fussy
              (Can use C-c C-l to start Agda again when needed)
C-c C-x C-r : Kill and restart Agda




## Global commands

load              C-c C-l
compile           C-x C-c
quit              C-c C-q
quit and restart  C-x C-r

toggle display of hidden arguments      C-x C-h
toggle display of irrelevant arguments  C-x C-i

show constraints          C-c C-=
solve constraints 🎚       C-c C-s

show all goals       C-c C-?
move to next goal (forward)       C-c C-f
move to previous goal (backwards)       C-c C-b
infer type 🎚       C-c C-d
module contents 🎚       C-c C-o
search definitions in scope 🎚       C-c C-z
compute normal form (default compute)       C-c C-n
compute normal form (ignore abstract)       C-u C-n
compute normal form (use show instance)       C-y C-n
switch to a different Agda version       C-x C-s
Unicode symbol input sequences lookup       C-x C-=

## Commands in context of a goal

give (fill goal)       C-c C-SPC
refine       C-c C-r
elaborate and give 🎚       C-c C-m
auto       C-c C-a
case split       C-y C-c
compute helper function type and copy 🎚       C-y C-h
goal type 🎚       C-c C-t
context (environment) 🎚       C-c C-e
infer type 🎚       C-c C-d
goal type and context 🎚       C-c C-,
goal type, context and inferred term 🎚       C-c C-.
goal type, context and checked term 🎚       C-c C-;
module contents 🎚       C-c C-o
compute normal form (default compute)       C-c C-n
compute normal form (ignore abstract)       C-u C-n
compute normal form (use show instance)       C-y C-n
why in scope       C-c C-w


## vscode agda-mode

https://marketplace.visualstudio.com/items?itemName=banacorn.agda-mode

Commands working with types (marked with the 🎚 emoji below) can have different levels of normalization. However, due to some technical limitations, we cannot prefix commands with C-u or C-u C-u like in Emacs. Instead, we replace the C-u C-c prefix with C-u and the C-u C-u C-c prefix with C-y.

Take infer type for example:

Level of normalization	Keymap in VS Code	Keymap in Emacs
"simplified" (default)	C-c C-d	C-c C-d
"instantiated" (without further normalisation)	C-u C-d	C-u C-c C-d
"normalized" (fully normalized)	C-y C-d	C-u C-u C-c C-d
Global commands
Command	Keymap
load	C-c C-l
compile	C-x C-c
quit	C-c C-q
quit and restart	C-x C-r
toggle display of hidden arguments	C-x C-h
toggle display of irrelevant arguments	C-x C-i
show constraints	C-c C-=
solve constraints 🎚	C-c C-s
show all goals	C-c C-?
move to next goal (forward)	C-c C-f
move to previous goal (backwards)	C-c C-b
infer type 🎚	C-c C-d
module contents 🎚	C-c C-o
search definitions in scope 🎚	C-c C-z
compute normal form (default compute)	C-c C-n
compute normal form (ignore abstract)	C-u C-n
compute normal form (use show instance)	C-y C-n
switch to a different Agda version	C-x C-s
Unicode symbol input sequences lookup	C-x C-=
Commands in context of a goal
Command	Keymap
give (fill goal)	C-c C-SPC
refine	C-c C-r
elaborate and give 🎚	C-c C-m
auto	C-c C-a
case split	C-y C-c
compute helper function type and copy 🎚	C-y C-h
goal type 🎚	C-c C-t
context (environment) 🎚	C-c C-e
infer type 🎚	C-c C-d
goal type and context 🎚	C-c C-,
goal type, context and inferred term 🎚	C-c C-.
goal type, context and checked term 🎚	C-c C-;
module contents 🎚	C-c C-o
compute normal form (default compute)	C-c C-n
compute normal form (ignore abstract)	C-u C-n
compute normal form (use show instance)	C-y C-n
why in scope	C-c C-w
Commands yet to be implemented
Command	Keymap
abort a command	C-x C-a
remove goals and highlighting	C-x C-d
comment/uncomment rest of buffer	
Unicode Input
