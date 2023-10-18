---
downloaded:       2023-08-25
page-url:         https://hackernoon.com/how-to-set-up-tsconfig-part-1-4h1f34uq
article-title:    How To Set Up tsconfig [Part 1]
---
# How To Set Up tsconfig [Part 1] | HackerNoon
I’m a big fan of TypeScript. Each new project I prefer to write on TS rather than native JavaScript. In this article, I will not discuss the reasons for choosing TypeScript or its advantages and disadvantages. I’d like this article to be a guide for those who want to learn how to set up

```
tsconfig
```

, to sort out its numerous flags and learn some useful tricks.

So, in this article I want to provide a revised and streamlined documentation summary, which I believe will be useful to those who are standing at the begging of their path to TypeScript or for those who didn't find time or energy to sort out the details and want to fill this gap.

When you’re opening official reference

```
tsconfig
```

you’ll see a full list of settings divided into groups. However, it doesn't allow you to understand what you should start with and which of these options are required and what can be skipped (for some time). Plus, some options are grouped by technical meaning, not logical. For example, some verification flags could be found in

```
Strict Checks
```

group, some in

```
Linter Checks
```

and others in

```
Advanced
```

group. It’s not always easy to understand.

All the options, just like the article itself, I divided into two groups – basic and “checks”. In the first part we'll talk about basic settings and in the second – different checks, i.e. tuning compiler strictness.

## Tsconfig structure

Let’s have a look at the structure and some features of the config.

-   ```
    tsconfig.json
    ```
    
    has 2 parts. Some options must be specified in
    
    ```
    root
    ```
    
    and some of them in
    
    ```
    compilerOptions
    ```
    
-   ```
    tsconfig.json
    ```
    
    supports comments. Such IDE like WebStorm or Visual Studio understand this and do not highlight comments as a syntax error
-   ```
    tsconfig.json
    ```
    
    supports inheritance. Options can be divided according to some principle, described in different files and merged with the special directive

Here is a blank of

```
tsconfig.json
```

:

```
{
  // extends you to enrich options with other options from the specified file
  // we'll return to tsconfig-checks.json file in the next article
  "extends": "./tsconfig-checks.json",
  // project-specific options are based in config root
  "compilerOptions": {
    // all compiler related setting will be placed here
  }
}
```

```
root
```

options are:

```
extends
```

,

```
files
```

,

```
include
```

,

```
exclude
```

,

```
references
```

,

```
typeAcquisition
```

. Of these, we will consider the first 4. Other options are based in

```
compilerOptions
```

.

Sometimes some options like

```
compileOnSave
```

and

```
ts-node
```

can be placed in

```
root
```

section. These options are not official and can be used by IDE for its needs.

## Root section

## 

```
extends
```

**Type: string | false, default: false.**

Specifies the path to the file from which to inherit options. For the most part it serves as an organizing tool. Options can be divided according to some logic so that they don’t mix. For example, move config strict settings to separate file the way it’s shown in the config draft. However, given the support of comments in

```
tsconfig.json
```

this can be done much easier.

```
{
  "compilerOptions": {
    // basic settings block
    
    // strict settings block
  }
}
```

Let’s have a look at another use-case where comments can’t be a solution. If we need to create production and development configs. This is how

```
tsconfig-dev.json
```

version can look:

```
{
  "extends": "./tsconfig.json",
  "compilerOptions": {
    // redefining setting needed for dev env only
    "sourceMap": true,
    "watch": true
  }
}
```

In general, I recommend using

```
extends
```

. But don't break setting too much. This can become confusing. Due to the fact that multiple inheritance is not supported.

*In case of using this option to see the final merged config version use command*

```
tsc --showConfig
```

*.*

## 

```
files
```

**Type: string[] | false, default: false, related to**

```
include
```

**.**

You can specify a list of specific files for compilation using this option.

```
{
  "compilerOptions": {},
  "files": [
    "core.ts",
    "app.ts"
  ]
}
```

*This option will be useful for only small projects with several files.*

## 

```
include
```

**Type string[], default: depends on**

```
files
```

**, related to**

```
exclude
```

**.**

If option

```
files
```

is not set up TypeScript will use this directive to search for files to compile. If

```
include
```

is not declared too then its value will be set up as

```
["**/*"]
```

by default. This means that the search for files will be carried out in all folders and their subfolders. This behavior is not optimal, so for performance reasons it’s best to always specify paths. There can be paths to specific files or path patterns.

```
{
  "compilerOptions": {},
  "include": [
    "src/**/*",
    "tests/**/*"
  ]
}
```

