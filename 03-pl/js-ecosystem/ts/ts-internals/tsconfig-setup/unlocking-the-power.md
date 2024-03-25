# Diving into the Must-Know Specifics of tsconfig.json
2023-08-25
https://itnext.io/unlocking-the-power-of-typescripts-compiler-configuration-ddf8772205eb

Welcome to another article in the TypeScript series, where we explore how to configure TypeScript projects. In this article, I'll guide you through **TypeScript's configuration capabilities using the tsconfig.json file**. We'll explore some commonly used compiler options that allow you to customize and optimize your projects.

## tsconfig and Compiler Options

In TypeScript, the **tsconfig.json** file is used to configure the compiler options for a TypeScript project. It provides a way to specify how the TypeScript compiler should behave and what rules should be enforced during the compilation process.

With these configurations, you can ensure proper type checking, compatibility, and output configuration.  
If you don't already have a tsconfig.json file in your project, create manually of run the following command:

`tsc --init`

Make sure to check out the comprehensive list of all available compiler options in the TypeScript [documentation][5]. In the meantime, let's explore some of the file's most useful properties.

## Include, Exclude and Files properties

These properties provide flexibility in determining which files should be included or excluded from the TypeScript compilation process, by specifying file patterns or individual files.

-   The '**include'** and '**exclude'** properties are commonly used together to define file pattern. They are arrays that contain either specific file patterns or glob* patterns.  
    By using these properties, TypeScript will selectively compile only the files that match the defined patterns.
    
    *NOTE: *Glob(aka globbing) patterns, are a way to specify file or directory patterns using wildcard characters.*Have a look at the example below:
    

```
{  "compilerOptions": {    "outDir": "dist",    "rootDir": "src"  },    "include": [    "src/**/*.ts",    "tests/**/*.ts",    "styles/*.{css,scss}"   ],    "exclude": [    "node_modules",    "dist"  ]}
```

-   The '**files'** property is used when you want to explicitly list individual files that should be included in the compilation. It is an array of file paths relative to the location of the tsconfig.json file.

```
{  "compilerOptions": {    "outFile": "bundle.js"  },    "files": [    "src/main.ts",    "src/utils.ts"  ]}
```

## Configuration Inheritance with Extends

You can use the '**extends'** property to inherit configuration settings from another tsconfig.json file. It references another configuration file, and the compiler options from that file are merged with the current tsconfig.json file. Let's see some examples:

-   **Basic inheritance**  
    Suppose you want to extend your tsconfig.json with the baseConfig.json file.

```
{  "compilerOptions": {    "target": "es6",    "module": "commonjs",    "outDir": "dist"  }}
```

```
{  "extends": "./baseConfig.json",  "include": ["src/**/*.ts"],  "exclude": ["node_modules"]}
```

-   **Multiple inheritance  
    **TypeScript also allows multiple levels of configuration inheritance. Consider the following scenario:

```
{  "compilerOptions": {    "target": "es6",    "module": "commonjs"  }}
```

```
{  "extends": "./baseConfig.json",  "compilerOptions": {    "outDir": "dist"  }}
```

```
{  "extends": "./advancedConfig.json",  "include": ["src/**/*.ts"],  "exclude": ["node_modules"]}
```

The resulting configuration combines all the compiler options from different sources to create a complete set of options for your project. When merging configurations, the properties in your current tsconfig.json file take precedence over the inherited properties.

## Output Locations, Tweaks and Emitting On Error

In TypeScript's tsconfig.json file, you can configure the output locations of compiled JavaScript files, make adjustments to the emitted code, and specify whether or not files should be emitted in case of errors.

-   **For outputting locations you have two options:**

**1.** The '**outDir'** property specifies the output directory for compiled JS files. It determines where the emitted JS files will be placed. In the example below, the JS files will be emitted to the dist directory:

```
{  "compilerOptions": {    "outDir": "dist"  }}
```

**2.** The '**outFile'** property specifies a single bundled JS file that combines all the emitted JS files. It is useful when you want to concatenate and bundle multiple files into a single output file.  
In the example below, all the emitted JS files will be bundled into a single file named bundle.js:

```
{  "compilerOptions": {    "outFile": "bundle.js"  }}
```

-   **For tweaking Emitted JavaScript Code, you can use:**

**1.** The '**removeComments'** property which controls whether comments should be preserved or removed from the emitted JS code. By default, it is set to false, preserving comments.

```
{  "compilerOptions": {    "removeComments": true  }}
```

**2.** The '**sourceMap'** property which determines whether *source map** files should be generated along with the emitted JS code. By default, it is set to false.

```
{  "compilerOptions": {    "sourceMap": true  }}
```

-   *NOTE: *****Source map files*** *are companion files generated by the TS compiler along with the emitted JS code.  
    They provide seamless mapping between the compiled JS code and the original TS source code, making it easier to identify and fix issues during development and debugging.*

When '**sourceMap'** option is enabled, the TS compiler will generate source map files (with a **.map** extension) alongside the emitted JS files.

By default:  
- TypeScript emits external source map files that are referenced by a:  
*//# sourceMappingURL* comment at the end of the compiled JS file. However, you can also choose to emit inline source maps within the JS files themselves, by setting '**inlineSourceMap'** compiler option to true.

```
{  "compilerOptions": {    "sourceMap": true,    "inlineSourceMap": true  }}
```

