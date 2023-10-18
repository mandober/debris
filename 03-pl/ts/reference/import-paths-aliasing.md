# Import paths aliasing

In complex projects, the paths in import statements tend to get long, especially when referring to a deeply nested file. Similarly to the technique of URL shortening, TS offers the possibility to shorten those import path by creating one or more aliases that behave like junction points in the file system. Another benefit of this, is that the import paths of modules become absolute, although we still use the relative addressing like before as if there is no aliasing.

The related techique to reexporting is *import path aliasing*, which also serves to simplify paths in import statements.

Paths are shortened (similarly to the techique of URL shortening) by introducing *junction points*, which cut the number of intermediate path components down.


For example, if a file   
`src/semantics/axiomatic.ts`    
wants to import the module    
`src/syntax/grammar/types/basic.ts`    
the import statement would normally look like this:
```ts
import { foo } from '../syntax/grammar/types/basic.ts'
```

but, if a path alias, e.g. `@`, points to the directory    
`src/syntax/grammar/types/`    
then the import statement could look like this:

```ts
import { foo } from '@/basic.ts'
```
