# agda2-mode basics

- `C-c C-l`     L̲oad (type check) the code


When opening an Agda file in emacs, the code initially appears plain (uncolored syntax). To run the Agda's type checker on the file, do `C-c C-l`. This will apply *semantic highlighting* to the code and display the message "All done" if the code is correct; otherwise, the errors wil be shown in a separate buffer.

The L̲oad command, `C-c C-l`, should be issued anytime you make significant edits in the file so Agda can catch up on the latest changes.



## Background highlighting

![bg-palette](emacs-mode-warniing-colors.png)

Agda uses various background colors to indicate errors or warnings:
- #808080 (grey) unreachable or dead code; shadowed names in telescopes.
- #cd853f (peru; brown)               positivity checkingissue.
- #f5deb3 (wheat; light yellow)       coverage checking issue.
- #f5f5f5 (white smoke; light grey)   claus doesn't hold definitionally.
- #f08080 (light coral; darker pink)  fatal warning
- #ffa07a (light salmon; pink-orange) termination or productivity check.
- #ffc0cb (pink)   confluence checking of rewrite rules issues.
- #ffa500 (orange) type signature with a missing definition.
- #ffff00 (yellow) unsolved [metavariables][1] or unsolved constraints.

[1]: https://agda.readthedocs.io/en/latest/language/implicit-arguments.html#metavariables


## Configuration

You can customise the agda mode by typing the following:

M-x load-library RET agda2-mode RET
M-x customize-group RET agda2 RET

If you want some specific settings for the Emacs mode you can add them to `agda2-mode-hook`. For instance, if you do not want to use the Agda input method (for writing various unicode symbols) you can add the following to the emacs init file

```elisp
(add-hook 'agda2-mode-hook
          '(lambda ()
            ; If you do not want to use any input method:
            (deactivate-input-method)
            ; (In some versions of Emacs you should use
            ; inactivate-input-method instead of
            ; deactivate-input-method.)
```

Note that, on some systems, emacs mode changes the default font of the current frame in order to enable many Unicode symbols to be displayed. This only works if the right fonts are available, though. If you want to turn off this feature, then you should customise the `agda2-fontset-name` variable.

The colors that are used to highlight Agda syntax and errors can be adjusted by typing `M-x customize-group RET agda2-highlight RET` in Emacs and following the instructions.


## Unicode input

https://agda.readthedocs.io/en/latest/tools/emacs-mode.html#unicode-input

Type '\' then the latext name.
To type `\` type `\\`.
