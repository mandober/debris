---
downloaded:       2023-08-25
page-url:         https://blog.bitsrc.io/best-practices-for-using-typescript-with-node-js-50907f8cc803
article-title:    Best Practices For Using TypeScript with Node.js - Bits and Pieces
---
# Best Practices For Using TypeScript with Node.js | by Aditya Modi | Bits and Pieces
## Opinionated and useful examples on when and how to best use TS with Node.js

[

][1][

][2]

Using TypeScript with Node.js

If any of you have worked on TypeScript 1.x in the past, you might remember it being difficult and unwieldy. TypeScript version 2 brings many nice improvements. One of the biggest of them is how clean and simple has it become to install TypeScript compiler.

## **Installing TypeScript in Node.js**

You can install TypeScript compiler either globally or locally and have it run by NPM run scripts.

```
$ npm install –g typescript
```

Then we set up the Node.js bindings to say this is a Node.js project.

```
$ npm install --save @type/node
```

Finally, we run the compiler, give it outDir flag and directory it’s going to and then the file that we’re going to compile.

```
$ tsc –outDir dist index.ts
```

Nevertheless, we can do a lot more complicated configuration.

## **Configuration with tsconfig.json**

You can configure *tsconfig.json* file which works a lot like the *babelconfig.json* if you’ve ever used it before. It has all kinds of options: you can declare module system to output files as, point source map input files.

```
{“compilerOptions”: {“module”: “commonjs”,“outDir” : “dist”,“sourceMap”: true},“include”: [“scr/**/*.ts”]}
```

## **Linter**

Typescript also has a linter called tslint, which is similar to eslint. If you’ve used eslint before, then tslint is going to feel right at home. You can start installing tslint like you install eslint.

```
$ npm install –g tslint$ tslint file1.ts file2.ts
```

## **ES6 Considerations**

If you’re used to Babel, then keep in mind that TypeScript does not ship with a runtime. There’s no equivalent to Babel-runtime if you’ve used that. That is Typescript handles all of the ES6 and a lot of the ES7 syntax but the runtime operations. So things like Object.assign(), Symbol(), etc. are not polyfilled by TypeScript.

[Node.js developers][3] made the choice to TypeScript small. If you have to target older versions of Node.js or if you’re working in the browser, you might have to do something complicated. The recommended way is to go from TypeScript to ES6, which basically just strips out the types. You can even use babel to go the rest of the way and include the babel runtime.

*TypeScript →ES6 →Babel →ES5*

## **Code Editors**

Out of the box both of the Visual Studio products support TypeScript: Visual Studio and VS Code. All the JetBrains IDes have support out of the box: Webstorm, PyCharm, IntelliJ IDEA.

In addition, all the other major code editors support TypeScript via a plugin: Sublime, Atom, Vim, Emacs, etc. Whatever editor you’re used to using, you can make TypeScript to work with that editor and can stick with your typical workflows.

## **TypeScript Definition files**

When working on TypeScript, a great point of concern is to work on modules that are not written in TypeScript. To work with those, you can use TypeScript Definition Files. A definition file creates statically-typed interface for external dynamic code on this external module. Static code is by definition slightly more limited than dynamic code. These definition files are a declaration without an implementation, which is a lot like C++ header files if you’ve ever worked with C++. TypeScript definition files have a d.ts extension.

So we’re going to create this definition file for a module called planet. It’s going to have a couple of functions on it and an interface that is exported.

```
declare module “planet” {export function visit(); void;export function getCities(); city[];export interface City {population: number;founded: Date;}}
```

If you notice, these have no implementation, just the signature. That’s enough for TypeScript to give you types, auto-completion and other great stuff which is awesome.

## **Global Type Definition Files**

If you have to write definitions for all the modules especially when there is tree of modules-inside-modules, TypeScript have this concept of a global type definition file. These are the files that have been created by Microsoft and the TypeScript community, which gets contributions from everywhere. It’s basically definition files for all of the popular modules. Typing files are stored in npm under @types scope. Everything that’s reasonably popular in TypeScript tends to have a definition file. You can install it in Express with a single command.

```
$ npm install — save @types/express
```

Once you run this command, you have these definition files for Express, which brings code completion and many more things to the editor.

## **When and why to choose TypeScript over JavaScript**

JavaScript’s lack of type checking makes it a bad contender for enterprise applications that require a fair degree of consistency which is typical to strictly typed languages like Java, C# and C++.

In little applications, anonymous objects with loosely typed fields don’t make a difference. However, when you’re working with thousands of lines of code, you can only work as long as the compiler and runtime system help find you errors. Only a programming language with strong typing can detect certain types of code errors.

*“Indeed, TypeScript is JavaScript for application-scale development”*

[1]: https://medium.com/@aditya.modi?source=post_page-----50907f8cc803--------------------------------
[2]: https://blog.bitsrc.io/?source=post_page-----50907f8cc803--------------------------------
[3]: https://www.topsinfosolutions.com/node-js-development-services/
