# The view from the left

paper: `The view from the left`, 2004 Connor McBride, James McKinna
http://strictlypositive.org/


Pattern matching has proved an extremely powerful and durable notion in FP. This paper contributes a new programming notation (`with` clause) for type theory which elaborates the notion in various ways.

1. Definition by pattern matching becomes a more discriminating tool in the presence of dependent types, since it *refines the explanation of types as well as values*. This becomes all the more true in the presence of the rich class of datatypes known as inductive families.

2. *Subsidiary case analyses* on the results of intermediate computations, which commonly take place on the rhs of definitions by pattern matching, should rather be handled on the lhs. In simply-typed languages, this subsumes the trivial case of Boolean guards.

3. Elementary pattern matching decompositions have a well-defined interface given by a dependent type - they correspond to the statement of an *induction principle for the datatype*. More general, user-definable decompositions may be defined which also have types of the same general form.

Elementary pattern matching may thus be recast in abstract form, with semantics given by translation. Such *abstract decompositions of data* generalize Wadler's 'views'.

The programmer wishing to introduce a new view of a type `T`, and exploit it directly in pattern matching, may do so via the standard programming idiom. Type theorists, looking through the Curry-Howard lens, may see this as proving a theorem that establishes the validity of a new induction principle for `T`.

We develop enough syntax and semantics to account for this high-level style of programming in dependent type theory. We close with the development of a typechecker for the STLC, which furnishes a view of raw terms as either being well-typed or containing an error. The implementation of this view is ipso facto a proof that typechecking is decidable.

## Intro

This paper is a contribution to declarative programming, in that it introduces a new high-level notation for FP on top of an existing low-level dependent type theory. In particular, we offer a powerful and abstract *successor to pattern matching*.

Pattern matching was first conceived by Rod Burstall (1969) and (to our knowledge) first implemented in Fred McBride's (1970) extension of LISP.

The key feature of pattern matching in simply-typed languages is that the *structure of an arbitrary value in a datatype is elaborated (explained)*.

Classically, pattern matching analyses constructor patterns on the left-hand sides of functional equations, and is defined by a subsystem of the operational semantics with hard-wired rules for computing substitutions from the pattern variables to values.

For example, the test of list membership in SML and Haskell look practically the same,

in Standard ML

```sml hs
fun elem k [] = false
  | elem k (x :: xs) = if (k = x) then true else elem k xs
```

in Haskell

```hs
elem :: a -> [a] -> Bool
elem k []       = False
elem k (x : xs) = if (k == x) then True else elem k xs
```

The clarity of the code does not hinder its efficient compilation; a key technique here is Augustsson's (1985) analysis in terms of **hierarchical switching on the outermost ctor symbol**, coupled with the **exposure of subexpressions**.

This yields, for `elem` above, the following cascade of case expressions:

in Standard ML

```sml hs
fun elem k ls = case ls
  of []      => false
   | x :: xs => case (k = x)
          of true  => true
           | false => elem k xs
```

in Haskell

```hs
elem :: a -> [a] -> Bool
elem k ls = case ls of
    []     -> False
    x : xs -> case (k == x) of
        True  -> True
        False -> elem k xs
```

Pattern matching has proved such a powerful and durable notion in FP that new research into it never stops.

Peyton Jones' idea of **pattern guards** (Peyton Jones, 1997; Peyton Jones, Erwig, 2000) allows definitions by pattern matching to handle on the lhs of programs, subsidiary analysis of the results of intermediate computations (that are commonly handled on the rhs).

For `elem`, we can pull both tests to the lhs of the equation:

```hs
elem k [] = False
elem k (x : xs) | True  <- k == x = True
elem k (x : xs) | False <- k == x = elem k xs
```

Haskell's **Boolean guards** (Peyton Jones & Hughes, 1999) can already qualify pattern matches by tests like `k == x`, but *pattern guards* handle the sub- computations of more complex types. Further, the guard expression can be shared via a `where` clause.

In our notation (for dep tt), you can achieve the same effect by grouping the two clauses in the scope of the call to `k == x` as follows:

```hs
elem k [] → false
elem k (x :: xs) | k == x
                 | true  → true
                 | false → elem k xs
```

Dependent types add a descriptive and expressive power which makes pattern matching a more discriminating tool, refining types as well as values.

>Each elementary pattern matching decomposition has a well-defined interface given by a dependent type, corresponding to an induction principle for the datatype.

This follows from the interplay between computation and reasoning in a type theory (CHI, propositions-as-types). The key feature of induction is that the result type is instantiated, and hence further elaborated, by the patterns.

This has an even stronger effect in the presence of the rich class of datatypes known as *inductive type families* (Dybjer, 1991).

One such type family is `So`, a collection of types indexed by a Boolean value:

```hs
      b : Bool
data ------------ where --------------
      So b : Set         oh : So true


data So : (b : Bool) → Set where
  oh : So true
```

The point here is that `So true` has one element, while `So false` has none.

If `p : S ob`, then case-ing on `p` tells us not only that `p` is `oh`, but also (for free) that `b` must be `true`.

>Inspecting `p` can instantiate `b` and hence any type which depends upon `p` or `b`!

We can use `So` to impose *Boolean preconditions* on programs.

For example, a program which requires an argument `p : So (test 1 or test 2)` need only be defined under circumstances which make one of the test expressions evaluate to true.

If such a program were to switch on the value of `test 1`, say, we should somehow know that `p : So true` in the true case, and that `p : So test 2` otherwise; but how might a typechecker make this connection?

Our `|` notation is motivated not just by convenience, but also to signal the abstraction of subcomputations from types.


Meanwhile, Wadler's *views* proposal (Wadler, 1987; Burton et al, 1996) allows programmers to implement new schemes for decomposing values in types (abstract datatypes, especially), extending the syntax of matching correspondingly.

In our setting, user-definable decompositions, *elimination operators*, may be specified by types resembling the structural induction principles for datatypes, these now merely the primitives from which higher-level analyses can be developed.

Our notation gives a pattern-based syntax to programming with arbitrary eliminators; the semantics is given by translation, rather than by pattern matching per se.

Further, we establish a standard idiom of first-order programming for equipping a type `T` with a new *elimination operator*, by identifying a set of patterns which cover the values in `T`; such patterns may now be arbitrary expressions of type `T`.

The type theorist, looking through the Curry-Howard lens, may see this as proving a new induction principle for `T`. A similar idea has emerged recently in Voda's untyped first-order "Clausal Language" (Voda, 2002), which admits new forms of case analysis via theorem-proving in Peano Arithmetic.

Although the power of dependent types is widely acknowledged, sceptics rightly argue that expressibility is one thing and accessibility another. Here, we address this issue of clarity. We claim that the existing notations of both FPL and type theory fall short of what dependently-typed programming demands, but also of what it can supply - a language of derived forms, rich, intuitive and extensible. Type theory offers the motive, the methods and the opportunity to ask anew what FP can aspire to be.
