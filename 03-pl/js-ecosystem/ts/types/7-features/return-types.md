# Return types

https://www.totaltypescript.com/tips/dont-use-return-types-unless

It is said not to use the return types unless
- the function has multiple branches
- building a library
- due to specific TS perf concern

When there's a single return type whose type is correctly inferred, you can elide to annotate it explicitly, but you can. However, when a function has multiple branches you should annotate the return type. And when a generic function has multiple braches you may have a hard time annotate the return types od each branch and the solution may require the casting to `never`.
