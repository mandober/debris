# Levels of normalization

Commands working with terms or types can be prefixed with 
- `C-u` to compute without further normalization
- `C-u C-u` to compute normal forms
- `C-u C-u C-u` to compute weak-head normal forms


Commands that work on types have 3 levels of normalization:
- simplified
- instantiated
- normalized

In emacs, type-related commands come in clusters of 3 related comands, each one normalizing the given term to a different degree:
- *simplified*: (default) as-is user written without reduction
- *instantiated*: without further normalisation
- *normalized*: fully normalized, the term is reduced into the canonical form

The default level of normalization is the "simplified" level, which presents the term as is, without any alteration.

Taking the "Infer type" command as an example, all 3 commands respond to a type query, but with different levels of normalization of the query term.

When discussing these 3-in-1 commands, the name of the commmand is mentioned without indicating a level, with users left to choose an appropriate level of normalization for themselves. Each 3-in-1 command has the base name, which is then appended with the 3 suffixes, and each one comes with the primary key binding that triggrs the default level ("simplified"), while the other two levels are triggered by prefixing the main key binding with another keystroke, usually `C-u`.


## The 3-in-1 commands in vscode

https://github.com/microsoft/vscode/issues/6966

The canonical implementation of _agda-mode_ is for emacs, while the vscode etension is its port. However, due to some technical limitations, vscode keybindings cannot take another keybinding as a prefix (emacs allows issuing the `C-u` two times as a prefix `C-u C-u` to another keybinding), so some replacements had to be made:
- replace the `C-u C-c`     prefix with `C-u`
- replace the `C-u C-u C-c` prefix with `C-y`


For example, the _Infer type_ command

Norm. level  | VSCode  | Emacs            | Main key
-------------|---------|------------------|---------------------------
simplified   | C-c C-d |          C-c C-d | C-d (*d* for derive type)
instantiated | C-u C-d | C-u      C-c C-d |
normalized   | C-y C-d | C-u C-u  C-c C-d |

In emacs, each command has the main keychord, e.g. C-d for "Infer type", but it comes usually after the comand-introduction keychord like `C-c`.

So, to issue "Infer type (simplified)" type `C-c C-d`. But, to issue the command "Infer type (instantiated)", you prefix the keychord above with `C-u`, overall typing `C-u  C-c C-d`. And to issue the command "Infer type (normalized)", you prefix the first command two times with `C-u`, thus overall typing the key sequence: `C-u C-u C-c C-d`.

* In emacs, all Agda-related commands have the same leader key `C-c`
  (a leader key is the first part of a key sequence, e.g. `C-x` or `M-x`).
* basic commands have (more-less mnemonic) key in the follow-up key-seq
  (the follow-up key-seq is a keychord that comes after the leader seq)
  e.g. "Goal type (simplified)" is `C-c C-t`
* Some commands, along with all the default versions of 3-in-1 commands,
  are invoked with only two keyseqs: first the general leader keyseq (`C-c`) is typed, followed by a main keyseq stroke that ends the input.
  For example, "Give" command uses only two keyseq: `C-c C-SPACE`. Also, the default level ("simplified") of the "Context" cmd uses two keyseq: `C-c C-e`
* To get the "instantiated" level of the "Context" cmd, the main key sequence
  has to be prefixed with `C-u`, so type in: `C-u  C-c C-e`
