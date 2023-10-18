# 3. Finitude and Mathematical Induction

The fifth of the five primitive propositions which we laid down about the natural numbers stated that any property which belongs to 0, and to the successor of any number which has the property, belongs to all the natural numbers.

A property is said to be **hereditary** in the natural-number series if, whenever it belongs to a number `n`, it also belongs to `n+1`. Similarly a class is said to be hereditary if, whenever `n` is a member of the class, so is `n+1`.

It is easy to see, though we are not yet supposed to know, that to say a property is hereditary is equivalent to saying that it belongs to all the natural numbers not less than some one of them, e.g. it must belong to all that are not less than 100, or all that are not less than 1000, or it may be that it belongs to all that are not less than 0, i.e. to all without exception.

A **property is inductive** when it is a hereditary property which belongs to 0. Similarly, a **class is inductive** when it is a hereditary class of which 0 is a member.

Given a hereditary class of which 0 is a member, it follows that 1 is a member of it, because a hereditary class contains the successors of its members, and 1 is the successor of 0. Similarly, given a hereditary class of which 1 is a member, it follows that 2 is a member of it; and so on. Thus we can prove by a step-by-step procedure that any assigned natural number, say 30,000, is a member of every inductive class.

We will define the **posterity** of a given natural number with respect to the relation *immediate predecessor* (which is the converse of "successor") as all those terms that belong to every hereditary class to which the given number belongs.

It is again easy to see that the posterity of a natural number consists of itself and all greater natural numbers; but this also we do not yet officially know.

By the above definitions, the posterity of 0 will consist of those terms which belong to every inductive class.

>The *natural numbers* are the posterity of `0` with respect to the relation *immediate predecessor*.

We have thus arrived at a definition of one of Peano's three primitive ideas in terms of the other two.  As a result of this definition, two of his primitive propositions - namely, the one asserting that 0 is a number and the one asserting mathematical induction - become unnecessary, since they result from the definition. The one asserting that the successor of a natural number is a natural number is only needed in the weakened form "every natural number has a successor".

>The number 0 is the number of terms in a class which has no members, i.e. in the class which is called the **null-class**.

By the general definition of number, the number of terms in the null-class is the set of all classes similar to the null-class, i.e. *the set consisting of the null-class all alone*, i.e. the class whose only member is the null-class.

Thus we have the following purely logical definition:
>0 is the class whose only member is the null-class.

It remains to define successor: given any number `n`, let `α` be a class which has `n` members, and let `x` be a term which is not a member of `α`. Then the class consisting of `α` with `x` added will have `n+1` members.

Thus we have the following definition:
>The **successor** of the number of terms in the class `α` is the number of terms in the class consisting of `α` together with `x`, where `x` is any term not belonging to the class.

We have thus reduced Peano's three primitive ideas to ideas of logic: we have given definitions of them which make them definite, no longer capable of an infinity of different meanings.

What about the primitive proposition that no two numbers have the same successor? This is not difficult to prove if the total number of individuals in the universe is infinite; for given two numbers `m` and `n`, neither of which is the total number of individuals in the universe, it is easy to prove that we cannot have `m + 1 = n + 1` unless we have `m = n` ⟨injectivity of the succ⟩.

But let us suppose that the total number of individuals in the universe is finite, say 10; then there would be no class of 11 individuals, and the number 11 would be the null-class. So would the number 12. Thus we'd have 11 = 12; therefore the successor of 10 would be the same as the successor of 11, although 10 would not be the same as 11.

Thus we should have two different numbers with the same successor. This failure of the third axiom cannot arise, however, if the number of individuals in the world is not finite (We return to this topic in Chapter XIII).

Assuming that the number of individuals in the universe is not finite, we have now succeeded not only in defining Peano's 3 primitive ideas, but in seeing how to prove his 5 primitive propositions, by means of primitive ideas and propositions belonging to logic.

>It follows that all pure mathematics, in so far as it is deducible from the theory of the natural numbers, is only a prolongation of logic.

The process of mathematical induction, by means of which we defined the natural numbers, is capable of generalisation.

We defined the natural numbers as the "posterity" of 0 with respect to the relation of a number to its immediate successor.

If we call this relation `N`, any number `m` will have this relation to `m+1`.

A property is hereditary with respect to `N`, or simply **N-hereditary**, if, whenever the property belongs to a number `m`, it also belongs to `m+1`, i.e. to the number to which `m` has the relation `N`.

A number `n` belongs to the posterity of `m` with respect to the relation `N` if `n` has every `N`-hereditary property belonging to `m`.

These definitions can all be applied to any other relation just as well as to `N`.

Thus if `R` is any relation whatever, we can lay down these definitions:

  (These definitions, and the generalised theory of induction, are due to Frege, and were published so long ago as 1879 in his Begriffsschrift. In spite of the great value of this work, I was, I believe, the first person who ever read it-more than twenty years after its publication)

A property is called **R-hereditary** when, if it belongs to a term `x`, and `x` is R-related to `y`, then it belongs to `y`. A class is R-hereditary when its defining property is R-hereditary.

A term `x` is said to be an **R-ancestor** of the term `y` if `y` has every R-hereditary property that `x` has, provided `x` is a term which has the relation `R` to something or to which something has the relation `R` (this is only to exclude trivial cases).

The **R-posterity** of `x` is all the terms of which `x` is an R-ancestor.

We have framed the above definitions so that if a term is the ancestor of anything it is its own ancestor and belongs to its own posterity. This is merely for convenience.

It will be observed that if we take for R the relation "parent," ancestor and posterity will have the usual meanings, except that a person will be included among his own ancestors and posterity.

It is of course, obvious at once that "ancestor" must be capable of definition in terms of "parent", but until Frege developed his generalised theory of induction, no one could have defined "ancestor" precisely in terms of "parent".
