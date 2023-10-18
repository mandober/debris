# Dump

## Natural deduction

$$
\begin{array}{l}
        \begin{array}{|l|}
        \hline
        \hspace{20pt} \rlap
{q \rightarrow r} 
        \hspace{200pt} \hbox{
assumption
        } \\
        \begin{array}{|l|}
        \hline
        \hspace{14pt} \rlap{
\neg q \rightarrow \neg p
        } \hspace{200pt} \hbox{
assumption
        } \\
        \begin{array}{|l|}
        \hline
        \hspace{8pt} \rlap{
p
        } \hspace{200pt} \hbox{
assumption
        } \\
        \hspace{8pt} \rlap{
\neg \neg p
        } \hspace{200pt} 
\neg \neg \hbox{i 3}
        \\
        \hspace{8pt} \rlap{
\neg \neg q
        } \hspace{200pt} \hbox{
MT 2, 4
        } \\
        \hspace{8pt} \rlap{
q
        } \hspace{200pt} 
\neg \neg \hbox{e 5}
         \\
        \hspace{8pt} \rlap{
r
        } \hspace{200pt} {
\rightarrow} \hbox{e 1, 6}
         \\
        \hline
        \end{array} \\
        \hspace{14pt} \rlap{
p \rightarrow r
        } \hspace{200pt} {
\rightarrow
        } \hbox{
i 3-7
        } \\
        \hline
        \end{array} \\
        \hspace{20pt} \rlap{
(\neg q \rightarrow \neg p) \rightarrow (p \rightarrow r)
        } \hspace{200pt} {
\rightarrow
        } \hbox{
i 2-8
        } \\
        \hline
        \end{array} \\
        \hspace{26pt} \rlap{
(q \rightarrow r) \rightarrow ((\neg q \rightarrow \neg p) \rightarrow (p \rightarrow r))
        } \hspace{200pt} {
\rightarrow
        } \hbox{
i 1-9
        }
        \end{array}
$$



# Fitch notation: Derivation 1

```
(p -> q) ⊢ (~q -> ~p)

1  p -> q             premise
2  | ~q               assumption
3  | ~p               MT 1,2
4  ~q -> ~p           ->i 2-3
```

## Fitch notation, my interpretation ascii

```
⊢ (q → r) → ((¬q → ¬p) → (p → r))
    _______________________
1  | q → r                 | assumption 1
   |  ___________________  |
2  | | ¬q → ¬p           | | assumption 2
   | |  _______________  | |
3  | | | p             | | | assumption 3
4  | | | ¬¬p           | | | ¬¬i 3
5  | | | ¬¬q           | | | MT 2,4
6  | | | q             | | | ¬¬e 5
7  | | | r             | | | →e 1,6
   | | |_______________| | |
8  | | p → r             | | →i 3-7
   | |___________________| |
9  | (¬q → ¬p) → (p → r)   | →i 2-8
   |_______________________|
10 (q→r)→((¬q→¬p)→(p→r))     →i 1-9
```


## Fitch notation, my interpretation boxed
```

1  q → r                             premise
   ┌──────────────────────────────
2  │ q → r                             assumption 1
   │ ┌────────────────────────────
3  │ │ ¬q → ¬p                           assumption 2
   │ │ ┌──────────────────────────
4  │ │ │ p                                 assumption 3
5  │ │ │ ¬¬p                               ¬¬i 3
6  │ │ │ ¬¬q                               MT 2,4
7  │ │ │ r                                 ¬¬e 5
   │ │ └──────────────────────────
8  │ │   p → r                           →i 3-7
   │ └────────────────────────────
9  │  (¬q → ¬p) → (p → r)              →i 2-8
   └──────────────────────────────
10 (q → r) → ((¬q → ¬p) → (p → r))   →i 1-9
```



## Fitch notation: Derivation 3

```
⊢ (q → r) → ((¬q → ¬p) → (p → r))

    ___________________
1  | q → r             |   assumption 1
2  |  |__ ¬q → ¬p      |   assumption 2
3  |  |  |__ p         |   assumption 3
4  |  |  |   ¬¬p       |   ¬¬i 3
5  |  |  |   ¬¬q       |   MT 2,4
6  |  |  |   q         |   ¬¬e 5
7  |  |  |__           |
8  |  |__              |
9  |___________________|
10 (q → r) → ((¬q → ¬p) → (p → r))
```


⊢ (q → r) → ((¬q → ¬p) → (p → r))

```
1  |  q → r                    .  . assumption 1
2  |  |  ¬q → ¬p               .  .  . assumption 2
3  |  |  |-- p                   .  .  .  . assumption 3
4  |  |  |   ¬¬p                 .  .  .  . ¬¬i 3
5  |  |  |   ¬¬q                 .  .  .  . MT 2,4
6  |  |  |   q                   .  .  .  . ¬¬e 5
7  |  |  |__ r                   .  .  .  . →e 1,6
8  |  |  p → r                 .  .  . →i 3-7
9  |  (¬q → ¬p) → (p → r)      .  . →i 2-8
10 (q→r) → ((¬q→¬p) → (p→r))   . →i 1-9
```


## Derivation: Fitch notation

```
0 |__                        [assumption, want P iff not not P]
1 |   |__ P                  [assumption, want not not P]
2 |   |   |__ not P          [assumption, for reductio]
3 |   |   |   contradiction  [contradiction introduction: 1, 2]
4 |   |   not not P          [negation introduction: 2]
  |
5 |   |__ not not P          [assumption, want P]
6 |   |   P                  [negation elimination: 5]
  |
7 |   P iff not not P        [biconditional introduction: 1 - 4, 5 - 6]
```

0. The null assumption, i.e., we are proving a tautology
1. Our first subproof: we assume the LHS to show the RHS follows
2. A subsubproof: we are free to assume what we want. 
   Here we aim for a reductio ad absurdum
3. We now have a contradiction
4. We are allowed to prefix the statement that "caused" 
   the contradiction with a not
5. Our second subproof: we assume the RHS to show the LHS follows
6. We invoke the rule that allows us to remove an even number of 
   nots from a statement prefix
7. From 1 to 4 we have shown if P then not not P, from 5 to 6 we 
   have shown P if not not P; hence we are allowed to introduce 
   the biconditional




---


## align and box

$$
\begin{align}
1 \quad
  & p \to q
  & premise\\
2 \quad
  & \bbox[5px,border:1px solid black]{\lnot q}
  & {assumption}\\
3 \quad
  & p\lor q
  & \text{assumption}\\
4 \quad
  & \lnot q \to \lnot p
  & {MT \ 1,2}\\
\end{align}
$$


## array align

$$
\begin{array}{lll}
   1 & R &Premise 1 \\
   2 & S &Premise 2 \\
   \hline
   . & . &.\\
   . & . &.\\
   \hline
   n & Conclusion & Justification \\
\end{array}
$$
