# Arrays

## Array env

`\begin{env}…\end{env}`

* where `env` is: `matrix, pmatrix, bmatrix, Bmatrix, vmatrix, Vmatrix, smallmatrix, cases, aligned, gathered, split, array, svg`

Produces an array with 4 columns:

$$
\begin{array}[t]{clrc}
  1 & 2 & 3 & 4 \\
  5 & 6 & 7 & 8 \\
  9 & 10& 11& 12
\end{array}
$$

- col 1: `c`entered
- col 2: `l`eft-aligned
- col 3: `r`ight-aligned
- col 4: `c`entered
- The top line of the array is aligned with the equation axis


As in AMSLaTeX, 
- `\begin{matrix} ... \end{matrix}` is equivalent to
- `\begin{array}{cc...c}...\end{array}`
- except that you don't have to explicitly state the number of columns.


## Array Options

The `\array{}` command allows much finer control over the layout of arrays.

```
\array
\arrayopts
\collayout (=\colalign), \rowalign, \align, \equalcols, \equalrows, \collines, \rowlines, \frame, \padding
\rowopts
\colalign, \rowalign
\cellopts
\colalign, \rowalign, \rowspan, \colspan
```
