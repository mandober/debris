# Singleton, subsingleton and set

https://www.cs.bham.ac.uk/~mhe/HoTT-UF-in-Agda-Lecture-Notes/HoTT-UF-Agda.html#subsingletonsandsets

**Singleton (contractible) types**: Voevodsky defined a notion of *contractible type*, which we refer to here as singleton type. We say that a type is a singleton if there is a designated `c : X` that is identified with each `x : X`. Such an element `c` is sometimes referred to as a *center of contraction of `X`*, in connection with homotopy theory. The canonical singleton type is `𝟙`. Once we have defined the notion of type equivalence, we will have that a type is a singleton iff it is equivalent to `𝟙`.

**Subsingletons** (propositions or truth values): a type is a subsingleton if it has at most one element, that is, any two of its elements are equal, or identified. Under univalent excluded middle, the empty type `𝟘` and the singleton type `𝟙` are the only subsingletons, up to equivalence, or up to identity if we further assume univalence. Subsingletons are also called propositions or truth values.

The terminology `is-subsingleton` is more mathematical and avoids the clash with the slogan propositions-as-types, which is based on the interpretation of mathematical statements as arbitrary types, rather than just subsingletons. In these notes we prefer the terminology subsingleton, but we occasionally use the terminologies proposition and truth value. When we wish to emphasize this notion of proposition adopted in univalent mathematics, as opposed to "propositions as (arbitrary) types", we may say univalent proposition.
