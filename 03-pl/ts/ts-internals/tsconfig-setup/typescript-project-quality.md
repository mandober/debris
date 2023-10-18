---
downloaded:       2023-08-25
page-url:         https://medium.com/@bobjunior542/maximizing-typescript-project-quality-the-best-configuration-settings-for-tsconfig-json-15b383b2502d
article-title:    Maximizing TypeScript Project Quality: The Best Configuration Settings for tsconfig.json
---
# Maximizing TypeScript Project Quality: The Best Configuration Settings for tsconfig.json | by Bob Junior | Medium
[

][1]

`tsconfig.json` is a configuration file used by TypeScript to specify compiler options and project settings. It's a crucial part of any TypeScript project, as it determines how your code is compiled and how errors and warnings are handled.

In this article, we’ll cover some of the best configuration settings for `tsconfig.json` to help you get the most out of your TypeScript projects.

`**strict**`

The `strict` compiler option is a set of strict type checking options that help catch common errors in your code. We highly recommend enabling `strict` in your `tsconfig.json` file. This option includes the following strict type checking options:

-   `noImplicitAny`
-   `strictNullChecks`
-   `strictFunctionTypes`
-   `strictBindCallApply`
-   `noImplicitThis`
-   `alwaysStrict`

To enable `strict`, add the following to your `tsconfig.json` file:

```
{  "compilerOptions": {    "strict": true  }}
```

`**esModuleInterop**`

`esModuleInterop` is an option that allows TypeScript to emit module code that is compatible with other module formats, such as CommonJS or AMD. It's highly recommended to enable this option if you're working with third-party libraries that use CommonJS or AMD modules.

To enable `esModuleInterop`, add the following to your `tsconfig.json` file:

```
{  "compilerOptions": {    "esModuleInterop": true  }}
```

`**module**`

The `module` compiler option specifies which module format to use when compiling your TypeScript code. There are several options available, including `commonjs`, `amd`, `system`, and `es2015`. We recommend using `es2015` if you're targeting modern browsers or using a module bundler like webpack.

To set the `module` option to `es2015`, add the following to your `tsconfig.json` file:

```
{  "compilerOptions": {    "module": "es2015"  }}
```

`**target**`

The `target` compiler option specifies the ECMAScript target version to use when compiling your TypeScript code. It's important to set this option to the lowest version that your code requires to run, as this will ensure maximum compatibility with older browsers and environments.

To set the `target` option to `ES2017`, add the following to your `tsconfig.json` file:

```
{  "compilerOptions": {    "target": "ES2017"  }}
```

`**outDir**`

The `outDir` compiler option specifies the directory where TypeScript should output its compiled JavaScript files. We recommend using a separate directory for your compiled files to keep your project organized and to avoid overwriting your source files.

To set the `outDir` option to `dist`, add the following to your `tsconfig.json` file:

```
{  "compilerOptions": {    "outDir": "dist"  }}
```

**Conclusion**

In this article, we’ve covered some of the best configuration settings for `tsconfig.json`. By enabling `strict`, `esModuleInterop`, setting the `module` and `target` options, and specifying an `outDir`, you can ensure that your TypeScript code is well-typed, compatible with other modules, and compiled to the correct target version. By following these best practices, you can create high-quality TypeScript projects that are easier to maintain and more resilient to errors.

[1]: https://medium.com/@bobjunior542?source=post_page-----15b383b2502d--------------------------------
