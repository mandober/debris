# Agda :: Syntax :: Names :: Identifiers

By removing ambiguities concerning the placement of whitespace around tokens, Agda has introduced a novelty in the stale PL syntactical landascape - namely Agda allows most Unicode characters to particupate in the construction of identifiers.

Most PLs leave most of the rules about whitespace placement undefined, giving rise to linters that, among many other things, then enforce a set of predefined rules about the distribution and placement of whitespace. There are usually options regulating the use of spaces in function calls, `f(x)` vs `f (x)`, around the binary operators, `a + b` vs `a+b`, with unary prefix operators, `-1` vs `- 1`, unary suffix operators, `5!` vs `5 !`, etc.

So to support the plethora of characters as part of identifiers, Agda resticts the use of whitespace by ruling that the tokens must be separated from each other by whitespace. Except if the tokens are special characters, in which case the use of whitespace is optional, e.g. both `(x)` and `( x )` are ok since parethesis are reserved symbols. As are `{a}` and `{ a }`.

Special symbols cannot be part of a name, which along with the whitespace restrictions allows having identifiers like `a=b`, `n≤m`, `T≡U`, `+-assoc`, `*-comm`, `true==true`, etc.


Enforcing the strict rule of whitespace, namely that tokens must be surrounded by whitespace (or line boundaries, BOL and EOL, or special chars), 
