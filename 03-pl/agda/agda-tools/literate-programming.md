# Literate Programming

https://agda.readthedocs.io/en/latest/tools/literate-programming.html

Agda supports a limited form of literate programming, i.e. code interspersed with prose, if the corresponding extension is used.

- `.lagda`      (generic) literate Agda file
- `.lagda.tex`  [Literate TeX](#literate-tex)
- `.lagda.rst`  [Literate reStructuredText](#literate-restructuredtext)
- `.lagda.md`   [Literate Markdown](#literate-markdown)
- `.lagda.org`  [Literate Org](#literate-org)


## Literate TeX

Files ending in `.lagda` or `.lagda.tex` are interpreted as literate [TeX][tex] files. All code has to appear in code blocks:


```lhs
Ignored by Agda.

\begin{code}[ignored by Agda]
module Mod where

-- Agda code goes here

data Nat : Set where
  Z : Nat
  S : Nat → Nat

\end{code}
```

The compiler ignores the text outside the code blocks, as well as any text after the opening tag `\begin{code}` on the same line.

Agda finds code blocks by looking for the first instance of `\begin{code}` that is not preceded on the same line by a `%` or `\` (not counting `\` followed by anything, i.e. any char or code point).

Then (starting on the next line) the first instance of `\end{code}` that is preceded with nothing but spaces, tab characters (`\t`), and similar whitespace chars (always starting on the next line).

Agda doesn't try to figure out if, say, the LaTeX code changes the category code for the default latex comment symbol `%`.

If you provide a suitable definition for the *Latex code environment*, then literate Agda files can double as LaTeX document sources. Example definition:

```lhs lagda.tex
\usepackage{fancyvrb}

\DefineVerbatimEnvironment
  {code}{Verbatim}
  {} % Add fancy options here
```

The [LaTeX backend][1] or the preprocessor [lhs2TeX][2] can also be used to produce LaTeX code from literate Agda files. See [Known pitfalls and issues][3] for how to make LaTeX accept Agda files using the UTF-8 character encoding.

[tex]: http://tug.org/
[1]: https://agda.readthedocs.io/en/latest/tools/generating-latex.html#generating-latex
[2]: https://www.andres-loeh.de/lhs2tex/
[3]: https://agda.readthedocs.io/en/latest/tools/generating-latex.html#unicode-latex



## Literate reStructuredText

Files ending in `.lagda.rst` are interpreted as literate [reStructuredText][rst] files. Agda parses code following the line ending in `::`, as long as the next line doesn't start with a `..`.

```hs lagda.rst
This line is ordinary text, which is ignored by Agda.

::

  module Whatever where
  -- Agda code goes here

Another non-code line.
::
.. This line is also ignored
```

reStructuredText (rST) source files can be turned into other formats, such as HTML or LaTeX, using [Sphinx][sph].

* Code blocks inside an rST comment block will be type-checked by Agda, but not rendered.
* Code blocks delimited by `.. code-block:: agda` or `.. code-block:: lagda` will be rendered, but not type-checked by Agda.
* All lines inside a codeblock must be further indented than the first line of the code block.
* Indentation must be consistent between code blocks. In other words, the file as a whole must be a valid Agda file, as if all the literate text is removed.

[rst]: http://docutils.sourceforge.io/rst.html
[sph]: http://www.sphinx-doc.org/en/stable/


## Literate Markdown

Files ending in `.lagda.md` are interpreted as literate [Markdown][6] files.

Code blocks start and end with the usual markdown triple-tick marks.

```hs lagda.md
This line is ordinary text, which is ignored by Agda.

module Whatever where
-- Agda code goes here

Here is another code block:

data ℕ : Set where
 zero : ℕ
 suc  : ℕ → ℕ
```

Markdown source files can be turned into many other formats such as HTML or LaTeX using [PanDoc][7].

* Code blocks which should be type-checked by Agda but not rendered may be enclosed in HTML comment delimiters (`<!--` and `-->`).
* Code blocks which should be ignored by Agda, but rendered in the final document may be indented by four spaces.
* Note that inline code fragments are not supported due to the difficulty of interpreting their indentation level with respect to the rest of the file.


[6]: https://daringfireball.net/projects/markdown/
[7]: https://pandoc.org/


## Literate Org

Files ending in `.lagda.org` are interpreted as literate [Org][org] files.

Code blocks are surrounded by two lines including 
only `#+begin_src agda2` and `#+end_src` (case insensitive).

```
This line is ordinary text, which is ignored by Agda.

#+begin_src agda2
module Whatever where
-- Agda code goes here
#+end_src

Another non-code line.
```

* Code blocks which should be ignored by Agda, but rendered in the final document may be placed in source blocks without the agda2 label.

[org]: https://orgmode.org/
