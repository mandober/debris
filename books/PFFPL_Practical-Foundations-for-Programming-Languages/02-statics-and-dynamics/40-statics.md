# 2. Statics and Dynamics :: 4. Statics

4. Statics
  4.1 Syntax
  4.2 Type System
  4.3 Structural Properties

## 4. Statics

Most programming languages exhibit a *phase distinction* between the static and dynamic phases of processing. The **static phase** consists of parsing and type checking to ensure that the program is well-formed. The **dynamic phase** consists of execution of well-formed programs. A language is said to be **safe** exactly when well-formed programs are well-behaved when executed.

The *static phase* is specified by a statics comprising a set of rules for deriving typing judgments stating that an expression is well-formed of a certain type.

Types mediate the interaction between the constituent parts of a program by "predicting" some aspects of the execution behavior of the parts so that we may ensure they fit together properly at run-time.

Type safety tells us that these predictions are correct; if not, the statics is considered to be improperly defined, and the language is deemed unsafe for execution.

In this chapter, we present the statics of a simple expression language, E, as an illustration of the method that we will employ throughout this book.

## 4.1 Syntax

When defining a language we shall be primarily concerned with its *abstract syntax*, specified by a collection of operators and their arities.

The abstract syntax provides a systematic, unambiguous account of the hierarchical and binding structure of the language and is considered the official presentation of the language.

However, for the sake of clarity, it is also useful to specify *minimal concrete syntax conventions*, without going through the trouble to set up a fully precise grammar for it.

We accomplish both of these purposes with a *syntax chart*, whose meaning is best illustrated by example. The following chart summarizes the *abstract and concrete syntax* of E:

```hs
Typ   τ := num                num                   numbers
         | str                str                   strings

Exp   e := x                  x                     variable
         | num[n]             n                     numeral
         | str[s]             "s"                   literal
         | plus(e1; e2)       e1 + e2               addition
         | times(e1; e2)      e1 * e2               multiplication
         | cat(e1; e2)        e1 ^ e2               concatenation
         | len(e)             |e|                   length
         | let(e1; x.e2)      let x = e1 in e2      definition
```

This chart defines two sorts:
- `Typ`, meta var `τ` ranges over types
- `Exp`, meta var `e` ranges over expressions

The chart defines a set of operators and their arities. For example, it specifies that the operator *let has arity* `(Exp, Exp.Exp)Exp`, which specifies that it has two args of sort `Exp`, and binds a variable of sort `Exp` in the second arg.

## 4.2 Type System

>The role of a type system is to impose constraints on the formations of phrases that are sensitive to the context in which they occur.

For example, whether the expression `plus(x; num[n])` is sensible depends on whether the variable `x` is restricted to have type `num` in the surrounding context of the expression.

In fact, this example is illustrative of the general case: *the only info required about the context of an exp is the type of the vars within whose scope the exp lies*.

Consequently, the statics of E consists of an inductive definition of *generic hypothetical judgments* of the form

`x̅ | Γ |- e : τ`

where
- `x̅` is a finite set of vars
- `Γ` is a typing context consisting of hypotheses of the form `x : τ`, 
  one for each `x ∈ x̅`.

By convention, vars use the letters `x` and `y` to stand for them. 

`x ∉ dom(Γ)` means there is no assumption in `Γ` of the form `x : τ` for any type `τ`, in which case we say that *the var `x` is fresh for `Γ`*.

The rules defining the statics of E:

```hs
-------------------------- (4.1a)
Γ, x : τ |- x : τ

-------------------------- (4.1b)
Γ |- 𝑠𝑡𝑟[s] : 𝑠𝑡𝑟

-------------------------- (4.1c)
Γ |- 𝑛𝑢𝑚[n] : 𝑛𝑢𝑚


Γ |- e1 : 𝑛𝑢𝑚     Γ |- e2 : 𝑛𝑢𝑚
--------------------------------- (4.1d)
Γ |- 𝑝𝑙𝑢𝑠(e1; e2) : 𝑛𝑢𝑚

Γ |- e1 : 𝑛𝑢𝑚     Γ |- e2 : 𝑛𝑢𝑚
--------------------------------- (4.1e)
Γ |- 𝑡𝑖𝑚𝑒𝑠(e1; e2) : 𝑛𝑢𝑚

Γ |- e1 :𝑠𝑡𝑟     Γ |- e2 :𝑠𝑡𝑟
--------------------------------- (4.1f)
Γ |- 𝑐𝑎𝑡(e1; e2) :𝑠𝑡𝑟

Γ |- e :𝑠𝑡𝑟
--------------------------------- (4.1g)
Γ |- 𝑙𝑒𝑛(e) : 𝑛𝑢𝑚


Γ |- e1 : τ1     Γ,x : τ1 |- e2 : τ2
--------------------------------- (4.1h)
Γ |- let(e1; x.e2) : τ2
```

In rule (4.1h), we tacitly assume that the variable `x` is not already declared in `Γ`. This condition may always be met by choosing a suitable representative of the α-equivalence class of the let expression.

>(Lemma 4.1) **Unicity of Typing**: For every typing context `Γ` and exp `e`, there exists at most one `τ` such that `Γ |- e : τ`.

