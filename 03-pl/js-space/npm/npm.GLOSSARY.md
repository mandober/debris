# npm :: Glossary


## Lock file
A lock file records exact versions of the current project's dependencies. The usual lock file is `package-lock.json`, and the identical `npm-shrinkwrap.json` is its version meant for publishing (public use).

## package.json
The `package.json` is the main configuration file of a project. It is designated as a place to specify details about a project, most importantly, its dependencies. Since the versions of the packages (libraries) a project depends on, may be specified as a range (of acceptable versions), the realized exact versions of the dependencies are recorded in a project's `package-lock.json` file. The `package.json` is attached to projects that use JavaSript, either directly or indirectly, like projects that leverage Node.js (but not Deno), TypeScript, React, etc.

## Semantic versioning
Semantic versioning (SemVer) has de facto become the standard. It specifies what code changes neccesitate a bump in which part of the version. A version conforming to SemVer usually has three dot-separated segment, which are all numbers: major, minor, and patch (which is optional). According to SemVer, a bump of the major number is warrented when the project introduces breaking changes in the API, i.e. when it ceises to be backwards compatible (compatible with its previous versions).

## Shrinkwrap
A shrinkwrap file is a publishable lockfile. A file `npm-shrinkwrap.json` is a file created by `npm-shrinkwrap` command. It is identical to `package-lock.json`, with one major caveat: Unlike `package-lock.json`, `npm-shrinkwrap.json` may be included when publishing a package.
