# Agda mode for emacs

The canonical way for working with Agda is the emacs editor with the major mode support brought to you by the _agda-mode_ plugin. The plugin can also be found under the name `agda2-mode`, which explicitly states the support for Agda 2 (not sure if that subsumes the support for Agda 1), but also under the name `agda-mode`, which can go either way: that is, a plugin could support Agda 1 only, or it could support both variants of Agda, _Agda 1_ and _Agda 2_.

The recommended way of working with Agda (using emacs) is not about the trivial choice of picking a code editor, at least not as long as the interactive features of Agda are considered. In the proof assistant mode, emacs provides support for interacting with the code; e.g. when deriving a proof (or just a regular function definition; in fact, the two are usually the same), users have at their disposal a slew of commands for querying, deriving, case-spliting, helper-function extracting, even serving up the required term.

Many commands are based on the notion of *holes*, which the user specifies using the opening, `{!`, and closing, `!}`, tags. An empty hole (usually specified at the rhs of an equals sign, in an equation) can also be indicated with the `?` sign (it gets auto-converted into the proper hole notation).

Besides interactions revolving around holes, emacs in the agda-mode major mode also *colors the background* of expressions of interest in different colors.

![background colors](./emacs-mode-warning-colors.png)


## VSCode ext

There is the [banacorn.agda-mode][bam] extension for vscode editor that is a port of the agda-mode plugin. for emacs.


[bam]: https://marketplace.visualstudio.com/items?itemName=banacorn.agda-mode
