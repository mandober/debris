# 5. Untyped Lambda-Calculus

## 5.1 Basics

The lambda-calculus (or λ-calculus) embodies this kind of function definition and application in the purest possible form. In the lambda-calculus everything is a function: the arguments accepted by functions are themselves functions and the result returned by a function is another function.

The syntax of the lambda-calculus comprises just 3 sorts of terms. A variable `x` by itself is a term; the abstraction of a variable `x` from a term `t1`,
written `λx.t1`, is a term; and the application of a term `t1` to another term `t2`, written `t1 t2`, is a term. These ways of forming terms are summarized in the following grammar:

```
terms:
t := x                        variable
   | λx.t                     abstraction
   | t t                      application
```

### Abstract and Concrete Syntax

When discussing the syntax of programming languages, it is useful to distinguish *two levels of structure*:

* **Concrete syntax** (or surface syntax) of the language refers to the strings of characters that programmers directly read and write.
* **Abstract syntax** is a much simpler internal representation of programs as labeled trees (called abstract syntax trees or ASTs). The tree representation renders the structure of terms immediately obvious, making it a natural fit for the complex manipulations involved in both rigorous language definitions (and proofs about them) and the internals of compilers and interpreters.

  Note: Definitions of full-blown languages sometimes use more than just 2 levels of structure. For example, following Landin, it is often useful to define the behaviors of some languages constructs as derived forms, by translating them into combinations of other, more basic, features. The restricted sublanguage containing just these core features is then called the *internal language (IL)*, while the full language including all derived forms is called the *external language (EL)*. The transformation from EL to IL is (at least conceptually) performed in a separate pass, following parsing.

The transformation from concrete to abstract syntax takes place in 2 stages:

First, a *lexical analyzer (or lexer)* converts the string of characters written by the programmer into a sequence of tokens-identifiers, keywords, constants, punctuation, etc. The lexer removes comments and deals with issues such as whitespace and capitalization conventions, and formats for numeric and string constants.

Next, a *parser* transforms this sequence of tokens into an abstract syntax tree. During parsing, various conventions such as operator precedence and associativity reduce the need to clutter surface programs with parentheses to explicitly indicate the structure of compound expressions. For example, `*` binds more tightly than `+`, so the parser interprets the unparenthesized expression (1 + 2 * 3) as the abstract syntax tree representing the expression (1 + (2 * 3)) rather than ((1 + 2) * 3).

Grammars like the one for lambda-terms above should be understood as describing legal tree structures, not strings of tokens or characters. But when we write terms in examples, definitions, theorems and proofs, we will need to express them in a concrete, linear notation, but we always have their underlying abstract syntax trees in mind.

### Variables and Metavariables

Another subtlety in the syntax definition above concerns the use of *metavariables*. We will continue to use the metavariable `t` (as well as `s`, and `u`, with or without subscripts) to stand for an arbitrary term. Naturally, in this chapter, `t` ranges over lambda-terms, not arithmetic expressions.

Similarly, `x` (as well as `y` and `z`) stands for an arbitrary variable. Note, here, that `x` is a metavariable ranging over variables! To make matters worse, the set of short names is limited, and we will also want to use `x`, `y`, etc. as *object-language variables*.

In such cases, however, the context will always make it clear which is which. For example, in a sentence like "The term `λx. λy. x y` has the form `λz.s`, where `z = x` and `s = λy. x y`", the names `z` and `s` are metavariables, whereas `x` and `y` are object-language variables.

### Scope

A final point we must address about the syntax of the lambda-calculus is the
scopes of variables.

An occurrence of the variable `x` is said to be *bound* when it occurs in the body `t` of an abstraction `λx.t`; more precisely, it is bound by this abstraction. Equivalently, `λx` is a *binder* whose scope is `t`.

An occurrence of `x` is *free* if it appears in a position where it is not bound by an enclosing abstraction on `x`. For example, the occurrences of `x` in `x y` and `λy. x y` are free, while the ones in `λx.x` and `λz. λx. λy. x (y z)` are bound. In `(λx.x) x`, the first occurrence of `x` is bound and the second is free.

A term with no free variables is said to be *closed*; closed terms are also called *combinators*. The simplest combinator is the identity, `id := λx.x`.

### Operational Semantics

The sole means by which terms "compute" is the application of functions to arguments (which themselves are functions). Each step in the computation consists of rewriting an application whose left-hand component is an abstraction, by substituting the right-hand component for the bound variable in the abstraction's body. Graphically, we write

`(λx. t1) t2 --> [x⟼t2]t1`

where `[x⟼t2]t1` means the term obtained by replacing all free occurrences of (the parameter) `x` in (the body) `t1` by (the argument) `t2`.

Following Church, a term of the form `(λx. t1) t2` is called a *redex* or *reducible expression*, and the operation of rewriting a redex according to the above rule is called *beta-reduction*.

