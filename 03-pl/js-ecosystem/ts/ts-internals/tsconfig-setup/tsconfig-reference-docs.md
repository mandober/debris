---
downloaded:       2023-08-25
page-url:         https://www.typescriptlang.org/tsconfig#declarationMap
article-title:    TSConfig Reference - Docs on every TSConfig option
---
# TypeScript: TSConfig Reference - Docs on every TSConfig option
These options make up the bulk of TypeScript’s configuration and it covers how the language should work.

## [#][1]Type Checking

### [#][2] Allow Unreachable Code - `allowUnreachableCode`

When:

-   `undefined` (default) provide suggestions as warnings to editors
-   `true` unreachable code is ignored
-   `false` raises compiler errors about unreachable code

These warnings are only about code which is provably unreachable d
ue to the use of JavaScript syntax, for example:

```
tsfunction fn(n: number) {  if (n > 5) {    return true;  } else {    return false;  }  return true;}
```

With `"allowUnreachableCode": false`:

```
tsfunction fn(n: number) {  if (n > 5) {    return true;  } else {    return false;  }  return true;Unreachable code detected.7027Unreachable code detected.}Try
```

This does not affect errors on the basis of code which *appears* to be unreachable due to type analysis.

-   Released:
    
    [1.8][4]
    

### [#][5] Allow Unused Labels - `allowUnusedLabels`

When:

-   `undefined` (default) provide suggestions as warnings to editors
-   `true` unused labels are ignored
-   `false` raises compiler errors about unused labels

Labels are very rare in JavaScript and typically indicate an attempt to write an object literal:

```
tsfunction verifyAge(age: number) {  // Forgot 'return' statement  if (age > 18) {    verified: true;Unused label.7028Unused label.  }}Try
```

-   Released:
    
    [1.8][7]
    

### [#][8] Always Strict - `alwaysStrict`

Ensures that your files are parsed in the ECMAScript strict mode, and emit “use strict” for each source file.

[ECMAScript strict][9] mode was introduced in ES5 and provides behavior tweaks to the runtime of the JavaScript engine to improve performance, and makes a set of errors throw instead of silently ignoring them.

-   Recommended
-   Default:
    
    `true` if [`strict`][10]; `false` otherwise.
    
-   Related:
    -   [`strict`][11]
        
-   Released:
    
    [2.1][12]
    

### [#][13] Exact Optional Property Types - `exactOptionalPropertyTypes`

With exactOptionalPropertyTypes enabled, TypeScript applies stricter rules around how it handles properties on `type` or `interfaces` which have a `?` prefix.

For example, this interface declares that there is a property which can be one of two strings: ‘dark’ or ‘light’ or it should not be in the object.

```
tsinterface UserDefaults {  // The absence of a value represents 'system'  colorThemeOverride?: "dark" | "light";}
```

Without this flag enabled, there are three values which you can set `colorThemeOverride` to be: “dark”, “light” and `undefined`.

Setting the value to `undefined` will allow most JavaScript runtime checks for the existence to fail, which is effectively falsy. However, this isn’t quite accurate; `colorThemeOverride: undefined` is not the same as `colorThemeOverride` not being defined. For example, `"colorThemeOverride" in settings` would have different behavior with `undefined` as the key compared to not being defined.

`exactOptionalPropertyTypes` makes TypeScript truly enforce the definition provided as an optional property:

```
tsconst settings = getUserSettings();settings.colorThemeOverride = "dark";settings.colorThemeOverride = "light";// But not:settings.colorThemeOverride = undefined;Type 'undefined' is not assignable to type '"dark" | "light"' with 'exactOptionalPropertyTypes: true'. Consider adding 'undefined' to the type of the target.2412Type 'undefined' is not assignable to type '"dark" | "light"' with 'exactOptionalPropertyTypes: true'. Consider adding 'undefined' to the type of the target.Try
```

-   Recommended
-   Released:
    
    [4.4][15]
    

### [#][16] No Fallthrough Cases In Switch - `noFallthroughCasesInSwitch`

Report errors for fallthrough cases in switch statements. Ensures that any non-empty case inside a switch statement includes either `break`, `return`, or `throw`. This means you won’t accidentally ship a case fallthrough bug.

```
tsconst a: number = 6;switch (a) {  case 0:Fallthrough case in switch.7029Fallthrough case in switch.    console.log("even");  case 1:    console.log("odd");    break;}Try
```

-   Released:
    
    [1.8][18]
    

### [#][19] No Implicit Any - `noImplicitAny`

In some cases where no type annotations are present, TypeScript will fall back to a type of `any` for a variable when it cannot infer the type.

This can cause some errors to be missed, for example:

```
tsfunction fn(s) {  // No error?  console.log(s.subtr(3));}fn(42);Try
```

Turning on `noImplicitAny` however TypeScript will issue an error whenever it would have inferred `any`:

```
tsfunction fn(s) {Parameter 's' implicitly has an 'any' type.7006Parameter 's' implicitly has an 'any' type.  console.log(s.subtr(3));}Try
```

-   Recommended
-   Default:
    
    `true` if [`strict`][22]; `false` otherwise.
    
-   Related:
    -   [`strict`][23]
        

### [#][24] No Implicit Override - `noImplicitOverride`

When working with classes which use inheritance, it’s possible for a sub-class to get “out of sync” with the functions it overloads when they are renamed in the base class.

For example, imagine you are modeling a music album syncing system:

```
tsclass Album {  download() {    // Default behavior  }}class SharedAlbum extends Album {  download() {    // Override to get info from many sources  }}Try
```

Then when you add support for machine-learning generated playlists, you refactor the `Album` class to have a ‘setup’ function instead:

```
tsclass Album {  setup() {    // Default behavior  }}class MLAlbum extends Album {  setup() {    // Override to get info from algorithm  }}class SharedAlbum extends Album {  download() {    // Override to get info from many sources  }}Try
```

In this case, TypeScript has provided no warning that `download` on `SharedAlbum` *expected* to override a function in the base class.

Using `noImplicitOverride` you can ensure that the sub-classes never go out of sync, by ensuring that functions which override include the keyword `override`.

The following example has `noImplicitOverride` enabled, and you can see the error received when `override` is missing:

```
tsclass Album {  setup() {}}class MLAlbum extends Album {  override setup() {}}class SharedAlbum extends Album {  setup() {}This member must have an 'override' modifier because it overrides a member in the base class 'Album'.4114This member must have an 'override' modifier because it overrides a member in the base class 'Album'.}Try
```

-   Released:
    
    [4.3][28]
    

### [#][29] No Implicit Returns - `noImplicitReturns`

When enabled, TypeScript will check all code paths in a function to ensure they return a value.

```
tsfunction lookupHeadphonesManufacturer(color: "blue" | "black"): string {Function lacks ending return statement and return type does not include 'undefined'.2366Function lacks ending return statement and return type does not include 'undefined'.  if (color === "blue") {    return "beats";  } else {    "bose";  }}Try
```

-   Released:
    
    [1.8][31]
    

### [#][32] No Implicit This - `noImplicitThis`

Raise error on ‘this’ expressions with an implied ‘any’ type.

For example, the class below returns a function which tries to access `this.width` and `this.height` – but the context for `this` inside the function inside `getAreaFunction` is not the instance of the Rectangle.

```
tsclass Rectangle {  width: number;  height: number;  constructor(width: number, height: number) {    this.width = width;    this.height = height;  }  getAreaFunction() {    return function () {      return this.width * this.height;'this' implicitly has type 'any' because it does not have a type annotation.'this' implicitly has type 'any' because it does not have a type annotation.26832683'this' implicitly has type 'any' because it does not have a type annotation.'this' implicitly has type 'any' because it does not have a type annotation.    };  }}Try
```

-   Recommended
-   Default:
    
    `true` if [`strict`][34]; `false` otherwise.
    
-   Related:
    -   [`strict`][35]
        
-   Released:
    
    [2.0][36]
    

### [#][37] No Property Access From Index Signature - `noPropertyAccessFromIndexSignature`

This setting ensures consistency between accessing a field via the “dot” (`obj.key`) syntax, and “indexed” (`obj["key"]`) and the way which the property is declared in the type.

Without this flag, TypeScript will allow you to use the dot syntax to access fields which are not defined:

```
tsinterface GameSettings {  // Known up-front properties  speed: "fast" | "medium" | "slow";  quality: "high" | "low";  // Assume anything unknown to the interface  // is a string.  [key: string]: string;}const settings = getSettings();settings.speed;          (property) GameSettings.speed: "fast" | "medium" | "slow"settings.quality;           (property) GameSettings.quality: "high" | "low"// Unknown key accessors are allowed on// this object, and are `string`settings.username;            (index) GameSettings[string]: stringTry
```

Turning the flag on will raise an error because the unknown field uses dot syntax instead of indexed syntax.

```
tsconst settings = getSettings();settings.speed;settings.quality;// This would need to be settings["username"];settings.username;Property 'username' comes from an index signature, so it must be accessed with ['username'].4111Property 'username' comes from an index signature, so it must be accessed with ['username'].            (index) GameSettings[string]: stringTry
```

The goal of this flag is to signal intent in your calling syntax about how certain you are this property exists.

-   Released:
    
    [4.2][40]
    

### [#][41] No Unchecked Indexed Access - `noUncheckedIndexedAccess`

TypeScript has a way to describe objects which have unknown keys but known values on an object, via index signatures.

```
tsinterface EnvironmentVars {  NAME: string;  OS: string;  // Unknown properties are covered by this index signature.  [propName: string]: string;}declare const env: EnvironmentVars;// Declared as existingconst sysName = env.NAME;const os = env.OS;      const os: string// Not declared, but because of the index// signature, then it is considered a stringconst nodeEnv = env.NODE_ENV;        const nodeEnv: stringTry
```

Turning on `noUncheckedIndexedAccess` will add `undefined` to any un-declared field in the type.

```
tsdeclare const env: EnvironmentVars;// Declared as existingconst sysName = env.NAME;const os = env.OS;      const os: string// Not declared, but because of the index// signature, then it is considered a stringconst nodeEnv = env.NODE_ENV;        const nodeEnv: string | undefinedTry
```

-   Released:
    
    [4.1][44]
    

### [#][45] No Unused Locals - `noUnusedLocals`

Report errors on unused local variables.

```
tsconst createKeyboard = (modelID: number) => {  const defaultModelID = 23;'defaultModelID' is declared but its value is never read.6133'defaultModelID' is declared but its value is never read.  return { type: "keyboard", modelID };};Try
```

-   Released:
    
    [2.0][47]
    

### [#][48] No Unused Parameters - `noUnusedParameters`

Report errors on unused parameters in functions.

```
tsconst createDefaultKeyboard = (modelID: number) => {'modelID' is declared but its value is never read.6133'modelID' is declared but its value is never read.  const defaultModelID = 23;  return { type: "keyboard", modelID: defaultModelID };};Try
```

-   Released:
    
    [2.0][50]
    

### [#][51] Strict - `strict`

The `strict` flag enables a wide range of type checking behavior that results in stronger guarantees of program correctness. Turning this on is equivalent to enabling all of the *strict mode family* options, which are outlined below. You can then turn off individual strict mode family checks as needed.

Future versions of TypeScript may introduce additional stricter checking under this flag, so upgrades of TypeScript might result in new type errors in your program. When appropriate and possible, a corresponding flag will be added to disable that behavior.

-   Recommended
-   Related:
    -   [`alwaysStrict`][52]
        
    -   [`strictNullChecks`][53]
        
    -   [`strictBindCallApply`][54]
        
    -   [`strictFunctionTypes`][55]
        
    -   [`strictPropertyInitialization`][56]
        
    -   [`noImplicitAny`][57]
        
    -   [`noImplicitThis`][58]
        
    -   [`useUnknownInCatchVariables`][59]
        
-   Released:
    
    [2.3][60]
    

### [#][61] Strict Bind Call Apply - `strictBindCallApply`

When set, TypeScript will check that the built-in methods of functions `call`, `bind`, and `apply` are invoked with correct argument for the underlying function:

```
ts// With strictBindCallApply onfunction fn(x: string) {  return parseInt(x);}const n1 = fn.call(undefined, "10");const n2 = fn.call(undefined, false);Argument of type 'boolean' is not assignable to parameter of type 'string'.2345Argument of type 'boolean' is not assignable to parameter of type 'string'.Try
```

Otherwise, these functions accept any arguments and will return `any`:

```
ts// With strictBindCallApply offfunction fn(x: string) {  return parseInt(x);}// Note: No error; return type is 'any'const n = fn.call(undefined, false);Try
```

-   Recommended
-   Default:
    
    `true` if [`strict`][64]; `false` otherwise.
    
-   Related:
    -   [`strict`][65]
        
-   Released:
    
    [3.2][66]
    

### [#][67] Strict Function Types - `strictFunctionTypes`

When enabled, this flag causes functions parameters to be checked more correctly.

Here’s a basic example with `strictFunctionTypes` off:

```
tsfunction fn(x: string) {  console.log("Hello, " + x.toLowerCase());}type StringOrNumberFunc = (ns: string | number) => void;// Unsafe assignmentlet func: StringOrNumberFunc = fn;// Unsafe call - will crashfunc(10);Try
```

With `strictFunctionTypes` *on*, the error is correctly detected:

```
tsfunction fn(x: string) {  console.log("Hello, " + x.toLowerCase());}type StringOrNumberFunc = (ns: string | number) => void;// Unsafe assignment is preventedlet func: StringOrNumberFunc = fn;Type '(x: string) => void' is not assignable to type 'StringOrNumberFunc'.
  Types of parameters 'x' and 'ns' are incompatible.
    Type 'string | number' is not assignable to type 'string'.
      Type 'number' is not assignable to type 'string'.2322Type '(x: string) => void' is not assignable to type 'StringOrNumberFunc'.
  Types of parameters 'x' and 'ns' are incompatible.
    Type 'string | number' is not assignable to type 'string'.
      Type 'number' is not assignable to type 'string'.Try
```

During development of this feature, we discovered a large number of inherently unsafe class hierarchies, including some in the DOM. Because of this, the setting only applies to functions written in *function* syntax, not to those in *method* syntax:

```
tstype Methodish = {  func(x: string | number): void;};function fn(x: string) {  console.log("Hello, " + x.toLowerCase());}// Ultimately an unsafe assignment, but not detectedconst m: Methodish = {  func: fn,};m.func(10);Try
```

-   Recommended
-   Default:
    
    `true` if [`strict`][71]; `false` otherwise.
    
-   Related:
    -   [`strict`][72]
        
-   Released:
    
    [2.6][73]
    

### [#][74] Strict Null Checks - `strictNullChecks`

When `strictNullChecks` is `false`, `null` and `undefined` are effectively ignored by the language. This can lead to unexpected errors at runtime.

When `strictNullChecks` is `true`, `null` and `undefined` have their own distinct types and you’ll get a type error if you try to use them where a concrete value is expected.

For example with this TypeScript code, `users.find` has no guarantee that it will actually find a user, but you can write code as though it will:

```
tsdeclare const loggedInUsername: string;const users = [  { name: "Oby", age: 12 },  { name: "Heera", age: 32 },];const loggedInUser = users.find((u) => u.name === loggedInUsername);console.log(loggedInUser.age);Try
```

Setting `strictNullChecks` to `true` will raise an error that you have not made a guarantee that the `loggedInUser` exists before trying to use it.

```
tsdeclare const loggedInUsername: string;const users = [  { name: "Oby", age: 12 },  { name: "Heera", age: 32 },];const loggedInUser = users.find((u) => u.name === loggedInUsername);console.log(loggedInUser.age);'loggedInUser' is possibly 'undefined'.18048'loggedInUser' is possibly 'undefined'.Try
```

The second example failed because the array’s `find` function looks a bit like this simplification:

```
ts// When strictNullChecks: truetype Array = {  find(predicate: (value: any, index: number) => boolean): S | undefined;};// When strictNullChecks: false the undefined is removed from the type system,// allowing you to write code which assumes it always found a resulttype Array = {  find(predicate: (value: any, index: number) => boolean): S;};
```

-   Recommended
-   Default:
    
    `true` if [`strict`][77]; `false` otherwise.
    
-   Related:
    -   [`strict`][78]
        
-   Released:
    
    [2.0][79]
    

### [#][80] Strict Property Initialization - `strictPropertyInitialization`

When set to true, TypeScript will raise an error when a class property was declared but not set in the constructor.

```
tsclass UserAccount {  name: string;  accountType = "user";  email: string;Property 'email' has no initializer and is not definitely assigned in the constructor.2564Property 'email' has no initializer and is not definitely assigned in the constructor.  address: string | undefined;  constructor(name: string) {    this.name = name;    // Note that this.email is not set  }}Try
```

In the above case:

-   `this.name` is set specifically.
-   `this.accountType` is set by default.
-   `this.email` is not set and raises an error.
-   `this.address` is declared as potentially `undefined` which means it does not have to be set.

-   Recommended
-   Default:
    
    `true` if [`strict`][82]; `false` otherwise.
    
-   Related:
    -   [`strict`][83]
        
-   Released:
    
    [2.7][84]
    

### [#][85] Use Unknown In Catch Variables - `useUnknownInCatchVariables`

In TypeScript 4.0, support was added to allow changing the type of the variable in a catch clause from `any` to `unknown`. Allowing for code like:

```
tstry {  // ...} catch (err) {  // We have to verify err is an  // error before using it as one.  if (err instanceof Error) {    console.log(err.message);  }}Try
```

This pattern ensures that error handling code becomes more comprehensive because you cannot guarantee that the object being thrown *is* a Error subclass ahead of time. With the flag `useUnknownInCatchVariables` enabled, then you do not need the additional syntax (`: unknown`) nor a linter rule to try enforce this behavior.

-   Recommended
-   Default:
    
    `true` if [`strict`][87]; `false` otherwise.
    
-   Related:
    -   [`strict`][88]
        
-   Released:
    
    [4.4][89]
    

## [#][90]Modules

### [#][91] Allow Arbitrary Extensions - `allowArbitraryExtensions`

In TypeScript 5.0, when an import path ends in an extension that isn’t a known JavaScript or TypeScript file extension, the compiler will look for a declaration file for that path in the form of `{file basename}.d.{extension}.ts`. For example, if you are using a CSS loader in a bundler project, you might want to write (or generate) declaration files for those stylesheets:

```
css/* app.css */.cookie-banner {  display: none;}
```

```
ts// app.d.css.tsdeclare const css: {  cookieBanner: string;};export default css;
```

```
ts// App.tsximport styles from "./app.css";styles.cookieBanner; // string
```

By default, this import will raise an error to let you know that TypeScript doesn’t understand this file type and your runtime might not support importing it. But if you’ve configured your runtime or bundler to handle it, you can suppress the error with the new `--allowArbitraryExtensions` compiler option.

Note that historically, a similar effect has often been achievable by adding a declaration file named `app.css.d.ts` instead of `app.d.css.ts` - however, this just worked through Node’s `require` resolution rules for CommonJS. Strictly speaking, the former is interpreted as a declaration file for a JavaScript file named `app.css.js`. Because relative files imports need to include extensions in Node’s ESM support, TypeScript would error on our example in an ESM file under `--moduleResolution node16` or `nodenext`.

For more information, read up [the proposal for this feature][92] and [its corresponding pull request][93].

### [#][94] Allow Importing TS Extensions - `allowImportingTsExtensions`

`--allowImportingTsExtensions` allows TypeScript files to import each other with a TypeScript-specific extension like `.ts`, `.mts`, or `.tsx`.

This flag is only allowed when `--noEmit` or `--emitDeclarationOnly` is enabled, since these import paths would not be resolvable at runtime in JavaScript output files. The expectation here is that your resolver (e.g. your bundler, a runtime, or some other tool) is going to make these imports between `.ts` files work.

### [#][95] Allow Umd Global Access - `allowUmdGlobalAccess`

When set to true, `allowUmdGlobalAccess` lets you access UMD exports as globals from inside module files. A module file is a file that has imports and/or exports. Without this flag, using an export from a UMD module requires an import declaration.

An example use case for this flag would be a web project where you know the particular library (like jQuery or Lodash) will always be available at runtime, but you can’t access it with an import.

-   Released:
    
    [3.5][96]
    

### [#][97] Base URL - `baseUrl`

Sets a base directory from which to resolve non-relative module names. For example, in the directory structure:

```
project
├── ex.ts
├── hello
│   └── world.ts
└── tsconfig.json
```

With `"baseUrl": "./"`, TypeScript will look for files starting at the same folder as the `tsconfig.json`:

```
tsimport { helloWorld } from "hello/world";console.log(helloWorld);
```

This resolution has higher priority than lookups from `node_modules`.

This feature was designed for use in conjunction with AMD module loaders in the browser, and is not recommended in any other context. As of TypeScript 4.1, `baseUrl` is no longer required to be set when using [`paths`][98].

### [#][99] Custom Conditions - `customConditions`

`--customConditions` takes a list of additional [conditions][100] that should succeed when TypeScript resolves from an [`exports`][101] or [`imports`][102] field of a `package.json`. These conditions are added to whatever existing conditions a resolver will use by default.

For example, when this field is set in a `tsconfig.json` as so:

```
jsonc{  "compilerOptions": {    "target": "es2022",    "moduleResolution": "bundler",    "customConditions": ["my-condition"]  }}
```

Any time an `exports` or `imports` field is referenced in `package.json`, TypeScript will consider conditions called `my-condition`.

So when importing from a package with the following `package.json`

```
jsonc{  // ...  "exports": {    ".": {      "my-condition": "./foo.mjs",      "node": "./bar.mjs",      "import": "./baz.mjs",      "require": "./biz.mjs"    }  }}
```

TypeScript will try to look for files corresponding to `foo.mjs`.

This field is only valid under the `node16`, `nodenext`, and `bundler` options for [`--moduleResolution`][103].

-   Related:
    -   [`moduleResolution`][104]
        
    -   [`resolvePackageJsonExports`][105]
        
    -   [`resolvePackageJsonImports`][106]
        

### [#][107] Module - `module`

Sets the module system for the program. See the [Modules][108] reference page for more information. You very likely want `"nodenext"` for modern node projects.

Changing `module` affects [`moduleResolution`][109] which [also has a reference page][110].

Here’s some example output for this file:

```
ts// @filename: index.tsimport { valueOfPi } from "./constants";export const twoPi = valueOfPi * 2;Try
```

#### [][112]`CommonJS`

```
ts"use strict";Object.defineProperty(exports, "__esModule", { value: true });exports.twoPi = void 0;const constants_1 = require("./constants");exports.twoPi = constants_1.valueOfPi * 2;Try
```

#### [][114]`UMD`

```
ts(function (factory) {    if (typeof module === "object" && typeof module.exports === "object") {        var v = factory(require, exports);        if (v !== undefined) module.exports = v;    }    else if (typeof define === "function" && define.amd) {        define(["require", "exports", "./constants"], factory);    }})(function (require, exports) {    "use strict";    Object.defineProperty(exports, "__esModule", { value: true });    exports.twoPi = void 0;    const constants_1 = require("./constants");    exports.twoPi = constants_1.valueOfPi * 2;});Try
```

