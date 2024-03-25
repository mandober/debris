## TS :: Ref :: TSConfig :: Root Fields

These options control how the project is set up.

Root fields (5)
- files
- include
- extends
- exclude
- references

## files
https://www.typescriptlang.org/tsconfig#files

Instead of using the `include` and specifying a glob to indicate which files make your project, `files` allows you to just list them. Error occurs if any of the files can't be found. This is only useful if your entire project consists of a few files.

```json
{
  "compilerOptions": {},
  "files": [
    "core.ts",
    "sys.ts",
    "types.ts",
  ]
}
```

## include

https://www.typescriptlang.org/tsconfig#include

## exclude

https://www.typescriptlang.org/tsconfig#exclude

Specifies an array of filenames or patterns that should be skipped when resolving `include`.

`exclude` only changes which files are included as a result of the `include` setting.

A file specified by `exclude` can still become part of your codebase due to
- an *import statement*
- a *types inclusion*
- a `/// <reference` directive
- due to `files` list

`exclude` is not a mechanism that prevents a file from being included in the codebase - it simply influences what the `include` setting finds.


## extends

https://www.typescriptlang.org/tsconfig#extends

The value of `extends` is a string which contains a path to another `tsconfig.json` file to inherit from. The path may use Node.js style resolution.

The config from the base file is loaded first, then *overridden* by the inheriting config file.

All *relative paths* found in the config file are resolved relative to the config file they originated in.

Note that `files`, `include`, and `exclude` from the *inheriting config file* overwrite those from the *base config file*. Circularity between config files is not allowed.

Currently, the only top-level property excluded from inheritance is `references`.

```json
// configs/base.json
{
  "compilerOptions": {
    "noImplicitAny": true,
    "strictNullChecks": true
  }
}

// tsconfig.json
{
  "extends": "./configs/base",
  "files": ["main.ts", "supplemental.ts"]
}

// tsconfig.nostrictnull.json
{
  "extends": "./tsconfig",
  "compilerOptions": {
    "strictNullChecks": false
  }
}
```


## references

https://www.typescriptlang.org/tsconfig#references

*Project references* are a way to structure your app into smaller pieces.

Using Project References can greatly improve build and editor interaction times, enforce logical separation between components, and organize your code in new and improved ways.

You can read more about how references works in the Project References section of the handbook: https://www.typescriptlang.org/docs/handbook/project-references.html


## Glob patterns

`include` and `exclude` support glob patterns:
- `*`   matches zero or more characters (excluding dir-separators)
- `?`   matches any one character (excluding dir-separators)
- `**/` matches arbitrarily nested dir

If the *last path segment* in a pattern does not contain a file extension or wildcard charater, then it is treated as a directory, and files with supported extensions inside that directory are included (`.ts`, `.tsx`, `.d.ts`, …).
