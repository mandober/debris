# Syntax declarations

https://agda.readthedocs.io/en/latest/language/syntax-declarations.html

* You can now declare user-defined syntax that binds identifiers.

```agda hs
-- data type definition
record Σ (A : Set) (B : A → Set) : Set where
  constructor _,_
  field       fst : A
              snd : B fst

-- (1) define syntax sugar for Σ
syntax Σ A (λ x → B) = [ x ∈ A ] × B

-- (2) use sugared notation for Σ
witness : ∀ {A B} →  [ x ∈ A ] × B  → A
--                   ^^^^^^^^^^^^^
witness (x , _) = x
```

>Syntax declaration for `Σ` above implies `x` is in scope in `B` but not in `A`.



* You can give *fixity declarations* along with syntax declarations:

```agda hs
infix 5 Σ
syntax Σ A (λ x → B) = [ x ∈ A ] × B
```

>The fixity applies to the syntax, not the name.


* Syntax declarations may have *implicit arguments*:

```agda hs
id : ∀ {n} {A : Set n} → A → A
id x = x

syntax id {A} x = x ∈ A
```

## Restrictions

* Syntax (sugared notation) must be fully applied.

Unlike mixfix operators that can be referenced unapplied (by referring to the entire name, underscores and all), or partially applied (by replacing only some of the underscores by arguments), a syntax (instance) must be fully applied.


* Syntax declarations are restricted to alphabetic, non-operator names.

```agda hs
syntax  _==_ x y  =  x === y -- DISALLOWED
```


* Syntax declarations must be linear - this is disallowed:

```agda hs
syntax  wrong x  =  x + x -- DISALLOWED
```
