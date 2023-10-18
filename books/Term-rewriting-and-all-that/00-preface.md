# Preface

Term rewriting is a branch of theoretical computer science which combines elements of logic, universal algebra, automated theorem proving and functional programming.

The foundation of term rewriting is *equational logic*. What distinguishes term rewriting from equational logic is that equations are used as *directed replacement rules*, i.e. the left-hand side can be replaced by the right-hand side, *but not vice versa*. This constitutes a Turing-complete computational model which is very close to functional programming.

Term rewriting has applications in algebra (e.g. Boolean algebra, group theory and ring theory), recursion theory (what is and is not computable with certain sets of rewrite rules), software engineering (reasoning about equationally defined data types such as numbers, lists, sets etc.), and programming languages (especially functional and logic programming).

In general, term rewriting applies in any context where *efficient methods for reasoning with equations are required*.

The book covers fairly canonical topics:
- abstract reduction systems and universal algebra (the foundation)
- word problems (the motivation)
- unification (a central algorithm)
- termination, confluence and completion (sine qua non of term rewriting)

The inclusion of *combination problems* is also uncontroversial, except maybe for the rather technical topic of *combining word problems*. Two further topics show our own preferences and are not strictly core material: 
- *equational unification* is included because of its significance for rewriting based theorem provers
- *Grobner bases* because they form an essential link between term rewriting and computer algebra.

Prerequisites are minimal: readers who have taken introductory courses such as discrete mathematics, (linear) algebra, or theoretical computer science are well equipped for this book. The basic notions of ordered sets are summarized in an appendix.