If patterns don’t include specific extensions TypeScript will look for

```
.ts
```

,

```
.tsx
```

and

```
.d.ts
```

files. And if

```
allowJs
```

flag is enabled - then

```
.js
```

and

```
.jsx
```

files also.

*These formats are doing the same*

```
src
```

*,*

```
./src
```

*,*

```
src/**/*
```

*. I prefer*

```
./src
```

*.*

*Technically using*

```
include
```

*and*

```
exclude
```

*options TypeScript will create a list of all matched files and place it to*

```
files
```

*. You can check it by running*

```
tsc --showConfig
```

*command.*

## 

```
exclude
```

**Type: string[], default: ["node_modules", "bower_components", "jspm_packages"].**

This directive can be used to exclude unnecessary paths of files that was added by

```
include
```

directive. By default, the option is set to the paths of the

```
npm
```

,

```
bower
```

and

```
jspm
```

package managers, since the modules are already built in them. Besides TypeScript will ignore this folder from

```
outDir
```

option if it was added. This is the folder where the collected built artifacts are placed. It is logical for them to be excluded. To add your values to this option it’s necessary to restore the defaults. Because user’s values are not merging with default values. In other words, you need to manually specify the root of your package manager modules.

```
{
  "compilerOptions": {},
  "exclude": [
    "node_modules",
    "./src/**/*.spec.ts"
  ]
}
```

```
exclude
```

*option can’t exclude files added by using*

```
files
```

*option.*

```
exclude 
```

*option can’t exclude files that imported in other files which are not excluded.*

## compilerOptions section

## 

```
target
```

**Type: string, default:**

```
ES3
```

**, affects options**

```
lib
```

**,**

```
module
```

**.**

The version of ECMAScript standard in which code will be compiled. Has a lot of choices:

```
ES3
```

,

```
ES5
```

,

```
ES6
```

(same as

```
ES2015
```

),

```
ES2016
```

,

```
ES2017
```

,

```
ES2018
```

,

```
ES2019
```

,

```
ES2020
```

,

```
ESNext
```

. For backend apps/packages

```
ES6
```

is okay if you’re using only modern versions of

```
Node.js
```

and

```
ES5
```

, to support the older versions.

```
ES6
```

is supported by [97.29% browsers][1] at the moment. So, the situation for frontend apps is the same.

## 

```
module
```

**Type: string, default: depends on**

```
target
```

**, affects the option**

```
moduleResolution
```

**.**

A modular system that your compiled application will use. You can choose:

```
None
```

,

```
CommonJS
```

,

```
AMD
```

,

```
System
```

,

```
UMD
```

,

```
ES6
```

,

```
ES2015
```

,

```
ES2020
```

or

```
ESNext
```

. For backend apps/packages

```
ES6
```

or

```
CommonJS
```

is suitable depending on

```
Node.js
```

version you want to support. For frontend apps **ES6** is also suitable. And for support of older browsers and isomorphic applications,

[

```
UMD
```

][2]

is definitely worth choosing.

If your situation is not so easy or you want to know all the intricacies of modular systems, then you need to learn the [full documentation][3].

## 

```
moduleResolution
```

**Type: string, default: depends on**

```
module
```

**.**

A strategy will be used for modules import. Includes only two options:

```
node
```

and

```
classic
```

. But

```
classic
```

won't be using in 99% of cases cause it’s legacy. However, I specifically mentioned this flag as it changes depending on the previous flag. Changing value of

```
module
```

option

```
moduleResolution
```

mode can be switched to

```
classic
```

and the console will start to display error messages on the lines with imports.

*To avoid this situation, I recommend that you always explicitly specify the*

```
node
```

*value for this flag.*

## 

```
lib
```

**Type: string[], default: depends on**

```
target
```

**.**

TypeScript includes typings (

```
*.d.ts-files
```

) to support the corresponding specifications depending on which

```
target
```

is set in the config. For example, if your

```
target
```

is set up to

```
ES6
```

TypeScript will include support of

```
array.find
```

and other options that are in this standard. But when

```
target
```

is set up to

```
ES5
```

```
find
```

method can’t be used because it’s not available in this JavaScript version. Polyfills can be added. However, in order for TypeScript to understand that this functionality can now be used, it is necessary to include the related typings in the

```
lib
```

section. Also, you can connect the entire

```
ES2015
```

standard or its part

```
ES2015.Core
```

(only

```
find
```

,

```
findIndex
```

etc. methods).