The typing rules are syntax-directed in the sense that *there is exactly one rule for each form of expression*. Consequently, it is easy to give necessary conditions for typing an exp that invert the sufficient conditions expressed by the corresponding typing rule.

>(Lemma 4.2) **Inversion for Typing**. Suppose that `Γ |- e : τ`. If `e = plus(e1; e2)`, then `τ = num`, `Γ |- e1 : num`, and `Γ |- e2 : num`, and similarly for the other constructs of the language.

## 4.3 Structural Properties

The statics enjoys the structural properties of the generic hypothetical judgment.

>(Lemma 4.3) **Weakening**. If `Γ |- e': τ'` then `Γ, x : τ |- e': τ'` for any `x ∉ dom(Γ)` and any type `τ`.

```hs
-- Weakening:

Γ     |- e':τ'
--------------- if x ∉ dom(Γ)
Γ,x:τ |- e':τ'
```


>(Lemma 4.4) **Substitution**. If `Γ,x:τ |- e':τ'` and `Γ |- e:τ`, 
then `Γ |- [e/x]e':τ'`

```hs
-- Substitution:

Γ,x:τ |- e':τ'       Γ |- e:τ
-------------------------------
Γ     |- [x⟼e]e' : τ'


-- because we can first form an abstraction:

Γ, x : τ |- e' : τ'
-------------------------- ABS
Γ |- λx.e' : τ -> τ'

-- then applying that lambda to an arg e
-- means binding the arg e to var x
-- after which we perform substitution by
-- replacing all occurrences of x for
-- the bound arg e in the body e'

Γ |- λx.e' : τ -> τ'    Γ |- e : τ
----------------------------------- APP
Γ |- [x⟼e]e' : τ'
```

From a programming point of view, *Lemma 4.3* allows us to use an exp in any context that binds its free vars: if `e` is well-typed in a context `Γ`, then we may "import" it into any context that includes the assumptions `Γ`. 

In other words, introducing new vars beyond those required by an exp `e` does not invalidate `e` itself; it remains well-formed, with the same type.


*Lemma 4.4* expresses the important concepts of *modularity and linking*. 
We may think of the exp `e` and `e'` as two components of a larger system in which `e'` is a client of the implementation `e`.

*Client* declares a var specifying the type of the implementation and is type checked knowing only this information. *Implementation* must be of the specified type to satisfy the assumptions of the client. If so, then we may link them to form the composite system `[e/x]e'`. 

This implementation may itself be the client of another component, represented by a var `y` that is replaced by that component during linking. 

When all such vars have been implemented, the result is a closed exp that is ready for execution (evaluation).

The converse of *Lemma 4.4* is called *decomposition*. It states that any (large) exp can be decomposed into a client and implementor by introducing a var to mediate their interaction.

>(Lemma 4.5) **Decomposition**. If `Γ |- [e/x]e' : τ'`, then for every type `τ` such that `Γ |- e : τ`, we have `Γ, x : τ |- e' : τ'`.

Lemma 4.5 tells us that any sub-expression can be isolated as a separate module of a larger system. This property is especially useful when the variable `x` occurs more than once in `e'`, because then one copy of `e` suffices for all occurrences of `x` in `e'`.


The statics of E given by rules (4.1) exemplifies a recurrent pattern: the constructs of a language are classified into introduction and elimination forms.

*Introduction forms* for a type determine the values, or canonical forms, of that type.

*Elimination forms* determine how to manipulate the values of a type to form a computation of another (possibly the same) type.

In the language E, the introduction forms for the type `num` are the numerals, and those for the type `str` are the literals. The elimination forms for the type `num` are addition and multiplication, and those for the type `str` are concatenation and length.


It is sometimes useful to give the typing judgment `Γ |- e : τ` an *operational reading* that specifies more precisely the *flow of information* required to derive a typing judgment (or determine that it is not derivable).

**Analytic mode**, `e ↓ τ`, corresponds to the context, exp, and type being given, with the goal to determine whether the typing judgment is derivable.

**Synthetic mode**, `e ↑ τ`, corresponds to the context and exp being given, with the goal to find a unique type, if any, possessed by the exp in that context.

These two readings can be made explicit as judgments of the form `e ↓ τ`, corresponding to the analytic mode, and `e ↑ τ`, corresponding to the synthetic mode (Exercise 4.1).
- Variables are introduced in synthetic form.
- If we can synthesize a unique type for an exp, then we can analyze it 
  with respect to a given type by checking type equality.
- Definitions need care, because the type of the defined exp is not given, 
  even when the type of the result is given.

One way to limit the range of possibilities (in the Exercise 4.1 above) is to restrict and extend the syntax of the language so that every expression is either synthetic or analytic according to the following suggestions:
- Variables are analytic.
- Introduction forms are analytic, elimination forms are synthetic.
- An analytic exp can be made synthetic by introducing a type cast of the form `cast{τ}(e)` specifying that `e` must check against the specified type `τ`, which is synthesized for the whole expression.
- The defining exp of a definition must be synthetic, but the scope of the definition can be either synthetic or analytic.
