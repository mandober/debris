## TS :: Ref :: TSConfig

https://www.typescriptlang.org/tsconfig

A `tsconfig.json` file in the root of a project directory indicates that the project is a TypeScript (or JavaScript) project.

The TSConfig file can be either a `tsconfig.json` or `jsconfig.json`, both have the same set of config variables.

There are over 100 options, here categorized into 5 main sections:
- `root` fields for letting TS know what files are available
- `compilerOptions` fields
- `watchOptions` fields, for tweaking the watch mode
- `typeAcquisition` fields for tweaking how types are added to projects

To dump all options (commented) in a `tsconfig.json` use `tsc --init` or use a TSConfig base.

* TSConfig base
https://github.com/tsconfig/bases#centralized-recommendations-for-tsconfig-bases
Hosts TSConfigs for you to extend in your apps, tuned to a particular runtime environment. Owned and improved by the community. Basically Definitely Typed for TSConfigs.
