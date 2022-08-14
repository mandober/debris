# Delimiters

`<delim>` are:


$$
(1,2)                                       \\
[2,3]                                       \\
\langle 3, b \rangle                        \\
\lbrace 4,y \rbrace                         \\
\{ 5,y \}                                   \\
\lmoustache 6,y \rmoustache                 \\
14/8                                        \\
\lceil 7/2 \rceil                           \\
\lfloor 8/3 \rfloor                         \\
\ \\
\uparrow a \downarrow b \updownarrow c      \\
\ \\
10 \ \vert \ q                              \\
10 \vert q                                  \\
11 \ \Vert \ q                              \\
11 \Vert q                                  \\
12    |  q                                  \\
12 \  | \    q                              \\
13 \ \| \    q                              \\
13   \|      q                              \\
$$

---

- In TeX, delimiters are non-stretchy, by default
- Stretchy delimiters are obtained with `\left<delim>` and `\right<delim>`
- Each `\left<delim>` must be matched with a corresponding `\right<delim>`
- If you don't want a *visible matching delimiter*, you can match with the *invisible delimiters*, `\left.` and `\right.`

Fixed-size large delimiters are generated with the modifiers:
- \big,  \bigl,  \bigr
- \Big,  \Bigl,  \Bigr
- \bigg, \biggl, \biggr
- \Bigg, \Biggr, \Biggl

For example,
`\Biggr)` generates a very large (3×natural size) right parenthesis;
`\bigl\vert` generates a large (1.2×natural size) left vertical bar.


$$
r^5 \\
\left{\lmoustache{b} g \right{\rmoustache{a}}
as
$$
