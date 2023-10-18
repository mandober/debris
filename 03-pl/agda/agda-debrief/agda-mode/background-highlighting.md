# agda-mode :: Background highlighting

Errors or warnings in the code are indicated with background colors:

- *yellow*               : unsolved metavariables, unsolved constraints
- *yellow-light* (wheat) : coverage checking

- *orange*       : type signature with a missing definition
- *brown* (peru) : issue with positivity checking

- *grey*: unreachable or dead code, shadowed variable names in telescopes
- *grey-light* (white smoke) : clause doesn't hold definitionally

- *pink*                       : confluence checking of rewrite rules
- *pink-orange* (light salmon) : termination or productivity checking
- *pink-darker* (light coral)  : fatal warning

If a file does not type check Agda will complain. Often the cursor will jump to the position of the error, and the error will (by default) be underlined. Some errors are treated a bit differently, though. If Agda cannot see that a definition is terminating/productive it will highlight it in light salmon, and if some meta-variable other than the goals cannot be solved the code will be highlighted in yellow (the highlighting may not appear until after you have reloaded the file). In case of the latter kinds of errors you can still work with the file, but Agda will (by default) refuse to import it into another module, and if your functions are not terminating Agda may hang.

If you do not like the way Agda syntax or errors are highlighted (if you are colour-blind, for instance), then you can tweak the settings by typing M-x customize-group RET agda2-highlight RET in Emacs (after loading an Agda file) and following the instructions.
