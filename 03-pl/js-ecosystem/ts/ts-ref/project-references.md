# Project References

https://www.typescriptlang.org/docs/handbook/project-references.html

Project references are a new feature in TypeScript 3.0 that allow you to structure your app into smaller pieces.

By doing this, you can greatly improve build times, enforce logical separation between components, and organize your code in new and better ways.

We're also introducing a new mode for `tsc`, the `--build` flag, that works hand in hand with project references to enable faster builds.


Project references is an array of objects that specifies projects to reference:

```json
{
    "compilerOptions": {
        // The usual
    },
    "references": [
        { "path": "../src" }
    ]
}
```
