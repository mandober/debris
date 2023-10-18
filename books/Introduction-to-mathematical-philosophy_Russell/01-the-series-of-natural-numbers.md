# Introduction to Mathematical Philosophy
by Bertrand Russell, 1920

## 1. The Series of Natural Numbers

Mathematics is a study which may be pursued in either of 2 opposite directions.

The more familiar direction is *constructive*, towards gradually increasing complexity: from integers to fractions, real numbers, complex numbers; from addition and multiplication to differentiation and integration, and on to higher mathematics.

The other direction, which is less familiar, proceeds, by *analysing*, to greater and greater abstraction and logical simplicity. Instead of asking what can be defined and deduced from what is assumed that we begin with, we ask instead what more general ideas and principles can be found, in terms of which, what was our starting point, can be defined or deduced.

It is the fact of pursuing this opposite direction that characterises *mathematical philosophy* as opposed to ordinary mathematics. But it should be understood that the distinction is one, not in the subject matter, but in the state of mind of the investigator.

Early Greek geometers, passing from the empirical rules of Egyptian land-surveying to the general propositions by which those rules were found to be justifiable, and thence to Euclid's axioms and postulates, were engaged in mathematical philosophy, according to the above definition.

But once the *axioms* and *postulates* had been reached, their deductive employment, as we find it in Euclid, belonged to mathematics in the ordinary sense.

The distinction between mathematics and mathematical philosophy is one which depends upon the interest inspiring the research, and upon the stage which the research has reached; not upon the propositions with which the research is concerned.

We may state the same distinction in another way: The most obvious and easy things in mathematics are not those that come logically at the beginning; they are things that, from the point of view of logical deduction, come somewhere in the middle.

We need two sorts of instruments, *the telescope and the microscope*, for the enlargement of our visual powers, so we need two sorts of instruments for the enlargement of our logical powers: one to take us forward to the higher mathematics, the other to take us backward to the logical foundations of the things that we are inclined to take for granted in mathematics.


We will take as our starting-point this series of natural numbers:

`0, 1, … n, n + 1, …`

It is only at a high stage of civilisation that we could take this series as our starting-point. It must have required many ages to discover that a brace of
pheasants and a couple of days were both *instances of the number 2*: the degree of abstraction involved is far from easy.

It was believed until recently that some, at least, of these first notions of arithmetic must be accepted as too simple and primitive to be defined. Since all terms that are defined are defined by means of other terms, it is clear that human knowledge must always be content to accept some terms as intelligible without definition, in order to have a starting-point for its definitions. It is not clear that *there must be terms which are incapable of definition*: it is possible that, however far back we go in defining, we always
might go further still.

All traditional pure mathematics, including analytical geometry, may be regarded as consisting wholly of *propositions about the natural numbers*. That is to say, the terms which occur can be defined by means of the natural numbers, and the propositions can be deduced from the properties of the natural numbers - but with the addition, in each case, of the ideas and propositions of pure logic.

That all traditional pure mathematics can be derived from the natural numbers is a fairly recent discovery, though it had long been suspected.

Pythagoras, who believed that not only mathematics, but everything else could be deduced from numbers, was the discoverer of the most serious obstacle in the way of what is called the *arithmetising of mathematics*. It was Pythagoras who discovered the existence of incommensurables, and, in particular, the **incommensurability** of the side of a square and the diagonal. If the length of the side is 1 inch, the number of inches in the diagonal is the square root
of 2, which appeared not to be a number at all.

The problem thus raised was solved only in our own day, and was only solved completely by the help of the reduction of arithmetic to logic, which will be explained in following chapters. For the present, we shall take for granted the arithmetisation of mathematics, though this was a feat of the very greatest
importance.

Having reduced all traditional pure mathematics to the theory of the natural numbers, the next step in logical analysis was to reduce this theory itself to
>the smallest set of premisses and undefined terms from which it could be derived.

This work was accomplished by **Peano**. He showed that the entire theory of the natural numbers could be derived from 3 primitive ideas and 5 primitive propositions, in addition to those of pure logic.

The **3 primitive ideas** in Peano's arithmetic are: 0, number, successor. 
By "successor" he means the next number in the natural order. 
By "number" he means, in this connection, the class of the natural numbers.

