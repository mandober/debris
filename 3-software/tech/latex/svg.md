# SVG

`\begin{svg}...\end{svg}` allows you to embed snippets of SVG in itex equations. To assist in Instiki's LaTeX export feature, you can also include a graphicx command:

`\begin{svg} ... \end{svg}`
`\includegraphics[width=...]{foo}`
where foo.pdf is a file containing a PDF version of the graphic. In itex, the `\includegraphics` command is defined as a NOOP, and the SVG is embedded in the MathML output. In Instiki's LaTeX export, the opposite is true: the svg environment is a NOOP, and the `\includegraphics` command is included in the output.
