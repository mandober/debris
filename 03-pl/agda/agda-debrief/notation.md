# Notation

## Notation in type signatures

- explicit args, `(𝟘 : 𝓤)`
- implicit args, `{i : Level}`
- implicit arg w/o type, `{i}`
- forall notation (type inference), `∀ n m → add n m`
- clustering of names, `{A B : 𝓤}`
- eliding `→`, `{x : A} {xs : List A}`
- spacing,     `{x : A}{xs : List A}`


The following notations are equivalent:

```agda hs
∀ (n : ℕ) -> ∀ (m : ℕ) -> add n m ≡ add m n -- ✔ explicit args and forall
  (n : ℕ) ->   (m : ℕ) -> add n m ≡ add m n -- ✔ elide forall

∀ (n m : ℕ) -> add n m ≡ add m n -- ✔ same type arg cluster
  (n m : ℕ) -> add n m ≡ add m n -- ✔ with forall elided

-- either elide the type or forall but not both:
∀ n m -> add n m ≡ add m n -- ✔ eliding the type
  n m -> add n m ≡ add m n -- ✘ means you cannot elide forall
```