*Sure it’s better to include typings only for the functionality for which polyfills were previously installed.*

```
For --target ES5 will be lined up: DOM, ES5, ScriptHost
For --target ES6: DOM, ES6, DOM.Iterable, ScriptHost
```

*The defaults are reset at the time you’re adding anything to*

```
lib
```

*. It’s necessary to manually add what you need, for example*

```
DOM
```

*:*

```
{
  "compilerOptions": {
    "target": "ES5",
    "lib": [
      "DOM",
      "ES2015.Core"
    ]
  }
}
```

## 

```
outDir
```

**Type: string, default: equals a root directory.**

The final folder where the collected artifacts will be placed. There are:

```
.js
```

,

```
.d.ts
```

, and

```
.js.map
```

files. If no value was set for this option, then all the above files will be copying the structure of the source files at the root of your project. In this case it’ll create difficulties with deleting previous builds and describing

```
.gitignore
```

files. As a result, the code base will look like a dump. My advice is to put all artifacts in one folder which may be easily deleted or ignored by the version control system.

If you leave

```
outDir
```

option empty:

```
├── module
│   └── core.js
│   └── core.ts
├── index.js
└── index.ts
```

If you specify

```
outDir
```

:

```
├── dist
│   └── module
│   |   └── core.js
│   └── index.js
├── module
│   └── core.ts
└── index.ts
```

## 

```
outFile
```

**Type: string, default: none.**

According to the description this option allows to unite all files into one. It seems that bundlers like

```
webpack
```

are no longer needed... However, this option works only if

```
None
```

,

```
System
```

, or

```
AMD
```

value set up for

```
module
```

. Much to our regret, the option won't work with

```
CommonJS
```

or

```
ES6
```

modules. Therefore, you probably won't need to use

```
outFile
```

. Since the option looks so attractive, but does not work as expected, I decided to warn you about this giant pitfall.

## 

```
allowSyntheticDefaultImports
```

**Type: boolean, default: depends on**

```
module
```

**or**

```
esModuleInterop
```

**.**

If one of the libraries doesn't have

```
default import
```

such loaders as

```
ts-loader
```

or

```
babel-loader
```

will create it automatically. But

```
d.ts-files
```

files of this library don't know anything about it. This flag allows compiler to write like this:

```
// instead of this import
import * as React from 'react';
// you can use this
import React from 'react';
```

It's a default option when flag

```
esModuleInterop
```

is enabled or

```
module
```

=== "system".

## 

```
esModuleInterop
```

**Type: boolean, default: false.**

By adding a boilerplate to the output code, it allows you to import

```
CommonJS
```

packages as

```
ES6
```

.

```
// moment library exporting only like CommonJS
// trying to import it as ES6
import Moment from 'moment';

// without esModuleInterop flag the result is undefined
console.log(Moment);

// with esModuleInterop flag result is [object Object]
console.log(Moment);
```

This flag by dependency activates

```
allowSyntheticDefaultImports
```

. Together they help to get rid of lots of different imports and write it uniformly across the project.

## 

```
alwaysStrict
```

**Type: boolean, default: depends on**

```
strict
```

**.**

Compiler will parse the code in

```
strict mode
```

and add

```
“use strict”
```

to output files.

*false by default but if flag*

```
strict
```

*enabled then true.*

## 

```
downlevelIteration
```

**Type: boolean, default: false.**

```
ES6
```

specification added new syntax for iteration: cycle

```
for / of
```

,

```
array spread
```

,

```
arguments spread
```

. If the project code is compiled to

```
ES5
```

then construction with cycle

```
for / of
```

will be converted to common

```
for
```

:

```
// es6 code
const str = 'Hello!';
for (const s of str) {
  console.log(s);
}
```

```
// es5 code without downlevelIteration
var str = "Hello!";
for (var _i = 0, str_1 = str; _i < str_1.length; _i++) {
  var s = str_1[_i];
  console.log(s);
}
```

But some symbols like

```
emoji
```

are encoded with two characters. It means that such a transformation will not work as expected in some places.

```
downlevelIteration
```

flag generates more verbose and more "correct", but less productive code. This code is huge so I won't take up space on the screen. You can find an example here - [playground][4] - and choose

```
target -> es5
```

,

```
downlevelIteration -> true
```

in settings.

*The browser must have an implementation of*

```
Symbol.iterator
```

*to make this flag work. Otherwise, you'll need to set up polyfill.*

## 

```
forceConsistentCasingInFileNames
```

**Type: boolean, default: false.**

Enables case-sensitive mode for files import. Thereby even in case-insensitive file systems trying to make

