---
downloaded:       2023-08-25
page-url:         https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/
article-title:    Exploring advanced compiler options in TypeScript - LogRocket Blog
---
# Exploring advanced compiler options in TypeScript - LogRocket Blog
## Introduction

The `tsconfig.json` file specifies compilation options used by the TypeScript compiler, which applies checks to our code and determines whether any of these checks fail. These options include which version of JavaScript that our TypeScript code will be compiled to, what the output directory should be, and whether or not to allow JavaScript source files within the project directory.

In this article, we will take an in-depth look at some advanced compiler options and a few other options that help us find potential problems in our TypeScript codebase. A deep understanding of these compiler options and what causes code to fail the strict checking rules will help us avoid common mistakes when building TypeScript applications.

Specifically, this article will cover the following options:

-   [Nested `tsconfig.json` files][1]
-   `[strictPropertyInitialization][2]`
-   `[noImplicitThis][3]`
-   `[noImplicitReturns][4]`
-   `[strictNullChecks][5]`

## Nested `tsconfig.json` files

The TypeScript compiler can reference a `tsconfig.json` file in another directory when compiling code in the current directory.

This feature is handy if we would like to reference a compiler option when running `tsc` within a specific directory. The `tsconfig.json` file uses the `"references"` option for this purpose.

As an example of this nested configuration, consider the following source tree:

```
├── dist
└── src
    ├── tsconfig.json
    ├── backend
    │   ├── index.ts
    │   └── tsconfig.json
    └── frontend
        ├── index.ts
        └── tsconfig.json 
```

Here, we have a `tsconfig.json` file in the project’s `src` directory, as well as two subdirectories named `frontend` and `backend`. Both subdirectories contain a `tsconfig.json` file and a TypeScript file named `index.ts`.

The `tsconfig.json` file in the project’s `src` directory is as follows:

```
{
    "compilerOptions": {
      "target": "es5", 
      "module": "commonjs", 
      "rootDir": ".",
      "outDir": "../dist/",
    },
    "files": [],
    "references": [
      { "path": "./backend" },
      { "path": "./frontend" }
    ]
  }
```

Here, we have specified the `outDir` property to generate all JavaScript output into the `dist` directory, followed by configuring reference paths for both subdirectories.

The whole project can be compiled with the following command:

```
tsc --build src
```

Let’s take a look at the `tsconfig.json` file in the `backend` directory, as follows:

```
{
    "compilerOptions": {
      "rootDir": ".",
      "outDir": "../../dist/backend",
    }
  }
```

Here, we have specified the `outDir` property to generate all JavaScript output into the `dist` directory.

This means that the TypeScript compiler will output all the JavaScript files in this directory to the `dist` directory, which is two directory levels up.

The `frontend` subdirectory can be built independently using the following command:

```
tsc --build src/frontend
```

Let’s take a look at the `tsconfig.json` file in the `backend` directory:

```
{
    "compilerOptions": {
      "rootDir": ".",
      "outDir": "../../dist/frontend",
    },
    "references": [
      { "path": "../backend" }
      "composite": true
    ]
  }
```

Similarly, we have specified the `outDir` property to generate all JavaScript output in this directory to the `dist` directory, which is two directory levels up, followed by configuring the reference path for the `backend` subdirectory.

Take note of this info from [the TypeScript docs][6]: “The referenced projects must have the new `composite` setting enabled. This setting is needed to ensure TypeScript can quickly determine where to find the outputs of the referenced project.”

Additionally, the `backend` subdirectory can be built independently using the following command:

```
tsc --build src/backend
```

## `strictPropertyInitialization`

When enabled, the `strictPropertyInitialization` compiler option ensures that all properties within a class are initialized correctly.

Let’s consider the following class definition:

```
class NoInitProperties { 
  a: number; 
  b: string; 
}
```

Here, we have a class named `NoInitProperties`, which has two properties, named `a` of type `number` and `b` of type `string`. The above code will generate the following errors:

```
error TS2564: Property 'a' has no initializer and is not definitely assigned in the constructor 
error TS2564: Property 'b' has no initializer and is not definitely assigned in the constructor
```

These errors are being generated because both `a` and `b` properties of the class have not been initialized.

### Solving `strictPropertyInitialization` issues

There are four ways that we can fix this code.

The first method is commonly used for fixing these errors and it uses a constructor:

