# About Tex

https://golem.ph.utexas.edu/~distler/WebTeX/docs/wtxsec1.html


Tex, implemented as Latex, Katex, etc. has web implementation as MathJax, etc.

This is VS Code editor, with support for Latex expression in Katex or MathJax varants, courtesy of VS Code Extension "Markdown Preview Enhanced".


## Markdown Preview Enhanced

Markdown used in this repo is edited in VS Code with `Markdown Extended Preview` extension, which enables, among other things, authoring with latex-like syntax using `MathJax` or `KaTeX`. Each one has its differences, between each other and compared with Latex.

here does not use proper latex but MathJax, which is similar but also has significant differences. This reference is for MathJax.

Use only `$$` for start and end latex tags. Instead of `$$$` for block formatting, use `$$` with `\displaystyle` as the first line.

---

This VS Code Extension enables writing latex expression but only those that don't require extra packages (their installation). (*not fact checked*).

Many things latex related work and my settings for introducing a latex expression is `$$`, which introduces *inline* exp. The symbol seq for introing a block exp is $$$ but **do not use it** as  this conflicts with Git Book where I publish these books.

GitBook v.1 seems to work ok with `$$` sequence as does GitBook v.2, but the former chokes on triple-dollar.

## Demarcations

All of these commands work only within equation-mode. Inline equations are demarcated by $…$ or \(…\). Display equations are demarcated by $$…$$ or \[…\]. You cannot nest equations: i.e. $$…\text{foo $…$ bar}…$$ is not allowed.

## Implementations

- TeX
- LaTex, KaTex
- MathML
- itex
- WebTeX
- MiKTeX


## WebTeX

*WebTeX* is an equation markup language for *WebEQ*. Its syntax and commands are similar to the math mode part of *LaTeX*. However, WebTeX is designed to be compatible with *MathML*. The benefit of that is that WebTeX always translates unambiguously into MathML, while LaTeX does not. Unfortunately, the cost is that existing LaTeX equations frequently require some changes to be compatible with WebTeX.

For this reason, it is probably most accurate to think of WebTeX as a shorthand input syntax for MathML with familiar commands, rather than as *a kind of TeX*. Nonetheless, WebTeX has enough similarity to LaTeX so that authors already familiar with LaTeX will have little difficulty using WebTeX.


## Differences between itex and TeX

In itex, $pin$ is a single token, which is translated into <mi>pin</mi> in MathML.
$p i n$, on the other hand, is three tokens, which is translated into <mi>p</mi><mi>i</mi><mi>n</mi> in MathML. TeX makes no distinction between these two.
It is possible (though probably not recommended) to insert MathML markup inside itex equations. So "<" and ">" are significant. To obtain a less-than or greater-than sign, you should use \lt or \gt, respectively.


$$
e^{-i\pi} \\
\frac{2}{3+y}
$$
