# Emacs :: Agda mode

- agda version 2.6.2.2
- agda-mode, agda2-mode

To typecheck the Agda file, open it in Emacs and press `C-c C-l`. You should now see that the code is highlighted and there should be a message 'All done'.

## Emacs bindings for Agda mode

- `C-c C-l`       Load the file and type-check it
- `C-c C-d`       Infer (deduce) the type of the exp
- `C-c C-n`       Normalize a given exp (eval a term to NF)
- `C-c C-?`       Show goals
- `C-c C-f`       Next goal
- `C-c C-b`       Prev goal
- `C-c C-x C-d`   Remove goals and highlight (deactivate)
- `C-c C-,`       Shows expected type in the current hole
- `C-c C-c`       Case split on a given var
- `C-c C-a`       Auto (fill in the hole with inferred exp)
- `C-c C-SPC`     Prompt for expr to replace the hole with
- `C-c C-r`       Refine the hole by replacing it with the input exp
                  applied to an appropriate number of new holes.

- `C-c C-s`       Solve constraints
- `C-c C-=`       Show constraints
- `C-c C-w`       Explain why name is in scope
- `C-c C-z`       Search about
- `C-c C-o`       Module contents
- `C-c C-x C-h`   Toggle display of hidden args
- `C-c C-x TAB`   Toggle display of irrelevant args
- `C-c C-x C-c`   Compile Agda program
- `C-c C-x C-a`   Abort a command
- `C-c C-x M-;`   Toggle commenting the rest of buffer
- `C-c C-x C-s`   Switch to another version of Agda
- `C-c C-x C-r`   Kill and Restart Agda
- `C-c C-x C-q`   Quit


## Emacs Cheat Sheet

Overview of commonly used commands for agda mode:


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
