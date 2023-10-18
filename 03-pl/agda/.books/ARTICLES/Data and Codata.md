---
downloaded:       2022-06-07
page-url:         http://blog.sigfpe.com/2007/07/data-and-codata.html
article-title:    A Neighborhood of Infinity: Data and Codata
---
# A Neighborhood of Infinity: Data and Codata
In [Gödel, Escher, Bach][1], Hofstadter introduces the programming language [Bloop][2]. Bloop is a little like BASIC except that it forces programmers to specify in advance how many times each loop will iterate. As a result, Bloop programs have the handy property that they are guaranteed to terminate. Unfortunately this property also makes it impossible to write something like an operating system in Bloop. To write an OS we need open-ended loops that keep running until the user explicitly chooses to shut the OS down. One solution to this is to write code in [Floop][3]. Floop allows us to write unbounded loops, the equivalent of C's

while (1) { ... }

. The problem with that, however, is that we can write runaway infinite loops that never terminate and never give us any output. Is there some language that lies between Bloop and Floop that can give us unbounded looping when we need it, but which never allows us to hoist ourselves by our petards by writing runaway loops?

Wishing no disrepsect to OS writers, at first blush it might seem that the distinction between a runaway loop and an idle OS is too fine - if we can write an infinite loop that does something useful, then surely we can write a useless one too. But it turns out that there is a very elegant and well-principled way to distinguish between these kinds of loops, and this allows us to write open-ended interactive software in a programming language that nonetheless always produces a well-defined output, no matter what the input. In order to do this we need to distinguish between two kinds of data: *data* and [codata][4]. By ensuring that a function expecting codata never receives data, and vice versa, we can ensure that even programs with open-ended loops always produce a well defined output.

The concepts I want to talk about are very general and can apply to whatever programming language you use. I'm going to use some simple Haskell examples but most of these will translate to other languages. So consider something like

```
sum [] = 0sum (a:as) = a + sum as
```

This sums the elements of a list. Note how it's well behaved as long as we give it a finite list as input. On the other hand, consider

```
sum' [] = 0sum' a = sum' (1:a) - 1
```

This isn't well behaved at all. Except when you input empty lists, it never gives a result. From a mathematical perspective it's not a good definition either, there are many functions that satisfy these two properties. Is there some general principle at work here that allows us to tell immediately that one of these terminates and the other doesn't? We know from Turing that there is no procedure that guarantees we can always tell such programs apart, but in this case there is something that we can easily point to. In the first program, the right hand side of the second line uses the

sum

function recursively but we only apply it to a strict *subpart* of the input, its tail in fact. In the second example we apply

sum'

to something that *contains* the argument. The former function is using what is known as structural recursion, and it's not hard to convince yourself that structural recursion, applied to finite datastructures, always terminates.

So if we limit ourselves to structural recursion we can guarantee our programs will always terminate. But what about a definition like:

```
fact 0 = 1fact n = n * fact (n-1)
```

That doesn't appear to use structural recursion. But we can view it as such like this. Define the natural numbers as follows:

```
data Nat = Zero | S Nat
```

0 is represented as

Zero

, 1 is represented as

S Zero

and so on. We can represent every natural this way. Here's the important thing: if n>0 then n-1 is simply a subpart of n. So we can view this kind of recursion as a type of structural recursion.

(In fact, by a curious quirk of the Haskell 98 standard we can rewrite our definition to look more like a structural recursion:

```
fact' 0 = 1fact' (n+1) = (n+1) * fact' n
```

I'm guessing this feature is in Haskell precisely so that people can 'pretend' they are using structural recursion with the

+

in

n+1

serving a role as a kind of pseudo-constructor.)

So we have a nice rule for ensuring our code terminates. But

sum

fails when applied to infinite lists. Should we simply rule out infinite datastructures? That seems a bit drastic. The example that convinced me to look into Haskell was

```
fib = 1 : 1 : zipWith (+) fib (tail fib)
```

