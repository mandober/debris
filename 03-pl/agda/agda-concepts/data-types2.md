# Types in Agda

The most common type in Agda is `Set`, which has some resamblance to the Haskell's `*` or `Type` type where it is the type of inhabited types. In Agda, `Set` hosts inhabited but uninhabited types as well.


In fact, the base universe type, `Set`, is an alias for
- `Set`
- `Set₀`
- `Set0`
- `Set 0`

Agda has a hierarchy of universes, with `Set` being the base universe: the type of `Set` is `Set₁`, the type of `Set₁` is `Set₂`, and so on.


level 0 universe, which is easier to see when you consider its proper name: `Set` is an alias for `Set₀` and its other aliases include `Set0`. Actually, this type is `Set l`, where `l` stands for a particular universe level. So the canonical name of the base `Set` type is `Set 0` (where 0 is the type of `Level`).
