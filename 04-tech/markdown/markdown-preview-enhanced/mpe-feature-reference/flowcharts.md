# Markdown Preview Enhanced: Flow Charts

This feature is powered by `flowchart.js` https://flowchart.js.org/

```flow
st=>start: Start:>https://shd101wyy.github.io/markdown-preview-enhanced/[Code Chunk]
e=>end:>https://shd101wyy.github.io/
op1=>operation: op1
sub1=>subroutine: sub1
cond=>condition: Yes
or No?:>https://shd101wyy.github.io/
io=>inputoutput: something...

st->op1->cond
cond(yes)->io->e
cond(no)->sub1(right)->op1
```


## Sequence Diagrams

This feature is powered by [js-sequence-diagrams](https://bramp.github.io/js-sequence-diagrams/)


```sequence
A->C: ack!
Note right of C: C is\nthinking...
C-->A: wtf
A->>C: syn
```

- place `sequence` annotation on code blocks
- Two themes are supported: `simple` (default theme) and `hand`

```sequence {theme="hand"}
A->C: Hi!
Note right of C: C is\nthinking...
C-->A: Who?
A->>C: Yes, me!
```
