# Flags

https://agda.readthedocs.io/en/latest/language/pragmas.html
https://agda.readthedocs.io/en/latest/tools/command-line-options.html
https://github.com/agda/agda/issues/5761

## Common flags

- `--safe` ensures features leading to possible inconsistencies are disabled
- `--allow-unsolved-metas`     forces Agda to accept unfinished proofs
- `--allow-incomplete-matches` forces Agda to accept unfinished proofs
- `--no-positivity-check` makes it possible to write non-terminating programs by structural "induction" on non strictly positive datatypes.
- `--no-termination-check` gives loopy programs any type.

--with-K
--without-K
--rewriting
--guardedness
--no-guardedness
--sized-types
--no-sized-types
--cubical
--cubical-compatible
--two-level
--universe-polymorphism
--no-universe-polymorphism
--cumulativity
