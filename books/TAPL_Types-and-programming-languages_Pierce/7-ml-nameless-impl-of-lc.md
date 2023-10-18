# 7. ML implementation of lambda-calculus using nameless representation

We construct an interpreter for the untyped lambda-calculus, based on the interpreter for arithmetic expressions and on the treatment of variable binding and substitution.

An executable evaluator for untyped lambda-terms can be obtained by a straightforward translation of the foregoing definitions into OCaml. We show just the core algorithms, ignoring issues of lexical analysis, parsing, printing, etc.

## 7.1 Terms and Contexts

(The associated implementation is `untyped`. The `fulluntyped` implementation includes extensions such as numbers and booleans)

* The representation of a variable is a number - its de Bruijn index.
* The representation of an abstraction carries just a subterm for the abstraction's body.
* An application carries the two subterms being applied.

```ocaml
type term =
    TmVar of int
  | TmAbs of term
  | TmApp of term * term
```

The impl definition actually uses more info; we annotate every term with an element of the type `info` recording the file position where that term was originally found (for user-facing error).

```ocaml
type term =
    TmVar of info * int
  | TmAbs of info * term
  | TmApp of info * term * term
```

Second, for purposes of debugging, it is helpful to carry an extra number on each `TmVar` node, as a consistency check - this number always contains the total length of the context in which the var occurs.

```ocaml
type term =
    TmVar of info * int  * int
  | TmAbs of info *        term
  | TmApp of info *        term * term
```

Whenever a variable is printed, we will verify that this number corresponds to the actual size of the current context; if it does not, then we know a shift operation has been forgotten someplace.

Converting back to names

One last refinement also concerns printing. Although terms are represented internally using de Bruijn indices, this is obviously not how they should be presented to the user: we should convert from the ordinary representation to nameless terms during parsing, and convert back to ordinary form during printing.

There is nothing very hard about this, but we should not do it completely naively (for example, generating completely fresh symbols for the names of variables), since then the names of the bound variables in the terms that are printed would have nothing to do with the names in the original program.

This can be fixed by *annotating each abstraction* with a string to be used as a hint for the name of the bound variable.

```ocaml
type term =
    TmVar of info * int    * int
  | TmAbs of info * string * term
  | TmApp of info          * term * term
```

The basic operations on terms (substitution in particular) do not do anything fancy with these strings: they are simply carried along in their original form, with no checks for name clashes, capture, etc.

When the printing routine needs to generate a fresh name for a bound variable, it tries first to use the supplied hint; if this turns out to clash with a name already used in the current context, it tries similar names, adding primes until it finds one that is not currently being used.

This ensures that the printed term will be similar to what the user expects, modulo a few primes.


In Haskell, we eliding the `info` nonsense, and have:

```hs
-- context length in which the var occurs
type Clen = Int

-- var name hint (for printing only)
type Hint = String

data Term
  = TmVar Clen Int
  | TmAbs Hint Term
  | TmApp Term Term
```

Back to OCaml, the printing routine itself looks like this:

```ocaml
let rec printtm ctx t = match t with
  TmAbs(fi,x,t1) ->
    let (ctx',x') = pickfreshname ctx x in
    pr "(lambda "; pr x'; pr ". "; printtm ctx' t1; pr ")"
  | TmApp(fi, t1, t2) ->
    pr "("; printtm ctx t1; pr " "; printtm ctx t2; pr ")"
  | TmVar(fi,x,n) ->
    if ctxlength ctx = n then
    pr (index2name fi ctx x)
    else pr "[bad index]"
```

It uses the datatype `context` defined as
```ocaml
type context = (string * binding) list
```
which is just a list of strings and associated bindings.

For the moment, the bindings themselves are completely trivial
```ocaml
type binding = NameBind
```
carrying no interesting information, but later, we'll introduce other clauses of the binding type that will keep track of the *type assumptions* associated with variables and other information.


The printing function also relies on several lower-level functions:
- `pr` sends a string to the standard output stream
- `ctxlength` returns the length of a context
- `index2name` looks up the string name of a variable from its index
- `pickfreshname` takes a context `ctx` and a string hint `x`, finds a name `x0` similar to `x` such that `x0` is not already listed in `ctx`, adds `x0` to `ctx` to form a new context `ctx0`, and returns both `ctx0` and `x0` as a pair.

