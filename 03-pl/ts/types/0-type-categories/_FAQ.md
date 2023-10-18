# TS :: Type Level Programming in TypeScript :: FAQ

## 1. Attaching type signature to function definition

Q: Given a previously defined *standalone function signature* (SFS) and a function definition that perfectly conforms to it - is it always possible to attach that signature to the function definition? That is, can we always use such a SFS to annotate a function definition in order to avoid rewriting and thus repeating the same type just to please syntactic rules?

In short: no. For one, there's no way to attach a SFS to function statement definition (FSD) (due to the return type annotation).
