# Notation

The following notations are equivalent:

```hs
∀ (n : ℕ) -> ∀ (m : ℕ) -> add n m ≡ add m n -- explicit
  (n : ℕ) ->   (m : ℕ) -> add n m ≡ add m n -- elide ∀

∀ (n m : ℕ) -> add n m ≡ add m n -- squeeze same type
  (n m : ℕ) -> add n m ≡ add m n -- elide ∀

∀ n m -> add n m ≡ add m n -- elide the type
  n m -> add n m ≡ add m n -- but the cannot elide ∀, ERROR
```
