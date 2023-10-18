# MathJax rendering test


## Inline layout

Use double-dollar tags `$$` for inline layout that display inline formulae compactly.

$$
\sum _{i=2} ^n n _{i-1} + n _{i-2} \\
\prod _{i=2} ^n n _{i-1} + n _{i-2} \\
\coprod _{i=2} ^n n _{i-1} + n _{i-2} \\
\bigcup _{i=2} ^n n _{i-1} + n _{i-2} \\
\bigcap _{i=2} ^n n _{i-1} + n _{i-2} \\
$$


## Block layout

Use triple-dollar tags `$$$` for block layout that displays everything centered and also renders some symbols using a slightly larger symbol (particularly big-ass math symbols).

$$$
\sum_{i=2}^n n_{i-1} + n_{i-2} \\
\prod _{i=0} ^{n} S = S_0 \cup S_1 \cup \dots
$$$


## Force block layout

Alternativelly, use `$$\displaystyle ... $$` to force display layout, even when using inline tags (double-dollar).

$$\displaystyle \sum_{i=2}^n n_{i-1} + n_{i-2}$$

Put `\displaystyle` at the start on each line break (after `\\`) because ometimes it doesn't affect all lines when placed in the beginning of the block. Also make use of keywords to manipulate size, `\big, \large, \huge, etc.`


## Deprecated

Using `{% math %} ... {% endmath %}` tags seems deprecated.

        {% math %} \sum_{i=2}^n n_{i-1} + n_{i-2} {% endmath %}