We really don't want to rule out such a succinct definition of the Fibonacci numbers. But how can we allow such structures when we have functions like

sum

sitting around. Applying

sum

to

fibs

will obviously cause non-termination.

Let's consider another example:

```
sumSoFar x [] = [x]sumSoFar x (y:ys) = x : sumSoFar (x+y) ys
```

Like

sum

, this fails to terminate for an infinite input. But unlike

sum

, it's possible to make sense of it. If the inputs were

0

and the infinite list

[1,1,1,1,...]

then the result would be

[0,1,2,3,...]

. The program might not terminate, but from a mathematical perspective this is a completely well defined function. What's more, suppose the input list represented a stream of data being input at a keyboard, and that the output was displayed on a screen one element at a time, then we'd have a simple cash register. This program might not terminate, but it's completely well behaved. Note that this could only work in a lazy language. A strict language would want to evaluate the entire list before outputting anything. But in a lazy language we can start outputting the beginning of the list before the rest of it is computed.

From the point of view of using infinite lists, it's

sum

that's badly behaved, and

sumSoFar

that's well behaved. Again, can we point to a simple distinction between these two programs that explains this? Turns out we can, and in some sense it's dual to what we said above.

sumSoFar

is well behaved because when we recursively call

sumSoFar

on the right hand side we do so from inside a list constructor. (Remember that

:

is the list constructor.) This is known as

guarded recursion

and it guarantees that even though our programs don't terminate, they still define a unique mathematical function and result in a well behaved program. In the case of

sumSoFar

, each time we look at another element of the result, we trigger another lazy evaluation that terminates. But the right hand side won't just run off and compute endlessly until we do that triggering because the recursion is 'guarded' within a constructor. (That, by the way, was the main point of this article, so you can probably relax now.)

Note the duality: in structural recursion we 'deconstruct' the argument and then we're allowed to recurse. In guarded recursion we recurse first, and then we're allowed to use the constructor.

So we've almost achieved our goal of describing rules to allow open-ended loops because we've managed to give a rule for writing functions that are guaranteed to be well-behaved even though they manipulate infinite data structures. But we're not quite home yet - we still can't have functions like

sum

coexist with infinite lists. How can we ensure that an infinite list is never handed to

sum

?

Consider the definition of Haskell lists. It's something like this:

```
data [a] = [] | a : [a]
```

I.e. a list of

a

's is either the empty list

[]

or it's made from an

a

and a list of

a

's.  
You can think of this as an equation in

[a]

. In Haskell we take this as uniquely defining what

[a]

is, but in reality there is more than one solution to this equation. Consider the type consisting of only finite lists. That satisfies this equation. A finite list is either an empty list, or an element followed by a finite list. Similarly a possibly infinite list is either an empty list, or an element followed by a possibly infinite list. There is an ambiguity. Finite lists form, what is in some sense, the smallest possible solution to this equation. The possibly infinite lists form the largest possible solution. Haskell takes the largest possible solution.

But suppose we were to distinguish between these two different solutions. We could use the keyword

data

to mean the smallest solution and

codata

to mean the largest solution. The former represents data, and it's always finite. The latter represents what we call codata, and it's possibly infinite. And now we can refine our rules for well-behavedness. Consider data and codata to be distinct types. In a strongly typed language this immediately allows us to restrict

sum

to data, not codata. The rule is: you're only allowed to use structural recursion with data and guarded recursion with codata. With that rule, we're guaranteed that our recursions will always be safe, and yet that we can still have open-ended loops in our code. Sometimes these are called recursion and *corecursion* respectively.

And now we can go a little crazy with language. When we want to prove that a structurally recursive program terminates we use induction. This doesn't work straightforwardly for corecursion, so instead we use a principle called [coinduction][5]. Recursive programs typically terminate. Corecursive programs don't necessarily terminate, but they're still well-behaved as long as they keep on going whenever we give them input. We can call this cotermination. And so on... I'm not going to say what coinduction is because I'd have to talk about bisimulation, and this post would get way too long.