The function `printtm` in the *untyped* implementation (on the book's web site) is more complicated since it takes two additional issues into account:
1. It leaves out as many parentheses as possible, following the conventions that application associates to the left and the bodies of abstractions extend as far to the right as possible.
2. It generates formatting instructions for a low-level pretty printing module (the OCaml Format library) that makes decisions about line breaking and indentation.

## 7.2 Shifting and Substitution

### Shifting

The definition of shifting can be translated almost varbatim:

```ocaml
let termShift d t =
  let rec walk c t = match t with
    TmVar (fi, x, n)   ->
      if x >= c      then TmVar (fi,     x + d, n + d)
                     else TmVar (fi,         x, n + d)
  | TmAbs (fi,  x, t1) -> TmAbs (fi,         x, walk (c + 1) t1)
  | TmApp (fi, t1, t2) -> TmApp (fi, walk c t1, walk c t2)
  in walk 0 t
```

The internal shifting `ᵈ↑ᶜ (t)` is represented by a call `walk c t`. Since `d` never changes, there is no need to pass it along to each call to `walk`. The top-level shift `ᵈ↑ (t)` is represented by `termShift d t`.

### Substitution

The substitution function comes almost directly (from Definition 6.2.4):

```ocaml
let termSubst j s t =
  let rec walk c t = match t with
    TmVar (fi, x, n) ->
      if x = j + c  then termShift c s
                    else  TmVar (fi, x, n)
  | TmAbs (fi,  x, t)  -> TmAbs (fi, x,         walk (c + 1) t)
  | TmApp (fi, t1, t2) -> TmApp (fi, walk c t1, walk c t2)
  in walk 0 t
```

The substitution `[j ⟼ s]t` of term `s` for the variable numbered `j` in term `t` is written as `termSubst j s t`.

The only difference from the original definition of substitution is that here we do all the shifting of `s` at once, in the `TmVar` case, rather than shifting `s` up by 1 every time we go through a binder. This means that the argument `j` remains the same in every call to `walk`.


The definitions of `termShift` and `termSubst` differ only in the action that is taken when a variable is reached. The *untyped* implementation available from the book's web site exploits this observation to express both shifting and substitution operations as special cases of a more general function called `tmmap`. Given a term `t` and a function `onvar`, the result of `tmmap onvar t` is a term of the same shape as `t` in which every variable has been replaced by the result of calling `onvar` on that variable.

In the operational semantics of the lambda-calculus, *the only place where substitution is used is in the beta-reduction rule*. As we noted before, this rule actually performs several operations:
- the term being substituted for the bound variable is first shifted up by 1
- then the substitution is made
- then the whole result is shifted down by 1 to account for the fact that the bound variable has been used up.

The following definition encapsulates this sequence of steps:

```ml
let termSubstTop s t = termShift (negate 1) (termSubst 0 (termShift 1 s) t)
```

## 7.3 Evaluation

The single-step evaluation function is a direct transcription of the evaluation rules, except that we pass a context `ctx` along with the term (the `ctx` arg is not used in the present `eval1` function, but it is needed by some of the more complex evaluators later on). The multi-step evaluation `eval` function is the same as before, except for the `ctx` arg.

```ml
let rec isval ctx t = match t with
    TmAbs (_, _, _) -> true
  | _               -> false

let rec eval1 ctx t = match t with
    TmApp (fi, TmAbs (_, x, t), v) when isval ctx v ->
      termSubstTop v t
  | TmApp (fi, v, t) when isval ctx v ->
      let t' = eval1 ctx t
      in  TmApp (fi, v, t')
  | TmApp (fi, t1, t2) ->
      let t1' = eval1 ctx t1
      in  TmApp (fi, t1', t2)
  | _ -> raise NoRuleApplies

let rec eval ctx t =
  try let t' = eval1 ctx t
      in eval ctx t'
  with NoRuleApplies -> t
```

## 7.4 Notes on explicit substitution

The treatment of substitution presented is far from the final word on the subject. In particular, the beta-reduction rule in our evaluator eagerly substitutes the arg value for the bound variable in the function's body.

Compilers for functional languages that are tuned for speed instead of simplicity use a different strategy: instead of actually performing the substitution, we record an association between the bound variable name and the arg value in a data structure called the *environment*, which is carried along with the term being evaluated. When we reach a variable, we look up its value in the current environment.

This strategy can be modeled by regarding the environment as a kind of **explicit substitution**, i.e. by moving the mechanism of substitution from the meta-language into the object language, making it a part of the syntax of the terms manipulated by the evaluator, rather than an external operation on terms.

Explicit substitutions were first studied by Abadi, Cardelli, Curien, and Lévy (1991a) and have since become an active research area.
