# Agda :: Syntax :: Names

Like in many PLs, identifiers in Agda must not contain any of the spacial chars, and, unsurprisingly, spaces (Unicode space chars).

Unlike most of PLs, identifiers in Agda, apart from a small set of special chars, can be composed of almost any Unicode chars.

This capability motivates the convention for naming the identifiers: whenever possible (and reasonable) their name is formed by taking the name of their type and removing the whitespace. For example, under the propositions-as-types, predicates are types, so if a type like `m ≤ n` appears in a function's type signature, the name of the corresponding parameter may be `m≤n`. It is also common to name the properties of operators like this: `+-commutativity`, `*-associativity`, `↑-idempotence`, `↗-monotonicity`.

However, the underscore character in an identifier is significant. A single appearance of an underscore in an identifier autimatically turns it into a mixfix operator. The underscore may occur more than once in an identifier, and each occurence represents a place for an argument. The number of occurrences of the underscore char is (usually) equal to the arity of the mixfix operator.

Each occurrence of the underscore in an identifier marks a splitting point: the contiguous characters of an identifier, demarked by the underscore chars or word boundaries, constitute the *name parts*.


a mixfix identifier becomes a multi-part identifier


may be used in name parts
- a name is either the entire, underscore-less, identifier,; but if 
- a name part is a part between underscores