So now a mathematical aside. The reason for all the "co"s is that data and codata have categorical descriptions and they turn out to be dual to each other. But you don't hear mathematicians talking about corecursion and coinduction much. Why not? Well one of the axioms of set theory is the [Axiom of Foundation][6]. One way of interpreting this is the statement that there is no infinite sequence

>   
> ...a3∈a2∈a1∈a0.  

So even though we can construct infinite lists in mathematics, we can't construct 'infinitely deep' lists. This means that in mathematics we can use a form of structural recursion. In fact, the familiar principle of induction follows from this. So for many of the things that mathematicians do, induction works fine. But if we decide to use a [non-standard variation][7] of set theory where the axiom of foundation doesn't hold we can no longer use recursion. For example the [Axiom of Extension][8] says that two sets are equal if their elements are equal. This is a recursive definition, but it's useless in the presence of a set a such that a∈a. At this point mathematicians need a principle of coinduction. And for more on that, I refer you to [Vicious Circles][9].

Oh...time for a quick rant. Over the years I've seen a few people argue that there's something fundamentally wrong with the notion of the algorithm because it doesn't apply to the kind of open-ended loop we see in operating systems and interactive applications. Some have even gone further to suggest that somehow mathematics and computer science are fundamentally different because mathematics can't seek to describe these kinds of open-ended phenomena. As I've tried to show above, not only are there nice ways to look at open-ended computations, but from a mathematical perspective they are precisely dual, in the category theoretical sense, to terminating computations. It may be true that mathematicians sometimes spend more time with *things*, and computer scientists with *cothings*. But this really isn't such a big difference and the same langiage can be used to talk about both.

I learnt all this from a variety of sources including Turner's paper on [Total Functional Programming][10]. My original motivation for trying to understand this stuff came from [this][11] post on Ars Mathematica. Curiously, that post had a significant effect on me. It made me realise there was this entire co-universe out there that I knew nothing about, and I was forced to make a real effort with learning Haskell because Haskell was the programming language closest to the mathematical notation used to talk about this co-universe. (Thanks Walt, but sorry to everyone who wants to see less Haskell here!)

I didn't really get why anyone would want to distinguish between data and codata until I saw some clues in some [slides][12] by Altenkirch and some comments by [Conor McBride][13]. I'm still not sure anyone says it quite as clearly as this: distinguishing between data and codata means we can allow the coexistence of infinite lists, structural recursion and open-ended loops, without risk of causing bad behaviour.

Labels: [haskell][14], [types][15]

[1]: http://en.wikipedia.org/wiki/G%C3%B6del,_Escher,_Bach
[2]: http://en.wikipedia.org/wiki/BlooP_and_FlooP
[3]: http://en.wikipedia.org/wiki/BlooP_and_FlooP
[4]: http://types2004.lri.fr/SLIDES/altenkirch.pdf
[5]: http://citeseer.ist.psu.edu/jacobs97tutorial.html
[6]: http://en.wikipedia.org/wiki/Axiom_of_regularity
[7]: http://en.wikipedia.org/wiki/Non-well-founded_set_theory
[8]: http://en.wikipedia.org/wiki/Axiom_of_extensionality
[9]: http://www.press.uchicago.edu/cgi-bin/hfs.cgi/00/14522.ctl
[10]: http://www.jucs.org/jucs_10_7/total_functional_programming
[11]: http://www.arsmathematica.net/archives/2006/01/04/wikipedia-on-corecursion/
[12]: http://types2004.lri.fr/SLIDES/altenkirch.pdf
[13]: http://groups.google.com/group/fa.haskell/browse_thread/thread/15948b654ddae061/383f12a600d4e007#
[14]: http://blog.sigfpe.com/search/label/haskell
[15]: http://blog.sigfpe.com/search/label/types
