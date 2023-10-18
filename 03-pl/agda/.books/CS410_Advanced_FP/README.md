# CS410 Advanced Functional Programming 2021
using Agda, with Fredrik Nordvall Forsberg

YouTube Playlist 122 videos
https://www.youtube.com/playlist?list=PLtMyCt65_Zw4--hs_4Lbqbyqf1TDFDAHO

## The problem with Booleans

We look at how to encode logic in Agda. In a traditional programming language, you usually have your program, and a specification saying what the program is supposed to do. But there is a very clear divide between these two things: the program is something you feed to the computer, so it's represented formally and precisely, whereas a specification is usually jotted down informally, and it only serves you and your team to refer to sometimes, if at all. It's not formalized, no automated sanity checks are performed on it, so there's no guarantee that the specification actually makes any kind of sense.

This disconnect of the specification from the actual code is acute with many popular PLs, but this changes in dependently-typed programming languages. In Agda, for example, we can take the specification and actually move it into the code, so that a program and its specification are both represented equally and formally in the digital form.

However, to achieve this, we need a way to encode the specification, and a way to do it is by translating it into a formal logical language. Just like we represent programs in a programming language, we can also represent specifications, that is, logic formulas, in the same PL.

An initial reaction may be to use Boolean logic to encode logic of specifications, but the existence of only two Boolean values implies that a logical formula is either true or false. We're gonna need Booleans in any case, so we might as well define them now.

```hs
data 𝔹 : Set where
  true false : 𝔹
```

𝔹 has two constructors, `false` and `true`, and while they may be enough to encode the atomic logical formulas (falsity and truth), they are not far from sufficient to encode all the logic of specifications. Moreover, we need a way to combine different statements.

In the meantime, we can capture the functionality of Boolean connectives quite accurately by defining functions that use pattern matching to dispatch on the two Boolean ctors (which are also the two Boolean values). We can surely define the usual connectives (and, or, not, imply, etc) this way.

However, what if we need to say that a specification should talk about all inputs? For example, if we need to express that a statement holds for all natural numbers? We'd like to specify not just what happens for a finite number of objects, but an infinite, e.g. for all natural numbers, `∀ n : ℕ . P n`.

We have a problem to express that because we have to take all of the specsifications `P n`, and then we have to give back either `true` or `false`, depending whether P holds for an `n` - and we'd have to check it for each and every `n`. We have no way of checking infinitely many specification formulas in finite time (we must do it in finite time coz we're finite voodoo people).

In general, we can only represent decidable propositions if we take the route of representing predicates as Boolean functions.

If a program returns a Boolean, then we can always run the program and it's going to return either `false` or `true`; it is decidable whether the program will return true or not just by running it (the program cannot get stuck because Agda wouldn't run it in the first place; recursion is allowed only if it behaves well).

Sometimes in order to have interesting specifications, we might even want the specifications to be undecidable. Then we're going to invest some effort into proving that the spec is satisfied, but that's effort we are willing to spend, and we don't necessarily want the computer to do it for us automatically.

The standard solution is to use the proof as types paradigm and represent propositions (and proofs) as types.

## Propositions as types

So what actually is a proposition? It is something that may have a proof. We say that a proposition is anything that you possibly could hope the prove. It doesn't have to be true, but you will at least recognize what the proof of it might look like. It's a bit like the famous saying that pornography has no easy definition but you know it when you see it. In the case of propositions, a proposition is something you recognize when you understand what the proof of it could be.

If we roll with that idea, then we make the intellectual leap and say that if a proposition is something which might have proof, then we might as well identify a proposition with the collection of proofs that it has. So instead of talking about propositions directly, we can just talk about their proofs, because they are basically the same thing anyway. Form this it then follows that a proposition is but a set of proofs, so we identify propositions with sets (or types), which is `Set` in Agda. And following that line of reasoning, we are led to conclude that *a proof is nothing but a program of the right type*.

Running with this idea, the very least we should be able to do is to represent the standard logical connectives: implication, conjunction, etc. Let's start with implication in this video.

The question is: what is a proof of A implies B, `A → B`? It's a method for converting proofs of `A` into proofs of `B`. And that sounds awfully like functions. However, to translate implication into functions, we don't need to implement them as they are already built in. This would be surpluous:

```hs agda
-- implementing function as a data type
data _⟼_ : Set → Set → Set where
  _=>_ : A ⟼ B
-- unlike Haskell, Agda doesn't allow the same name for type and data ctors
-- because, in a dependently-typed language, types are terms as well.

-- implementing functions as functions
_⟼_ : Set → Set → Set
A ⟼ B = A → B
```

Then a basic fact of logic, that A implies A, `A → A`, can be implemented as the identity function.

```hs agda
id : {A : Set} → A → A
id a = a
```

(logic connectives …)


## Universal quantification

What is a proof of a universal quantification, `∀ x : A . P x`?

It should be something which, if you give it any `a : A`, then it gives you back a proof of `P a`. So there's a proof of `P a` for every `a`.

We can identify universal quantification with the dependent functions space, where we have functions from `A` into `P`, where the type of the codomain of the function depends on the element of the domain you pass it.

`Π (x : A) B x` ≅ ∀ (x : A) → B x

```hs agda
∀′ : (A : Set) → (P : A → Set) → Set
∀′ A P = (x : A) → P x
```

For every natural number `n : Nat`, either `n` is even, or `suc n` is even.