```
import FileManager from './FileManager.ts'
```

will fail if the file is actually named

```
fileManager.ts
```

. It doesn't hurt to play it safe. TypeScript is all about strictness.

## 

```
compilerOptions
```

section options which are not needed in every project

## 

```
declaration
```

**Type: boolean, default: false.**

By enabling this flag, in addition to JavaScript files, annotation files known as

```
d.ts
```

files or typings will be generated for them.

Due to typings it becomes possible to define types for already compiled js files. Other words code is compiling to

```
js
```

and types to

```
d.ts
```

-files. This can be useful if you're publishing your package to

```
npm
```

. All developers can use this library whether they're using native JavaScript or TypeScript.

## 

```
declarationDir
```

**Type: string, default: none, related to**

```
declaration
```

**.**

Typings are generated next to

```
js
```

-files as a default. Using this option you can redirect all

```
d.ts
```

files to a separate folder.

## 

```
emitDeclarationOnly
```

**Type: boolean, default: false, related to**

```
declaration
```

**.**

If for some reason you only need the

```
d.ts
```

files, then enabling this flag will prevent the generation of

```
js
```

files.

## 

```
allowJs
```

**Type: boolean, default: false.**

This flag will help you to port your JavaScript project to TypeScript. By enabling

```
allowJs
```

flag you'll make TypeScript compiler process not only

```
ts
```

but also

```
js
```

files. There is no need to migrate the whole project before continuing the development. You can do it file by file changing their extensions and adding types to them. And the new functionality can be written directly in TypeScript.

## 

```
checkJs
```

**Type: boolean, default: false, related to**

```
allowJs
```

**.**

TypeScript will check for errors not in

```
ts
```

but in

```
js
```

files also. In addition to the built-in typings for JavaScript language constructs, the TS compiler can also use jsDoc to parse files. I prefer not to use this flag but to put the code in order when I add types to it. However, if your project has good jsDoc code coverage, it's worth giving it a try.

*Since version 4.1 when*

```
checkJs
```

*is enabled,*

```
allowJs
```

*flag is automatically enabled.*

**Type: boolean, default: false.**

[

```
Decorator
```

][5]

– is a common OOP pattern. It’s possible to implement it using classical approach by writing wrappers. But using the flags mentioned above, you can enable experimental decorator syntax. This syntax allows you to decorate classes, their methods and properties, access modifiers and function arguments using simple

[

```
“at (@)” syntax
```

][6]

, which is widespread in many programming languages.

The

```
experimentalDecorators
```

flag just activates the syntax, and

```
emitDecoratorMetadata
```

provides decorators with additional metadata at runtime, with which you can significantly expand the scope of this feature.

*To make*

```
emitDecoratorMetadata
```

*work you need to add* [*reflect-metadata*][7] *library.*

## 

```
resolveJsonModule
```

**Type: boolean, default: false.**

Flag allows to enable ability to import

```
*.json
```

files. No additional installation is required.

```
// .json extension must be specified
import config from './config.json'
```

## 

```
jsx
```

**Type: string, default: none.**

If the project uses React, you need to enable

```
jsx
```

support. In most cases

```
react
```

or

```
react-native
```

option will be enough. It is also possible to leave the

```
jsx-code
```

untouched with the

```
preserve
```

option or use the custom converters

```
react-jsx
```

and

```
react-jsxdev
```

.

## Wrapping up the 1st part

In this article I wrote about the most important flags and options that can be useful in the vast majority of projects. In the next part I'll talk about compiler strict settings. I will add a link after publishing.

*Also published on* [*Dev.to*][8]

[1]: https://caniuse.com/es6?ref=hackernoon.com
[2]: https://github.com/umdjs/umd?ref=hackernoon.com
[3]: https://www.typescriptlang.org/docs/handbook/modules.html?ref=hackernoon.com
[4]: https://www.typescriptlang.org/play?ref=hackernoon.com#code/MYewdgzgLgBNBOMC8MBEAJApgG2yAhKgNwBQAZiIgBSiSwQwhlxTwCUMA3iTDLRCGyYAdHgDmVCG1IBfIA
[5]: https://refactoring.guru/design-patterns/decorator?ref=hackernoon.com
[6]: https://tc39.es/proposal-decorators/?ref=hackernoon.com
[7]: https://github.com/rbuckton/reflect-metadata?ref=hackernoon.com
[8]: https://dev.to/barinbritva/typescript-spelling-out-tsconfig-part-1-3nak?ref=hackernoon.com
