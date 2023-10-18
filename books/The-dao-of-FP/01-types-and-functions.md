# 1. Clean Slate

Don't think about how things are implemented in hardware - the physical substrate is irrelevant to the idea of programming.

## TOC

- 1. Types and functions (Clean Slate)
  - 1.1 Types and functions
  - 1.2 Equality and uniqueness, terminal and initial objects (Yin and Yang)
  - 1.3 Elements
  - 1.4 The object of arrows

## 1.1 Types and functions

A *type* (in TT) is a primitive notion; it cannot be defined. Instead of calling it a type, we call it an *object* (in CT), or a *proposition* (in logic), even a *set* (in ST). These terms names the same concept in different math areas.

We name types so we can talk about them, e.g. Int, Bool, or even `a` (repr any type at all). These are just names - a type has no intrinsic meaning. What makes a type special is how it relates to other types, and these relations are represented by arrows.

An arrow relates a source and target objects (types). If the two objects are the same, then the arrow is metely a loop around the object, called the *identity arrow*; it is a member of more general class of endomorphisms (morphisms on the same object). However, in CT every object must have the identity arrow/morphism.

In programming, set theory and type theory, an arrow between objects (types) is a *function*. In CT, an arrow between objects is a *morphism*. In logic, an arrow between objects (propositions) is an *entailment* (implication). These words name the same concept in different areas of mathematics.

A proposition is a declaration that has a truth value. In logic, we interpret an arrow between two propositions, `a -> b`, as entailment, that says that `a` entails `b`, or that `b` is derivable from `a`.

There may be more than one arrow between two types, so we give them names; e.g. an arrow `f` that is `f : a -> b`. In programming, the usual way to interpret such function is saying that `f` takes an arg (of type) `a` and produces the result (of type) `b`. In logic and TT, we'd say that `f` is a proof that, if `a` is true, then `b` is also true.

The connection between type theory, logic, lambda calculus is known as the *Curry-Howard correspondence*. Adding category theory into the mix expands the name to *Curry-Howard-Lambek correspondence*.


## 1.2 Equality and uniqueness, terminal and initial objects

An object is defined by its connections, which are described by the arrows.

An arrow is a proof or a witness of the fact that two objects are connected. Sometimes there's no proof if objects are not connected. Sometimes there are many proofs since there can be many connections between two objects. And sometimes still there's a single proof - a *unique* arrow between two objects. Being *unique* means that if you can find two of those, then they must be equal.

In category theory, an object that has a unique outgoing arrow to every object is the **initial object**. Its dual is an object that has a unique incoming arrow from every object, the **terminal object** ("the" is justified by isomorphic uniqueness). In CT, the initial object is often denoted by 0, and the terminal object by 1.

The initial object is the source of everything. It symbolizes the chaos from which everything arises. In Haskell, the empty type is called `Void`. Since there's an arrow from `Void` to every type, there is also an arrow from `Void` to `Void`. Thus, `Void` begets `Void` and everything else.

The terminal object unites everything. It symbolizes the ultimate order. In Haskell, this type is called unit (or top) and denoted by `()`. In logic, the terminal object signifies the ultimate truth, symbolized as `⟙`. The fact that there's an arrow to it from any object means that `⟙` is true no matter the assumptions.

Dually, the initial object signifies logical falsehood, contradiction, or a counterfactual. It's called falsum or bottom, and symbolized as `⟘`. The fact that there is an arrow from it to any object means that you can prove anything from falsity (from false premises), i.e. *ex nihilo quidlibet*.

In English, there is special grammatical construct for counterfactual implications. The saying, "If wishes were horses, beggars would ride", means that assuming equality between A (wishes) and B (horses) entails C (that beggars would ride). Even though this implication is based on a false premise, the implication is true; the only way that an implication is false, is when a premise is true while the conclusion is false.

There are infinitely many types in Haskell, and there is a unique function from `Void` to each type. All these functions, `Void -> a`, are known under the same name, `absurd`, because they cannot ever be invoked. Even their existence is an absurd thanks to the convention that `x⁰ = 1`, and expecially `0⁰ = 1`, which implies there's even a function from `Void` to `Void`.

FP        | CT                 | Logic
----------|--------------------|------------
type      | object             | proposition
function  | morphism           | implication
Void      | initial object,  0 | False ⟘
()        | terminal object, 1 | True  ⟙

## 1.3 Elements

An object has no parts but it may have structure. The structure is defined by the *arrows pointing at* the object. We can probe an object with arrows.

In programming and logic, we want our initial object to have no structure. So we'll assume that it has no incoming arrows (other than the identity). Therefore, `Void` has no structure.

The terminal object has the simplest structure. There is only one incoming arrow from any object to it: there is only one way of probing it from any direction. In this respect, the terminal object behaves like an indivisible point. Its only property is that it exists, and the arrow from any other object proves it.

Because the terminal object is so simple, we can use it to probe other, more complex objects. If there is more than one arrow coming from the terminal object to some object `a`, it means that `a` has some structure: there is more than one way of looking at it. Since the terminal object behaves like a point, we can visualize each arrow from it as picking a different point or element of its target.

