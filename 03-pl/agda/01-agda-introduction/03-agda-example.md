# Agda :: Example

Introductions to Agda
- [A taste of Agda][1]
- [List of tutorials][2]

[1]: https://agda.readthedocs.io/en/latest/getting-started/a-taste-of-agda.html#a-taste-of-agda
[2]: https://agda.readthedocs.io/en/latest/getting-started/tutorial-list.html#tutorial-list


Agda libraries
- Agda Builtin Library
- Agda Standard Library (installed separately)


## Minimal Agda program

A minimal Agda program to test if you have installed Agda correctly:

```hs agda
-- file: hello-world.agda
module hello-world where

open import Agda.Builtin.IO using (IO)
open import Agda.Builtin.Unit using (⊤)
open import Agda.Builtin.String using (String)

postulate putStrLn : String → IO ⊤

{-# FOREIGN GHC import qualified Data.Text as T #-}
{-# COMPILE GHC putStrLn = putStrLn . T.unpack #-}

main : IO ⊤
main = putStrLn "Hello world!"
```

This code is self-contained and has several declarations:
- Imports of the `IO`, `⊤` and `String` types from the *Agda Builtin library*
- A postulate of the function type `putStrLn`
- Two pragmas that tell Agda how to compile the function `putStrLn`
- A definition of the function `main`

To compile the Agda file, run `agda --compile hello-world.agda`. This will create a binary `hello-world` in the cwd that prints "Hello world!".

To find out more about the `agda` command, use `agda --help`.

As you can see from this example, by default Agda includes only minimal library support through the *Builtin modules*.

**The Agda Standard Library** provides bindings for most commonly used Haskell functions, including `putStrLn`.
