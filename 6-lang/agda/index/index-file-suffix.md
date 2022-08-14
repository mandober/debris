# Agda :: Index :: Agda file suffixes

- .agda          Agda source code
- .lagda         Literate Agda source
- .lagda.md      Literate Agda source as Markdown
- .lagda.tex     Literate Agda source as TeX
- .lagda.rst     Literate Agda source as reStructuredText
- .lagda.org     Literate Agda source as Org



FileName.   agda
FileName. l agda
FileName. l agda . md
FileName. l agda . tex
FileName. l agda . rst
FileName. l agda . org

```bash
echo Prelude.{l,}agda
echo Prelude.lagda.{md,tex,rst,org}
echo Prelude.lagda.
(echo Prelude.{,l}agda && echo Prelude.lagda.{md,tex,rst,org})
```