#### Evaluation strategies

Several different **evaluation strategies** for the lambda-calculus have been studied over the years by programming language designers and theorists. Each strategy defines which redex in a term can fire on the next step of evaluation.

Note: Some authors use the terms "reduction" and "evaluation" synonymously. Others use "evaluation" only for strategies that involve some notion of "value" and "reduction" otherwise.

##### Full beta-reduction strategy

* Under the **full beta-reduction strategy**, any redex may be reduced at any time. At each step we pick some redex, anywhere inside the term, and reduce it.

For example, consider the term

`(λx.x) ((λx.x) (λz. (λx.x) z))` i.e. `id (id (λz. id z))`

It contains 3 redexes:
- id (id (λz. id z))    (the outermost redex)
-    (id (λz. id z))    (the middle redex)
-            (id z)     (the innermost redex)

Under full beta-reduction, we may choose to reduce them in any order.

For example, we can begin with the innermost redex, then do the one in the middle, then the outermost:

```
id (id (λz. id z))
--> id (id (λz.z))
--> id (λz.z)
--> λz.z
```

##### Normal order

* Under the **normal order reduction strategy**, the *leftmost outermost redex* is always reduced first.

```
id (id (λz. id z))
--> id (λz. id z)
--> λz. id z
--> λz.z
```

Under the normal order strategy (and the ones below), the *evaluation relation* is actually a partial function: each term `t` evaluates in one step to at most one term `t′`.

##### Call-by-name strategy

* The **call-by-name strategy** is yet more restrictive, allowing no reductions inside abstractions. Starting from the same term, we would perform the first two reductions as under normal-order, but then stop before the last and regard `λz. id z` as a normal form.

```
id (id (λz. id z))
--> id (λz. id z)
--> λz. id z
```

Variants of call-by-name have been used in some well-known programming languages, notably Algol-60 and Haskell.

##### Call-by-need strategy

Haskell actually uses an optimized version known as **call-by-need** (Wadsworth, 1971; Ariola et al., 1995) that, instead of re-evaluating an argument each time it is used, overwrites all occurrences of the argument with its value the first time it is evaluated, avoiding the need for subsequent re-evaluation. This strategy demands that we maintain some sharing in the run-time representation of terms-in effect, *it is a reduction relation on abstract syntax graphs, rather than syntax trees*.

##### Call-by-value strategy

* Most languages use a **call-by-value strategy**, in which only *outermost redexes* are reduced and where a redex is reduced only when its rhs has already been reduced to a *value*, which is a term that is finished computing and cannot be reduced any further; in the present bare-bones calculus, the only values are lambda-abstractions. Richer calculi will include other values: numeric and boolean constants, strings, tuples of values, records of values, lists of values, etc.

```
id (id (λz. id z))
--> id (λz. id z)
--> λz. id z
```

*The call-by-value strategy is strict*, in the sense that the arguments to functions are always evaluated, whether or not they are used by the body of the function. In contrast, *non-strict (or lazy) strategies* such as call-by-name and call-by-need evaluate only the arguments that are actually used.


The choice of evaluation strategy actually makes little difference when discussing type systems. The issues that motivate various typing features, and the techniques used to address them, are much the same for all the strategies.

## 5.2 Programming in lambda-calculus

### Multiple Arguments

Instead of multi-argument functions, LC uses higher-order functions that yield functions as results. This transformation of multi-argument functions into higher-order functions is called *currying*.

### Church Booleans

Another language feature that is missing but can be easily encoded in LC is Booleans and conditionals. We can encode them using the *Church Booleans*.

- T   := λa. λb. a
- F   := λa. λb. b
- AND := λa. λb. a b F
- OR  := λa. λb. a T b
- NOT := λa. a F T

### Pairs

Using Church Booleans, we can encode pairs:

- PAIR := λa. λb. λf. f a b
- FST  := λp. p T
- SND  := λp. p F

### Church Numerals

Representing numbers by lambda-terms can be done using the *Church numerals*:

- ZERO := λa. λb. a
- SUCC := λn. λs. λz. s (n s z)

Obtaining:
- c0 = λs. λz. z
- c1 = λs. λz. s z
- c2 = λs. λz. s (s z)
- c3 = λs. λz. s (s (s z))

`C n = fⁿ x`

As with booleans and pairs, this encoding makes numbers into active entities: the number `n` is represented by a function that does something `n` times - a kind of active unary numeral.

- SUC := λn. λs. λz. s (n s z)
- SUC := λn. λs. λz. n s (s z)

- ADD := λm. λn. λs. λz. m s (n s z)

- MUL := λm. λn. m (ADD n) c0
- MUL := λm. λn. λs. λz. m (n s) z
- MUL := λm. λn. λs. m (n s)

