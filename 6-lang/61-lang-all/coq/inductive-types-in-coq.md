# Inductive types in Coq
Wessel van Staal, 2012
from the course: `IMC010: Type Theory and Coq`
https://cs.ru.nl/~freek/courses/tt-2012/


```hs coq
Inductive nattree : Set :=
  leaf : nat -> nattree
| node : nattree -> nattree -> nattree.
```

Defining an inductive data type
- adds the function (or a constant) whose final type is 
  one of `Prop`, `Set`, `Type` to the context
- an inductive type is closed under its ctors (constructor functions)
- enables computational concepts like case distinction and recursion
- enables proof by induction
