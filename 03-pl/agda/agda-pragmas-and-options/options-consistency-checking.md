# Consistency checking of options used

https://agda.readthedocs.io/en/latest/tools/command-line-options.html#consistency-checking-of-options-used

Agda checks that options used in imported modules are consistent with each other.

## Kinds of options

Properties of options:
- infective options
  - jointly-infective options
- coinfective options
  - mostly-coinfective options
- mutually-exclusive options

An **infective option** is an option that if used in one module, must be used in all modules that depend on this module.

**Jointly-infective options**: if one of them is used in one module, then one or the other must be used in all modules that depend on this module.

A **coinfective option** is an option that if used in one module, must be used in all modules that this module depends on.

A **mostly-coinfective option** is an option that if used in one module, then all modules that this module (directly) imports must also use it.


- Infective options
  - `--prop`
  - `--rewriting`
  - `--guarded`
  - `--two-level`
  - `--cumulativity`
  - `--cohesion`
  - `--flat-split`
  - `--erasure`
  - `--erased-matches`
- Jointly infective options:
  - `--cubical`
  - `--erased-cubical`
- Coinfective options
  - `--safe`
  - `--without-K`
  - `--no-universe-polymorphism`
  - `--no-sized-types`
  - `--no-guardedness`
  - `--level-universe`
- Mostly-coinfective options:
  - `--cubical-compatible` ✻
- Mutually-exclusive options:
  - (--cubical-compatible, --with-K | --safe)


The option --cubical-compatible is mostly coinfective. If a module uses it, then all modules that this module (directly) imports must also use it.

✻ There is one exception: if a module uses both --cubical-compatible and --with-K, then it is not required to use --cubical-compatible in (directly) imported modules that use --with-K.

You cannot use --cubical-compatible and --with-K at the same time with --safe.


## Options and interface files

Agda records the options used when generating an interface file. If any of the following options differ when trying to load the interface again, the source file is re-typechecked instead:
- --allow-exec
- --allow-incomplete-matches
- --allow-unsolved-metas
- --call-by-name
- --cohesion
- --confluence-check
- --copatterns
- --cubical
- --cubical-compatible
- --cumulativity
- --double-check
- --erase-record-parameters
- --erased-cubical
- --erased-matches
- --erasure
- --exact-split
- --experimental-irrelevance
- --flat-split
- --guarded
- --hidden-argument-puns
- --infer-absurd-clauses
- --injective-type-constructors
- --instance-search-depth
- --inversion-max-depth
- --irrelevant-projections
- --keep-covering-clauses
- --local-confluence-check
- --lossy-unification
- --no-auto-inline
- --no-eta-equality
- --no-fast-reduce
- --no-forcing
- --no-guardedness
- --no-import-sorts
- --no-load-primitives
- --no-pattern-matching
- --no-positivity-check
- --no-projection-like
- --no-sized-types
- --no-termination-check
- --no-unicode
- --no-universe-polymorphism
- --omega-in-omega
- --overlapping-instances
- --prop
- --qualified-instances
- --rewriting
- --safe
- --save-metas
- --syntactic-equality
- --termination-depth
- --two-level
- --type-in-type
- --warning
- --without-K