- POW := λm. λn. m (MUL n) c1
- POW := λm. λn. λs. λz. m n s z
- POW := λm. λn. m n

- ZZ   := PAIR c0 c0
- SS   := λp. PAIR (SND p) (ADD c1 (SND p))
- PRED := λm. FST (m SS ZZ)

- SUB := λm. λn. n PRED m

- EQUAL = λm. λn. AND (ISZERO (m PRED n)) (ISZERO (n PRED m))


The implementation of `MUL` uses another trick: since `PLUS` takes its arguments one at a time, applying it to just one argument `n` yields the function that adds `n` to whatever argument it is given. Passing this function as the first argument to `m` and `c0` (ZERO) as the second arg means to apply the function that adds `n` to its arg, iterated `m` times, to zero", i.e. add
together `m` copies of `n`.

*Test for zero*: to test whether a Church numeral is zero, we must find some appropriate pair of arguments that will give us back this info - specifically, we must apply our numeral to a pair of terms `zz` and `ss` such that applying `ss` to `zz` one or more times yields FALSE, while not applying it at all yields TRUE. Clearly, we should take `zz` to be just T. For `ss`, we use a function that throws away its argument and always returns F:
- ISZERO = λm. m (λx. F) T


Surprisingly, *subtraction* using Church numerals is quite a bit more difficult than addition. It can be done using the following rather tricky **predecessor** function which, given `c₀` as arg, returns `c₀` and, given `cᵢ﹢₁`, returns `cᵢ`

- ZZ   := PAIR c0 c0
- SS   := λp. PAIR (SND p) (ADD c1 (SND p))
- PRED := λm. FST (m SS ZZ)
- SUB  := λm. λn. n PRED m

This definition works by using `m` as a function to apply `m` copies of the function `SS` to the starting value `ZZ`. Each copy of `SS` takes a pair of numerals `PAIR cᵢ cⱼ` as its arg and yields `PAIR cⱼ cⱼ﹢₁` as its result. So applying `SS`, `m` times, to `PAIR c0 c0` yields `PAIR c0 c0` when `m = 0`, and `PAIR cₘ˗₁ cₘ` when `m` is positive. In both cases, the predecessor of `m` is found in the first component.

(0,0) --> (0,1) --> (1,2) --> (2,3) --> (3,4) --> …


The function EQUAL tests two numbers for equality and returns a Church Boolean:
- EQUAL = λm. λn. AND (ISZERO (m PRED n)) (ISZERO (n PRED m))

#### List

A list can be represented in the LC by its fold function. For example, the list [x,y,z] becomes a function that takes two args `c` and `n` and returns 
`c x (c y (c z n)))`.

`CONS` takes an element `h` and a list (that is, a fold function) `t` and returns a similar representation of the list formed by prepending `h` to `t`.

Encoding a list:
- NIL   :=         λc. λn. n
- CONS  := λh. λt. λc. λn. c h (t c n)
- HEAD  := λl. l (λh. λt. h) F
- TAIL  := λl. FST (l (λx. λp. PAIR (SND p) (CONS x (SND p))) (PAIR NIL NIL))
- ISNIL := λl. l (λh. λt. F) T

Here is a rather different approach:
- NIL   := PAIR T T
- CONS  := λh. λt. PAIR F (PAIR h t)
- HEAD  := λz. FST (SND z)
- TAIL  := λz. SND (SND z)
- ISNIL := FST


### Enriching the Calculus

It is often convenient to include the primitive booleans and numbers in LC, so `λNB` stands for the enriched LC system with Booleans and arithmetic exps.

In λNB, we actually have two different implementations of Booleans and numbers to choose from when writing programs: the real ones and the Church encodings.

To convert between them:

`realBool = λb. b true false`

To go the other direction, we use an if expression:

`churchBool = λb. if b then T else F`

We can build these conversions into higher-level operations. Here is an equality function on Church numerals that returns a real Boolean:

`realEq = λm. λn. (EQUAL m n) true false`

In the same way, we can convert a Church numeral into the corresponding primitive number by applying it to `succ` and 0:

`realNat = λm. m (λx. succ x) 0`

We cannot apply `m` to `succ` directly, because `succ` by itself does not make syntactic sense: the way we defined the syntax of arithmetic exps, `succ` must always be applied to something. We work around this by packaging `succ` inside a function that does nothing but return the `succ` of its arg.

The reasons that primitive booleans and numbers come in handy for examples have to do primarily with evaluation order. For instance, consider the term `SUCC c1`. From the discussion above, we might expect that this term should evaluate to the Church numeral `c2`. In fact, it does not:

```
SUCC c1
--> (λs. λz. s ((λs'. λz'. s' z') s z))
```

This term contains a redex that, if we were to reduce it, would bring us (in two steps) to `c2`, but the rules of *call-by-value evaluation* do not allow us to reduce it yet, since it is under a lambda-abstraction.

