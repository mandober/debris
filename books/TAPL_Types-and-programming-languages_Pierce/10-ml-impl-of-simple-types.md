# 10. ML Implementation of Simple Types

The concrete realization of λ→ as an ML program follows the same lines as our implementation of the untyped lambda-calculus. The main addition is a function `typeof` for calculating the type of a given term in a given context. Before we get to it, though, we need a little low-level machinery for manipulating contexts.

## 10.1 Contexts

A context was just a list of pairs of variable names and bindings:

```ml
type context = (string * binding) list
```

We used contexts just for converting between named and nameless forms of terms during parsing and printing. For this, we needed to know just the names of the variables; the binding type was defined as a trivial one-constructor datatype carrying no information at all:

```ml
type binding = NameBind
```

To implement the typechecker, we'll need to use the context to carry typing assumptions about variables. We support this by adding a new constructor called `VarBind` to the binding type:

```ml
type binding
  = NameBind
  | VarBind of ty
```
