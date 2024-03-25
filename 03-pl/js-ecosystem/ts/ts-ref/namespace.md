# Namepsace

https://www.typescriptlang.org/docs/handbook/namespaces.html

(a note about terminology) in TS v1.5, the nomenclature has changed:
- internal modules are now *namespaces*
- external modules are now *modules*
as to align with ECMAScript 2015's terminology; namely, that `module X {` is equivalent to the now-preferred `namespace X {`.

A new namespace is introduced with the `namespace` keyword, followed by a code block from whioch you can export things. Howewver, with the introducion of ES modules namespaces have become obsolete. They do allow you to declare a module within a module though, but that's useful for demos not so much for production.

## Multi-file namespaces

The same namespace can be split across multiple files. Even though the files are separate, each contributes to the same namespace and can be consumed as if they were all defined in one place. Because there are dependencies between files, we must add *triple-slash directives* to tell the compiler about the relationships between the files.

```ts
// Validation.ts
//====================================================================
namespace Validation {
  export interface StringValidator {
    isAcceptable(s: string): boolean
  }
}

// LettersOnlyValidator.ts
//====================================================================
/// <reference path="Validation.ts" />

namespace Validation {
  const lettersRegexp = /^[A-Za-z]+$/
  export class LettersOnlyValidator implements StringValidator {
    isAcceptable(s: string) {
      return lettersRegexp.test(s)
    }
  }
}

// ZipCodeValidator.ts
//====================================================================
/// <reference path="Validation.ts" />

namespace Validation {
  const numberRegexp = /^[0-9]+$/
  export class ZipCodeValidator implements StringValidator {
    isAcceptable(s: string) {
      return s.length === 5 && numberRegexp.test(s)
    }
  }
}

// Test.ts
//====================================================================
/// <reference path="Validation.ts" />
/// <reference path="LettersOnlyValidator.ts" />
/// <reference path="ZipCodeValidator.ts" />

// Some samples to try
let strings = ["Hello", "98052", "101"]
// Validators to use
let validators: { [s: string]: Validation.StringValidator } = {}
validators["ZIP code"] = new Validation.ZipCodeValidator()
validators["Letters only"] = new Validation.LettersOnlyValidator()
// Show whether each string passed each validator
for (let s of strings) {
  for (let name in validators) {
    console.log(
      `"${s}" - ${
        validators[name].isAcceptable(s) ? "matches" : "does not match"
      } ${name}`
    )
  }
}
```

## Aliases, import aliases

TS can create import aliases, `import q = x.y.z`

Another way that you can simplify working with namespaces is to use 
`import q = x.y.z` to create shorter names for commonly-used objects. Not to be confused with `import x = require("name")` syntax used to load RJS modules, the syntax simply creates an alias for the specified symbol.

You can use these sorts of imports (commonly referred to as aliases) for any kind of identifier, including objects created from module imports.

```ts
namespace Shapes {
  export namespace Polygons {
    export class Triangle {}
    export class Square {}
  }
}

import polygons = Shapes.Polygons
let sq = new polygons.Square() // Same as 'new Shapes.Polygons.Square()'
```

Notice that we don't use the `require` keyword; instead we assign directly from the qualified name of the symbol we are importing.

This is similar to using `var`, but also works on the type and namespace meanings of the imported symbol.

Importantly, for *values*, import is a distinct reference from the original symbol, so changes to an aliased `var` will not be reflected in the original variable.

## Working with other JS libraries

To describe the shape of libraries not written in TS, we need to declare the API that the library exposes. Because most JS libraries expose only a few top-level objects, namespaces are a good way to represent them.

We call declarations that don't define an implementation *ambient*. Typically these are defined in `.d.ts` files (like `.h` files in C/C++).