There is no fundamental problem here: the term that results from evaluation of `SUCC c1` is obviously *behaviorally equivalent* to `c2`, in the sense that applying it to any pair of args `v` and `w` will yield the same result as applying `c2` to `v` and `w`. Still, the leftover computation makes it a bit difficult to check that our `SUCC` function is behaving the way we expect it to.

One way to check that two term behave as expected is to test them for equality. But it is more direct to take `TIMES c2 c2` and convert it to a primitive number: `realnat (times c2 c2) = 4`.

The conversion has the effect of supplying the two extra arguments that exp is waiting for, forcing all of the latent computation in its body.

### Recursion

A **normal form** is a term that canot take a step under the evaluation relation.

Some terms cannot be evaluated to a normal form. For example, the divergent combinator `OMEGA := (λx. x x) (λx. x x)`.

The omega combinator has a useful generalization called the *fixed-point combinator*, `FIX := λf. (λx. f (λy. x x y)) (λx. f (λy. x x y))`

- Y := λf. (λx. f     (x x))   (λx. f     (x x))
- Z := λf. (λx. f (λy. x x y)) (λx. f (λy. x x y))

Y-combinator is *the call-by-name combinator*, which is useless in a call-by-value setting, since the expression `Y g` diverges, for any `g`.

In fact, the Z-combinator stems from the **Y-combinator**, but this form is more approapriate for the call-by-value evaluation. That's why it is also called the call-by-value Y-combinator or the **Z-combinator** (Plotkin, 1975). It is because in the call-by-value, the evaluation of the inner exp has to be delayed which is achieved by wrapping it in a lambda, `λy. x x y`.

### Representation

What, exactly, does it mean to say that the Church numerals represent ordinary numbers?

Putting all this together, suppose we have a whole program that does some
complicated calculation with numbers to yield a boolean result. If we replace
all the numbers and arithmetic operations with lambda-terms representing
them and evaluate the program, we will get the same result. Thus, in terms
of their effects on the overall results of programs, there is no observable difference between the real numbers and their Church-numeral representation.

## 5.3 Formalities

The syntax and operational semantics of the lambda-calculus in more detail.

### Syntax

Definition [Terms]: Let V be a countable set of variable names. The set of
terms is the smallest set T such that
1. x ∈ T for every x ∈ V
2. if t1 ∈ T and x ∈ V, then λx.t1 ∈ T
3. if t1 ∈ T and t2 ∈ T, then t1 t2 ∈ T

The size of a term `t` can be defined exactly as we did for arithmetic exp.

>The set of free variables of a term `t`, written `FV(t)`

```
FV(x)     = {x}
FV(λx.t1) = FV(t1) \ {x}
FV(t1 t2) = FV(t1) ⋃ FV(t2)
```

### Substitution

Formally, we are defining a function [x⟼s] by induction over its argument `t`.

This phenomenon of free variables in a term `s` becoming bound when `s` is naively substituted into a term `t` is called **variable capture**.

To avoid it, we need to make sure that the bound variable names of `t` are kept distinct from the free variable names of `s`. A substitution operation that does this correctly is called **capture-avoiding substitution**.

>Alpha-equivalence: terms that differ only in the names of bound variables are interchangeable in all contexts.

Definition [Substitution]:

```
[x⟼s]x = s
[x⟼s]y = y                           if y ≠ x
[x⟼s](λy.t1) = λy. [x⟼s]t1          if y ≠ x and y ∉ FV(s)
[x⟼s](t1 t2) = [x⟼s]t1 [x⟼s]t2
```

The first clause for abstractions is dropped, since we can always assume (renaming if necessary) that the bound variable `y` is different from both `x` and the free variables of `s`.

Operational Semantics of the untyped lambda-calculus:

```hs
Syntax:

  Terms:
    t := x
      | t t
      | λx. t

  Values:
    v := λx. t

Evaluation, t --> t′

   t1 --> t1′
------------------ E-App1
t1 t2 --> t1′ t2

   t2 --> t2′
------------------ E-App2
v1 t2 --> v1 t2′

-------------------------- E-AppAbs
(λx.t1) v2 --> [x⟼v2]t1
```

Since (call-by-value) evaluation stops when it reaches a lambda, values can be arbitrary lambda-terms.

There are two sorts of rules:
- the *computation rule* `E-AppAbs` and
- the *congruence rules* `E-App1` and `E-App2`

Taken together, these rules completely determine the order of evaluation for an application t1 t2: we first use E-App1 to reduce t1 to a value, then use E-App2 to reduce t2 to a value, and finally use E-AppAbs to perform the application itself.

Note that, in the pure lambda-calculus, lambda-abstractions are the only possible values, so if we reach a state where E-App1 has succeeded in reducing t1 to a value, then this value must be a lambda-abstraction.
