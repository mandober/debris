# Subscript and superscript

ꜛ ꜜ ꜝ ꜞ

## 1. Markdown-custom tags

- subscript with __tilde__   : P~a+x~ (unicode Pₐ﹢ₓ)
- superscript with __caret__ : C^2^H~4~O^6^ (unicode C²H₄O⁶)
- md: P^c+y^ .... K~Id:a:A~
- uc: Pᶜᐩʸ
- pro: looks better than unicode (at least these examples)
- pro: supported by [MDPE] (vscode md plugin)
- con: not widely-supported
- con: no nesting

## 2. Via Unicode
- superscript : x²
- subscript   : x₂
- combined    : C²H₄O⁶
+ pro: WYSIWYG
- con: many symbols missing
- con: many symbols but-ugly per se
- con: many symbols but-ugly when combined (misaligned, missized)
- con: no nesting


## 3. Via HTML

- superscript : x<sup>2</sup> produces x²
- subscript   : x<sub>2</sub> produces x₂
- combined: C<sup>2</sup>H<sub>4</sub>O<sup>6</sup> produces C²H₄O⁶
+ pro: precise control
- con: inconvenient and verbose syntax

Allows precise control: you can set the size, height and many other <span style="vertical-align: baseline; position: relative;top: -0.4em; font-size: 11px">style-related</span> aspects of superscripted text very precisely.

Nesting:

Nested: <sub>ID<sub>ID<sub>b</sub></sub></sub>

Binary: 01100100<sub>2</sub> = 10<sup>2</sup>

Power tower: <sup>4</sup>2 = 2<sup>2<sup>2<sup>2</sup></sup></sup>


## 4. Via Latex:

$latex {2^{2}}^{2}$


some ~~deleted~~ text



[MDPE]: Markdown Preview Enhanced


## refs

https://gist.github.com/bt5e/7507535

https://riptutorial.com/markdown/example/5225/subscript-superscript