- TypeScript emits the source map files in the same directory as the corresponding JS files. However, you can customize the output location of the source map files using the '**sourceRoot'** and **'mapRoot'** compiler options.

```
{  "compilerOptions": {    "sourceMap": true,    "sourceRoot": "./src",    "mapRoot": "./maps"  }}
```

The '**sourceRoot'** option specifies the root directory for the **TS source files** to "./src". It is the base path or reference point for resolving the relative paths of the source files.

The **'mapRoot'** option indicates the directory where the **source map files** will be emitted - "./maps". This path is relative to the root directory specified by '**sourceRoot'**. In this case, the source maps will be emitted in the "./maps" directory inside the "./src" directory.

These options help maintain proper paths and organization for the TS source files and their corresponding source map files during the compilation process.

-   **For emitting files on error, you can:**

Use the '**noEmitOnError'** property, which controls whether TS should emit JS files when there are compilation errors. By default, it is set to false, which means TS will still emit JS files even if there are errors.

```
{  "compilerOptions": {    "noEmitOnError": true  }}
```

If you don't want to emit any JS files, regardless of compilation errors, use:

```
{  "compilerOptions": {    "noEmit": true  }}
```

## Understanding "lib" and ES libraries

-   The '**lib'** compiler option allows you to specify the **set of TS library files** (**ES libraries**) that should be included during the compilation process.  
    Their primary purpose is to **provide type information and enable type checking during compilation**, for various JS runtime environments and APIs.
    
    For example, some available libraries are ES5, ES2015, DOM, WebWorker, ScriptHost, and ESNext.
    
    By default, TypeScript includes a predefined set of library files based on the ECMAScript version specified in the '**target'** option. However, you have the flexibility to override this default behavior and explicitly specify the libraries to include using the '**lib**' option.
    
    The '**target'** compiler option determines the type of JS (the ECMAScript version) that the TS code will be transpiled to, ensuring compatibility with the specified target environment, and allowing you to optimize the bundled JS output for performance.
    
    You can choose the '**target'** option based on the JS features you want to support or the compatibility requirements of your deployment environment.
    

While it is common to configure both "**target**" and "**lib**" together to ensure compatibility, it is not mandatory. You can configure each option independently based on your project's needs.

```
{  "compilerOptions": {    "target": "es2018",    "lib": ["ES2018", "DOM", "./typings/myLibrary.d.ts"]  }}
```

In the given configuration, the TS compiler will include specific libraries:

1.  The ECMAScript 2018 library, enabling the usage of features introduced in ECMAScript 2018.
2.  The DOM library, providing type information for DOM-related APIs, such as document, Element, Event, etc.
3.  The custom library file ("./typings/myLibrary.d.ts"), ensuring that its type definitions are available in your TS code during compilation.

By specifying these, you ensure that TS incorporates their type definitions, allowing for proper type checking.

## Strict Flags for Enhanced Safety

Refer to a **set of compiler flags** that enable strict type-checking and enforce stricter rules to enhance the safety and reliability of your codebase. These flags help catch potential errors, enforce better coding practices, and improve the overall quality of your TypeScript projects.

Here are a few examples:

-   **'strictNullChecks'**: helps prevent null or undefined values from being assigned to variables unless explicitly allowed.
-   **'strictPropertyInitialization'**: ensures that class properties are initialized in the constructor or have a definite assignment before being used.
-   **'strictBindCallApply'**: enforces stricter checking of function calls using bind, call, and apply methods. It helps ensure that the correct number of arguments is passed to functions and catches potential errors related to function invocations.
-   **'strictFunctionTypes'**: enables stricter checking of function types, ensuring that functions are assigned only to compatible function types.

You can enable these flags in your tsconfig.json file (by setting the respective flag values to true if needed) or through command-line options.

## Transpiling and Experimental Features

By transpiling TypeScript code into JavaScript, you can leverage modern JS features while ensuring compatibility with various environments. Additionally, TS provides support for **experimental ECMAScript proposals**, allowing you to use features that are not yet standardized or fully supported across all JS environments.

These experimental features are enabled through the "[**experimentalDecorators**][6]" and "[**emitDecoratorMetadata**][7]" compiler options.  
For further details and examples, you can refer to TypeScript's documentation by clicking on each option.

## Conclusion

In this article, we have provided an overview of the tsconfig.json file and explored essential properties that you must be familiar with. By understanding these properties, you can confidently begin configuring TypeScript to enhance your development workflow and ensure code quality!

I hope you found this post useful. ✨  
Stay tuned for future content! If you're new here, feel free to explore my other [articles][8], and follow me for updates and more valuable insights.

By [buying me a virtual croissant on Buy Me a Coffee][9], you can directly support my creative journey. Your contribution helps me continue creating high-quality content. Thank you for your support!

[1]: https://reeniesm.medium.com/?source=post_page-----ddf8772205eb--------------------------------
[2]: https://itnext.io/?source=post_page-----ddf8772205eb--------------------------------
[3]: https://unsplash.com/@timmossholder?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText
[4]: https://unsplash.com/photos/m4qXRqi-EZI?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText
[5]: https://www.typescriptlang.org/tsconfig
[6]: https://www.typescriptlang.org/docs/handbook/decorators.html
[7]: https://www.typescriptlang.org/tsconfig#emitDecoratorMetadata
[8]: https://medium.com/@reeniesm
[9]: https://www.buymeacoffee.com/smolchenkoE
