# Agda :: Index :: Agda checks


* *coverage check*: to ensure completeness of definitions by pattern matching, Agda performs a coverage check on each definition by pattern matching.

* positivity `--no-positivity-check`
* termination `--no-termination-check`
  `--termination-depth`
* comulativity ?
* confluence
  --confluence-check
  --local-confluence-check
* irrelevance features
  irrelevant levels
  irrelevant data matching

- `--injective-type-constructors` Assume that all type ctors are injective.


* Projection-likeness

Projection-likeness is an optimization that reduces the size of terms by dropping parameter-like reconstructible function args.

To turn off the analysis whether a type signature likens to that of a projection, use the flag `--no-projection-like` (since: 2.6.1). It is advisable to leave this optimization on, as the flag is meant for debugging Agda.
