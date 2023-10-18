# Safe Agda

- https://agda.readthedocs.io/en/latest/language/safe-agda.html
- https://agda.readthedocs.io/en/v2.6.3/language/safe-agda.html

By using the option `--safe` (as a pragma or on the command-line), a user can specify that Agda should ensure that features leading to possible inconsistencies should be disabled.

The option `--safe` is coinfective: if a module is declared safe, then all its imported modules must also be declared safe.

Here is a list of the features that `--safe` is incompatible with:
- __`postulate`__ keyword 
  can be used to assume any axiom.
- `--allow-unsolved-metas` 
  forces Agda to accept unfinished proofs.
- `--allow-incomplete-matches` 
  forces Agda to accept unfinished proofs.
- `--no-positivity-check` 
  makes it possible to write non-terminating programs by structural "induction" on non-strictly-positive datatypes.
- `--no-termination-check` 
  gives diverging (loopy) programs any type.
- `--type-in-type` and `--omega-in-omega` 
  allow the user to encode the *Girard-Hurken paradox*.
- `--injective-type-constructors` together with the excluded middle 
   leads to an inconsistency via *Chung-Kil Hur's construction*.
- `--guardedness` together with `--sized-types` 
  can be used to define a type which is *both inductive and coinductive*, which leads to an inconsistency. This might be fixed in the future.
- `--experimental-irrelevance` and `--irrelevant-projections` 
  enables potentially *unsound irrelevance* features (irrelevant levels, irrelevant data matching, and projection of irrelevant record fields).
- `--rewriting` 
  turns any equation into one that *holds definitionally*. 
  It can at the very least break convergence.
- `--cubical` together with `--with-K`
  makes it possible to prove the *univalence axiom* using cubical constructions, which falsifies the K axiom.
- The __`primEraseEquality`__ primitive together with `--without-K`   
  using primEraseEquality, one can derive the K axiom.
- `--allow-exec` 
  allows system calls during type checking.
- `--no-load-primitives` 
  allows the user to *bind the sort and level primitives* manually.