The **5 primitive propositions** which Peano assumes are:
1. 0 is a number. `0 ∈ N`
2. successor of any number is a number. `n ∈ N -> S n ∈ N`
3. no two different numbers have the same successor. `n = m -> S n = S m`
4. 0 is not the successor of any number. `∀n(S n ≠ 0)` or `¬∃n(S n = 0)`
5. any property which belongs to 0, and also to the successor of every number that has the property, belongs to all numbers. `(P(0) ⋀ P(n) -> P(S n)) -> P(n)`

The last of these is the *principle of mathematical induction*. We shall have much to say concerning mathematical induction in the sequel; for the present, we are concerned with it only as it occurs in Peano's analysis of arithmetic.


To begin with, we define 1 as "the successor of 0", 2 as "the successor of 1", and so on. We can obviously go on as long as we like with these definitions, since, in virtue of (2), every number that we reach will have a successor, and, in virtue of (3), this cannot be any of the numbers already defined, because, if it were, two different numbers would have the same successor; and in virtue of (4) none of the numbers we reach in the series of successors can be 0. Thus the series of successors gives us an endless series of continually new numbers.

In virtue of (5) all numbers come in this series, which begins with 0 and travels on through successive successors
- 0 belongs to this series
- if a number `n` belongs to it, so does its successor, whence, by mathematical induction, every number belongs to the series.


We turn now to the considerations which make it necessary to advance beyond the standpoint of Peano, who represents the last perfection of the arithmetisation of mathematics, to that of **Frege**, who first succeeded in "*logicising*" math, i.e. in reducing to logic the arithmetical notions which his predecessors had shown to be sufficient for mathematics.

We shall not actually give Frege's definition of number and of particular numbers, but we shall give some of the reasons
>why Peano's treatment is less final than it appears to be.


In the first place, Peano's 3 primitive ideas (0, number, successor) are capable of an *infinite number of different interpretations*, all of which will satisfy the 5 primitive propositions.

1. Let `0` mean 100, and `number` mean the numbers from 100 onward in the series of natural numbers. Then all the primitive propositions are satisfied, even the fourth, for, though 100 is the successor of 99, 99 is not a "number" in the sense which we are now giving to the word "number."

2. Let `0` have its usual meaning, but let `number` mean what we usually call even numbers, and successor of a number be what results from adding 2 to it.

3. Let `0` mean the number 1, let `number` mean the set `1, 1/2, 1/4, 1/8, …` and let `successor` mean "half." Then all Peano's 5 axioms will be true of this set.

>In fact, given any series `x₀, x₁, x₂, …, xₙ, …`, which is endless, contains no repetitions, has a beginning, and has no terms that cannot be reached from the beginning in a finite number of steps, we have a set of terms verifying Peano's axioms.


A *progression* is a series of the form `x₀, x₁, …, xₙ, …` in which
- there is a first term
- there is a successor to each term (so that there is no last term)
- has no repetitions
- every term can be reached from the start in a finite number of steps


Every progression verifies Peano's 5 axioms. It can be proved, conversely, that
>every series which verifies Peano's 5 axioms is a progression.

Hence these 5 axioms may be used to define the class of progressions:
>**progressions** are those series which verify these 5 axioms.

Any progression may be taken as the basis of pure mathematics: we may give the name "0" to its first term, the name "number" to the whole set of its terms, and the name "successor" to the next term in the progression.

The progression need not be composed of numbers: it may be composed of points in space, or moments of time, or any other terms of which there is an infinite supply.

Each different progression will give rise to a different interpretation of all the propositions of traditional pure mathematics; all these possible interpretations will be equally true.

It might be suggested that, instead of setting up "0" and "number" and "successor" as terms of which we know the meaning (although we cannot define them), we might let them stand for any 3 terms that verify Peano's 5 axioms. They will then no longer be terms which have a meaning that is definite but *undefined* - they will be *variables*, i.e. terms with which we make certain hypotheses, namely, those stated in the 5 axioms, but which are otherwise *undetermined*.

If we adopt this plan, our theorems will not be proved concerning an ascertained set of terms called "the natural numbers", but concerning all sets of terms having certain properties.

Such a procedure is not fallacious; indeed for certain purposes it represents a valuable generalisation. But from two points of view it fails to give an adequate basis for arithmetic. 
* In the first place, it does not enable us to know whether there are any sets of terms verifying Peano's axioms; it does not even give the faintest suggestion of any way of discovering whether there are such sets.
* In the second place, as already observed, we want our numbers to be such as can be used for counting common objects, and this requires that our numbers should have a definite meaning, not merely that they should have certain formal properties. This definite meaning is defined by the *logical theory of arithmetic*.