```
class NoInitProperties { 
    a: number; 
    b: string; 
    constructor(b: string) { 
      this.a = 5; 
      this.b = b; 
    } 
}
```

Here, we have defined a `constructor` function with parameter `b` of type `string`. Within the `constructor`, we’ve assigned the value of the `b` parameter to the internal `b` property. Also, we’ve assigned the string value `"letter"` to the property named `a`. With this constructor in place,  
the error will be fixed because both properties are now properly initialized.

The second method is to use a type union:

```
class NoInitProperties { 
    a: number | undefined; 
    b: string | undefined; 
}
```

Here, the union type is used to add the `undefined` type to both the `a` and `b` properties. With this, the compiler knows that we are aware that these properties could be undefined, which will allow us to handle the consequences ourselves.

The third method that we can use to fix these errors is to use the definite assignment assertion operator:

```
class NoInitProperties { 
    a!: number; 
    b!: string; 
}
```

The `!` operator added after each property tells the compiler that we are aware that these properties have not been initialized.

The fourth method to fix these errors is to assign a value to each of these properties:

```
class NoInitProperties { 
    a: number = 5; 
    b: string = "letter"; 
}
```

Here, we have assigned the numeric value of `5` to the a property and the string value of `"letter"` to the `b` property.

## `noImplicitThis`

The `noImplicitThis` compiler option will ensure that the `this` keyword is accessed correctly or else the compiler will throw an error indicating incorrect access to `this`.  
Let’s consider the following code:

```
class NoImplicitThisClass { 
    name: string = "Tom"; 
    logToConsole() { 
        let callback = function () { 
            console.log(`this.name : ${this.name}`); 
        } 
      setTimeout(callback, 1000); 
    } 
}
```

Here, we have a class named `noImplicitThisClass` that has a `name` property initialized with a string value of `Tom`.

---

### More great articles from LogRocket:

-   Don't miss a moment with [The Replay][7], a curated newsletter from LogRocket
-   [Learn][8] how LogRocket's Galileo cuts through the noise to proactively resolve issues in your app
-   Use React's useEffect [to optimize your application's performance][9]
-   Switch between [multiple versions of Node][10]
-   [Discover][11] how to use the React children prop with TypeScript
-   [Explore][12] creating a custom mouse cursor with CSS
-   Advisory boards aren’t just for executives. [Join LogRocket’s Content Advisory Board.][13] You’ll help inform the type of content we create and get access to exclusive meetups, social accreditation, and swag.

---

Also, the class defines a function named `logToConsole` that, when called, triggers the function `callback` after two seconds. This class is used as follows:

```
let instanceOfClass = new NoImplicitThisClass(); 
instanceOfClass.logToConsole();
```

Here, we’ve created a variable named `instanceOfClass` to hold an instance of the `NoImplicitThisClass`, and calling the `logToConsole` function will output the following:

```
this.name : undefined
```

Here is what happened: the `this` property does not reference the `NoImplicitThisClass` class. This is due to the scoping of the `this` property within JavaScript. In JavaScript, the `this` scope in methods is not bound to any reference by default.

If the `noImplicitThis` compiler option is turned on, the compiler will generate the following error:

```
error TS2683: 'this' implicitly has type 'any' because it does not have a type annotation
```

Here, the compiler notifies us that our reference to `this.name` within the callback function is not referencing the `this` property of the `NoImplicitThisClass` class.

### Solving `noImplicitThis` issues

This error can be resolved by passing the `this` property into the `callback` function as follows:

```
let callback = function (_this) { 
    console.log(`this.name : ${_this.name}`); 
} 
setTimeout(callback, 2000, this);
```

Here, we have added a parameter named `_this` to the callback function and then passed the value of this into the `setTimeout` call.

Another common way to resolve this error is to use an arrow function. This is very common in React:

```
let callback = () => { 
    console.log(`this.name : ${this.name}`); 
} 
setTimeout(callback, 2000)
```

Here, we have replaced the function keyword with the arrow function syntax.

Both solutions will have the following result:

```
this.name : Tom
```

I use the arrow function frequently to handle `this` issues in my React projects, and I’d recommend using the arrow function since it’s a lot cleaner.

## `noImplicitReturns`

The `noImplicitReturns` compiler option will ensure that every function declared with a return value must return the value as defined in the function.  
Let’s consider the following code:

```
function fetchUsernameById(id: number): string { 
    if (id === 2) return "Sam"; 
} 
console.log(`fetchUsernameById(4) : ${fetchUsernameById(4)}`)
```

Here, `fetchUsernameById` has a parameter `id` of type number and returns a string value. The function checks if the value passed in as an argument is equal to `2`. If it is, it returns the string value `Sam`. However, if the value of the argument is not equal to `2`, nothing is returned.

This will be the output of running this code:

```
fetchUsernameById(4) : undefined
```

Here, we can see that the `fetchUsernameById` function returns `undefined` for any value of the argument that is not equal to `2`.  
If the `noImplicitReturns` compiler option set to `true`, the compiler will generate an error:

```
error TS7030: Not all code paths return a value.
```

### Solving `noImplicitReturns` issues

This error can be resolved by returning a string value for ids that are not equal to `2`:

```
function fetchUsernameById(id: number): string { 
    if (id === 2) 
      return "Sam"; 
    return "No user with such id"
}
```

Here, we have added a return statement at the end of the function that will return the string “No user with such id” whenever the function is called with an argument of a value not equal to `2`.

## `strictNullChecks`

The `strictNullChecks` compiler option is used to find instances in our code where the value of a variable could be `null` or `undefined` at the time of usage.  
Let’s consider the following code:

```
let a: number; 
let b = a;
```

The above code will generate the following error:

```
error TS2454: Variable 'a' is used before being assigned
```

This error tells us that the value of the variable `a` is used when it has not yet been assigned a value.  
Technically, the value of `a` could be `undefined`.

### Solving `strictNullChecks` issues

This error can be resolved by ensuring that the variable `a` is assigned a value before being used:

```
let a: number = 4; 
let b = a;
```

Here, we have simply assigned the value of `4` to the variable named `a`, and this will resolve the error.

Another way to fix this error is using the union type to inform the compiler that we are aware that the variable may be unassigned at the time of usage, and we will handle the consequences ourselves:

```
let a: number | undefined; 
let b = a;
```

## Conclusion

In this article, we took a look at the various advanced compiler options available for configuring our TypeScript compiler. We also have seen the error messages associated with each compiler option and how to resolve them.

Check out Typescript official documentation for more [compiler options][14].

## [LogRocket][15]: Full visibility into your web and mobile apps

[][16]

[LogRocket][17] is a frontend application monitoring solution that lets you replay problems as if they happened in your own browser. Instead of guessing why errors happen, or asking users for screenshots and log dumps, LogRocket lets you replay the session to quickly understand what went wrong. It works perfectly with any app, regardless of framework, and has plugins to log additional context from Redux, Vuex, and @ngrx/store.

In addition to logging Redux actions and state, LogRocket records console logs, JavaScript errors, stacktraces, network requests/responses with headers + bodies, browser metadata, and custom logs. It also instruments the DOM to record the HTML and CSS on the page, recreating pixel-perfect videos of even the most complex single-page and mobile apps.

[Try it for free][18].

[1]: https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/#nested-tsconfig-json-files
[2]: https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/#strictpropertyinitialization
[3]: https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/#noimplicitthis
[4]: https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/#noimplicitreturns
[5]: https://blog.logrocket.com/exploring-advanced-compiler-options-typescript/#strictnullchecks
[6]: https://www.typescriptlang.org/docs/handbook/project-references.html
[7]: https://lp.logrocket.com/subscribe-thereplay
[8]: https://blog.logrocket.com/rethinking-error-tracking-product-analytics/
[9]: https://blog.logrocket.com/understanding-react-useeffect-cleanup-function/
[10]: https://blog.logrocket.com/switching-between-node-versions-during-development/
[11]: https://blog.logrocket.com/using-react-children-prop-with-typescript/
[12]: https://blog.logrocket.com/creating-custom-mouse-cursor-css/
[13]: https://lp.logrocket.com/blg/content-advisory-board-signup
[14]: https://www.typescriptlang.org/tsconfig#strict
[15]: https://lp.logrocket.com/blg/typescript-signup
[16]: https://lp.logrocket.com/blg/typescript-signup
[17]: https://lp.logrocket.com/blg/typescript-signup
[18]: https://lp.logrocket.com/blg/typescript-signup