In type theory, `x : a` means that an object `x` has a type `a`.

However, in category theory we refrain from talking about objects and pay more attention to arrows that relate them. So how can we refer to an object without referring to the object? The concept of objects does exist in CT, but they are merely used as anchors so the arrows have a place to hang off of. In any category, all objects collapse to blobs, and so they are represented by dots.

But let's take the category of sets, `Set`, as a guiding example, and let's prevent the collapse of sets into the abstract set or blobs, so we can see their structure. In the `Set` category, the terminal object is a singleton set, denoted as `1`. The terminal object is related to any object (so to any set) in the category of sets by there always being at least one arrow between `1` and any set.

The terminal object is actually so defined as the *only* object that has a unique incoming arrow from any object, *including itself* ("only" is up to an isomorphism). Since there's only one arrow from any object to the terminal object, it means that the identity arrow on `1` is that unique arrow incoming to the terminal object from the terminal object. This makes a weird signature for that arrow, `1 : 1 -> 1`. Usually though, we denote the identity arrow of an object `a` by `1ᵃ` (or sometimes by `Idᵃ`). However, since the terminal object is special, we use `1` for everything, the object itself, its identity arrow (otherwise it'd be `1¹`), and its *global element* arrow.

However, it is not this direction of arrows (into `1`) that we're interested in at the moment - we should focus on the arrows going from `1`. Since we prevented collapsing of sets, we see that the `1` and some set `a` are related in a particular way: if the set `a` has cardinality `n`, then there is `n` functions (yes, functions, this time) going from `1` to `a`. Each of these `n` functions picks a unique element in `a`, so we can identify each element of `a` by the corresponding function; e.g. an elem `x` is identified by the function `x : 1 -> a`, an elem `y` is identified by the function `y : 1 -> a`, etc. There's no reason to name these functions differently; each function identifies the element named by it; and each element is identifid by a function named after it, so these functions and elements are essentially the same.

When we return to the categorical view of the Set category and let the sets collapse, each of these function will become a morphism; there will still be the `x : 1 -> a` this time as a morphism, and the morphism `y : 1 -> a`, and as many of these morphisms as there are elements in what is the now collapsed set `a`. Each one of them is called a *global element* as it identifies an element.

Therefore, we can refer to an arrow (to any of these arrows indeed) that represents a global element, instead of referring directly to the object (!? element, object, wtf).


In CT, we say that `x` is a **global element** of the object `a` if it is an arrow `x : 1 -> a`


Even though in programming we say that `x` is a term of type `a`, `x :: a`, in category theory we instead identify an object with its global element, that is, we equate the object `x` with the arrow `x :: 1 -> a`.

Haskell's type system makes a difference between `x :: a` and `x :: () -> a`, but in categorical semantics, they denote the same thing.

In logic, such `x` is called a proof of `A`, since it corresponds to the implication `⟙ -> A` (if *True* is true then `A` is true). Notice that there may be many different proofs of `A`.

Since we have mandated there be no arrows from any other object to `Void`, there is no arrow from the terminal object to it. Therefore `Void` has no elements. This is why we think of `Void` as the empty set/type.

The terminal object has just one element, since there is a unique arrow coming from it to itself, `id : 1 -> 1`. This is why we sometimes call it a singleton.

Note: In category theory there is no prohibition against the initial object having incoming arrows from other objects; however, in Cartesian Closed Categories (CCC), which we study here, this is not allowed.

## 1.4 The object of arrows

Arrows between any two objects form a set (at least in a locally small category).

In programming we talk about the type of functions from `a` to `b`. In Haskell we write `f :: a -> b`, meaning that `f` is of the type "function from `a` to `b`". Here, `a -> b` is just the name we are giving to this type.

If we want function types treated the same as other types, we need an object that could represent a set of arrows from `a` to `b`.

To fully define such an object, we would have to describe its relation to other objects, in particular to both object `a` and object `b`.

More on that later, for now, keep in mind the following distinction:

* On the one hand, we have arrows which connect two objects `a` and `b`; the totality of these arrows form a set.
* On the other hand, we have an *object of arrows* from `a` to `b`. An "element" of this object is defined as an arrow from the terminal object `1` to the object we call `a -> b`, i.e. `f ∈ 1 -> bᵃ`.

The notation we use in programming tends to blur this distinction. This is why in category theory, this object of arrows is called an **exponential object** and written `bᵃ`.

The statement `f : a -> b` is equivalent to the `f : 1 -> bᵃ`.

In logic, an arrow `A -> B` is an implication: it states the fact that "if A then B". An exponential object `Bᴬ` is the corresponding proposition. It could be true or false, we don't know before we prove it. That proof is an element of `Bᴬ`. Show me an element of `Bᴬ` and I'll know that `B` follows from `A`.

Consider again the statement, "If wishes were horses, beggars would ride", this time as an object. It's not an empty object, because you can point at a proof of it; something along the lines: "A person who has a horse rides it. Beggars have wishes. Since wishes are horses, beggars have horses. Therefore beggars ride". But, even though you can have a proof of this statement, it's of no use to you, because you can never prove the premise (i.e. that wishes are horses).
