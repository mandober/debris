# agda2-mode installation

https://agda.readthedocs.io/en/latest/tools/emacs-mode.html

After Agda installation, _agda2-mode_ will also be installed, but it requires additional setup steps:

```bash
# run this first in case of upgrading agda-mode
agda-mode compile

# run this to setup emacs
agda-mode setup
```

The `agda-mode compile` recompiles Agda major mode for the emacs and it is a recommended step in case this is the upgrade of the previous agda-mode release (in any case, it can't hurt anything).

The `agda-mode setup` command sets up emacs to recognize Agda and sets up the major mode for using Agda in emacs. In fact, this command just prepends the following to the user's `.emacs` file (e.g. `~/emacs.d/init.el`)

```el
(load-file (let ((coding-system-for-read 'utf-8))
   (shell-command-to-string "agda-mode locate")))
```

Opening an Agda file, i.e. a file with suffix `.agda`, in Emacs, should automatically make emacs load the agda2-mode (agda-mode) as the major mode, confirmed by the presence of the new drop-down menu "Agda".

Upon opening an Agda file in emacs, the code initially appears plain (uncolored syntax). To run the Agda's type checker on the file, do `C-c C-l`. You should then see that the code is *semantically highlighted* and the message "All done" in the minibuffer.

If this is the case, you have correctly installed everything. You can compile and run the 'FILE.agda' to the eponymous executable (also outside emacs) by issuing the command `agda --compile FILE.agda`.
