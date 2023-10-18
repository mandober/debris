---
downloaded:       2022-06-18
page-url:         http://rubrication.blogspot.com/2008/02/proof-by-program-transformation.html
article-title:    Proof by Program Transformation
---
# Proof by Program Transformation
### Proof by Program Transformation

Program transformation is a sort of meta-compilation where the source and target languages are the same. In this sense it can be seen as an automorphism on the set of programs in a language.

As was pointed out by Turchin, it is sometimes possible to prove properties of programs simply by performing a program transformation. Basically a program, and a program which verifies it's behaviour (a predicate) can be replaced with a truth value if the program transformation is sufficiently powerful. An obvious example of course, which can be calculated using partial evaluation would be something like (max (< 3) (1::2::1::nil)). In fact very complex properties can be proved automatically by Distillation, a particularly powerful program transformation system.

In my research I've been working with the μ-Calculus, which is a type of temporal logic that is very powerful (LTL, CTL, CTL* can all be embedded in the μ-Calculus) and good for describing reactive systems. It uses a notion of least and greatest fixed-points in order to describe temporal properties. This lead me to consider infinite proofs, bi-simulation and co-induction in the context of distillation.

I was reading a paper [1], which lead me to wonder if Distillation couldn't be used as a means of determining if two programs bi-simulate in a very simple way. Distillation can be viewed as a relation between programs, such that a program *a* and a program *b* are related by *a D b* iff *a* Distils to *b* (that is *b* is the result of running the distillation algorithm on *b*). If the bi-simulation relation is called *~* then we have trivially that:

∀ a b c ∈ PROG. a D c ∧ b D c → a~b

This is obvious since *D* is semantics preserving, and *c* must have the same semantics as both *a* and *b*. So this looks a little bit silly at first, what good can this possibly be? Can we ever expect this to happen? Well, I was a little bit surprised to find that it does work for simple examples that I tried on paper. For instance, let us take the following program.

```
iterate f x = x:(iterate f (f x)) 
map f (h:tl) = (f h):(map f tl)
cofix f = f (cofix f)

```

  

```
conjecture_1 f x = iterate f (f x)  
conjecture_2 f x = map f (iterate f x)

```

We will assume that the ":" constructor is for a type of lists with no "nil" terminator, that is, we are only dealing with infinite lists. Supercompilation is strictly less powerful than Distillation, but sufficient for this example, and simpler to do on paper. We will therefore supercompile the two halves of the conjecture:

∀ f x. iterate f (f x) ~ map f (iterate f x)

to yield:

```
conjecture_1 f x = iterate f (f x) 
-- unfold iterate
conjecture_1 f x = (f x):(iterate f (f (f x)) 
-- generalise [iterate f (f x), iterate f (f (f x))] => 
--  iterate f (f x) which is just conjecture_1
conjecture_1 f x = (f x):(conjecture_1 f (f x))
conjecture_1 = cofix (\ g f x -> (f x):(g f (f x)))

```

  

```
conjecture_2 f x = map f (iterate f x) 
-- unfold map 
conjecture_2 f x = case (iterate f x) of h:tl => (f h):(map f tl)  
-- unfold iterate
conjecture_2 f x = case (x:(iterate f (f x)) of h:tl => (f h):(map f tl) 
-- case law, [h:=x, tl:=(iterate f (f x))]
conjecture_2 f x = (f x):(map f (iterate f (f x)) 
-- generalise [map f (iterate f (f x)), map f (iterate f x)] =>  
-- map f (iterate f x), which is just conjecture_2
conjecture_2 f x = (f x):(conjecture_2 f (f x))
conjecture_2 = cofix (\ g f x -> (f x):(g f (f x)))

```

So we can see that conjecture_1 and conjecture_2 are syntactically identical modulo alpha-conversion. The cofix was added just so that the function name didn't obscure the equality. In fact we could also go to some De Bruijn representation as well, to get rid of the need for alpha-conversion equivalence, but I think you get the picture. In addition, it is trivial to verify that this is a valid co-recursive program satisfying the guard condition that the recursive call happens under the constructor of the co-inductive type which is the co-domain of the co-recursive function (look at all those "co"s!).

The point is though that we have derived a syntactically identical program, and hence proved bi-simulation, using a completely automated procedure!

So the obvious question of course is, how often will this work? The technique relies on finding a canonical form. For non-recursive (NOREC) programs, we can probably always find a canonical form using supercompilation (the *S* relation, a subset of *D*). That is, I expect that:

∀ p,q,r,s ∈ NOREC. p D r ∧ q D s → r=s

This is probably obviously true to someone who understands better about normal forms in the lambda calculus, but I haven't yet proved it for the language over which distillation is defined.

For recursively defined programs, it can't be the case that we can always find a canonical form. This is the undecidability of equivalence for the lambda calculus. However, I'll stick my neck out and conjecture that it will work for all programs of suitably low complexity (PRIMREC, ELEMENTARY maybe? [3]). This doesn't tell us anything about bi-simulation however, since co-recursive programs don't have a complexity. Is there a *co-complexity* we could use? It would be really nice to have some class we could show is definitely canonisable.

And while I'm on a roll playing fast and loose, I'll say that I think that Distillation represents "the right way" of going about finding "proof-net" like structures for intuitionistic logic. That is, internal to the distillation algorithm we actually form a graph, and in the case of conjecture_1 and conjecture_2 the graphs are identical. The internal representation used for distillation then is actually the form in which we remove "The bureaucracy of syntax" [2] for some subset of possible proofs.

For further reading on some of these ideas:

[1] [Proof Methods for Corecursive Programs][1]  
[2] [Down with the bureaucracy of syntax!][2]  
[3] [The Expressive Power of Higher-order Types or, Life without CONS][3]  
[4] [Deforestation, program transformation, and cut-elimination][4]

[1]: http://citeseer.ist.psu.edu/105244.html
[2]: http://citeseer.ist.psu.edu/702184.html
[3]: http://citeseer.ist.psu.edu/244412.html
[4]: http://www.sciencedirect.com/science?_ob=ArticleURL&_udi=B75H1-4DDWHYH-2N&_user=10&_rdoc=1&_fmt=&_orig=search&_sort=d&view=c&_acct=C000050221&_version=1&_urlVersion=0&_userid=10&md5=13709e6972c03e4dc57f15bf36ef3436
