# Re-exports

https://basarat.gitbook.io/typescript/main-1/barrel

Re-exporting is the name for a convenience techique that involves importing a set of names from different modules and than immediately exporting them all under a common name. Normally, no other code is present in such a file, except the import and export statements. The file/module itself is commonly called an index or reexport file/module and named `index.ts`, although a more descriptive name should probably be preferred (especially if import path aliasing is also used).

The nickname 'barrel' is also used to refer to the index file or module, to the set of import statements, or to this techique.

Benefits
- cutting down the number of required import statements
- grouping related things under a common name


The related techique of *import path aliasing* also serves to simplify import statements by shortening the length of import paths (similarly to the techique of URL shortening), cutting down the number of intermediate path components in an import path.

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




## Passthrough exports

Normally, 3 import statements are needed:

```ts
// in a file, e.g. src/components/assemble.ts
import { Foo } from '../demo/foo.ts' // src/demo/foo.ts
import { Bar } from '../demo/bar.ts' // src/demo/bar.ts
import { Baz } from '../demo/baz.ts' // src/demo/baz.ts
```

but an reexport file, `demo/index.ts`, can re-export everything that each module exports, in one place, using `*`.

```ts
// in rexports file, e.g. src/demo/index.ts
export * from './foo.ts' // src/demo/foo.ts
export * from './bar.ts' // src/demo/bar.ts
export * from './baz.ts' // src/demo/baz.ts
```

which cuts down those 3 import statements into just one:

```ts
import { Foo, Bar, Baz } from '../demo/index.ts'

// With path aliasing, the import path could be e.g.
import { Foo, Bar, Baz } from '@/index.ts'
```


## Named exports
