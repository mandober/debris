# Cont

```hs
type K = forall r a. (a -> r) -> r


type K a = (forall r. (a -> r) -> r)


newtype Cont r a = Cont ((a -> r) -> r)

newtype Cont r a = Cont { runCont :: (a -> r) -> r }
-- type Cont r = ContT r Identity
newtype ContT r m a = ContT { runContT :: (a -> m r) -> m r }

newtype Kont a = Cont { runCont :: forall r. (a -> r) -> r }

-- | Construct a continuation-passing computation from a function.
-- (The inverse of 'runCont')
cont :: ((a -> r) -> r) -> Cont r a
cont f = ContT (\ c -> Identity (f (runIdentity . c)))


data Kestrel a b = Kestrel { ruinKestrel :: forall r. a -> b -> r }
```


```ts
type Cont<R, A> = (f: (a: A) => R) => R
```