#### [][116]`AMD`

```
tsdefine(["require", "exports", "./constants"], function (require, exports, constants_1) {    "use strict";    Object.defineProperty(exports, "__esModule", { value: true });    exports.twoPi = void 0;    exports.twoPi = constants_1.valueOfPi * 2;});Try
```

#### [][118]`System`

```
tsSystem.register(["./constants"], function (exports_1, context_1) {    "use strict";    var constants_1, twoPi;    var __moduleName = context_1 && context_1.id;    return {        setters: [            function (constants_1_1) {                constants_1 = constants_1_1;            }        ],        execute: function () {            exports_1("twoPi", twoPi = constants_1.valueOfPi * 2);        }    };});Try
```

#### [][120]`ESNext`

```
tsimport { valueOfPi } from "./constants";export const twoPi = valueOfPi * 2;Try
```

#### [][122]`ES2015`/`ES6`/`ES2020`/`ES2022`

```
tsimport { valueOfPi } from "./constants";export const twoPi = valueOfPi * 2;Try
```

In addition to the base functionality of `ES2015`/`ES6`, `ES2020` adds support for [dynamic `import`s][124], and [`import.meta`][125] while `ES2022` further adds support for [top level `await`][126].

#### [][127]`node16`/`nodenext` (nightly builds)

Available from 4.7+, the `node16` and `nodenext` modes integrate with Node’s [native ECMAScript Module support][128]. The emitted JavaScript uses either `CommonJS` or `ES2020` output depending on the file extension and the value of the `type` setting in the nearest `package.json`. Module resolution also works differently. You can learn more in the [handbook][129].

#### [][130]`None`

```
ts"use strict";Object.defineProperty(exports, "__esModule", { value: true });exports.twoPi = void 0;const constants_1 = require("./constants");exports.twoPi = constants_1.valueOfPi * 2;Try
```

-   Default:
    
    `CommonJS` if [`target`][132] is `ES3` or `ES5`; `ES6`/`ES2015` otherwise.
    
-   Allowed:
    -   `none`
        
    -   `commonjs`
        
    -   `amd`
        
    -   `umd`
        
    -   `system`
        
    -   `es6`/`es2015`
        
    -   `es2020`
        
    -   `es2022`
        
    -   `esnext`
        
    -   `node16`
        
    -   `nodenext`
        
-   Related:
    -   [`moduleResolution`][133]
        
    -   [`esModuleInterop`][134]
        
    -   [`allowImportingTsExtensions`][135]
        
    -   [`allowArbitraryExtensions`][136]
        
    -   [`resolveJsonModule`][137]
        
-   Released:
    
    [1.0][138]
    

### [#][139] Module Resolution - `moduleResolution`

Specify the module resolution strategy:

-   `'node16'` or `'nodenext'` for modern versions of Node.js. Node.js v12 and later supports both ECMAScript imports and CommonJS `require`, which resolve using different algorithms. These `moduleResolution` values, when combined with the corresponding [`module`][140] values, picks the right algorithm for each resolution based on whether Node.js will see an `import` or `require` in the output JavaScript code.
-   `'node10'` (previously called `'node'`) for Node.js versions older than v10, which only support CommonJS `require`. You probably won’t need to use `node10` in modern code.
-   `'bundler'` for use with bundlers. Like `node16` and `nodenext`, this mode supports package.json `"imports"` and `"exports"`, but unlike the Node.js resolution modes, `bundler` never requires file extensions on relative paths in imports.
-   `'classic'` was used in TypeScript before the release of 1.6. `classic` should not be used.

There is a handbook reference page on [Module Resolution][141]

-   Default:
    
    `Classic` if [`module`][142] is `AMD`, `UMD`, `System`, or `ES6`/`ES2015`; Matches if [`module`][143] is `node16` or `nodenext`; `Node` otherwise.
    
-   Allowed:
    -   `classic`
        
    -   `node10`/`node`
        
    -   `node16`
        
    -   `nodenext`
        
    -   `bundler`
        
-   Related:
    -   [`module`][144]
        
    -   [`paths`][145]
        
    -   [`baseUrl`][146]
        
    -   [`rootDirs`][147]
        
    -   [`moduleSuffixes`][148]
        
    -   [`customConditions`][149]
        
    -   [`resolvePackageJsonExports`][150]
        
    -   [`resolvePackageJsonImports`][151]
        

### [#][152] Module Suffixes - `moduleSuffixes`

Provides a way to override the default list of file name suffixes to search when resolving a module.

```
{  "": {    "moduleSuffixes": [".ios", ".native", ""]  }}
```

Given the above configuration, an import like the following:

```
tsimport * as foo from "./foo";
```

TypeScript will look for the relative files `./foo.ios.ts`, `./foo.native.ts`, and finally `./foo.ts`.

Note the empty string `""` in [`moduleSuffixes`][153] which is necessary for TypeScript to also look-up `./foo.ts`.

This feature can be useful for React Native projects where each target platform can use a separate tsconfig.json with differing `moduleSuffixes`.

-   Released:
    
    [4.7][154]
    

### [#][155] No Resolve - `noResolve`

By default, TypeScript will examine the initial set of files for `import` and `<reference` directives and add these resolved files to your program.

If `noResolve` is set, this process doesn’t happen. However, `import` statements are still checked to see if they resolve to a valid module, so you’ll need to make sure this is satisfied by some other means.

### [#][156] Paths - `paths`

A series of entries which re-map imports to lookup locations relative to the [`baseUrl`][157] if set, or to the tsconfig file itself otherwise. There is a larger coverage of `paths` in [the handbook][158].

`paths` lets you declare how TypeScript should resolve an import in your `require`/`import`s.

```
{  "": {    "": {      "jquery": ["./vendor/jquery/dist/jquery"]    }  }}
```

This would allow you to be able to write `import "jquery"`, and get all of the correct typing locally.

```
{  "": {    "": {        "app/*": ["./src/app/*"],        "config/*": ["./src/app/_config/*"],        "environment/*": ["./src/environments/*"],        "shared/*": ["./src/app/_shared/*"],        "helpers/*": ["./src/helpers/*"],        "tests/*": ["./src/tests/*"]    },}
```

In this case, you can tell the TypeScript file resolver to support a number of custom prefixes to find code.

Note that this feature does not change how import paths are emitted by `tsc`, so `paths` should only be used to inform TypeScript that another tool has this mapping and will use it at runtime or when bundling.

### [#][159] Resolve JSON Module - `resolveJsonModule`

Allows importing modules with a `.json` extension, which is a common practice in node projects. This includes generating a type for the `import` based on the static JSON shape.

TypeScript does not support resolving JSON files by default:

```
ts// @filename: settings.jsonCannot find module './settings.json'. Consider using '--resolveJsonModule' to import module with '.json' extension.2732Cannot find module './settings.json'. Consider using '--resolveJsonModule' to import module with '.json' extension.{    "repo": "TypeScript",    "dry": false,    "debug": false}// @filename: index.tsimport settings from "./settings.json";settings.debug === true;settings.dry === 2;Try
```

Enabling the option allows importing JSON, and validating the types in that JSON file.

```
ts// @filename: settings.json{    "repo": "TypeScript",    "dry": false,This comparison appears to be unintentional because the types 'boolean' and 'number' have no overlap.2367This comparison appears to be unintentional because the types 'boolean' and 'number' have no overlap.    "debug": false}// @filename: index.tsimport settings from "./settings.json";settings.debug === true;settings.dry === 2;Try
```

### [#][162] Resolve package.json Exports - `resolvePackageJsonExports`

`--resolvePackageJsonExports` forces TypeScript to consult [the `exports` field of `package.json` files][163] if it ever reads from a package in `node_modules`.

This option defaults to `true` under the `node16`, `nodenext`, and `bundler` options for [`--moduleResolution`][164].

-   Default:
    
    `true` when [`moduleResolution`][165] is `node16`, `nodenext`, or `bundler`; otherwise `false`
    
-   Related:
    -   [`moduleResolution`][166]
        
    -   [`customConditions`][167]
        
    -   [`resolvePackageJsonImports`][168]
        

### [#][169] Resolve package.json Imports - `resolvePackageJsonImports`

`--resolvePackageJsonImports` forces TypeScript to consult [the `imports` field of `package.json` files][170] when performing a lookup that starts with `#` from a file whose ancestor directory contains a `package.json`.

This option defaults to `true` under the `node16`, `nodenext`, and `bundler` options for [`--moduleResolution`][171].

-   Default:
    
    `true` when [`moduleResolution`][172] is `node16`, `nodenext`, or `bundler`; otherwise `false`
    
-   Related:
    -   [`moduleResolution`][173]
        
    -   [`customConditions`][174]
        
    -   [`resolvePackageJsonExports`][175]
        

### [#][176] Root Dir - `rootDir`

**Default**: The longest common path of all non-declaration input files. If [`composite`][177] is set, the default is instead the directory containing the `tsconfig.json` file.

When TypeScript compiles files, it keeps the same directory structure in the output directory as exists in the input directory.

For example, let’s say you have some input files:

```
MyProj
├── tsconfig.json
├── core
│   ├── a.ts
│   ├── b.ts
│   ├── sub
│   │   ├── c.ts
├── types.d.ts
```

The inferred value for `rootDir` is the longest common path of all non-declaration input files, which in this case is `core/`.

If your [`outDir`][178] was `dist`, TypeScript would write this tree:

```
MyProj
├── dist
│   ├── a.js
│   ├── b.js
│   ├── sub
│   │   ├── c.js
```

However, you may have intended for `core` to be part of the output directory structure. By setting `rootDir: "."` in `tsconfig.json`, TypeScript would write this tree:

```
MyProj
├── dist
│   ├── core
│   │   ├── a.js
│   │   ├── b.js
│   │   ├── sub
│   │   │   ├── c.js
```

Importantly, `rootDir` **does not affect which files become part of the compilation**. It has no interaction with the [`include`][179], [`exclude`][180], or [`files`][181] `tsconfig.json` settings.

Note that TypeScript will never write an output file to a directory outside of [`outDir`][182], and will never skip emitting a file. For this reason, `rootDir` also enforces that all files which need to be emitted are underneath the `rootDir` path.

For example, let’s say you had this tree:

```
MyProj
├── tsconfig.json
├── core
│   ├── a.ts
│   ├── b.ts
├── helpers.ts
```

It would be an error to specify `rootDir` as `core` *and* [`include`][183] as `*` because it creates a file (`helpers.ts`) that would need to be emitted *outside* the [`outDir`][184] (i.e. `../helpers.js`).

-   Default:
    
    Computed from the list of input files.
    
-   Released:
    
    [1.5][185]
    

### [#][186] Root Dirs - `rootDirs`

Using `rootDirs`, you can inform the compiler that there are many “virtual” directories acting as a single root. This allows the compiler to resolve relative module imports within these “virtual” directories, as if they were merged in to one directory.

For example:

```
 src
 └── views
     └── view1.ts (can import "./template1", "./view2`)
     └── view2.ts (can import "./template1", "./view1`)

 generated
 └── templates
         └── views
             └── template1.ts (can import "./view1", "./view2")
```

```
{  "": {    "": ["src/views", "generated/templates/views"]  }}
```

This does not affect how TypeScript emits JavaScript, it only emulates the assumption that they will be able to work via those relative paths at runtime.

`rootDirs` can be used to provide a separate “type layer” to files that are not TypeScript or JavaScript by providing a home for generated `.d.ts` files in another folder. This technique is useful for bundled applications where you use `import` of files that aren’t necessarily code:

```
sh src └── index.ts └── css     └── main.css     └── navigation.css generated └── css     └── main.css.d.ts     └── navigation.css.d.ts
```

```
{  "": {    "": ["src", "generated"]  }}
```

This technique lets you generate types ahead of time for the non-code source files. Imports then work naturally based off the source file’s location. For example `./src/index.ts` can import the file `./src/css/main.css` and TypeScript will be aware of the bundler’s behavior for that filetype via the corresponding generated declaration file.

```
ts// @filename: index.tsimport { appClass } from "./main.css";Try
```

-   Default:
    
    Computed from the list of input files.
    
-   Released:
    
    [2.0][188]
    

### [#][189] Type Roots - `typeRoots`

By default all *visible* ”`@types`” packages are included in your compilation. Packages in `node_modules/@types` of any enclosing folder are considered *visible*. For example, that means packages within `./node_modules/@types/`, `../node_modules/@types/`, `../../node_modules/@types/`, and so on.

If `typeRoots` is specified, *only* packages under `typeRoots` will be included. For example:

```
{  "": {    "": ["./typings", "./vendor/types"]  }}
```

This config file will include *all* packages under `./typings` and `./vendor/types`, and no packages from `./node_modules/@types`. All paths are relative to the `tsconfig.json`.

-   Related:
    -   [`types`][190]
        

### [#][191] Types - `types`

By default all *visible* ”`@types`” packages are included in your compilation. Packages in `node_modules/@types` of any enclosing folder are considered *visible*. For example, that means packages within `./node_modules/@types/`, `../node_modules/@types/`, `../../node_modules/@types/`, and so on.

If `types` is specified, only packages listed will be included in the global scope. For instance:

```
{  "": {    "": ["node", "jest", "express"]  }}
```

This `tsconfig.json` file will *only* include `./node_modules/@types/node`, `./node_modules/@types/jest` and `./node_modules/@types/express`. Other packages under `node_modules/@types/*` will not be included.

### [][192]What does this affect?

This option does not affect how `@types/*` are included in your application code, for example if you had the above `compilerOptions` example with code like:

```
tsimport * as moment from "moment";moment().format("MMMM Do YYYY, h:mm:ss a");
```

The `moment` import would be fully typed.

When you have this option set, by not including a module in the `types` array it:

-   Will not add globals to your project (e.g `process` in node, or `expect` in Jest)
-   Will not have exports appear as auto-import recommendations

This feature differs from [`typeRoots`][193] in that it is about specifying only the exact types you want included, whereas [`typeRoots`][194] supports saying you want particular folders.

-   Related:
    -   [`typeRoots`][195]
        

## [#][196]Emit

### [#][197] Declaration - `declaration`

Generate `.d.ts` files for every TypeScript or JavaScript file inside your project. These `.d.ts` files are type definition files which describe the external API of your module. With `.d.ts` files, tools like TypeScript can provide intellisense and accurate types for un-typed code.

When `declaration` is set to `true`, running the compiler with this TypeScript code:

```
tsexport let helloWorld = "hi";Try
```

Will generate an `index.js` file like this:

```
tsexport let helloWorld = "hi";Try
```

With a corresponding `helloWorld.d.ts`:

```
tsexport declare let helloWorld: string;Try
```

When working with `.d.ts` files for JavaScript files you may want to use [`emitDeclarationOnly`][201] or use [`outDir`][202] to ensure that the JavaScript files are not overwritten.

-   Default:
    
    `true` if [`composite`][203]; `false` otherwise.
    
-   Related:
    -   [`declarationDir`][204]
        
    -   [`emitDeclarationOnly`][205]
        
-   Released:
    
    [1.0][206]
    

### [#][207] Declaration Dir - `declarationDir`

Offers a way to configure the root directory for where declaration files are emitted.

```
example
├── index.ts
├── package.json
└── tsconfig.json
```

with this `tsconfig.json`:

```
{  "": {    "": true,    "": "./types"  }}
```

Would place the d.ts for the `index.ts` in a `types` folder:

```
example
├── index.js
├── index.ts
├── package.json
├── tsconfig.json
└── types
    └── index.d.ts
```

-   Related:
    -   [`declaration`][208]
        
-   Released:
    
    [2.0][209]
    

### [#][210] Declaration Map - `declarationMap`

Generates a source map for `.d.ts` files which map back to the original `.ts` source file. This will allow editors such as VS Code to go to the original `.ts` file when using features like *Go to Definition*.

You should strongly consider turning this on if you’re using project references.

-   Released:
    
    [2.9][211]
    

### [#][212] Downlevel Iteration - `downlevelIteration`

Downleveling is TypeScript’s term for transpiling to an older version of JavaScript. This flag is to enable support for a more accurate implementation of how modern JavaScript iterates through new concepts in older JavaScript runtimes.

ECMAScript 6 added several new iteration primitives: the `for / of` loop (`for (el of arr)`), Array spread (`[a, ...b]`), argument spread (`fn(...args)`), and `Symbol.iterator`. `downlevelIteration` allows for these iteration primitives to be used more accurately in ES5 environments if a `Symbol.iterator` implementation is present.

#### [][213]Example: Effects on `for / of`

With this TypeScript code:

```
tsconst str = "Hello!";for (const s of str) {  console.log(s);}Try
```

Without `downlevelIteration` enabled, a `for / of` loop on any object is downleveled to a traditional `for` loop:

```
ts"use strict";var str = "Hello!";for (var _i = 0, str_1 = str; _i < str_1.length; _i++) {    var s = str_1[_i];    console.log(s);}Try
```

This is often what people expect, but it’s not 100% compliant with ECMAScript iteration protocol. Certain strings, such as emoji (😜), have a `.length` of 2 (or even more!), but should iterate as 1 unit in a `for-of` loop. See [this blog post by Jonathan New][216] for a longer explanation.

When `downlevelIteration` is enabled, TypeScript will use a helper function that checks for a `Symbol.iterator` implementation (either native or polyfill). If this implementation is missing, you’ll fall back to index-based iteration.

```
ts"use strict";var __values = (this && this.__values) || function(o) {    var s = typeof Symbol === "function" && Symbol.iterator, m = s && o[s], i = 0;    if (m) return m.call(o);    if (o && typeof o.length === "number") return {        next: function () {            if (o && i >= o.length) o = void 0;            return { value: o && o[i++], done: !o };        }    };    throw new TypeError(s ? "Object is not iterable." : "Symbol.iterator is not defined.");};var e_1, _a;var str = "Hello!";try {    for (var str_1 = __values(str), str_1_1 = str_1.next(); !str_1_1.done; str_1_1 = str_1.next()) {        var s = str_1_1.value;        console.log(s);    }}catch (e_1_1) { e_1 = { error: e_1_1 }; }finally {    try {        if (str_1_1 && !str_1_1.done && (_a = str_1.return)) _a.call(str_1);    }    finally { if (e_1) throw e_1.error; }}Try
```

You can use [tslib][218] via [`importHelpers`][219] to reduce the amount of inline JavaScript too:

```
ts"use strict";var __values = (this && this.__values) || function(o) {    var s = typeof Symbol === "function" && Symbol.iterator, m = s && o[s], i = 0;    if (m) return m.call(o);    if (o && typeof o.length === "number") return {        next: function () {            if (o && i >= o.length) o = void 0;            return { value: o && o[i++], done: !o };        }    };    throw new TypeError(s ? "Object is not iterable." : "Symbol.iterator is not defined.");};var e_1, _a;var str = "Hello!";try {    for (var str_1 = __values(str), str_1_1 = str_1.next(); !str_1_1.done; str_1_1 = str_1.next()) {        var s = str_1_1.value;        console.log(s);    }}catch (e_1_1) { e_1 = { error: e_1_1 }; }finally {    try {        if (str_1_1 && !str_1_1.done && (_a = str_1.return)) _a.call(str_1);    }    finally { if (e_1) throw e_1.error; }}Try
```

**Note:** enabling `downlevelIteration` does not improve compliance if `Symbol.iterator` is not present in the runtime.

#### [][221]Example: Effects on Array Spreads

This is an array spread:

```
js// Make a new array whose elements are 1 followed by the elements of arr2const arr = [1, ...arr2];
```

Based on the description, it sounds easy to downlevel to ES5:

```
js// The same, right?const arr = [1].concat(arr2);
```

However, this is observably different in certain rare cases.

For example, if a source array is missing one or more items (contains a hole), the spread syntax will replace each empty item with `undefined`, whereas `.concat` will leave them intact.

```
js// Make an array where the element at index 1 is missinglet arrayWithHole = ["a", , "c"];let spread = [...arrayWithHole];let concatenated = [].concat(arrayWithHole);console.log(arrayWithHole);// [ 'a', <1 empty item>, 'c' ]console.log(spread);// [ 'a', undefined, 'c' ]console.log(concatenated);// [ 'a', <1 empty item>, 'c' ]
```

Just as with `for / of`, `downlevelIteration` will use `Symbol.iterator` (if present) to more accurately emulate ES 6 behavior.

-   Related:
    -   [`importHelpers`][222]
        
-   Released:
    
    [2.3][223]
    

### [#][224] Emit BOM - `emitBOM`

Controls whether TypeScript will emit a [byte order mark (BOM)][225] when writing output files. Some runtime environments require a BOM to correctly interpret a JavaScript files; others require that it is not present. The default value of `false` is generally best unless you have a reason to change it.

### [#][226] Emit Declaration Only - `emitDeclarationOnly`

*Only* emit `.d.ts` files; do not emit `.js` files.

This setting is useful in two cases:

-   You are using a transpiler other than TypeScript to generate your JavaScript.
-   You are using TypeScript to only generate `d.ts` files for your consumers.

-   Related:
    -   [`declaration`][227]
        
-   Released:
    
    [2.8][228]
    

### [#][229] Import Helpers - `importHelpers`

For certain downleveling operations, TypeScript uses some helper code for operations like extending class, spreading arrays or objects, and async operations. By default, these helpers are inserted into files which use them. This can result in code duplication if the same helper is used in many different modules.

If the `importHelpers` flag is on, these helper functions are instead imported from the [tslib][230] module. You will need to ensure that the `tslib` module is able to be imported at runtime. This only affects modules; global script files will not attempt to import modules.

For example, with this TypeScript:

```
tsexport function fn(arr: number[]) {  const arr2 = [1, ...arr];}
```

Turning on [`downlevelIteration`][231] and `importHelpers` is still false:

```
tsvar __read = (this && this.__read) || function (o, n) {    var m = typeof Symbol === "function" && o[Symbol.iterator];    if (!m) return o;    var i = m.call(o), r, ar = [], e;    try {        while ((n === void 0 || n-- > 0) && !(r = i.next()).done) ar.push(r.value);    }    catch (error) { e = { error: error }; }    finally {        try {            if (r && !r.done && (m = i["return"])) m.call(i);        }        finally { if (e) throw e.error; }    }    return ar;};var __spreadArray = (this && this.__spreadArray) || function (to, from, pack) {    if (pack || arguments.length === 2) for (var i = 0, l = from.length, ar; i < l; i++) {        if (ar || !(i in from)) {            if (!ar) ar = Array.prototype.slice.call(from, 0, i);            ar[i] = from[i];        }    }    return to.concat(ar || Array.prototype.slice.call(from));};export function fn(arr) {    var arr2 = __spreadArray([1], __read(arr), false);}Try
```

Then turning on both [`downlevelIteration`][233] and `importHelpers`:

```
tsimport { __read, __spreadArray } from "tslib";export function fn(arr) {    var arr2 = __spreadArray([1], __read(arr), false);}Try
```

You can use [`noEmitHelpers`][235] when you provide your own implementations of these functions.

-   Related:
    -   [`noEmitHelpers`][236]
        
    -   [`downlevelIteration`][237]
        

### [#][238] Imports Not Used As Values - `importsNotUsedAsValues`

Deprecated in favor of [`verbatimModuleSyntax`][239].

This flag controls how `import` works, there are 3 different options:

-   `remove`: The default behavior of dropping `import` statements which only reference types.
    
-   `preserve`: Preserves all `import` statements whose values or types are never used. This can cause imports/side-effects to be preserved.
    
-   `error`: This preserves all imports (the same as the preserve option), but will error when a value import is only used as a type. This might be useful if you want to ensure no values are being accidentally imported, but still make side-effect imports explicit.
    

This flag works because you can use `import type` to explicitly create an `import` statement which should never be emitted into JavaScript.

-   Default:
    
    `remove`
    
-   Allowed:
    -   `remove`
        
    -   `preserve`
        
    -   `error`
        
-   Related:
    -   [`preserveValueImports`][240]
        
    -   [`verbatimModuleSyntax`][241]
        
-   Released:
    
    [3.8][242]
    

### [#][243] Inline Source Map - `inlineSourceMap`

When set, instead of writing out a `.js.map` file to provide source maps, TypeScript will embed the source map content in the `.js` files. Although this results in larger JS files, it can be convenient in some scenarios. For example, you might want to debug JS files on a webserver that doesn’t allow `.map` files to be served.

Mutually exclusive with [`sourceMap`][244].

For example, with this TypeScript:

```
tsconst helloWorld = "hi";console.log(helloWorld);
```

Converts to this JavaScript:

```
ts"use strict";const helloWorld = "hi";console.log(helloWorld);Try
```

Then enable building it with `inlineSourceMap` enabled there is a comment at the bottom of the file which includes a source-map for the file.

```
ts"use strict";const helloWorld = "hi";console.log(helloWorld);//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiaW5kZXguanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJpbmRleC50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiO0FBQUEsTUFBTSxVQUFVLEdBQUcsSUFBSSxDQUFDO0FBQ3hCLE9BQU8sQ0FBQyxHQUFHLENBQUMsVUFBVSxDQUFDLENBQUMifQ==Try
```

-   Released:
    
    [1.5][247]
    

### [#][248] Inline Sources - `inlineSources`

When set, TypeScript will include the original content of the `.ts` file as an embedded string in the source map (using the source map’s `sourcesContent` property). This is often useful in the same cases as [`inlineSourceMap`][249].

Requires either [`sourceMap`][250] or [`inlineSourceMap`][251] to be set.

For example, with this TypeScript:

```
tsconst helloWorld = "hi";console.log(helloWorld);Try
```

By default converts to this JavaScript:

```
ts"use strict";const helloWorld = "hi";console.log(helloWorld);Try
```

Then enable building it with `inlineSources` and [`inlineSourceMap`][254] enabled there is a comment at the bottom of the file which includes a source-map for the file. Note that the end is different from the example in [`inlineSourceMap`][255] because the source-map now contains the original source code also.

```
ts"use strict";const helloWorld = "hi";console.log(helloWorld);//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiaW5kZXguanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJpbmRleC50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiO0FBQUEsTUFBTSxVQUFVLEdBQUcsSUFBSSxDQUFDO0FBQ3hCLE9BQU8sQ0FBQyxHQUFHLENBQUMsVUFBVSxDQUFDLENBQUMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCBoZWxsb1dvcmxkID0gXCJoaVwiO1xuY29uc29sZS5sb2coaGVsbG9Xb3JsZCk7Il19Try
```

-   Released:
    
    [1.5][257]
    

### [#][258] Map Root - `mapRoot`

Specify the location where debugger should locate map files instead of generated locations. This string is treated verbatim inside the source-map, for example:

```
{  "": {    "": true,    "": "https://my-website.com/debug/sourcemaps/"  }}
```

Would declare that `index.js` will have sourcemaps at `https://my-website.com/debug/sourcemaps/index.js.map`.

### [#][259] New Line - `newLine`

Specify the end of line sequence to be used when emitting files: ‘CRLF’ (dos) or ‘LF’ (unix).

-   Default:
    
    Platform specific.
    
-   Allowed:
    -   `crlf`
        
    -   `lf`
        
-   Released:
    
    [1.5][260]
    

### [#][261] No Emit - `noEmit`

Do not emit compiler output files like JavaScript source code, source-maps or declarations.

This makes room for another tool like [Babel][262], or [swc][263] to handle converting the TypeScript file to a file which can run inside a JavaScript environment.

You can then use TypeScript as a tool for providing editor integration, and as a source code type-checker.

### [#][264] No Emit Helpers - `noEmitHelpers`

Instead of importing helpers with [`importHelpers`][265], you can provide implementations in the global scope for the helpers you use and completely turn off emitting of helper functions.

For example, using this `async` function in ES5 requires a `await`-like function and `generator`-like function to run:

```
tsconst getAPI = async (url: string) => {  // Get API  return {};};Try
```

Which creates quite a lot of JavaScript:

```
ts"use strict";var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }    return new (P || (P = Promise))(function (resolve, reject) {        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }        step((generator = generator.apply(thisArg, _arguments || [])).next());    });};var __generator = (this && this.__generator) || function (thisArg, body) {    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;    function verb(n) { return function (v) { return step([n, v]); }; }    function step(op) {        if (f) throw new TypeError("Generator is already executing.");        while (g && (g = 0, op[0] && (_ = 0)), _) try {            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;            if (y = 0, t) op = [op[0] & 2, t.value];            switch (op[0]) {                case 0: case 1: t = op; break;                case 4: _.label++; return { value: op[1], done: false };                case 5: _.label++; y = op[1]; op = [0]; continue;                case 7: op = _.ops.pop(); _.trys.pop(); continue;                default:                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }                    if (t[2]) _.ops.pop();                    _.trys.pop(); continue;            }            op = body.call(thisArg, _);        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };    }};var getAPI = function (url) { return __awaiter(void 0, void 0, void 0, function () {    return __generator(this, function (_a) {        // Get API        return [2 /*return*/, {}];    });}); };Try
```

Which can be switched out with your own globals via this flag:

```
ts"use strict";var getAPI = function (url) { return __awaiter(void 0, void 0, void 0, function () {    return __generator(this, function (_a) {        // Get API        return [2 /*return*/, {}];    });}); };Try
```

-   Related:
    -   [`importHelpers`][269]
        
-   Released:
    
    [1.5][270]
    

### [#][271] No Emit On Error - `noEmitOnError`

Do not emit compiler output files like JavaScript source code, source-maps or declarations if any errors were reported.

This defaults to `false`, making it easier to work with TypeScript in a watch-like environment where you may want to see results of changes to your code in another environment before making sure all errors are resolved.

-   Released:
    
    [1.4][272]
    

### [#][273] Out Dir - `outDir`

If specified, `.js` (as well as `.d.ts`, `.js.map`, etc.) files will be emitted into this directory. The directory structure of the original source files is preserved; see [`rootDir`][274] if the computed root is not what you intended.

If not specified, `.js` files will be emitted in the same directory as the `.ts` files they were generated from:

```
sh$ tscexample├── index.js└── index.ts
```

With a `tsconfig.json` like this:

Running `tsc` with these settings moves the files into the specified `dist` folder:

```
sh$ tscexample├── dist│   └── index.js├── index.ts└── tsconfig.json
```

-   Related:
    -   [`out`][275]
        
    -   [`outFile`][276]
        

### [#][277] Out File - `outFile`

If specified, all *global* (non-module) files will be concatenated into the single output file specified.

If `module` is `system` or `amd`, all module files will also be concatenated into this file after all global content.

Note: `outFile` cannot be used unless `module` is `None`, `System`, or `AMD`. This option *cannot* be used to bundle CommonJS or ES6 modules.

-   Related:
    -   [`out`][278]
        
    -   [`outDir`][279]
        
-   Released:
    
    [1.0][280]
    

### [#][281] Preserve Const Enums - `preserveConstEnums`

Do not erase `const enum` declarations in generated code. `const enum`s provide a way to reduce the overall memory footprint of your application at runtime by emitting the enum value instead of a reference.

For example with this TypeScript:

```
tsconst enum Album {  JimmyEatWorldFutures = 1,  TubRingZooHypothesis = 2,  DogFashionDiscoAdultery = 3,}const selectedAlbum = Album.JimmyEatWorldFutures;if (selectedAlbum === Album.JimmyEatWorldFutures) {  console.log("That is a great choice.");}Try
```

The default `const enum` behavior is to convert any `Album.Something` to the corresponding number literal, and to remove a reference to the enum from the JavaScript completely.

```
ts"use strict";const selectedAlbum = 1 /* Album.JimmyEatWorldFutures */;if (selectedAlbum === 1 /* Album.JimmyEatWorldFutures */) {    console.log("That is a great choice.");}Try
```

With `preserveConstEnums` set to `true`, the `enum` exists at runtime and the numbers are still emitted.

```
ts"use strict";var Album;(function (Album) {    Album[Album["JimmyEatWorldFutures"] = 1] = "JimmyEatWorldFutures";    Album[Album["TubRingZooHypothesis"] = 2] = "TubRingZooHypothesis";    Album[Album["DogFashionDiscoAdultery"] = 3] = "DogFashionDiscoAdultery";})(Album || (Album = {}));const selectedAlbum = 1 /* Album.JimmyEatWorldFutures */;if (selectedAlbum === 1 /* Album.JimmyEatWorldFutures */) {    console.log("That is a great choice.");}Try
```

This essentially makes such `const enums` a source-code feature only, with no runtime traces.

-   Default:
    
    `true` if [`isolatedModules`][285]; `false` otherwise.
    

### [#][286] Preserve Value Imports - `preserveValueImports`

Deprecated in favor of [`verbatimModuleSyntax`][287].

There are some cases where TypeScript can’t detect that you’re using an import. For example, take the following code:

```
tsimport { Animal } from "./animal.js";eval("console.log(new Animal().isDangerous())");
```

or code using ‘Compiles to HTML’ languages like Svelte or Vue. `preserveValueImports` will prevent TypeScript from removing the import, even if it appears unused.

When combined with [`isolatedModules`][288]: imported types *must* be marked as type-only because compilers that process single files at a time have no way of knowing whether imports are values that appear unused, or a type that must be removed in order to avoid a runtime crash.

-   Related:
    -   [`isolatedModules`][289]
        
    -   [`importsNotUsedAsValues`][290]
        
    -   [`verbatimModuleSyntax`][291]
        
-   Released:
    
    [4.5][292]
    

Strips all comments from TypeScript files when converting into JavaScript. Defaults to `false`.

For example, this is a TypeScript file which has a JSDoc comment:

```
ts/** The translation of 'Hello world' into Portuguese */export const helloWorldPTBR = "Olá Mundo";
```

When `removeComments` is set to `true`:

```
tsexport const helloWorldPTBR = "Olá Mundo";Try
```

Without setting `removeComments` or having it as `false`:

```
ts/** The translation of 'Hello world' into Portuguese */export const helloWorldPTBR = "Olá Mundo";Try
```

This means that your comments will show up in the JavaScript code.

### [#][295] Source Map - `sourceMap`

Enables the generation of [sourcemap files][296]. These files allow debuggers and other tools to display the original TypeScript source code when actually working with the emitted JavaScript files. Source map files are emitted as `.js.map` (or `.jsx.map`) files next to the corresponding `.js` output file.

The `.js` files will in turn contain a sourcemap comment to indicate where the files are to external tools, for example:

```
ts// helloWorld.tsexport declare const helloWorld = "hi";
```

Compiling with `sourceMap` set to `true` creates the following JavaScript file:

```
js// helloWorld.js"use strict";Object.defineProperty(exports, "__esModule", { value: true });exports.helloWorld = "hi";//# sourceMappingURL=// helloWorld.js.map
```

And this also generates this json map:

```
json// helloWorld.js.map{  "version": 3,  "file": "ex.js",  "sourceRoot": "",  "sources": ["../ex.ts"],  "names": [],  "mappings": ";;AAAa,QAAA,UAAU,GAAG,IAAI,CAAA"}
```

### [#][297] Source Root - `sourceRoot`

Specify the location where a debugger should locate TypeScript files instead of relative source locations. This string is treated verbatim inside the source-map where you can use a path or a URL:

```
{  "": {    "": true,    "": "https://my-website.com/debug/source/"  }}
```

Would declare that `index.js` will have a source file at `https://my-website.com/debug/source/index.ts`.

### [#][298] Strip Internal - `stripInternal`

Do not emit declarations for code that has an `@internal` annotation in its JSDoc comment. This is an internal compiler option; use at your own risk, because the compiler does not check that the result is valid. If you are searching for a tool to handle additional levels of visibility within your `d.ts` files, look at [api-extractor][299].

```
ts/** * Days available in a week * @internal */export const daysInAWeek = 7;/** Calculate how much someone earns in a week */export function weeklySalary(dayRate: number) {  return daysInAWeek * dayRate;}Try
```

With the flag set to `false` (default):

```
ts/** * Days available in a week * @internal */export declare const daysInAWeek = 7;/** Calculate how much someone earns in a week */export declare function weeklySalary(dayRate: number): number;Try
```

With `stripInternal` set to `true` the `d.ts` emitted will be redacted.

```
ts/** Calculate how much someone earns in a week */export declare function weeklySalary(dayRate: number): number;Try
```

The JavaScript output is still the same.

-   Internal

## [#][303]JavaScript Support

### [#][304] Allow JS - `allowJs`

Allow JavaScript files to be imported inside your project, instead of just `.ts` and `.tsx` files. For example, this JS file:

```
js// @filename: card.jsexport const defaultCardDeck = "Heart";Try
```

When imported into a TypeScript file will raise an error:

```
ts// @filename: index.tsimport { defaultCardDeck } from "./card";console.log(defaultCardDeck);Try
```

Imports fine with `allowJs` enabled:

```
ts// @filename: index.tsimport { defaultCardDeck } from "./card";console.log(defaultCardDeck);Try
```

This flag can be used as a way to incrementally add TypeScript files into JS projects by allowing the `.ts` and `.tsx` files to live along-side existing JavaScript files.

It can also be used along-side [`declaration`][308] and [`emitDeclarationOnly`][309] to [create declarations for JS files][310].

-   Related:
    -   [`checkJs`][311]
        
    -   [`emitDeclarationOnly`][312]
        
-   Released:
    
    [1.8][313]
    

### [#][314] Check JS - `checkJs`

Works in tandem with [`allowJs`][315]. When `checkJs` is enabled then errors are reported in JavaScript files. This is the equivalent of including `// @ts-check` at the top of all JavaScript files which are included in your project.

For example, this is incorrect JavaScript according to the `parseFloat` type definition which comes with TypeScript:

```
js// parseFloat only takes a stringmodule.exports.pi = parseFloat(3.142);
```

When imported into a TypeScript module:

```
ts// @filename: constants.jsmodule.exports.pi = parseFloat(3.142);// @filename: index.tsimport { pi } from "./constants";console.log(pi);Try
```

You will not get any errors. However, if you turn on `checkJs` then you will get error messages from the JavaScript file.

```
ts// @filename: constants.jsArgument of type 'number' is not assignable to parameter of type 'string'.2345Argument of type 'number' is not assignable to parameter of type 'string'.module.exports.pi = parseFloat(3.142);// @filename: index.tsimport { pi } from "./constants";console.log(pi);Try
```

-   Related:
    -   [`allowJs`][318]
        
    -   [`emitDeclarationOnly`][319]
        
-   Released:
    
    [2.3][320]
    

### [#][321] Max Node Module JS Depth - `maxNodeModuleJsDepth`

The maximum dependency depth to search under `node_modules` and load JavaScript files.

This flag can only be used when [`allowJs`][322] is enabled, and is used if you want to have TypeScript infer types for all of the JavaScript inside your `node_modules`.

Ideally this should stay at 0 (the default), and `d.ts` files should be used to explicitly define the shape of modules. However, there are cases where you may want to turn this on at the expense of speed and potential accuracy.

## [#][323]Editor Support

### [#][324] Disable Size Limit - `disableSizeLimit`

To avoid a possible memory bloat issues when working with very large JavaScript projects, there is an upper limit to the amount of memory TypeScript will allocate. Turning this flag on will remove the limit.

### [#][325] Plugins - `plugins`

List of language service plugins to run inside the editor.

Language service plugins are a way to provide additional information to a user based on existing TypeScript files. They can enhance existing messages between TypeScript and an editor, or to provide their own error messages.

For example:

-   [ts-sql-plugin][326] — Adds SQL linting with a template strings SQL builder.
-   [typescript-styled-plugin][327] — Provides CSS linting inside template strings .
-   [typescript-eslint-language-service][328] — Provides eslint error messaging and fix-its inside the compiler’s output.
-   [ts-graphql-plugin][329] — Provides validation and auto-completion inside GraphQL query template strings.

VS Code has the ability for a extension to [automatically include language service plugins][330], and so you may have some running in your editor without needing to define them in your `tsconfig.json`.

## [#][331]Interop Constraints

### [#][332] Allow Synthetic Default Imports - `allowSyntheticDefaultImports`

When set to true, `allowSyntheticDefaultImports` allows you to write an import like:

```
tsimport React from "react";
```

instead of:

```
tsimport * as React from "react";
```

When the module **does not** explicitly specify a default export.

For example, without `allowSyntheticDefaultImports` as true:

```
ts// @filename: utilFunctions.jsModule '"/home/runner/work/TypeScript-Website/TypeScript-Website/utilFunctions"' has no default export.1192Module '"/home/runner/work/TypeScript-Website/TypeScript-Website/utilFunctions"' has no default export.const getStringLength = (str) => str.length;module.exports = {  getStringLength,};// @filename: index.tsimport utils from "./utilFunctions";const count = utils.getStringLength("Check JS");Try
```

This code raises an error because there isn’t a `default` object which you can import. Even though it feels like it should. For convenience, transpilers like Babel will automatically create a default if one isn’t created. Making the module look a bit more like:

```
js// @filename: utilFunctions.jsconst getStringLength = (str) => str.length;const allFunctions = {  getStringLength,};module.exports = allFunctions;module.exports.default = allFunctions;
```

This flag does not affect the JavaScript emitted by TypeScript, it’s only for the type checking. This option brings the behavior of TypeScript in-line with Babel, where extra code is emitted to make using a default export of a module more ergonomic.

-   Default:
    
    `true` if [`esModuleInterop`][334] is enabled, [`module`][335] is `system`, or [`moduleResolution`][336] is `bundler`; `false` otherwise.
    
-   Related:
    -   [`esModuleInterop`][337]
        
-   Released:
    
    [1.8][338]
    

### [#][339] ES Module Interop - `esModuleInterop`

By default (with `esModuleInterop` false or not set) TypeScript treats CommonJS/AMD/UMD modules similar to ES6 modules. In doing this, there are two parts in particular which turned out to be flawed assumptions:

-   a namespace import like `import * as moment from "moment"` acts the same as `const moment = require("moment")`
    
-   a default import like `import moment from "moment"` acts the same as `const moment = require("moment").default`
    

This mis-match causes these two issues:

-   the ES6 modules spec states that a namespace import (`import * as x`) can only be an object, by having TypeScript treating it the same as `= require("x")` then TypeScript allowed for the import to be treated as a function and be callable. That’s not valid according to the spec.
    
-   while accurate to the ES6 modules spec, most libraries with CommonJS/AMD/UMD modules didn’t conform as strictly as TypeScript’s implementation.
    

Turning on `esModuleInterop` will fix both of these problems in the code transpiled by TypeScript. The first changes the behavior in the compiler, the second is fixed by two new helper functions which provide a shim to ensure compatibility in the emitted JavaScript:

```
tsimport * as fs from "fs";import _ from "lodash";fs.readFileSync("file.txt", "utf8");_.chunk(["a", "b", "c", "d"], 2);
```

With `esModuleInterop` disabled:

```
ts"use strict";Object.defineProperty(exports, "__esModule", { value: true });const fs = require("fs");const lodash_1 = require("lodash");fs.readFileSync("file.txt", "utf8");lodash_1.default.chunk(["a", "b", "c", "d"], 2);Try
```

With `esModuleInterop` set to `true`:

```
ts"use strict";var __createBinding = (this && this.__createBinding) || (Object.create ? (function(o, m, k, k2) {    if (k2 === undefined) k2 = k;    var desc = Object.getOwnPropertyDescriptor(m, k);    if (!desc || ("get" in desc ? !m.__esModule : desc.writable || desc.configurable)) {      desc = { enumerable: true, get: function() { return m[k]; } };    }    Object.defineProperty(o, k2, desc);}) : (function(o, m, k, k2) {    if (k2 === undefined) k2 = k;    o[k2] = m[k];}));var __setModuleDefault = (this && this.__setModuleDefault) || (Object.create ? (function(o, v) {    Object.defineProperty(o, "default", { enumerable: true, value: v });}) : function(o, v) {    o["default"] = v;});var __importStar = (this && this.__importStar) || function (mod) {    if (mod && mod.__esModule) return mod;    var result = {};    if (mod != null) for (var k in mod) if (k !== "default" && Object.prototype.hasOwnProperty.call(mod, k)) __createBinding(result, mod, k);    __setModuleDefault(result, mod);    return result;};var __importDefault = (this && this.__importDefault) || function (mod) {    return (mod && mod.__esModule) ? mod : { "default": mod };};Object.defineProperty(exports, "__esModule", { value: true });const fs = __importStar(require("fs"));const lodash_1 = __importDefault(require("lodash"));fs.readFileSync("file.txt", "utf8");lodash_1.default.chunk(["a", "b", "c", "d"], 2);Try
```

*Note*: The namespace import `import * as fs from "fs"` only accounts for properties which [are owned][342] (basically properties set on the object and not via the prototype chain) on the imported object. If the module you’re importing defines its API using inherited properties, you need to use the default import form (`import fs from "fs"`), or disable `esModuleInterop`.

*Note*: You can make JS emit terser by enabling [`importHelpers`][343]:

```
ts"use strict";Object.defineProperty(exports, "__esModule", { value: true });const tslib_1 = require("tslib");const fs = tslib_1.__importStar(require("fs"));const lodash_1 = tslib_1.__importDefault(require("lodash"));fs.readFileSync("file.txt", "utf8");lodash_1.default.chunk(["a", "b", "c", "d"], 2);Try
```

Enabling `esModuleInterop` will also enable [`allowSyntheticDefaultImports`][345].

-   Recommended
-   Default:
    
    `true` if [`module`][346] is `node16` or `nodenext`; `false` otherwise.
    
-   Related:
    -   [`allowSyntheticDefaultImports`][347]
        
-   Released:
    
    [2.7][348]
    

### [#][349] Force Consistent Casing In File Names - `forceConsistentCasingInFileNames`

TypeScript follows the case sensitivity rules of the file system it’s running on. This can be problematic if some developers are working in a case-sensitive file system and others aren’t. If a file attempts to import `fileManager.ts` by specifying `./FileManager.ts` the file will be found in a case-insensitive file system, but not on a case-sensitive file system.

When this option is set, TypeScript will issue an error if a program tries to include a file by a casing different from the casing on disk.

-   Recommended
-   Default:
    
    `true`
    

### [#][350] Isolated Modules - `isolatedModules`

While you can use TypeScript to produce JavaScript code from TypeScript code, it’s also common to use other transpilers such as [Babel][351] to do this. However, other transpilers only operate on a single file at a time, which means they can’t apply code transforms that depend on understanding the full type system. This restriction also applies to TypeScript’s `ts.transpileModule` API which is used by some build tools.

These limitations can cause runtime problems with some TypeScript features like `const enum`s and `namespace`s. Setting the `isolatedModules` flag tells TypeScript to warn you if you write certain code that can’t be correctly interpreted by a single-file transpilation process.

It does not change the behavior of your code, or otherwise change the behavior of TypeScript’s checking and emitting process.

Some examples of code which does not work when `isolatedModules` is enabled.

#### [][352]Exports of Non-Value Identifiers

In TypeScript, you can import a *type* and then subsequently export it:

```
tsimport { someType, someFunction } from "someModule";someFunction();export { someType, someFunction };Try
```

Because there’s no value for `someType`, the emitted `export` will not try to export it (this would be a runtime error in JavaScript):

```
jsexport { someFunction };
```

Single-file transpilers don’t know whether `someType` produces a value or not, so it’s an error to export a name that only refers to a type.

#### [][354]Non-Module Files

If `isolatedModules` is set, all implementation files must be *modules* (which means it has some form of `import`/`export`). An error occurs if any file isn’t a module:

```
tsfunction fn() {}Try
```

This restriction doesn’t apply to `.d.ts` files.

#### [][356]References to `const enum` members

In TypeScript, when you reference a `const enum` member, the reference is replaced by its actual value in the emitted JavaScript. Changing this TypeScript:

```
tsdeclare const enum Numbers {  Zero = 0,  One = 1,}console.log(Numbers.Zero + Numbers.One);Try
```

To this JavaScript:

```
ts"use strict";console.log(0 + 1);Try
```

Without knowledge of the values of these members, other transpilers can’t replace the references to `Numbers`, which would be a runtime error if left alone (since there are no `Numbers` object at runtime). Because of this, when `isolatedModules` is set, it is an error to reference an ambient `const enum` member.

### [#][359] Preserve Symlinks - `preserveSymlinks`

This is to reflect the same flag in Node.js; which does not resolve the real path of symlinks.

This flag also exhibits the opposite behavior to Webpack’s `resolve.symlinks` option (i.e. setting TypeScript’s `preserveSymlinks` to true parallels setting Webpack’s `resolve.symlinks` to false, and vice-versa).

With this enabled, references to modules and packages (e.g. `import`s and `/// <reference type="..." />` directives) are all resolved relative to the location of the symbolic link file, rather than relative to the path that the symbolic link resolves to.

### [#][360] Verbatim Module Syntax - `verbatimModuleSyntax`

By default, TypeScript does something called *import elision*. Basically, if you write something like

```
tsimport { Car } from "./car";export function drive(car: Car) {  // ...}
```

TypeScript detects that you’re only using an import for types and drops the import entirely. Your output JavaScript might look something like this:

```
jsexport function drive(car) {  // ...}
```

Most of the time this is good, because if `Car` isn’t a value that’s exported from `./car`, we’ll get a runtime error.

But it does add a layer of complexity for certain edge cases. For example, notice there’s no statement like `import "./car";` - the import was dropped entirely. That actually makes a difference for modules that have side-effects or not.

TypeScript’s emit strategy for JavaScript also has another few layers of complexity - import elision isn’t always just driven by how an import is used - it often consults how a value is declared as well. So it’s not always clear whether code like the following

```
tsexport { Car } from "./car";
```

should be preserved or dropped. If `Car` is declared with something like a `class`, then it can be preserved in the resulting JavaScript file. But if `Car` is only declared as a `type` alias or `interface`, then the JavaScript file shouldn’t export `Car` at all.

While TypeScript might be able to make these emit decisions based on information from across files, not every compiler can.

The `type` modifier on imports and exports helps with these situations a bit. We can make it explicit whether an import or export is only being used for type analysis, and can be dropped entirely in JavaScript files by using the `type` modifier.

```
ts// This statement can be dropped entirely in JS outputimport type * as car from "./car";// The named import/export 'Car' can be dropped in JS outputimport { type Car } from "./car";export { type Car } from "./car";
```

`type` modifiers are not quite useful on their own - by default, module elision will still drop imports, and nothing forces you to make the distinction between `type` and plain imports and exports. So TypeScript has the flag `--importsNotUsedAsValues` to make sure you use the `type` modifier, `--preserveValueImports` to prevent *some* module elision behavior, and `--isolatedModules` to make sure that your TypeScript code works across different compilers. Unfortunately, understanding the fine details of those 3 flags is hard, and there are still some edge cases with unexpected behavior.

TypeScript 5.0 introduces a new option called `--verbatimModuleSyntax` to simplify the situation. The rules are much simpler - any imports or exports without a `type` modifier are left around. Anything that uses the `type` modifier is dropped entirely.

```
ts// Erased away entirely.import type { A } from "a";// Rewritten to 'import { b } from "bcd";'import { b, type c, type d } from "bcd";// Rewritten to 'import {} from "xyz";'import { type xyz } from "xyz";
```

With this new option, what you see is what you get.

That does have some implications when it comes to module interop though. Under this flag, ECMAScript `import`s and `export`s won’t be rewritten to `require` calls when your settings or file extension implied a different module system. Instead, you’ll get an error. If you need to emit code that uses `require` and `module.exports`, you’ll have to use TypeScript’s module syntax that predates ES2015:

| Input TypeScript | Output JavaScript |
| --- | --- |
| 
```
tsimport foo = require("foo");
```

 | 

```
jsconst foo = require("foo");
```

 |
| 

```
tsfunction foo() {}function bar() {}function baz() {}export = {  foo,  bar,  baz,};
```

 | 

```
jsfunction foo() {}function bar() {}function baz() {}module.exports = {  foo,  bar,  baz,};
```

 |

While this is a limitation, it does help make some issues more obvious. For example, it’s very common to forget to set the [`type` field in `package.json`][361] under `--module node16`. As a result, developers would start writing CommonJS modules instead of an ES modules without realizing it, giving surprising lookup rules and JavaScript output. This new flag ensures that you’re intentional about the file type you’re using because the syntax is intentionally different.

Because `--verbatimModuleSyntax` provides a more consistent story than `--importsNotUsedAsValues` and `--preserveValueImports`, those two existing flags are being deprecated in its favor.

For more details, read up on [the original pull request][362] and [its proposal issue][363].

## [#][364]Backwards Compatibility

### [#][365] Charset - `charset`

In prior versions of TypeScript, this controlled what encoding was used when reading text files from disk. Today, TypeScript assumes UTF-8 encoding, but will correctly detect UTF-16 (BE and LE) or UTF-8 BOMs.

-   Deprecated
-   Default:
    
    `utf8`
    

### [#][366] Keyof Strings Only - `keyofStringsOnly`

This flag changes the `keyof` type operator to return `string` instead of `string | number` when applied to a type with a string index signature.

This flag is used to help people keep this behavior from [before TypeScript 2.9’s release][367].

-   Deprecated
-   Released:
    
    [2.9][368]
    

### [#][369] No Implicit Use Strict - `noImplicitUseStrict`

You shouldn’t need this. By default, when emitting a module file to a non-ES6 target, TypeScript emits a `"use strict";` prologue at the top of the file. This setting disables the prologue.

### [#][370] No Strict Generic Checks - `noStrictGenericChecks`

TypeScript will unify type parameters when comparing two generic functions.

```
tstype A = <T, U>(x: T, y: U) => [T, U];type B = <S>(x: S, y: S) => [S, S];function f(a: A, b: B) {  b = a; // Ok  a = b; // ErrorType 'B' is not assignable to type 'A'.
  Types of parameters 'y' and 'y' are incompatible.
    Type 'U' is not assignable to type 'T'.
      'T' could be instantiated with an arbitrary type which could be unrelated to 'U'.2322Type 'B' is not assignable to type 'A'.
  Types of parameters 'y' and 'y' are incompatible.
    Type 'U' is not assignable to type 'T'.
      'T' could be instantiated with an arbitrary type which could be unrelated to 'U'.}Try
```

This flag can be used to remove that check.

-   Released:
    
    [2.4][372]
    

### [#][373] Out - `out`

Use [`outFile`][374] instead.

The `out` option computes the final file location in a way that is not predictable or consistent. This option is retained for backward compatibility only and is deprecated.

-   Deprecated
-   Related:
    -   [`outDir`][375]
        
    -   [`outFile`][376]
        

### [#][377] Suppress Excess Property Errors - `suppressExcessPropertyErrors`

This disables reporting of excess property errors, such as the one shown in the following example:

```
tstype Point = { x: number; y: number };const p: Point = { x: 1, y: 3, m: 10 };Type '{ x: number; y: number; m: number; }' is not assignable to type 'Point'.
  Object literal may only specify known properties, and 'm' does not exist in type 'Point'.2322Type '{ x: number; y: number; m: number; }' is not assignable to type 'Point'.
  Object literal may only specify known properties, and 'm' does not exist in type 'Point'.Try
```

This flag was added to help people migrate to the stricter checking of new object literals in [TypeScript 1.6][379].

We don’t recommend using this flag in a modern codebase, you can suppress one-off cases where you need it using `// @ts-ignore`.

### [#][380] Suppress Implicit Any Index Errors - `suppressImplicitAnyIndexErrors`

Turning `suppressImplicitAnyIndexErrors` on suppresses reporting the error about implicit anys when indexing into objects, as shown in the following example:

```
tsconst obj = { x: 10 };console.log(obj["foo"]);Element implicitly has an 'any' type because expression of type '"foo"' can't be used to index type '{ x: number; }'.
  Property 'foo' does not exist on type '{ x: number; }'.7053Element implicitly has an 'any' type because expression of type '"foo"' can't be used to index type '{ x: number; }'.
  Property 'foo' does not exist on type '{ x: number; }'.Try
```

Using `suppressImplicitAnyIndexErrors` is quite a drastic approach. It is recommended to use a `@ts-ignore` comment instead:

```
tsconst obj = { x: 10 };// @ts-ignoreconsole.log(obj["foo"]);Try
```

-   Related:
    -   [`noImplicitAny`][383]
        

## [#][384]Language and Environment

### [#][385] Emit Decorator Metadata - `emitDecoratorMetadata`

Enables experimental support for emitting type metadata for decorators which works with the module [`reflect-metadata`][386].

For example, here is the TypeScript

```
tsfunction LogMethod(  target: any,  propertyKey: string | symbol,  descriptor: PropertyDescriptor) {  console.log(target);  console.log(propertyKey);  console.log(descriptor);}class Demo {  @LogMethod  public foo(bar: number) {    // do nothing  }}const demo = new Demo();Try
```

With `emitDecoratorMetadata` not set to true (default) the emitted JavaScript is:

```
ts"use strict";var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;    return c > 3 && r && Object.defineProperty(target, key, r), r;};function LogMethod(target, propertyKey, descriptor) {    console.log(target);    console.log(propertyKey);    console.log(descriptor);}class Demo {    foo(bar) {        // do nothing    }}__decorate([    LogMethod], Demo.prototype, "foo", null);const demo = new Demo();Try
```

With `emitDecoratorMetadata` set to true the emitted JavaScript is:

```
ts"use strict";var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;    return c > 3 && r && Object.defineProperty(target, key, r), r;};var __metadata = (this && this.__metadata) || function (k, v) {    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);};function LogMethod(target, propertyKey, descriptor) {    console.log(target);    console.log(propertyKey);    console.log(descriptor);}class Demo {    foo(bar) {        // do nothing    }}__decorate([    LogMethod,    __metadata("design:type", Function),    __metadata("design:paramtypes", [Number]),    __metadata("design:returntype", void 0)], Demo.prototype, "foo", null);const demo = new Demo();Try
```

-   Related:
    -   [`experimentalDecorators`][390]
        

### [#][391] Experimental Decorators - `experimentalDecorators`

Enables [experimental support for decorators][392], which is a version of decorators that predates the TC39 standardization process.

Decorators are a language feature which hasn’t yet been fully ratified into the JavaScript specification. This means that the implementation version in TypeScript may differ from the implementation in JavaScript when it it decided by TC39.

You can find out more about decorator support in TypeScript in [the handbook][393].

-   Related:
    -   [`emitDecoratorMetadata`][394]
        

### [#][395] JSX - `jsx`

Controls how JSX constructs are emitted in JavaScript files. This only affects output of JS files that started in `.tsx` files.

-   `react`: Emit `.js` files with JSX changed to the equivalent `React.createElement` calls
-   `react-jsx`: Emit `.js` files with the JSX changed to `_jsx` calls
-   `react-jsxdev`: Emit `.js` files with the JSX changed to `_jsx` calls
-   `preserve`: Emit `.jsx` files with the JSX unchanged
-   `react-native`: Emit `.js` files with the JSX unchanged

### [][396]For example

This sample code:

```
tsxexport const HelloWorld = () => <h1>Hello world</h1>;
```

Default: `"react"`

```
tsximport React from 'react';export const HelloWorld = () => React.createElement("h1", null, "Hello world");Try
```

Preserve: `"preserve"`

```
tsximport React from 'react';export const HelloWorld = () => <h1>Hello world</h1>;Try
```

React Native: `"react-native"`

```
tsximport React from 'react';export const HelloWorld = () => <h1>Hello world</h1>;Try
```

React 17 transform: `"react-jsx"`<sup><a href="https://reactjs.org/blog/2020/09/22/introducing-the-new-jsx-transform.html">[1]</a></sup>

```
tsximport { jsx as _jsx } from "react/jsx-runtime";import React from 'react';export const HelloWorld = () => _jsx("h1", { children: "Hello world" });Try
```

React 17 dev transform: `"react-jsxdev"`<sup><a href="https://reactjs.org/blog/2020/09/22/introducing-the-new-jsx-transform.html">[1]</a></sup>

```
tsximport { jsxDEV as _jsxDEV } from "react/jsx-dev-runtime";const _jsxFileName = "/home/runner/work/TypeScript-Website/TypeScript-Website/index.tsx";import React from 'react';export const HelloWorld = () => _jsxDEV("h1", { children: "Hello world" }, void 0, false, { fileName: _jsxFileName, lineNumber: 9, columnNumber: 32 }, this);Try
```

-   Allowed:
    -   `preserve`
        
    -   `react`
        
    -   `react-native`
        
    -   `react-jsx`
        
    -   `react-jsxdev`
        
-   Related:
    -   [`jsxFactory`][404]
        
    -   [`jsxFragmentFactory`][405]
        
    -   [`jsxImportSource`][406]
        
-   Released:
    
    [2.2][407]
    

### [#][408] JSX Factory - `jsxFactory`

Changes the function called in `.js` files when compiling JSX Elements using the classic JSX runtime. The most common change is to use `"h"` or `"preact.h"` instead of the default `"React.createElement"` if using `preact`.

For example, this TSX file:

```
tsximport { h } from "preact";const HelloWorld = () => <div>Hello</div>;
```

With `jsxFactory: "h"` looks like:

```
tsxconst preact_1 = require("preact");const HelloWorld = () => (0, preact_1.h)("div", null, "Hello");Try
```

This option can be used on a per-file basis too similar to [Babel’s `/** @jsx h */` directive][410].

```
tsx/** @jsx h */import { h } from "preact";const HelloWorld = () => <div>Hello</div>;Try
```

The factory chosen will also affect where the `JSX` namespace is looked up (for type checking information) before falling back to the global one.

If the factory is defined as `React.createElement` (the default), the compiler will check for `React.JSX` before checking for a global `JSX`. If the factory is defined as `h`, it will check for `h.JSX` before a global `JSX`.

-   Default:
    
    `React.createElement`
    
-   Allowed:
    -   Any identifier or dotted identifier.
        
-   Related:
    -   [`jsx`][412]
        
    -   [`jsxFragmentFactory`][413]
        
    -   [`jsxImportSource`][414]
        

### [#][415] JSX Fragment Factory - `jsxFragmentFactory`

Specify the JSX fragment factory function to use when targeting react JSX emit with [`jsxFactory`][416] compiler option is specified, e.g. `Fragment`.

For example with this TSConfig:

```
{  "": {    "": "esnext",    "": "commonjs",    "": "react",    "": "h",    "": "Fragment"  }}
```

This TSX file:

```
tsximport { h, Fragment } from "preact";const HelloWorld = () => (  <>    <div>Hello</div>  </>);
```

Would look like:

```
tsxconst preact_1 = require("preact");const HelloWorld = () => ((0, preact_1.h)(preact_1.Fragment, null,    (0, preact_1.h)("div", null, "Hello")));Try
```

This option can be used on a per-file basis too similar to [Babel’s `/* @jsxFrag h */` directive][418].

For example:

```
tsx/** @jsx h *//** @jsxFrag Fragment */import { h, Fragment } from "preact";const HelloWorld = () => (  <>    <div>Hello</div>  </>);Try
```

-   Default:
    
    `React.Fragment`
    
-   Related:
    -   [`jsx`][420]
        
    -   [`jsxFactory`][421]
        
    -   [`jsxImportSource`][422]
        
-   Released:
    
    [4.0][423]
    

### [#][424] JSX Import Source - `jsxImportSource`

Declares the module specifier to be used for importing the `jsx` and `jsxs` factory functions when using [`jsx`][425] as `"react-jsx"` or `"react-jsxdev"` which were introduced in TypeScript 4.1.

With [React 17][426] the library supports a new form of JSX transformation via a separate import.

For example with this code:

```
tsximport React from "react";function App() {  return <h1>Hello World</h1>;}
```

Using this TSConfig:

```
{  "": {    "": "esnext",    "": "commonjs",    "": "react-jsx"  }}
```

The emitted JavaScript from TypeScript is:

```
tsx"use strict";var __importDefault = (this && this.__importDefault) || function (mod) {    return (mod && mod.__esModule) ? mod : { "default": mod };};Object.defineProperty(exports, "__esModule", { value: true });const jsx_runtime_1 = require("react/jsx-runtime");const react_1 = __importDefault(require("react"));function App() {    return (0, jsx_runtime_1.jsx)("h1", { children: "Hello World" });}Try
```

For example if you wanted to use `"jsxImportSource": "preact"`, you need a tsconfig like:

```
{  "": {    "": "esnext",    "": "commonjs",    "": "react-jsx",    "": "preact",    "": ["preact"]  }}
```

Which generates code like:

```
tsxfunction App() {    return (0, jsx_runtime_1.jsx)("h1", { children: "Hello World" });}exports.App = App;Try
```

Alternatively, you can use a per-file pragma to set this option, for example:

```
tsx/** @jsxImportSource preact */export function App() {  return <h1>Hello World</h1>;}
```

Would add `preact/jsx-runtime` as an import for the `_jsx` factory.

*Note:* In order for this to work like you would expect, your `tsx` file must include an `export` or `import` so that it is considered a module.

-   Default:
    
    `react`
    
-   Related:
    -   [`jsx`][429]
        
    -   [`jsxFactory`][430]
        
-   Released:
    
    [4.1][431]
    

### [#][432] Lib - `lib`

TypeScript includes a default set of type definitions for built-in JS APIs (like `Math`), as well as type definitions for things found in browser environments (like `document`). TypeScript also includes APIs for newer JS features matching the [`target`][433] you specify; for example the definition for `Map` is available if [`target`][434] is `ES6` or newer.

You may want to change these for a few reasons:

-   Your program doesn’t run in a browser, so you don’t want the `"dom"` type definitions
-   Your runtime platform provides certain JavaScript API objects (maybe through polyfills), but doesn’t yet support the full syntax of a given ECMAScript version
-   You have polyfills or native implementations for some, but not all, of a higher level ECMAScript version

In TypeScript 4.5, lib files can be overridden by npm modules, find out more [in the blog][435].

### [][436]High Level libraries

| Name | Contents |
| --- | --- |
| `ES5` | Core definitions for all ES3 and ES5 functionality |
| `ES2015` | Additional APIs available in ES2015 (also known as ES6) - `array.find`, `Promise`, `Proxy`, `Symbol`, `Map`, `Set`, `Reflect`, etc. |
| `ES6` | Alias for “ES2015” |
| `ES2016` | Additional APIs available in ES2016 - `array.include`, etc. |
| `ES7` | Alias for “ES2016” |
| `ES2017` | Additional APIs available in ES2017 - `Object.entries`, `Object.values`, `Atomics`, `SharedArrayBuffer`, `date.formatToParts`, typed arrays, etc. |
| `ES2018` | Additional APIs available in ES2018 - `async` iterables, `promise.finally`, `Intl.PluralRules`, `regexp.groups`, etc. |
| `ES2019` | Additional APIs available in ES2019 - `array.flat`, `array.flatMap`, `Object.fromEntries`, `string.trimStart`, `string.trimEnd`, etc. |
| `ES2020` | Additional APIs available in ES2020 - `string.matchAll`, etc. |
| `ES2021` | Additional APIs available in ES2021 - `promise.any`, `string.replaceAll` etc. |
| `ES2022` | Additional APIs available in ES2022 - `array.at`, `RegExp.hasIndices`, etc. |
| `ESNext` | Additional APIs available in ESNext - This changes as the JavaScript specification evolves |
| `DOM` | [DOM][437] definitions - `window`, `document`, etc. |
| `WebWorker` | APIs available in [WebWorker][438] contexts |
| `ScriptHost` | APIs for the [Windows Script Hosting System][439] |

### [][440]Individual library components

| Name |
| --- |
| `DOM.Iterable` |
| `ES2015.Core` |
| `ES2015.Collection` |
| `ES2015.Generator` |
| `ES2015.Iterable` |
| `ES2015.Promise` |
| `ES2015.Proxy` |
| `ES2015.Reflect` |
| `ES2015.Symbol` |
| `ES2015.Symbol.WellKnown` |
| `ES2016.Array.Include` |
| `ES2017.object` |
| `ES2017.Intl` |
| `ES2017.SharedMemory` |
| `ES2017.String` |
| `ES2017.TypedArrays` |
| `ES2018.Intl` |
| `ES2018.Promise` |
| `ES2018.RegExp` |
| `ES2019.Array` |
| `ES2019.Object` |
| `ES2019.String` |
| `ES2019.Symbol` |
| `ES2020.String` |
| `ES2020.Symbol.wellknown` |
| `ES2021.Promise` |
| `ES2021.String` |
| `ES2021.WeakRef` |
| `ESNext.AsyncIterable` |
| `ESNext.Array` |
| `ESNext.Intl` |
| `ESNext.Symbol` |

This list may be out of date, you can see the full list in the [TypeScript source code][441].

-   Related:
    -   [`noLib`][442]
        
-   Released:
    
    [2.0][443]
    

### [#][444] Module Detection - `moduleDetection`

This setting controls how TypeScript determines whether a file is a [script or a module][445].

There are three choices:

-   `"auto"` (default) - TypeScript will not only look for import and export statements, but it will also check whether the `"type"` field in a `package.json` is set to `"module"` when running with [`module`][446]: `nodenext` or `node16`, and check whether the current file is a JSX file when running under [`jsx`][447]: `react-jsx`.
    
-   `"legacy"` - The same behavior as 4.6 and prior, usings import and export statements to determine whether a file is a module.
    
-   `"force"` - Ensures that every non-declaration file is treated as a module.
    

-   Default:
    
    "auto": Treat files with imports, exports, import.meta, jsx (with jsx: react-jsx), or esm format (with module: node16+) as modules.
    
-   Allowed:
    -   `legacy`
        
    -   `auto`
        
    -   `force`
        
-   Released:
    
    [4.7][448]
    

### [#][449] No Lib - `noLib`

Disables the automatic inclusion of any library files. If this option is set, `lib` is ignored.

TypeScript *cannot* compile anything without a set of interfaces for key primitives like: `Array`, `Boolean`, `Function`, `IArguments`, `Number`, `Object`, `RegExp`, and `String`. It is expected that if you use `noLib` you will be including your own type definitions for these.

-   Related:
    -   [`lib`][450]
        

### [#][451] React Namespace - `reactNamespace`

Use [`jsxFactory`][452] instead. Specify the object invoked for `createElement` when targeting `react` for TSX files.

-   Default:
    
    `React`
    

### [#][453] Target - `target`

Modern browsers support all ES6 features, so `ES6` is a good choice. You might choose to set a lower target if your code is deployed to older environments, or a higher target if your code is guaranteed to run in newer environments.

The `target` setting changes which JS features are downleveled and which are left intact. For example, an arrow function `() => this` will be turned into an equivalent `function` expression if `target` is ES5 or lower.

Changing `target` also changes the default value of [`lib`][454]. You may “mix and match” `target` and `lib` settings as desired, but you could just set `target` for convenience.

For developer platforms like Node there are baselines for the `target`, depending on the type of platform and its version. You can find a set of community organized TSConfigs at [tsconfig/bases][455], which has configurations for common platforms and their versions.

The special `ESNext` value refers to the highest version your version of TypeScript supports. This setting should be used with caution, since it doesn’t mean the same thing between different TypeScript versions and can make upgrades less predictable.

-   Default:
    
    `ES3`
    
-   Allowed:
    -   `es3`
        
    -   `es5`
        
    -   `es6`/`es2015`
        
    -   `es2016`
        
    -   `es2017`
        
    -   `es2018`
        
    -   `es2019`
        
    -   `es2020`
        
    -   `es2021`
        
    -   `es2022`
        
    -   `esnext`
        
-   Released:
    
    [1.0][456]
    

### [#][457] Use Define For Class Fields - `useDefineForClassFields`

This flag is used as part of migrating to the upcoming standard version of class fields. TypeScript introduced class fields many years before it was ratified in TC39. The latest version of the upcoming specification has a different runtime behavior to TypeScript’s implementation but the same syntax.

This flag switches to the upcoming ECMA runtime behavior.

You can read more about the transition in [the 3.7 release notes][458].

-   Default:
    
    `true` if [`target`][459] is `ES2022` or higher, including `ESNext`; `false` otherwise.
    
-   Released:
    
    [3.7][460]
    

## [#][461]Compiler Diagnostics

### [#][462] Diagnostics - `diagnostics`

Used to output diagnostic information for debugging. This command is a subset of [`extendedDiagnostics`][463] which are more user-facing results, and easier to interpret.

If you have been asked by a TypeScript compiler engineer to give the results using this flag in a compile, in which there is no harm in using [`extendedDiagnostics`][464] instead.

-   Deprecated
-   Related:
    -   [`extendedDiagnostics`][465]
        

### [#][466] Explain Files - `explainFiles`

Print names of files which TypeScript sees as a part of your project and the reason they are part of the compilation.

For example, with this project of just a single `index.ts` file

```
shexample├── index.ts├── package.json└── tsconfig.json
```

Using a `tsconfig.json` which has `explainFiles` set to true:

```
json{  "compilerOptions": {    "target": "es5",    "module": "commonjs",    "explainFiles": true  }}
```

Running TypeScript against this folder would have output like this:

```
❯ tsc
node_modules/typescript/lib/lib.d.ts
  Default library for target 'es5'
node_modules/typescript/lib/lib.es5.d.ts
  Library referenced via 'es5' from file 'node_modules/typescript/lib/lib.d.ts'
node_modules/typescript/lib/lib.dom.d.ts
  Library referenced via 'dom' from file 'node_modules/typescript/lib/lib.d.ts'
node_modules/typescript/lib/lib.webworker.importscripts.d.ts
  Library referenced via 'webworker.importscripts' from file 'node_modules/typescript/lib/lib.d.ts'
node_modules/typescript/lib/lib.scripthost.d.ts
  Library referenced via 'scripthost' from file 'node_modules/typescript/lib/lib.d.ts'
index.ts
  Matched by include pattern '**/*' in 'tsconfig.json'
```

The output above show:

-   The initial lib.d.ts lookup based on [`target`][467], and the chain of `.d.ts` files which are referenced
-   The `index.ts` file located via the default pattern of [`include`][468]

This option is intended for debugging how a file has become a part of your compile.

-   Released:
    
    [4.2][469]
    

### [#][470] Extended Diagnostics - `extendedDiagnostics`

You can use this flag to discover where TypeScript is spending its time when compiling. This is a tool used for understanding the performance characteristics of your codebase overall.

You can learn more about how to measure and understand the output in the performance [section of the wiki][471].

-   Related:
    -   [`diagnostics`][472]
        

### [#][473] Generate CPU Profile - `generateCpuProfile`

This option gives you the chance to have TypeScript emit a v8 CPU profile during the compiler run. The CPU profile can provide insight into why your builds may be slow.

This option can only be used from the CLI via: `--generateCpuProfile tsc-output.cpuprofile`.

```
shnpm run tsc --generateCpuProfile tsc-output.cpuprofile
```

This file can be opened in a chromium based browser like Chrome or Edge Developer in [the CPU profiler][474] section. You can learn more about understanding the compilers performance in the [TypeScript wiki section on performance][475].

-   Default:
    
    `profile.cpuprofile`
    
-   Released:
    
    [3.7][476]
    

### [#][477] List Emitted Files - `listEmittedFiles`

Print names of generated files part of the compilation to the terminal.

This flag is useful in two cases:

-   You want to transpile TypeScript as a part of a build chain in the terminal where the filenames are processed in the next command.
-   You are not sure that TypeScript has included a file you expected, as a part of debugging the [file inclusion settings][478].

For example:

```
example
├── index.ts
├── package.json
└── tsconfig.json
```

With:

```
{  "": {    "": true,    "": true  }}
```

Would echo paths like:

```
$ npm run tsc

path/to/example/index.js
path/to/example/index.d.ts
```

Normally, TypeScript would return silently on success.

### [#][479] List Files - `listFiles`

Print names of files part of the compilation. This is useful when you are not sure that TypeScript has included a file you expected.

For example:

```
example
├── index.ts
├── package.json
└── tsconfig.json
```

With:

Would echo paths like:

```
$ npm run tsc
path/to/example/node_modules/typescript/lib/lib.d.ts
path/to/example/node_modules/typescript/lib/lib.es5.d.ts
path/to/example/node_modules/typescript/lib/lib.dom.d.ts
path/to/example/node_modules/typescript/lib/lib.webworker.importscripts.d.ts
path/to/example/node_modules/typescript/lib/lib.scripthost.d.ts
path/to/example/index.ts
```

Note if using TypeScript 4.2, prefer [`explainFiles`][480] which offers an explanation of why a file was added too.

-   Related:
    -   [`explainFiles`][481]
        

### [#][482] Trace Resolution - `traceResolution`

When you are trying to debug why a module isn’t being included. You can set `traceResolution` to `true` to have TypeScript print information about its resolution process for each processed file.

You can read more about this in [the handbook][483].

-   Released:
    
    [2.0][484]
    

## [#][485]Projects

### [#][486] Composite - `composite`

The `composite` option enforces certain constraints which make it possible for build tools (including TypeScript itself, under `--build` mode) to quickly determine if a project has been built yet.

When this setting is on:

-   The [`rootDir`][487] setting, if not explicitly set, defaults to the directory containing the `tsconfig.json` file.
    
-   All implementation files must be matched by an [`include`][488] pattern or listed in the [`files`][489] array. If this constraint is violated, `tsc` will inform you which files weren’t specified.
    
-   [`declaration`][490] defaults to `true`
    

You can find documentation on TypeScript projects in [the handbook][491].

-   Related:
    -   [`incremental`][492]
        
    -   [`tsBuildInfoFile`][493]
        
-   Released:
    
    [3.0][494]
    

### [#][495] Disable Referenced Project Load - `disableReferencedProjectLoad`

In multi-project TypeScript programs, TypeScript will load all of the available projects into memory in order to provide accurate results for editor responses which require a full knowledge graph like ‘Find All References’.

If your project is large, you can use the flag `disableReferencedProjectLoad` to disable the automatic loading of all projects. Instead, projects are loaded dynamically as you open files through your editor.

-   Released:
    
    [4.0][496]
    

### [#][497] Disable Solution Searching - `disableSolutionSearching`

When working with [composite TypeScript projects][498], this option provides a way to declare that you do not want a project to be included when using features like *find all references* or *jump to definition* in an editor.

This flag is something you can use to increase responsiveness in large composite projects.

-   Released:
    
    [3.8][499]
    

### [#][500] Disable Source Project Reference Redirect - `disableSourceOfProjectReferenceRedirect`

When working with [composite TypeScript projects][501], this option provides a way to go [back to the pre-3.7][502] behavior where d.ts files were used to as the boundaries between modules. In 3.7 the source of truth is now your TypeScript files.

-   Released:
    
    [3.7][503]
    

### [#][504] Incremental - `incremental`

Tells TypeScript to save information about the project graph from the last compilation to files stored on disk. This creates a series of `.tsbuildinfo` files in the same folder as your compilation output. They are not used by your JavaScript at runtime and can be safely deleted. You can read more about the flag in the [3.4 release notes][505].

To control which folders you want to the files to be built to, use the config option [`tsBuildInfoFile`][506].

-   Default:
    
    `true` if [`composite`][507]; `false` otherwise.
    
-   Related:
    -   [`composite`][508]
        
    -   [`tsBuildInfoFile`][509]
        
-   Released:
    
    [3.4][510]
    

### [#][511] TS Build Info File - `tsBuildInfoFile`

This setting lets you specify a file for storing incremental compilation information as a part of composite projects which enables faster building of larger TypeScript codebases. You can read more about composite projects [in the handbook][512].

The default depends on a combination of other settings:

-   If `outFile` is set, the default is `<outFile>.tsbuildinfo`.
-   If `rootDir` and `outDir` are set, then the file is `<outDir>/<relative path to config from rootDir>/<config name>.tsbuildinfo` For example, if `rootDir` is `src`, `outDir` is `dest`, and the config is `./tsconfig.json`, then the default is `./tsconfig.tsbuildinfo` as the relative path from `src/` to `./tsconfig.json` is `../`.
-   If `outDir` is set, then the default is `<outDir>/<config name>.tsbuildInfo`
-   Otherwise, the default is `<config name>.tsbuildInfo`

-   Default:
    
    `.tsbuildinfo`
    
-   Related:
    -   [`incremental`][513]
        
    -   [`composite`][514]
        
-   Released:
    
    [3.4][515]
    

## [#][516]Output Formatting

### [#][517] No Error Truncation - `noErrorTruncation`

Do not truncate error messages.

With `false`, the default.

```
tsvar x: {  propertyWithAnExceedinglyLongName1: string;  propertyWithAnExceedinglyLongName2: string;  propertyWithAnExceedinglyLongName3: string;  propertyWithAnExceedinglyLongName4: string;  propertyWithAnExceedinglyLongName5: string;  propertyWithAnExceedinglyLongName6: string;  propertyWithAnExceedinglyLongName7: string;  propertyWithAnExceedinglyLongName8: string;};// String representation of type of 'x' should be truncated in error messagevar s: string = x;Type '{ propertyWithAnExceedinglyLongName1: string; propertyWithAnExceedinglyLongName2: string; propertyWithAnExceedinglyLongName3: string; propertyWithAnExceedinglyLongName4: string; propertyWithAnExceedinglyLongName5: string; propertyWithAnExceedinglyLongName6: string; propertyWithAnExceedinglyLongName7: string; propert...' is not assignable to type 'string'.Variable 'x' is used before being assigned.23222454Type '{ propertyWithAnExceedinglyLongName1: string; propertyWithAnExceedinglyLongName2: string; propertyWithAnExceedinglyLongName3: string; propertyWithAnExceedinglyLongName4: string; propertyWithAnExceedinglyLongName5: string; propertyWithAnExceedinglyLongName6: string; propertyWithAnExceedinglyLongName7: string; propert...' is not assignable to type 'string'.Variable 'x' is used before being assigned.Try
```

With `true`

```
tsvar x: {  propertyWithAnExceedinglyLongName1: string;  propertyWithAnExceedinglyLongName2: string;  propertyWithAnExceedinglyLongName3: string;  propertyWithAnExceedinglyLongName4: string;  propertyWithAnExceedinglyLongName5: string;  propertyWithAnExceedinglyLongName6: string;  propertyWithAnExceedinglyLongName7: string;  propertyWithAnExceedinglyLongName8: string;};// String representation of type of 'x' should be truncated in error messagevar s: string = x;Type '{ propertyWithAnExceedinglyLongName1: string; propertyWithAnExceedinglyLongName2: string; propertyWithAnExceedinglyLongName3: string; propertyWithAnExceedinglyLongName4: string; propertyWithAnExceedinglyLongName5: string; propertyWithAnExceedinglyLongName6: string; propertyWithAnExceedinglyLongName7: string; propertyWithAnExceedinglyLongName8: string; }' is not assignable to type 'string'.Variable 'x' is used before being assigned.23222454Type '{ propertyWithAnExceedinglyLongName1: string; propertyWithAnExceedinglyLongName2: string; propertyWithAnExceedinglyLongName3: string; propertyWithAnExceedinglyLongName4: string; propertyWithAnExceedinglyLongName5: string; propertyWithAnExceedinglyLongName6: string; propertyWithAnExceedinglyLongName7: string; propertyWithAnExceedinglyLongName8: string; }' is not assignable to type 'string'.Variable 'x' is used before being assigned.Try
```

### [#][520] Preserve Watch Output - `preserveWatchOutput`

Whether to keep outdated console output in watch mode instead of clearing the screen every time a change happened.

-   Internal

### [#][521] Pretty - `pretty`

Stylize errors and messages using color and context, this is on by default — offers you a chance to have less terse, single colored messages from the compiler.

-   Default:
    
    `true`
    

## [#][522]Completeness

### [#][523] Skip Default Lib Check - `skipDefaultLibCheck`

Use [`skipLibCheck`][524] instead. Skip type checking of default library declaration files.

### [#][525] Skip Lib Check - `skipLibCheck`

Skip type checking of declaration files.

This can save time during compilation at the expense of type-system accuracy. For example, two libraries could define two copies of the same `type` in an inconsistent way. Rather than doing a full check of all `d.ts` files, TypeScript will type check the code you specifically refer to in your app’s source code.

A common case where you might think to use `skipLibCheck` is when there are two copies of a library’s types in your `node_modules`. In these cases, you should consider using a feature like [yarn’s resolutions][526] to ensure there is only one copy of that dependency in your tree or investigate how to ensure there is only one copy by understanding the dependency resolution to fix the issue without additional tooling.

Another possibility is when you are migrating between TypeScript releases and the changes cause breakages in node_modules and the JS standard libraries which you do not want to deal with during the TypeScript update.

Note, that if these issues come from the TypeScript standard library you can replace the library using [TypeScript 4.5’s lib replacement][527] technique.

-   Recommended
-   Released:
    
    [2.0][528]
    

## [#][529]Command Line

## [#][530]Watch Options

TypeScript 3.8 shipped a new strategy for watching directories, which is crucial for efficiently picking up changes to `node_modules`.

On operating systems like Linux, TypeScript installs directory watchers (as opposed to file watchers) on `node_modules` and many of its subdirectories to detect changes in dependencies. This is because the number of available file watchers is often eclipsed by the number of files in `node_modules`, whereas there are way fewer directories to track.

Because every project might work better under different strategies, and this new approach might not work well for your workflows, TypeScript 3.8 introduces a new `watchOptions` field which allows users to tell the compiler/language service which watching strategies should be used to keep track of files and directories.

### [#][531] Assume Changes Only Affect Direct Dependencies - `assumeChangesOnlyAffectDirectDependencies`

When this option is enabled, TypeScript will avoid rechecking/rebuilding all truly possibly-affected files, and only recheck/rebuild files that have changed as well as files that directly import them.

This can be considered a ‘fast & loose’ implementation of the watching algorithm, which can drastically reduce incremental rebuild times at the expense of having to run the full build occasionally to get all compiler error messages.

-   Released:
    
    [3.8][532]
    

[1]: https://www.typescriptlang.org/tsconfig#Type_Checking_6248
[2]: https://www.typescriptlang.org/tsconfig#allowUnreachableCode
[3]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygOwAYBMaBQIIBDAG2LgHcBVAO2kkIGMALQgI2MgGE4ATSVAGYlEkXAICu1BgBcAlnGqgB1ABTVU1cQFtWMAJSgA3rlChZA0GtAA+UAFYDx06brTx0RdOjjIAbhOgAL6gkMQiRgEukG4eSsJ+AYEBru6e3gmBQA
[4]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[5]: https://www.typescriptlang.org/tsconfig#allowUnusedLabels
[6]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygOwAYBMAOAUCBAIYA2JcA7gKoB2AropACYAyRARpCSqAGamM8vOjQDGAFwCWcGqABuMSbwCeAQQDmkABRFNqegFtO0AJSgA3nlChCAMQTq440AHJokcXWg0XoROKJxSANIGnErUCVQHU1QAD5QAEYcM0trawVoJUlmVHFoOkgAbgiAXzxSoA
[7]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[8]: https://www.typescriptlang.org/tsconfig#alwaysStrict
[9]: https://developer.mozilla.org/docs/Web/JavaScript/Reference/Strict_mode
[10]: https://www.typescriptlang.org/tsconfig#strict
[11]: https://www.typescriptlang.org/tsconfig#strict
[12]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-1.html
[13]: https://www.typescriptlang.org/tsconfig#exactOptionalPropertyTypes
[14]: https://www.typescriptlang.org/play/#code/PTAEAEFMA8EMGMAuB5ADoglgewHawDYAKATlqpMYgJ4AqV5AzgFAgQWnEMBcoATAMy9efACwBGXkww5EFAGYJIoAKoMKAEUgKArvkQNQAbyahQ8LPizEaAC0gBbSMgBu7DABNIAfh4Aid7DEANa+oAA+oL74GADmNoi+ANxMAL5MnvD4gUpy2jhI2DigMZCIqhQAyqWYODEMABQAlDzlxJo6egzJrAC0ffDaiH09TOY4DIigaog1daAAvMWlrVUz0nVNydOzDAB05pbWdo4ubp4LkQHBSUzb63sHVrYOTq7ExB5Ki1Gx8TcsYAAQoNQDgsIguLdqvd9hYnsdXmcvqA8p45NJIO5EkA
[15]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-4.html
[16]: https://www.typescriptlang.org/tsconfig#noFallthroughCasesInSwitch
[17]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsDEEMA2iAuALATtArgczQMLwDOApsQJKQDKA7gJYoDGaAUCBKRlhsQFygA7AAYATAE5WTaJGIpQ8AZGwBbAEZdQAXlAA2ANytWxBszSgAFPACUoAN6tQoJiVKhhfR0+czi0RKQAdIjQuBYARKQAbqSQ4daGTi5koACMnt4+sv5BIWHh0AAmhfGJ3moYpPAA1oYAvkA
[18]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[19]: https://www.typescriptlang.org/tsconfig#noImplicitAny
[20]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsEkFsAOAbAlgY1QFwIKQJ4BcoAZgIbIDOApgFAkCuk6Wq0kpkAFJQJSgBvWqFAhQAOWihqAJxnQZAfmGh07StGTUAdMmgBzHtsoMARlhlcAzL14BuWgF963ACwAme0A
[21]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygOwAYMDYBQAzAVwDsBjAFwEs5jR9iAKRASlAG9dRRSbE4AbSADp+cAOZMhiQgCNy0BgGZmzANy4AvkA
[22]: https://www.typescriptlang.org/tsconfig#strict
[23]: https://www.typescriptlang.org/tsconfig#strict
[24]: https://www.typescriptlang.org/tsconfig#noImplicitOverride
[25]: https://www.typescriptlang.org/play/#code/MYGwhgzhAECCICMCuBbaBvAUNaATA9gO4B2I+YuAFAJQbY7QD0j0AIgKYBmYSIALtATsAFmABuAS3wAnegF9MCzKEgwAyqOntc8ZGnYAPPu2K4Yu1HRwESZCjSsNm0APJj206RNztoffNAA5uwCEsScAZzS+GgoYMQAntAQ+EjSwOwQ8opAA
[26]: https://www.typescriptlang.org/play/#code/MYGwhgzhAECCICMCuBbaBvAUNaECmALkgA4AUAlBtjtAPS3QAieAZmEiAdAngBZgA3AJYB7AE7UAvpmmZQkGAFkAMvGRo8ADwJ4AdgBMYa1FRz4iZSlhp0GAeQF4xYofrzQCI6AHNC0IbosXixiImhgIN7iQgS8KFIymHLgUNAAyvxiePrGGtp6hnCIJtbQ+iIA7rogImD6FKY09NAOTi5uHl6+XAFB0CFh0ChgugCeuCJIYsB4EAmSQA
[27]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsEkFsAOAbAlgY1QFwPIDcBTAJyNQBMCAoECYo6IgZwC5QAWARg7cvWQENGjUAEFkAIwCu8UAG9KoUIwJZJiABQBKOQF9Ke3gKGgAsgBkxUmQQAeWApDLDL0uQtDRCJcgSUq1Wrr6lIaCwgDKABb8RARkLtZ2Dk6iEq7yisqqGtqyejpAA
[28]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-3.html
[29]: https://www.typescriptlang.org/tsconfig#noImplicitReturns
[30]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGYBsX0bWgFABmArgHYDGALgJZzmgA2ccA1qQA4ASkAhgBNOACwaREAWT7lSxPjVLQYACkpwW0VACIARk1KQtoAD6hdTeWy0BKVImrRa5AOagA3oVChaxUKvUIoAC8IWZ6Bjbunl6gStSKjLr81IhaANzRAL6gkEyIkFExYXD56VmEmUA
[31]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[32]: https://www.typescriptlang.org/tsconfig#noImplicitThis
[33]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwDYAcBmAUAMYA2AhooqAEqQEAuJAdgOZGSgDeeooA7gJYATWgAtUDAK4BbAEYwA3F1DDIfJsNpips6AsUE4DRLWji6CABT8ho0BJkwANEpVqNtrTACUHRdxF9EADorEVAAXl5BEQVuP2EAwOVVdXDnZNoY0ABfPEUmSFoAQWhIEgAxcQY6PgNzb05Y0BLacWgGUAAzSuqDUDqfRu5m1vb-IJDhUAAqUDHEl3VM7izMnKygA
[34]: https://www.typescriptlang.org/tsconfig#strict
[35]: https://www.typescriptlang.org/tsconfig#strict
[36]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[37]: https://www.typescriptlang.org/tsconfig#noPropertyAccessFromIndexSignature
[38]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygCwEYsCgAmkBjAGwENpJQAzAVwDsCAXASzltAHNIGBlL529ogAUASlQBxEgFtIvBv0EBubCFABaDQWoMNa7E1oMYlEgQqSZchYlABvbKFCqA0rTgB3NtQAOayvENQb3hvGGZIRAdQRFDIXFQAIhNEBgTQAB9QBJlcJmopNMyExCIPBOVHAEdqEiImBgBPRIALJnZmwqzS93LsKNUAQUREfIoSWgaGVoFQOgBrN09QBjhl5ooDI2gTM36wJhsSaIZoA3YAOiiAbTnIJuPTgQBdVBTH9mUAXz6CVhTovhnGwAXg4XCsQNEykQgIEiHOMUgcWUqkcaNAAD0APzYGHyIHnaq1eoNFFgdGObF9VQAVVoCw8bFuDVApjMwwQh3IrKI3TioFYKjAUwOAoARgArQgMAA0rNouFZ3IABm8zsrcbDBOdqDDoLRpJAyRTKVigA
[39]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygCwEYsCgQQHZwAK8ADjAC4CeAggMZ2SKIBi8AtgJL4AmkAHgGUAlgHN8AQwoBXaJGx86AGwlzQAM2n46FYXHyhRkCoOO78oxAAoAlKgDiE9pFMVzlgNzZh+CjHUSjKCOzq7uiKAA3tigoIjkkDyoAEQBiBTJoAA+oMnOPMLS7Jk5yYhKcADuyV6xAI7SEkrC1CkAFmJtJbkV1bWgANoA1pBUqOnQPqIAuuMUkxZeAL64YAC0G3TSFBtr2HT66XFmUxEAvIbGYae2XognFogAdPGQiXcPlk8NTS1UXqtQAAVDoRSpwaRKHigfBvaEUOCgABGkGOblOA2S0nu0EkzmS0w+6MeT2xMDxkC8eFiNNAAD0APxAA
[40]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-2.html
[41]: https://www.typescriptlang.org/tsconfig#noUncheckedIndexedAccess
[42]: https://www.typescriptlang.org/play/#code/JYOwLgpgTgZghgYwgAgKIgG7CgexAWwnADU4oBnZAbwChlkA5AQQFlUAuZcsKUAcwDcdZAHkAyp268QgmsID085AFUQAaxA4A7iGQAHXHuhhgESmRQIcGaBAAmyAEYBPZGAAWwSqDsQAHlzAfCBwYACuUBAAdMIA2gY4egxwhJI8-AC6adKyAL5yvggANhbIViDcyEQYnOhYuAREYKQUQjSKyAAiEMUWDnCU-l4mMjTlleTO5MmEyAC8VZhRzGxC42DIOJQL1VHiQh30yAB6APxyHQw4G4UlkXYANE5hG449cGHkKDgwbu4oPn87SU5CCIXCkSeHiIyGAGy8ZTwoN892QcC46VG62Qml8dXmiwwyxEnVQAH1UAxiAclEczkA
[43]: https://www.typescriptlang.org/play/#code/JYOwLgpgTgZghgYwgAgKIgG7CgexAWwnADU4oBnZAbwChlkA5AQQFlUAuZcsKUAcwDcdZAHkAyp268QgmsID085AFUQAaxA4A7iGQAHXHuhhgESmRQIcGaBAAmyAEYBPZGAAWwSqDsQAHlzAfCBwYACuUBAAdMIA2gY4egxwhJI8-AC6adKyAL40isgAApqqCO4QCGr2AJIgvn72TAhI5OQFSgC03QhhYN2dNL4IADYWyFYg3MhEGJzoWLgERGCkFEIdyAAilWORDnCU-l4mMjST0+TO5MmEyAC8M5hRzGxCF2DIOJSPs1HiQkK9GQAD0APxyQoMHCfYZ7ewAGicfSclTgYXIKBwMDcFWQPn8m3IQRC4UiSI8RHxny8EzwxN8+2QcC46TOH2Qml8CweTwwLxEW1QAH1UAxiIClMDwUA
[44]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-1.html
[45]: https://www.typescriptlang.org/tsconfig#noUnusedLocals
[46]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFVIK4GcCmATAMtAxgQwDZIBQIEKATudOUgFygBsAjAMwtHbSRIAuo25FLh4oA0igCeAI2i5yaUAF5QACgC20NCnwBJACL1EaqRQCUSgHygA3kVD8uvUFoBmuBPh4BZTdv1LQACYWAG47UEEeBHJIG1AeCQAHFHoAIgBrSRk5NFSAGlANLV09UABfMIqgA
[47]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[48]: https://www.typescriptlang.org/tsconfig#noUnusedParameters
[49]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFVIK4GcCmATACgQwE5YLYoAuKOSAUCBKTtGQFygBsAjAMxvkDG0kSRoLjhRYSAERQAzLAgA2RANIoAngCNouNKAC8oABT5oaFLICSYxonyrSASh0A+UAG9yoQb36hj0uUQCyRibmOqAATGwA3G6gwkQIOJAuoETKAA4ojABEANYq6ppZADSghsZmFt5SMvKB5SEAvtFNQA
[50]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[51]: https://www.typescriptlang.org/tsconfig#strict
[52]: https://www.typescriptlang.org/tsconfig#alwaysStrict
[53]: https://www.typescriptlang.org/tsconfig#strictNullChecks
[54]: https://www.typescriptlang.org/tsconfig#strictBindCallApply
[55]: https://www.typescriptlang.org/tsconfig#strictFunctionTypes
[56]: https://www.typescriptlang.org/tsconfig#strictPropertyInitialization
[57]: https://www.typescriptlang.org/tsconfig#noImplicitAny
[58]: https://www.typescriptlang.org/tsconfig#noImplicitThis
[59]: https://www.typescriptlang.org/tsconfig#useUnknownInCatchVariables
[60]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-3.html
[61]: https://www.typescriptlang.org/tsconfig#strictBindCallApply
[62]: https://www.typescriptlang.org/play/#code/PTAEAEGcBcCcEsDG0BC8B2ATAwgQwDb4CCADifgJ4BcocArgKYBQIEDssA9rJDQEwBmACwBWJizAB1eNAAWoGAmRoseQqXIVQndEwBmddMng7Qe9AAoAHjUUYA5gEpQAbyahQsBtDqx0oElweBgBJdGhrRwBuJgBfcUQdGFB0AEZQAF4zdAA6RAJ8C0NMBj0MBkwAGlAAIlSABhrohKToFL5M7LyCoqxS8qqzAkgGaKA
[63]: https://www.typescriptlang.org/play/#code/PTAEAEGcBcCcEsDG0BC8B2ATAwgQwDb4CCADifgJ4BcoAZgZAKYBQzIoA6vNABagwJkaLHkKlyFUAHtatZrQCu6ZPCno66ABQAPGgIwBzAJSgA3s1ChYjaAtjqSuWEwCS6aDqMBuZgF9W7AByUtCMNMGgjLCwUrBeVjZ26tAUJIyg8JCgAOS46BTZzIhqMKDqALwaAHSIBPiaSpiMtBiMmAA0dAyM3kA
[64]: https://www.typescriptlang.org/tsconfig#strict
[65]: https://www.typescriptlang.org/tsconfig#strict
[66]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-2.html
[67]: https://www.typescriptlang.org/tsconfig#strictFunctionTypes
[68]: https://www.typescriptlang.org/play/#code/PTAEAEGcBcCcEsDG0BiBXAds+B7DAVATwAcBTSALlADMBDAG0lIChrNs8aMAKADypgIMAcwCUoAN7NQoRHkg56pAHT0cw7gCIAEqXpqANKE2gA1KF7LoOADI4A7qVgBhWk26jRAbmYBfZszQJKSgAMpw8CIA8rAAcmgAtgBGTuhYoAC8oNwYlKCCkcKgAD6gGIkpsOIZAHygAG448AAmPswgoACqubTUIW6Q8MIYCaQY0MxK0DTsVOFCwjHxyansmVw+Hd2QvSGIDPSgALSg9vD6srBuABas7NwAjAAM3kA
[69]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGY1oFADMBXAOwGMAXASziNDyIAoAPVRM6CogcwEpQBvHKFAlqiOABtIAOnFxO9AEQAJSONkAaUAtABqUIylk4AGTgB3GAGEAhokj1u3ANw4AvjhxkAngAdIoAGU2Dk4AeWgAOQIAWwAjGAAxYhJQAF5QeiIUUFZ2LlAAH1AiGPjoXlSAPlAANzgKABMXHBBQAFUs6zx-W0QKTiJoyCIyUApEUB9oSBrhskgGnElRwlJUILywyNLE5LTaIicgA
[70]: https://www.typescriptlang.org/play/#code/C4TwDgpgBAshwAsD2ATAlgZwVAvFA3gFBRQBmArgHYDGAFAB4BcUGwATmpQOZQA+UlcgFsARhDYBKZgDckaFAG5CAXyWEKNYGiSUylBs1YduEgsSjUdGJABsIAOhtIutAEQAJCDacAaKK6gAaih6e2AkABkkAHdxAGEAQwwIWgkJJWVCQgB6bKgAVRstIQTgLxAoBN0qDATSaCSMNC5KIQhKYD8RcmABJF6UeAhqMpRCS0pWKCFmOERUTGw8IhINamZSSh8VJSF7NdoARgAGdKA
[71]: https://www.typescriptlang.org/tsconfig#strict
[72]: https://www.typescriptlang.org/tsconfig#strict
[73]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-6.html
[74]: https://www.typescriptlang.org/tsconfig#strictNullChecks
[75]: https://www.typescriptlang.org/play/#code/PTAEAEGcBcCcEsDG0ByBXANhgwgCwKaIDWkAXKAGYCGGk+AUCBNFbAOb7TkCiAygEwAGAIwBWegBNCGVvlCIA9gDsYoDArYcJASSUBVOrCVUAtvnIwEStgG569RSuig0hyKAC8oANr1QoAG9QYzNyACIAeQAjAE8wgBpQKg5yYX5QAF94v0Dg03NQMIAJfHxYKgSklNAAZnSs+gBdOwdlVXVNfB19Q08XNwA6CnglCQAKMbQASk8APhcBkLkPFbUNLV0DMqWpu0dIBQx8AY6xjo2esoHk-F2gA
[76]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGYME50FYM1QBGADgAYAWUgKBAgBcBDaAc0gdQFEBlNc-nTDhEDaAEsAxgwByAVwA2CgMIALSJIDWiGgBMNClpFCS4AO1GgFcVu10BJMwFVEMM0wC2kVKIlnWANw0NKYWDKByrkigALygANo0oKAA3qDuXqgARADyAEYAnlkANKBM7KjERAC+xUmp6Z7eoFkAEpAwTCVlFaCEoLU0ALpBIeaW1raQDs5RsRFRiAB0AGbiZroAFJtyAJSxAHwRSxnGMedWNnaOLm5Nu0GhiHAKkEuTm5PXszBL5ZAPIA
[77]: https://www.typescriptlang.org/tsconfig#strict
[78]: https://www.typescriptlang.org/tsconfig#strict
[79]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[80]: https://www.typescriptlang.org/tsconfig#strictPropertyInitialization
[81]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwFYBsAWAUAMYA2AhooqAKqIwCCBBcArgHYAuoA3nqKCyQFtIqRG2gBLFgHMA3D1AkGzdgBUAngAdIoALygARExrR9c+ZAElxREWMmz5JACZPokcrYnTQAH1CsnSAAzSUgnM15GFlFoJgI2BAAKfiFPewBKLnleNgALcUQAOhTtPRK5Xl4QUAA5ODZtPJIOPILCiysiUAK+etAaNnkAXzwhoA
[82]: https://www.typescriptlang.org/tsconfig#strict
[83]: https://www.typescriptlang.org/tsconfig#strict
[84]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-7.html
[85]: https://www.typescriptlang.org/tsconfig#useUnknownInCatchVariables
[86]: https://www.typescriptlang.org/play/#code/PTAEAEFcGcFMFUB2BrRB7A7ogkogwgIYAuAxgBYBqBATgJYEBGANrNAFBHUCeoA3m6FAhQAOjFsAvqBLFyoABSxq1AJR8BQsAHVYoMgQBuuomlBG6AMx5LqoWtFAFEG4TbS2GsC+90xaiAHM7IkcHNERYEQ1aCwUbO0RoIicSWDRYgFFldzV+QUEScOg0FhEmNADFZREAW1ZoAgDYFQBuDQlJIA
[87]: https://www.typescriptlang.org/tsconfig#strict
[88]: https://www.typescriptlang.org/tsconfig#strict
[89]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-4.html
[90]: https://www.typescriptlang.org/tsconfig#Modules_6244
[91]: https://www.typescriptlang.org/tsconfig#allowArbitraryExtensions
[92]: https://github.com/microsoft/TypeScript/issues/50133
[93]: https://github.com/microsoft/TypeScript/pull/51435
[94]: https://www.typescriptlang.org/tsconfig#allowImportingTsExtensions
[95]: https://www.typescriptlang.org/tsconfig#allowUmdGlobalAccess
[96]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-5.html
[97]: https://www.typescriptlang.org/tsconfig#baseUrl
[98]: https://www.typescriptlang.org/tsconfig#paths
[99]: https://www.typescriptlang.org/tsconfig#customConditions
[100]: https://nodejs.org/api/packages.html#nested-conditions
[101]: https://nodejs.org/api/packages.html#exports
[102]: https://nodejs.org/api/packages.html#imports
[103]: https://www.typescriptlang.org/tsconfig#moduleResolution
[104]: https://www.typescriptlang.org/tsconfig#moduleResolution
[105]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonExports
[106]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonImports
[107]: https://www.typescriptlang.org/tsconfig#module
[108]: https://www.typescriptlang.org/docs/handbook/modules.html
[109]: https://www.typescriptlang.org/tsconfig#moduleResolution
[110]: https://www.typescriptlang.org/docs/handbook/module-resolution.html
[111]: https://www.typescriptlang.org/play/#code/PTAEAEDMEsBsFMB2BDAtvAXKAxge0QM4AuyiRBAdOQFDwAeADrgE5E77GgBuysArvADykAArRQAXlABmCgEYALACYA3NRCgAtNux8i2zerBQ4SNJlDREAE3pUC1aKiatQAb268BwsaAC+oJDMuKigAEQUwHiEJGQEYWq0jCxs0ZxEAO64vlI8-EKi4gBUoKpAA
[112]: https://www.typescriptlang.org/tsconfig#commonjs
[113]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlAGNZk8A7AK0mzHHtkQCcvYuXUyAA590oAN6gAbgENihUgHkAZgAVUoAL6hlvZKABEAOmA16kdDPrpIBgNyZMpAB4iuYsxdDp4sdaABeaTkFFX8AKlAAJjsgA
[114]: https://www.typescriptlang.org/tsconfig#umd
[115]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlEOX2zHADtZEAnF2FyTVZABw-SgA3qABuAQ2KFSAeQBmABVSgAvqDntkoAEQA6YAGNYDSOnEN0kbQG5MmUgA9+LQUZOD08WEtABeMZLS8j4AVKAATNZAA
[116]: https://www.typescriptlang.org/tsconfig#amd
[117]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlAENl9sxwA7WRAJ1dlck1WQAdO6UAG9QANyrFCpAPIAzAAqpQAX1ByOyUACIAdMADGsRpHRVG6SNoDcmTKQAeA1kKMmh6eLCWgAvOMlpeR8AKlAAJmsgA
[118]: https://www.typescriptlang.org/tsconfig#system
[119]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlEgE9J1TlsxwA7WRAJw9g8k1WQAHHulABvUADcAhsUKkA8gDMACqlABfUEu7JQAIgB0wAMawWdaS3SR9AbkyZSAD2EdRZi6PTxYa0AC8UrLyyv4AVKAATHZAA
[120]: https://www.typescriptlang.org/tsconfig#esnext
[121]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlFMgDtSAPLHcG2RAJ3dnck1WQAO3dKADeoAG4BDYoVIB5AGYAFVKAC+oRV2SgARADpgAY1g1I6KTXSQ9AbkyYGQ9iNPmR6eLFWgAvJIyckq+AFSgAEx2QA
[122]: https://www.typescriptlang.org/tsconfig#es2015es6es2020es2022
[123]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlFMgCYAGARgFZsxwA7WRAJ29m8iZUyAA790oAN6gAbgENihUgHkAZgAVUoAL6hVfZKABEAOmABjWO0jo57dJCMBuTJlIAPMdwmXrE9PCwmqAAvLIKSmrBAFSgNE5AA
[124]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/import
[125]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/import.meta
[126]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/await#top_level_await
[127]: https://www.typescriptlang.org/tsconfig#node16nodenext-nightly-builds
[128]: https://nodejs.org/api/esm.html
[129]: https://www.typescriptlang.org/docs/handbook/esm-node.html
[130]: https://www.typescriptlang.org/tsconfig#none
[131]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgs2ATAVwBsBTALlADtYrTsxwbEAnF2FyTVZABw-SgA3qABuAQ2KFSAeQBmABVSgAvqDntkoAEQA6YAGNakdOKrpI2gNyZMpAB78Wgo1ROh08WEtABeMZLS8j4AVKAATFZAA
[132]: https://www.typescriptlang.org/tsconfig#target
[133]: https://www.typescriptlang.org/tsconfig#moduleResolution
[134]: https://www.typescriptlang.org/tsconfig#esModuleInterop
[135]: https://www.typescriptlang.org/tsconfig#allowImportingTsExtensions
[136]: https://www.typescriptlang.org/tsconfig#allowArbitraryExtensions
[137]: https://www.typescriptlang.org/tsconfig#resolveJsonModule
[138]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-0.html
[139]: https://www.typescriptlang.org/tsconfig#moduleResolution
[140]: https://www.typescriptlang.org/tsconfig#module
[141]: https://www.typescriptlang.org/docs/handbook/module-resolution.html
[142]: https://www.typescriptlang.org/tsconfig#module
[143]: https://www.typescriptlang.org/tsconfig#module
[144]: https://www.typescriptlang.org/tsconfig#module
[145]: https://www.typescriptlang.org/tsconfig#paths
[146]: https://www.typescriptlang.org/tsconfig#baseUrl
[147]: https://www.typescriptlang.org/tsconfig#rootDirs
[148]: https://www.typescriptlang.org/tsconfig#moduleSuffixes
[149]: https://www.typescriptlang.org/tsconfig#customConditions
[150]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonExports
[151]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonImports
[152]: https://www.typescriptlang.org/tsconfig#moduleSuffixes
[153]: https://www.typescriptlang.org/tsconfig#moduleSuffixes
[154]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-7.html
[155]: https://www.typescriptlang.org/tsconfig#noResolve
[156]: https://www.typescriptlang.org/tsconfig#paths
[157]: https://www.typescriptlang.org/tsconfig#baseUrl
[158]: https://www.typescriptlang.org/docs/handbook/module-resolution.html#path-mapping
[159]: https://www.typescriptlang.org/tsconfig#resolveJsonModule
[160]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwHYDMaBQIIAzASwBtIA7AQwFtJVFIAXJ4igc0QDoArROCrgDeuUGNAAiaJAAOcCagkAVAJ4zIAZQDG0YjKYSANKPESAJtBULQhKqUbHxks5ABGAV3bXb9yLgC++GDgJOTUdKhsLgAeXEyIuMQ0ctBMoIwsbJw28DSSXMAZrBzcfAISANy4uEVZ3C4e7KAAvK2gTNDukFW1JVwWKi1taBVAA
[161]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGYBsB2AUCBNJInADYBukAUqQHYCycAJgK5mQFjgC2L7kVAGM4PPnQBWiLhD5sOAJRLlWAFwCWcOqjotOhcADN1HOgEMeg0IkiqNdAOaIAdFK14A3nlA-QAImIABzg-VD8AFQBPQMgAZSFodUDVPwAab18-ZmhI0NBDMzIbdN9-ZkgAI1YHPIKizgBfGSMTSHNLVHU6coAPZ1VpdR5g6FVrW3snfPgef2dgGzsup1d6PwBuPDxFyZdyqodQAF4T0FVoVkhNneW9nOPTtHWgA
[162]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonExports
[163]: https://nodejs.org/api/packages.html#exports
[164]: https://www.typescriptlang.org/tsconfig#moduleResolution
[165]: https://www.typescriptlang.org/tsconfig#moduleResolution
[166]: https://www.typescriptlang.org/tsconfig#moduleResolution
[167]: https://www.typescriptlang.org/tsconfig#customConditions
[168]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonImports
[169]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonImports
[170]: https://nodejs.org/api/packages.html#imports
[171]: https://www.typescriptlang.org/tsconfig#moduleResolution
[172]: https://www.typescriptlang.org/tsconfig#moduleResolution
[173]: https://www.typescriptlang.org/tsconfig#moduleResolution
[174]: https://www.typescriptlang.org/tsconfig#customConditions
[175]: https://www.typescriptlang.org/tsconfig#resolvePackageJsonExports
[176]: https://www.typescriptlang.org/tsconfig#rootDir
[177]: https://www.typescriptlang.org/tsconfig#composite
[178]: https://www.typescriptlang.org/tsconfig#outDir
[179]: https://www.typescriptlang.org/tsconfig#include
[180]: https://www.typescriptlang.org/tsconfig#exclude
[181]: https://www.typescriptlang.org/tsconfig#files
[182]: https://www.typescriptlang.org/tsconfig#outDir
[183]: https://www.typescriptlang.org/tsconfig#include
[184]: https://www.typescriptlang.org/tsconfig#outDir
[185]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-5.html
[186]: https://www.typescriptlang.org/tsconfig#rootDirs
[187]: https://www.typescriptlang.org/play/#code/PTAEAEDMEsBsFMB2BDAtvAXKVzqIHQDGAzsfgCb4AuxAUPAB4AOA9gE5WiEuLGfJMmAYVjJSoALygARDjwixxAGIBmAKJCATNIDctEKAC0xwgFcqxw-rBQ4SNJlB5yjanWipWHUAG9QA4VFxAF9QSDYWVBl8YDkCEmJdIA
[188]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[189]: https://www.typescriptlang.org/tsconfig#typeRoots
[190]: https://www.typescriptlang.org/tsconfig#types
[191]: https://www.typescriptlang.org/tsconfig#types
[192]: https://www.typescriptlang.org/tsconfig#what-does-this-affect
[193]: https://www.typescriptlang.org/tsconfig#typeRoots
[194]: https://www.typescriptlang.org/tsconfig#typeRoots
[195]: https://www.typescriptlang.org/tsconfig#typeRoots
[196]: https://www.typescriptlang.org/tsconfig#Emit_6246
[197]: https://www.typescriptlang.org/tsconfig#declaration
[198]: https://www.typescriptlang.org/play/#code/KYDwDg9gTgLgBAG2PAFsBCIHVoICZwC8cARCgJYkDcQA
[199]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAFMAeAHWAJ3VABttTpsyzYB1YsgE1AF5QAiaVTgbiA
[200]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgF3QUwCYDFUAbLALlFQDscsAPAOhzvUgCgQIYEUM2xxqAxoQCGAJ2HpUsCi1oAHWKPShiy6FkKFYAdUWEcoALygARNFQmA3EA
[201]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[202]: https://www.typescriptlang.org/tsconfig#outDir
[203]: https://www.typescriptlang.org/tsconfig#composite
[204]: https://www.typescriptlang.org/tsconfig#declarationDir
[205]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[206]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-0.html
[207]: https://www.typescriptlang.org/tsconfig#declarationDir
[208]: https://www.typescriptlang.org/tsconfig#declaration
[209]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[210]: https://www.typescriptlang.org/tsconfig#declarationMap
[211]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-9.html
[212]: https://www.typescriptlang.org/tsconfig#downlevelIteration
[213]: https://www.typescriptlang.org/tsconfig#example-effects-on-for--of
[214]: https://www.typescriptlang.org/play/#code/MYewdgzgLgBNBOMC8MBEAJApgG2yAhKgNwBQAZiIgBSiSwQwhlxTwCUMA3iTDLRCGyYAdHgDmVCG1IBfIA
[215]: https://www.typescriptlang.org/play/#code/PTAEAEBcEMCcHMCmkBcoCiBlArAKBBAM4AWA9gO7oC2AlpLgMakB2hkobsoAvKAEQAJRABthpAIR8A3LgBmpLgAomrdoVClZHSLACUoAN65QoFYVLDEAOjHxFhXTIC+QA
[216]: https://blog.jonnew.com/posts/poo-dot-length-equals-two
[217]: https://www.typescriptlang.org/play/#code/PTAEAEBcEMCcHMCmkBcoCiBlArAKBBACYD2A7gHYA2iAbopQJKSKzSQCWx5+Y4AzgAsy6ALbtIuAMZc+kULNigAvKABEACXqViAQlUBuXADNiigBTTys+aGJH5kWAEpQAb1yhQlvsWoA6bXgzPidDAF8gA
[218]: https://www.npmjs.com/package/tslib
[219]: https://www.typescriptlang.org/tsconfig#importHelpers
[220]: https://www.typescriptlang.org/play/#code/PTAEAEBcEMCcHMCmkBcoCiBlArAKBBACYD2A7gHYA2iAbopQJKSKzSQCWx5+Y47AtgAdisSAAl6glgGceEaQAsy6fu0i4Axl2mRQO2KAC8oAEQTKlYgEITAblwAzEaAAUW8jr2hiDvZFgAlKAA3rigoO7SxNQAdJbwLtIB9gC+QA
[221]: https://www.typescriptlang.org/tsconfig#example-effects-on-array-spreads
[222]: https://www.typescriptlang.org/tsconfig#importHelpers
[223]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-3.html
[224]: https://www.typescriptlang.org/tsconfig#emitBOM
[225]: https://wikipedia.org/wiki/Byte_order_mark
[226]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[227]: https://www.typescriptlang.org/tsconfig#declaration
[228]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-8.html
[229]: https://www.typescriptlang.org/tsconfig#importHelpers
[230]: https://www.npmjs.com/package/tslib
[231]: https://www.typescriptlang.org/tsconfig#downlevelIteration
[232]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgughgE4DmApugFyiIDKArNmOACYIB2ANiQG4nsYkE86VLFaYSADwAOsAulAAzAK6sAxsNGLWACkIFKrJcgBGAgNoBdAJSgA3plChVoyPL0AmUAF5QZgIwANKAAdKF6FgDcmAC+QA
[233]: https://www.typescriptlang.org/tsconfig#downlevelIteration
[234]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgughgE4DmApugFyiIDKArNmOACYIB2ANiQG4nsYkE86VLFYMIqZAAdYBdNF5SBkceFaxEBArJUkAHjLmgAZgFdWAY2GiTrABSEClVqeQAjAQG0AugEpQAN6YoKAWopDooI4ATKAAvKCeAIwANKAAdJmO3gDcmAC+QA
[235]: https://www.typescriptlang.org/tsconfig#noEmitHelpers
[236]: https://www.typescriptlang.org/tsconfig#noEmitHelpers
[237]: https://www.typescriptlang.org/tsconfig#downlevelIteration
[238]: https://www.typescriptlang.org/tsconfig#importsNotUsedAsValues
[239]: https://www.typescriptlang.org/tsconfig#verbatimModuleSyntax
[240]: https://www.typescriptlang.org/tsconfig#preserveValueImports
[241]: https://www.typescriptlang.org/tsconfig#verbatimModuleSyntax
[242]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-8.html
[243]: https://www.typescriptlang.org/tsconfig#inlineSourceMap
[244]: https://www.typescriptlang.org/tsconfig#sourceMap
[245]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAGNYDtJ1RoBTAGzNgHVYAnMgE1AF5QAiaVNgbh30lhkSAOkoBzABSkK1OowCU3IA
[246]: https://www.typescriptlang.org/play/#code/PTAEAEEsDsBsYKYGUD2BXATgYwQWQIYAOAUCBAM4AWKA7gKIC2kALsVitOc6JQrLCgDqKDLAAmoALygARJUgyA3Gw7kUsBADoBAcwAUvfkJHiAlIqA
[247]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-5.html
[248]: https://www.typescriptlang.org/tsconfig#inlineSources
[249]: https://www.typescriptlang.org/tsconfig#inlineSourceMap
[250]: https://www.typescriptlang.org/tsconfig#sourceMap
[251]: https://www.typescriptlang.org/tsconfig#inlineSourceMap
[252]: https://www.typescriptlang.org/play/#code/MYewdgzgLgBAFgUwDZJAdRAJyQExgXhgCI4BLIgbgChRIQkEA6VAcwApEV0tcBKCoA
[253]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAGNYDtJ1RoBTAGzNgHVYAnMgE1AF5QAiaVNgbh30lhkSAOkoBzABSkK1OowCU3IA
[254]: https://www.typescriptlang.org/tsconfig#inlineSourceMap
[255]: https://www.typescriptlang.org/tsconfig#inlineSourceMap
[256]: https://www.typescriptlang.org/play/#code/PTAEAEEsDsBsYKYGUD2BXATgYwQZwFAgQzzTLrYICyAhgA6Fji4AWKA7gKIC2kALviwpouPqBYJYsFAHUUGWABNQAXlAAiFpHUBuQcNwpYCAHTSA5gAoJU2fKUBKHUA
[257]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-5.html
[258]: https://www.typescriptlang.org/tsconfig#mapRoot
[259]: https://www.typescriptlang.org/tsconfig#newLine
[260]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-5.html
[261]: https://www.typescriptlang.org/tsconfig#noEmit
[262]: https://babeljs.io/
[263]: https://github.com/swc-project/swc
[264]: https://www.typescriptlang.org/tsconfig#noEmitHelpers
[265]: https://www.typescriptlang.org/tsconfig#importHelpers
[266]: https://www.typescriptlang.org/play/#code/MYewdgzgLgBA5gUygQQAoEkYF4YEMICeYwMAFAK4BOANgFwzSUCWYcAlNgHwwDeAUDBgB6ITADiSGGnQCYlJFTC8AvgG4+aoA
[267]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgughgE4DmApugFyiIDKArJgMawB2k6op6AggAoCSoALyg8kAJ7MGoABQBXAgBtKbAqmZEAlEIB8oAN6ZQoHAHEyoXn0OgCZec30BfANyYXQA
[268]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAgughgE4DmApugFyiIDKArNmOAHawoYASJANgA4kGRMAY1hNI6UKXQBBAAoBJUAF5QeSAE8mQ0AAoArgS6VxBVEyIBKZQD5QAb0yhQOAOJlQc+Y9AEyBpvYAvgDcmCFAA
[269]: https://www.typescriptlang.org/tsconfig#importHelpers
[270]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-5.html
[271]: https://www.typescriptlang.org/tsconfig#noEmitOnError
[272]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-4.html
[273]: https://www.typescriptlang.org/tsconfig#outDir
[274]: https://www.typescriptlang.org/tsconfig#rootDir
[275]: https://www.typescriptlang.org/tsconfig#out
[276]: https://www.typescriptlang.org/tsconfig#outFile
[277]: https://www.typescriptlang.org/tsconfig#outFile
[278]: https://www.typescriptlang.org/tsconfig#out
[279]: https://www.typescriptlang.org/tsconfig#outDir
[280]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-0.html
[281]: https://www.typescriptlang.org/tsconfig#preserveConstEnums
[282]: https://www.typescriptlang.org/play/#code/MYewdgzgLgBApmArgWxgQQDYCMUwN4BQMMAUgJbLICeAogIZQDqIAThgCYBiiUiLcEGAF4YARgA0RGABVEWAEpkwAcwBaIEAAkqABxBQAFgLKCRAJknEAIiGWc6EA2XBWToNO0QYocFlWEwAMySAL4EBKCQsBBwGHDAPuyYOKgiySgAdOSUtAzMbFw8fAIA3ARkAGYwABQxcQlwSdi4Qq3ozchZFNT0TKwc3Lz8EACU+FKRECBxGRi21QBE0gYMMCYwdDDK-KvABiBkwHAZCyNlIUA
[283]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAGNYDtJ1QBTPAV2VAEEAbAIwtAG9NRQApVZZAT0QEN0AdVgAnGgBMAYmXRlRxSKAC8oAIwAaVqAAqZOgCVUeAOYAtWLAASPAA6x00RaiWqATFrYARWCan8YVHwvF1wqCTIadGJRHhVQAGYtAF9MHHxCUEhiGmJsaIlaBkpVIooAOk5uPkERcWlZeUUAbkxUADNQAAps3PziQvpGZRHqIeRKrl4BYTFJGTkFSABKZm1cAlhc8ppfLoAiHWhBUBdQflATBRPsOFRsYnL95dbkoA
[284]: https://www.typescriptlang.org/play/#code/PTAEAEAcCcFMGdbQG6wMIHsB28AuBRLAVwFt4AuUXaI2AKBAngAsMB3fEgS1zoGNseULGIlQAQQA2AI1KgA3nVCgAUlxIkAnvgCGuAOoZokgCYAxIriJx4oALygAjABoloACpFpAJS5YA5gBaGBgAEpqQGLjMCFy2DgBMrsoAIhj+ZjosXNgpcQLiJkSSuEia9qAAzK4AvnT8grigiJKwfKUmUrJiDl2kAHRqGtp6hsbmltYIANx0XABmoAAULW0dfT12vTIDQ1q6BkamFlY2AJQKbgI4GK39kulLAETuzHqgcaA6oP5w73ysLh8WD9J5nWY1IA
[285]: https://www.typescriptlang.org/tsconfig#isolatedModules
[286]: https://www.typescriptlang.org/tsconfig#preserveValueImports
[287]: https://www.typescriptlang.org/tsconfig#verbatimModuleSyntax
[288]: https://www.typescriptlang.org/tsconfig#isolatedModules
[289]: https://www.typescriptlang.org/tsconfig#isolatedModules
[290]: https://www.typescriptlang.org/tsconfig#importsNotUsedAsValues
[291]: https://www.typescriptlang.org/tsconfig#verbatimModuleSyntax
[292]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-5.html
[293]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAggJwKbKwBu+AwrMsvgHbqQBco6uArvtgFSegAq0+ZrgCGNSABth6VLBqhYAM1AByABL5x42KHixc4gCbLQqOtoAKe9KwDm7SIM7BM+AB4AHK6ADGsyOlABTVgAdT1Dc14AIQAlUABeUAAiAHlxAEPQAFlWGgNYJIBuIA
[294]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAggJwKbKwBu+AwrMsvgHbqQBcoAZgIYA2k+2AVD6ABVo+UOlysakdq3SpYNULGagA5AAl87drFDxYudgBMVoVHR0AFfegCuAcxv4uoHsEz4AHgAdroAMbykOigwlqwAOr6RhYCAEIASqAAvKAARADy7ACHoACyNjSGsKkA3EA
[295]: https://www.typescriptlang.org/tsconfig#sourceMap
[296]: https://developer.mozilla.org/docs/Tools/Debugger/How_to/Use_a_source_map
[297]: https://www.typescriptlang.org/tsconfig#sourceRoot
[298]: https://www.typescriptlang.org/tsconfig#stripInternal
[299]: https://api-extractor.com/
[300]: https://www.typescriptlang.org/play/#code/PQKhCgAIUgRBDAngZ0vAbvAlgG3gIxwFNIsA7NSAdyKIGsoYABcgFyICcz4dHhwiADwAOAew6tIAY1FlkkgCZJkASTIBBAOq06kALyQA7AG5w4UDADCPKQFc87SAAtRVSAFtbUp5GSj3RLIkRPBcqOSUNPTQ-EJiEpAAZrZkUqxYstQ6OIgAyjyhiAAUSogASvDsAFyQZLbu+JwAlJAA3lCQHESstlyQpaoa2tEwpRXspgC+QA
[301]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgF3QUwCYDFUAbLALlFQDscsAPAOhzvUgCgQIYEUM2xxqAxoQCGAJ2HpUsCmwBUslqFmgAIsICekUMIBuwosIBGxchW2h4WLAGtFy8JWyiKwwneAtaAB1ij0oAWlIfxwNSABJCgBBAHUra1AAXlAAdgBuFjllAGFXAQBXEWxQOHhQZHyBaFBIWGQsaSxQLDEKLUpzSxslD29ffwAzfIoBSWkLeMJ1AGVXMXUAClD1ACUJUlAKfORDLFEASlAAb0VQUSx0fOdQZYjouO7lZbXsDIBfIA
[302]: https://www.typescriptlang.org/play/#code/PTAEAEGcBcCcEsAO8B20CmsUEMA2AoECSACwHsB3AUQFt5oMATAMXl3QC5RVH0APAHSMB0SITBRy1OtHEReAY1zZY2aPDIpCAKm35Q20ABFsAT0ihsAN2xtsAI3bcUl0BXToA1vsPhUGLDwfYHx+RDJYaFAFTRhQRjNIAEkUAEEAdQ9PUABeUAB2AG58HUMAYTwFAFdlDFApUBoqhRJQSDIadE10UHQVFAtUV3cvAxCwiKiAMyqUBXVNNyzcUwBlPBVTAAoE0wAlNU5QFCqae0wASlAAb31QWHRoKqx4xJSMrINX-cPigF8gA
[303]: https://www.typescriptlang.org/tsconfig#JavaScript_Support_6247
[304]: https://www.typescriptlang.org/tsconfig#allowJs
[305]: https://www.typescriptlang.org/play/#code/PTAEAEDMEsBsFMB2BDAtvAXKAxsgTgCYB0AVgM4BQ8AHgA4D2eALjvYmSwfJMgK6xMAwvgIAReNgDWoALygARAAl4+JvIDcQA
[306]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGYAMB2AUCBAGYCWANpAHYCGAtpKgMbXQAmAdAFaJ61ysBXCu0gAPAA4IALonatIRakKkBhFqwAikRgGtQAXlAAiABKQWUowG4CYALQPGAqQ7u3i5KnQagSleaLsMngktJLQUqAA3qDyispqbFq6oAC+oETwtMbswMxs1nh4jHCUiHDCZHAA5gAUcUpkqurJOgCUVkA
[307]: https://www.typescriptlang.org/play/#code/PTAEAEDMEsBsFMB2BDAtvAXKAxsgTgCYB0AVgM4BQqA9gQK4JHwAeADtXgC5lEHyTIGnAML4CAEXjYA1qAC8oAEQAJePk6KA3BRCgAtAex1OBvTrDhksWNQDuAKUq6ocJGkyhoiPsyLcK0KjsXKAA3qB8AkKihJIyoAC+oJB41KhKRMC4hFoUFNjUiGTUjDYA5gAUkYKwImJx0gCUmkA
[308]: https://www.typescriptlang.org/tsconfig#declaration
[309]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[310]: https://www.typescriptlang.org/docs/handbook/declaration-files/dts-from-js.html
[311]: https://www.typescriptlang.org/tsconfig#checkJs
[312]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[313]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[314]: https://www.typescriptlang.org/tsconfig#checkJs
[315]: https://www.typescriptlang.org/tsconfig#allowJs
[316]: https://www.typescriptlang.org/play/#code/PTAEAEEMBtoewO4CkDOAoEEBmBLaBTAO0gFt8AuUAYzkJQBdJD6UA6AK3RLgBMBXAq3wAPAA5wATi1aicoALyhRkCSnwAxeJHoAKAMysAjABYATAEoA3GgxhwuAsTKUchHiNYs0OEuKmgAbyU5AF9QLAk4ElAAIlZgGjpGZhQY60SUOEF4AHMdWSsgA
[317]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGYAsBWAUCBAIYA2JcA7gFYqgAu0ArpAWOAMYAWk7A1jagbNWEAGYBLEpAB2RALaRU7ONMR0i0uogB0NPHLgATRlO2QAHgAcEW7ZfGgAvKEtEkkAGLkidABQZtAEYsNABKAG48EXAJKVkFVHFpQwttLTxxOWtoOlAAbxcHAF9QUXg5UAAibWBlVXVNRErIusQ4U3IAc197CKA
[318]: https://www.typescriptlang.org/tsconfig#allowJs
[319]: https://www.typescriptlang.org/tsconfig#emitDeclarationOnly
[320]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-3.html
[321]: https://www.typescriptlang.org/tsconfig#maxNodeModuleJsDepth
[322]: https://www.typescriptlang.org/tsconfig#allowJs
[323]: https://www.typescriptlang.org/tsconfig#Editor_Support_6249
[324]: https://www.typescriptlang.org/tsconfig#disableSizeLimit
[325]: https://www.typescriptlang.org/tsconfig#plugins
[326]: https://github.com/xialvjun/ts-sql-plugin#readme
[327]: https://github.com/Microsoft/typescript-styled-plugin
[328]: https://github.com/Quramy/typescript-eslint-language-service
[329]: https://github.com/Quramy/ts-graphql-plugin
[330]: https://code.visualstudio.com/api/references/contribution-points#contributes.typescriptServerPlugins
[331]: https://www.typescriptlang.org/tsconfig#Interop_Constraints_6252
[332]: https://www.typescriptlang.org/tsconfig#allowSyntheticDefaultImports
[333]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygIwCYCsBOdacMAoECAYwAtIyBrAKURLHAEMAbNuAdwaYkkQBZOABMArm0gBJAHYAXGHAAOqAGbtEkPuFUBLSTJYBbSKjFz9AMTEyyFuDMQA6AFaNS4GXClGlbXWS6cgCCMgCeahpaZA6IcqAA5pByAMpy0LoyCQAykFlyFKAAvKAAFHHQAJTFAHygFU4GCQUA3ERERqISkE6QAB5KCHKIxaAA3kSgiclpGVm5+RQANEQAvm3aegbGpqCZIv1Ow0S6vkOg5vojqvBGoABETsCXbNa29o73GzGO8TE28RKL2cSVS6UyOTyzQopXuAGEqLRQHQUvdKi0gA
[334]: https://www.typescriptlang.org/tsconfig#esModuleInterop
[335]: https://www.typescriptlang.org/tsconfig#module
[336]: https://www.typescriptlang.org/tsconfig#module-resolution
[337]: https://www.typescriptlang.org/tsconfig#esModuleInterop
[338]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-8.html
[339]: https://www.typescriptlang.org/tsconfig#esModuleInterop
[340]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFECd7XgZwFAgigFtA7rALYCWALhmOAKYoCy0AJgK4A2VAkpKVUgA4BcoAGYBDFiioUIhRqyqCAxtEIzIAK3TFCvZKVAAqUCJTCTQpIVAAiISisBuNFp3w9AfWEXrLRsewO0NFsAOngqEQYAMWI2AGUAT0gFAAobGKpg0gAPUisAGmsmUiEADisASkc3YIVsJkgAa2SAbSsRfOsAIw6rBR6GKwBdAoAmSqA
[341]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFECd7XgZwFAgigFtA7rALYCWALhmOAKYoCy0AJgK4A2VAkpKVUgA4URCjVlQBcoAMbRCQyACt0xQr2SlQAKlABDFKABmuvUkKgARAdMBuNEpXw1AfX3GzLRjuxW0aAwDp4VFoMAGLEbADKAJ6QEgAU5mFUvqQAHqSmADRmTKR6ABymAJTWDr4S2EyQANaxANqmWplmAEZNphJtDKYAulkATMVAA
[342]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/hasOwnProperty
[343]: https://www.typescriptlang.org/tsconfig#importHelpers
[344]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFECd7XgZwFAgigFtA7rALYCWALhmOAKYoCy0AJgK4A2VAkpKVUgA4URihXslIAJKi1490mcIUasqALlABjaIQWQAVuiEj4pUACpQAQxSgAZletJCoAES2nAbjQHRoAPo2HziyMltjuaGi2AHTwVOYMAGLEbADKAJ6QagAULklUkaQAHqROADTOTKTWABxOAJQePpFq2EyQANaZANpO5qXOAEZ9TmpDDE4AumUATPVAA
[345]: https://www.typescriptlang.org/tsconfig#allowSyntheticDefaultImports
[346]: https://www.typescriptlang.org/tsconfig#module
[347]: https://www.typescriptlang.org/tsconfig#allowSyntheticDefaultImports
[348]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-7.html
[349]: https://www.typescriptlang.org/tsconfig#forceConsistentCasingInFileNames
[350]: https://www.typescriptlang.org/tsconfig#isolatedModules
[351]: https://babeljs.io/
[352]: https://www.typescriptlang.org/tsconfig#exports-of-non-value-identifiers
[353]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsFECd7XgZwFAEsC2AHZAXUAb1BWiwFMAVATxwoBpTyKAxAV0gGN8NpJQAX1AAzJFlAAiMpQCy0ACbsANhUkBuNGhltOPPpAAUASk1oKADzzxCJHbXpMdHbr35D1QA
[354]: https://www.typescriptlang.org/tsconfig#non-module-files
[355]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygIwCYAMAOAUCBAJaJwA2AhgC6QAmAsnLQK5mSJ4BmzAdgMZUicHqE48AFAEpQAbwC+QA
[356]: https://www.typescriptlang.org/tsconfig#references-to-const-enum-members
[357]: https://www.typescriptlang.org/play/#code/CYUwxgNghgTiAEYD2A7AzgF3iFBXAtvAHIEBGIMa8A3gFDzwBaFS8AvPAAwA098A8igQcAjLwC+tZOiQQQAOghIA5gAoS+cpXnMYrANTEyFNPMEgAlAG4gA
[358]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAggJwKbKwBu+AwrMsvgHbqSYAm+AxgDYCGBoLsNk6ULQCuyUADlRAI3y5IoAN6ZQoAFqzYoALygADABploAPI1820AEZDAX0y9+sNvgB0bWAHMAFJOQy5Luq4mgDUEtKykC6m+ACUANxAA
[359]: https://www.typescriptlang.org/tsconfig#preserveSymlinks
[360]: https://www.typescriptlang.org/tsconfig#verbatimModuleSyntax
[361]: https://nodejs.org/api/packages.html#type
[362]: https://github.com/microsoft/TypeScript/pull/52203
[363]: https://github.com/microsoft/TypeScript/issues/51479
[364]: https://www.typescriptlang.org/tsconfig#Backwards_Compatibility_6253
[365]: https://www.typescriptlang.org/tsconfig#charset
[366]: https://www.typescriptlang.org/tsconfig#keyofStringsOnly
[367]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-9.html#support-number-and-symbol-named-properties-with-keyof-and-mapped-types
[368]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-9.html
[369]: https://www.typescriptlang.org/tsconfig#noImplicitUseStrict
[370]: https://www.typescriptlang.org/tsconfig#noStrictGenericChecks
[371]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGY1oFA4C4CeADpKAIKgC8oAPACoA0oAqgHwAUAHqk6IahYBKam1ABtPiwC6AbgIkyAIWp0Aypx6g1zAdpFUx4ndrl4AZgFcAdgGN8ASzjXQ5jgENU5ZgCNUSkQBvHFBQH1V3WVAQUAB5AGsQ0HdVHyiYgFFYBBwAXyA
[372]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-4.html
[373]: https://www.typescriptlang.org/tsconfig#out
[374]: https://www.typescriptlang.org/tsconfig#outFile
[375]: https://www.typescriptlang.org/tsconfig#outDir
[376]: https://www.typescriptlang.org/tsconfig#outFile
[377]: https://www.typescriptlang.org/tsconfig#suppressExcessPropertyErrors
[378]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGY1oFABcBPAB0lAAU4BLAOz1AF5QBvUAD1WoFcBbAIxgDcoAhx79ooAL4CcAYzjVEdIqgo06jFu1ABGADTDUGA91Q6ADFIFA
[379]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-6.html#stricter-object-literal-assignment-checks
[380]: https://www.typescriptlang.org/tsconfig#suppressImplicitAnyIndexErrors
[381]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsEkFsAOAbAlgY1QFwIKQJ4BcoWATgK4CmAUCBAM7mKKmX30IobZ76yQATSgA8AoqVLRS9YgDMAhsno064emQxZiZKrTDhKEqTNAB2AAwBWAMzV00SOtDQARgCtQAXlABvUMOIARnNQAF8AbjsHemhkSgA6ZGgAcwAKVzcAbQAiWWhobIBdAEpwoA
[382]: https://www.typescriptlang.org/play/#code/PTAEAEDsHsEkFsAOAbAlgY1QFwIKQJ4BcoWATgK4CmAUCBAM5kZbFlXXrSSOjQBGAK1ABeUAG9QAD2IBGAAygAvgG5aYcFnoBaVAHMYpGp27RklAHTJougBT8BAbQBEAM2jQnAXQCUyoA
[383]: https://www.typescriptlang.org/tsconfig#noImplicitAny
[384]: https://www.typescriptlang.org/tsconfig#Language_and_Environment_6254
[385]: https://www.typescriptlang.org/tsconfig#emitDecoratorMetadata
[386]: https://www.npmjs.com/package/reflect-metadata
[387]: https://www.typescriptlang.org/play/#code/PTAEAEFMA8AdIE4EsC2kB2AXAhgGwCKQDGA9gtpmQM4BQAZgK7pGZInqgAyJA5gLKRMACxIATABQ1QoHAh6CAXKGzoAngBopoWAhLwEmVQGlIqpVUzJ0PUAB9QVVSgBGJXJumjIVIsliUEJQAFXX1DQh8-AJoASlAAby1SdCo3SAA6XF5xWXlMGIBuJPZU3AysnnEdPURDE1VC4pS0zOyvSKR-MkaAXxoaIlxsKipQQhQSBK1wbn5BEVEtWAZnXCQiUDoSEnFnbEDQdAYXRDjE6WkQUFFJ9BJhJGstPr6BksxryAnQAF5DyAA7mMvjtCkA
[388]: https://www.typescriptlang.org/play/#code/PTAEAEFMA8AdIE4EsC2kB2AXAhgGwCKQDGA9gtpmQM4BQIEVAFiQO4CiKSmNAZgK7oimJCXSgAMiQDmAWUiZmAEwAUNUKBwIp8gFyhs6AJ4AaNaFgIS8BJkMBpSIb1VMydFNAAfUFUMoARiS4puqKkFREyLCUCHoACpbWtoQRUTE0AJSgAN5mpOhUQZAAdLjSypramBkA3HmihbglZVLKFlaItg6GtfUFRaXlYalI0WS9AL40NES42FRUoIQoJDlm4JKy8kpmsHz+uEhEoDwkJMr+2LGg6HwBiFm56ur0iqvoJApI7mZTUzMNTCgMIrUAAXhukBYS0gK2UtSAA
[389]: https://www.typescriptlang.org/play/#code/PTAEAEFMA8AdIE4EsC2kB2AXAhgGwCKQDGA9gtpmQM4BQIEVAFiQO4CiKSmdYUnmhUuUoIAspBwATCthoAzAK7oimJCXSgAMiQDm4zM0kAKGqFA4EOiQC5Q2dAE8ANKdCwEJeAkwOA0pAdbKkxkdB1QAB9QKgcUACMSXBczSUgqImRYEVsABQ8vH0J0zJEaAEpQAG9XUnQqRMgAOlxdIwsrTDKAbhr1etwmlp0jd09EH38Hbt66hubW1OKkLLJpgF8aGiJcbCoqUEIUEirXcG09CUNXWAU43CQiUDkSEiM47ARbdAV4xArqsxmeiSY7oEgGJBhVwbDZbPqYUCpI6gAC8oHQkBYB0gRyM3SAA
[390]: https://www.typescriptlang.org/tsconfig#experimentalDecorators
[391]: https://www.typescriptlang.org/tsconfig#experimentalDecorators
[392]: https://github.com/tc39/proposal-decorators
[393]: https://www.typescriptlang.org/docs/handbook/decorators.html
[394]: https://www.typescriptlang.org/tsconfig#emitDecoratorMetadata
[395]: https://www.typescriptlang.org/tsconfig#jsx
[396]: https://www.typescriptlang.org/tsconfig#for-example
[397]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbrSATJNAGxSLhAlb1OSOACkAygA04Ab1Jw4wAHYwkUTOhEBRYSCQrZAX3mKVajWhEBJFVGUBnYGh1I9K+7JMKA2vYBccPYwdkoA5gC6AShKAJ4A3CbGxpRwAAL2ABYQAO5aIMAwFFSpShBaUDhQ9qRIAB6QsHBoEEpBcAASSJycEADq0JyscAC8cAAUAJQjAHxwADwZAIzTnd0QcNkDrHPkS9NxQA
[398]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbrSATJNAGxSLhAlb1OSOACkAygA04Ab1Jw4wAHYwkUTOhEBRYSCQrZAX3mKVajWhEBJFVGUBnYGh1I9K+7JMKA2vYBccPYwdkoA5gC6AShKAJ4A3CbGxpRwAAL2ABYQAO5aIMAwFFSpShBaUDhQ9kVpAFb2AB4BYET2agBuSKRIDZCwcGgQSkFwABJInJwQAOrQnKxwALxwABQAlEsAfHAAPBkAjJvjkxBw2XOsO+QHm3FAA
[399]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbrSATJNAGxSLhAlb1OSOACkAygA04Ab1Jw4wAHYwkUTOhEBRYSCQrZAX3mKVajWhEBJFVGUBnYGh1I9K+7JMKA2vYBccPYwdkoA5gC6AShKAJ4A3CbGxpRwAAL2ABYQAO5aIMAwFFSpShBaUDhQ9kVpAFb2AB4BROhMSigwwABuSKRIDZCwcGgQSkFwABJInJwQAOrQnKxwALxwABQAlKsAfHAAPBkAjDtTMxBw2Yus++THO3FAA
[400]: https://reactjs.org/blog/2020/09/22/introducing-the-new-jsx-transform.html
[401]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbrSATJNAGxSLhAlb1OSOACkAygA04Ab1Jw4wAHYwkUTOhEBRYSCQrZAX3mKVajWhEBJFVGUBnYGh1I9K+7JMKA2vYBccPYwdkoA5gC6AShKAJ4A3CbGxpRwAAL2ABYQAO5aIMAwFFSpShBaUDhQ9kVpAFb2AB4BROhM9Q2kSA2QsHBoEEpBcAASSJycEADq0JyscAC8cAAUAJQLAHxwADwZAIzro+MQcNkzrFvke+txQA
[402]: https://reactjs.org/blog/2020/09/22/introducing-the-new-jsx-transform.html
[403]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbrSATJNAGxSLhAlb1OSOACkAygA04Ab1Jw4wAHYwkUTOhEBRYSCQrZAX3mKVajWhEBJFVGUBnYGh1I9K+7JMKA2vYBccPYwdkoA5gC6AShKAJ4A3CbGxpRwAAL2ABYQAO5aIMAwFFSpShBaUDhQ9kVpAFb2AB4BROhM9Q3sAG6kSA2QsHBoEEpBcAASSJycEADq0JyscAC8cAAUAJTLAHxwADwZAIxbE1MQcNnzrLvkh1txQA
[404]: https://www.typescriptlang.org/tsconfig#jsxFactory
[405]: https://www.typescriptlang.org/tsconfig#jsxFragmentFactory
[406]: https://www.typescriptlang.org/tsconfig#jsxImportSource
[407]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-2.html
[408]: https://www.typescriptlang.org/tsconfig#jsxFactory
[409]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbqKqABAZwAsIB3AURDAYrOJx4ChMGEgAmAMWAAbJAC44wAHaykADwB0AKw6i2x3fPQxoAT3VdTmiPyg4oJymJgooAcyQw6kgcmnoinmwgELL0KupouFGaxqSkoJCwcADecFwANHDyUCi+IEia8AC+cNi4cABEYERW9QDcqQmaHPAAEkhKShAA6tBKsnAAvHAAFACUkwB8cAA8ssAAbgt9AxDL5GubrUA
[410]: https://babeljs.io/docs/en/babel-plugin-transform-react-jsx#custom
[411]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbqKAqVuAAQCsBnADzgALOK3KlQkWHADewuAF842XHABEYIuhhqA3KVJoIAO17wAEkgA2ViAHVoVgCZwAvHAAUASjcA+OAA8TsAAbr6WNhAB5MFhukA
[412]: https://www.typescriptlang.org/tsconfig#jsx
[413]: https://www.typescriptlang.org/tsconfig#jsxFragmentFactory
[414]: https://www.typescriptlang.org/tsconfig#jsxImportSource
[415]: https://www.typescriptlang.org/tsconfig#jsxFragmentFactory
[416]: https://www.typescriptlang.org/tsconfig#jsxFactory
[417]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbqKqABAZwAsIB3AURDAYrOJx4ChMGEgAmAMWAAbJAC44wAHaykADwB0AKw6i2x3fPQxoAT3VdT5+VBQBzEEk0xLGW+uduHl6mmhD8UDhQJpRiMChQrkgw6kgcmnoiMWwgELL0KupouDmaxqSkoJCwcADecFwANHAB7p7wAL5w2LhwAERgRFa9ANzlRZoc8AASSEpKEADq0EqycAC8cAAUAJTrAHxbpHBwADx7R8enssAAbnszcxAn5Nd3F8-n28NAA
[418]: https://babeljs.io/docs/en/babel-plugin-transform-react-jsx#fragments
[419]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbqKAqVuAAQCsBnADzgALOK3JsOPAQDEoKAOZxZCkEgB28MaVKhIsOAG9hAGiVz5qjXAC+cbLjgAiMEXQxHAbm1oIa3vAAJJAAbYIgAdWhggBM4AF44AAoASniAPiTSODgAHjSs7Nzo4AA3NKDQiBzyYrKC6vzkjyA
[420]: https://www.typescriptlang.org/tsconfig#jsx
[421]: https://www.typescriptlang.org/tsconfig#jsxFactory
[422]: https://www.typescriptlang.org/tsconfig#jsxImportSource
[423]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-0.html
[424]: https://www.typescriptlang.org/tsconfig#jsxImportSource
[425]: https://www.typescriptlang.org/tsconfig#jsx
[426]: https://reactjs.org/blog/2020/09/22/introducing-the-new-jsx-transform.html
[427]: https://www.typescriptlang.org/play/#code/PTAEAEGcAsHsHcCiBbAlgFwFAggO1ogE6GyGTZjgBWkAHgFyiECmAhgMboC0NtFEyWABMArgBtmjdrGSDcNfuHStCAc2bpGzSLma0sQ5uzErmoQaImgAUgGUAGqADemUKFS50zQgDMOZxAlkZk9nAF9Xd09vP3YzAElPQg9IVHZA5mDPSGdItwBtSEZIdGTcVQBdRlZcAE8AbkiIiNRkAAdSdFAAJTZOUB8SZFAAIhYOdBHGzB8RXE5UWFxQAEE2toAKAEpctxZ0EUJlgB5oAEYAPgAJZjExWFAAdVIxIWPgc4vGsKA
[428]: https://www.typescriptlang.org/play/#code/JYWwDg9gTgLgBAJQKYEMDG8BmUIjgcilQ3wCgB6cuAWlrQFcZbqKqABAZwAsIB3AURDAYrOGwBWHAB4BJcNBgBlCPShokALjhgi6EZTEwAnmCQctO4vvaSpW3Rmq3RbGCigBzJDC1mAdkhS1mIgEAAm9AA2mnBouKF+ki5+EPxQOFAcpKSBkLBwmPR+GMAQfnAAgmBgABQAlHAA3qRwcEQwquUAPFwAjAB8ABJIkZEQcADq0JFhXeR9-QDcpAC+QA
[429]: https://www.typescriptlang.org/tsconfig#jsx
[430]: https://www.typescriptlang.org/tsconfig#jsxFactory
[431]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-1.html
[432]: https://www.typescriptlang.org/tsconfig#lib
[433]: https://www.typescriptlang.org/tsconfig#target
[434]: https://www.typescriptlang.org/tsconfig#target
[435]: https://devblogs.microsoft.com/typescript/announcing-typescript-4-5-beta/#supporting-lib-from-node_modules
[436]: https://www.typescriptlang.org/tsconfig#high-level-libraries
[437]: https://developer.mozilla.org/docs/Glossary/DOM
[438]: https://developer.mozilla.org/docs/Web/API/Web_Workers_API/Using_web_workers
[439]: https://wikipedia.org/wiki/Windows_Script_Host
[440]: https://www.typescriptlang.org/tsconfig#individual-library-components
[441]: https://github.com/microsoft/TypeScript/tree/main/src/lib
[442]: https://www.typescriptlang.org/tsconfig#noLib
[443]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[444]: https://www.typescriptlang.org/tsconfig#moduleDetection
[445]: https://www.typescriptlang.org/docs/handbook/2/modules.html#how-javascript-modules-are-defined
[446]: https://www.typescriptlang.org/tsconfig#module
[447]: https://www.typescriptlang.org/tsconfig#jsx
[448]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-7.html
[449]: https://www.typescriptlang.org/tsconfig#noLib
[450]: https://www.typescriptlang.org/tsconfig#lib
[451]: https://www.typescriptlang.org/tsconfig#reactNamespace
[452]: https://www.typescriptlang.org/tsconfig#jsxFactory
[453]: https://www.typescriptlang.org/tsconfig#target
[454]: https://www.typescriptlang.org/tsconfig#lib
[455]: https://github.com/tsconfig/bases#centralized-recommendations-for-tsconfig-bases
[456]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-1-0.html
[457]: https://www.typescriptlang.org/tsconfig#useDefineForClassFields
[458]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-7.html#the-usedefineforclassfields-flag-and-the-declare-property-modifier
[459]: https://www.typescriptlang.org/tsconfig#target
[460]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-7.html
[461]: https://www.typescriptlang.org/tsconfig#Compiler_Diagnostics_6251
[462]: https://www.typescriptlang.org/tsconfig#diagnostics
[463]: https://www.typescriptlang.org/tsconfig#extendedDiagnostics
[464]: https://www.typescriptlang.org/tsconfig#extendedDiagnostics
[465]: https://www.typescriptlang.org/tsconfig#extendedDiagnostics
[466]: https://www.typescriptlang.org/tsconfig#explainFiles
[467]: https://www.typescriptlang.org/tsconfig#target
[468]: https://www.typescriptlang.org/tsconfig#include
[469]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-2.html
[470]: https://www.typescriptlang.org/tsconfig#extendedDiagnostics
[471]: https://github.com/microsoft/TypeScript/wiki/Performance
[472]: https://www.typescriptlang.org/tsconfig#diagnostics
[473]: https://www.typescriptlang.org/tsconfig#generateCpuProfile
[474]: https://developers.google.com/web/tools/chrome-devtools/rendering-tools/js-execution
[475]: https://github.com/microsoft/TypeScript/wiki/Performance
[476]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-7.html
[477]: https://www.typescriptlang.org/tsconfig#listEmittedFiles
[478]: https://www.typescriptlang.org/tsconfig#Project_Files_0
[479]: https://www.typescriptlang.org/tsconfig#listFiles
[480]: https://www.typescriptlang.org/tsconfig#explainFiles
[481]: https://www.typescriptlang.org/tsconfig#explainFiles
[482]: https://www.typescriptlang.org/tsconfig#traceResolution
[483]: https://www.typescriptlang.org/docs/handbook/module-resolution.html#tracing-module-resolution
[484]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[485]: https://www.typescriptlang.org/tsconfig#Projects_6255
[486]: https://www.typescriptlang.org/tsconfig#composite
[487]: https://www.typescriptlang.org/tsconfig#rootDir
[488]: https://www.typescriptlang.org/tsconfig#include
[489]: https://www.typescriptlang.org/tsconfig#files
[490]: https://www.typescriptlang.org/tsconfig#declaration
[491]: https://www.typescriptlang.org/docs/handbook/project-references.html
[492]: https://www.typescriptlang.org/tsconfig#incremental
[493]: https://www.typescriptlang.org/tsconfig#tsBuildInfoFile
[494]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-0.html
[495]: https://www.typescriptlang.org/tsconfig#disableReferencedProjectLoad
[496]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-0.html
[497]: https://www.typescriptlang.org/tsconfig#disableSolutionSearching
[498]: https://www.typescriptlang.org/docs/handbook/project-references.html
[499]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-8.html
[500]: https://www.typescriptlang.org/tsconfig#disableSourceOfProjectReferenceRedirect
[501]: https://www.typescriptlang.org/docs/handbook/project-references.html
[502]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-7.html#build-free-editing-with-project-references
[503]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-7.html
[504]: https://www.typescriptlang.org/tsconfig#incremental
[505]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-4.html#faster-subsequent-builds-with-the---incremental-flag
[506]: https://www.typescriptlang.org/tsconfig#tsBuildInfoFile
[507]: https://www.typescriptlang.org/tsconfig#composite
[508]: https://www.typescriptlang.org/tsconfig#composite
[509]: https://www.typescriptlang.org/tsconfig#tsBuildInfoFile
[510]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-4.html
[511]: https://www.typescriptlang.org/tsconfig#tsBuildInfoFile
[512]: https://www.typescriptlang.org/docs/handbook/project-references.html
[513]: https://www.typescriptlang.org/tsconfig#incremental
[514]: https://www.typescriptlang.org/tsconfig#composite
[515]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-4.html
[516]: https://www.typescriptlang.org/tsconfig#Output_Formatting_6256
[517]: https://www.typescriptlang.org/tsconfig#noErrorTruncation
[518]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGY1vQFgKy4BQAbgIbSgAeqA3kaKAA7xMwAuAngOoCW7ACwCCAOwCiVAMaRIAE14iA5gBtOAGThKAcmQC2kAIypE7aAsUBuBs1Yce-YeKkz5S1Ru17IaY6fNXGFjg2aC4+QVEJaTlzd01FHX0MXzMlAJtgu3DHKJdY9XjEyFwU-2sgkLCHSOcYtwLPfXxStPLbUPsIp2jXFQaErwA2Fss2zI7smp78jwH9AHYR9Iqs6u68+tmigA4logBfKyIQUABlPyVQaEgWSERIEXYydl5NUDgAM1AuNnevgHIqP9QIgBHAAK7KWSgABGkG+0HBIkkzzkoAUoBg8Eo+kQiDIikgpAoIJGoAAvNQLEA
[519]: https://www.typescriptlang.org/play/#code/PTAEAEFMCdoe2gZwFygEwGY1vQFgKy4BQIEAdnAKKwIAq0ArmQMYCGALgJZxmruOQiAN1bRQAD1QBvIqFAAHePJjsAngHVO7ABYBBMpXHNIkACacyAcwA2qgDI9LAOVYBbSAEZUifhcsBuWQUlFQ0tPQMjE3MrWwcrF3c0b18rQLlFOGVoNU0dfUNjMz84x0TIDBToP3TgrNC8iMLokvsyt0hcKpqgzOzc8IKo4ti2hI78brTekJyw-MiimJsx5w6ANimAmfq5xqGl1vi19wB2Ldq+hsHFltHj8oAOC6IAX0CSMABlVMtQaEgikgiEgZHYHG4ZFAcAAZqA1MpoXCAOTiZGgRDaOAMaymUAAI0g8MYLA4ZlAFlAMHgYnciEQrEsghEYhQGN+oAAvBJ-EA
[520]: https://www.typescriptlang.org/tsconfig#preserveWatchOutput
[521]: https://www.typescriptlang.org/tsconfig#pretty
[522]: https://www.typescriptlang.org/tsconfig#Completeness_6257
[523]: https://www.typescriptlang.org/tsconfig#skipDefaultLibCheck
[524]: https://www.typescriptlang.org/tsconfig#skipLibCheck
[525]: https://www.typescriptlang.org/tsconfig#skipLibCheck
[526]: https://yarnpkg.com/lang/en/docs/selective-version-resolutions/
[527]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-4-5.html#supporting-lib-from-node_modules
[528]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-2-0.html
[529]: https://www.typescriptlang.org/tsconfig#Command_line_Options_6171
[530]: https://www.typescriptlang.org/tsconfig#Watch_and_Build_Modes_6250
[531]: https://www.typescriptlang.org/tsconfig#assumeChangesOnlyAffectDirectDependencies
[532]: https://www.typescriptlang.org/docs/handbook/release-notes/typescript-3-8.html
