---
downloaded:       2023-08-25
page-url:         https://blog.openreplay.com/improving-code-quality-in-typescript-with-compiler-options/
article-title:    Improving code quality in Typescript with compiler options
---
# Improving code quality in Typescript with compiler options
[Typescript][1] is a programming language developed by Microsoft to bring about security in terms of strict type-checking and type safety, for the Javascript language. It is a superset of Javascript that also compiles to Javascript. TypeScript provides several *compiler options* that change the way it operates. These options have various important uses, like removing comments or adding a base URL for resolving module names.

In this article, we will look at options for improving code quality in Typescript by appropriately setting some options.

## The tsconfig.json file

The `tsconfig.json` file houses all compiler options. The presence shows and specifies the presence of the Typescript project root. The file can be gotten by typing the `tsc --init` command in the terminal. Below are some examples of some compiler options

```
{
    "compilerOptions": {
        "module": "system",
        "noImplicitAny": true,
        "removeComments": true,
        "allowUnreachableCode": false,
        "strictNullChecks": true,
        "target": "es5", 
        "module": "commonjs", 
        "rootDir": ".",
        "outDir": "../dist/",
        "sourceMap": true 
    }
}
```

In this article we will talk about improving code quality with the `noUnusedLocals`, `noUnusedParameters`, `noImplicitReturns`, `noFallthroughCasesInSwitch`, `strictNullChecks`, `noImplicitAny`, `noImplicitThis`, and `strictBindCallApply` options.

## `noUnusedLocals`

With this option set to true, the compiler will check and generate errors on unused local variables, in a way similar to the `no-unused-vars` in [ESLint][2]. This compiler option aims at eliminating and removing unused variables in Typescript. Consider the example below:

```
const numHandler = (input: number) => {
  let digits;
  return input;
};
```

In the example above, we defined a function called `numHandler`, which takes a parameter of type number. Next, we defined a `digits` variable and returned the input parameter. When we compile the above code, we get presented with the error below from the terminal:

```
error TS6133: 'digits' is declared but its value is never read
```

This error is produced because we declared the `digits` variable without using it. You can get rid of this error by using the declared value somewhere in the code, or by setting the option in the tsconfig.json file to false.

## `noUnusedParameter`

This compiler option is somewhat similar to the `noUnusedLocals` option. The difference is that while `noUnusedLocals` generate an error on unused local variables, `noUnusedParameter` generates an error when function parameters are declared but aren’t used. Consider the example below:

```
const anExample = (input: string) => {
  const someStrings = 'The name is Isaac'
  return { true, someStrings };
};
```

We defined a function called `anExample`, which takes a type `string` parameter. Next, we defined a variable called `someStrings` and then returned a boolean value and the defined variable. When we compile the above code, we get presented with the error below from the terminal:

```
error TS6133: 'input' is declared but its value is never read
```

This happens because we declared the `input` parameter in the function without using it. You can get rid of this error by using the declared parameter in the function body or by setting the option in the `tsconfig.json` file to false.

## `noImplicitReturns`

This compiler option ensures that any function with a return declaration returns something. This option generates an error when a code path in a function doesn’t return a value. Consider the example below:

```
function add(input: number, output: number) {
  if (input + output > 0) {
    return input + output;
  }
}
```

In the example above, we defined a function with two parameters of type number. Next, we set an if statement, which checks that the sum of both parameters is greater than zero, and then it returns that sum. With this compiler option set to true, the compiler raises the type error below:

```
error TS7030: Not all code paths return a value.
```

Typescript detects here that not all the code paths return something. There is no `return` statement for when the sum of the arguments isn’t positive, and this can introduce bugs into our code because the above function will return undefined. To resolve this issue, make sure that all parts of the code return something. Consider the solution to the above code below:

```
function add(input: number, output: number) {
  if (input + output > 0) {
    return input + output;
  }
  return
}
```

By using the return keyword, we ensure that all parts of our code return something. The compiler option helped us detect a possible missing situation, and avoid an error.

## Open Source Session Replay

*[OpenReplay][3] is an open-source, session replay suite that lets you see what users do on your web app, helping you troubleshoot issues faster. OpenReplay is self-hosted for full control over your data.*

*Start enjoying your debugging experience - [start using OpenReplay for free][4].*

## `noFallthroughCasesInSwitch`

When set to true, this compiler option generates errors whenever we have `switch` statements that flow from one branch to the other without either a `break` or `return` keyword. Consider the example below:

```
let name = 'Isaac';
  
switch (name) {
  case 'Isaac':
    console.log('Isaac is a developer');
  case 'John':
    console.log('John is my friend');
    break;           
}
```

When we compile the code above, we get the error below.

```
error TS7029: Fallthrough case in switch
```

This happens because there is an omitted `break` keyword in the branch of the first `switch` statement. There might be times that you might have valid reasons for omitting said `break` keyword, but it often is a bug. Some solutions to this are:

-   Set noFallthroughCasesInSwitch to false in the `tsconfig.json` file
-   Use the `// @ts-ignore` command to suppress the error

## `strictNullChecks`

This compiler option checks instances where Typescript expects a concrete type (number, string, boolean) but gets null or undefined when set to true. This option helps us eliminate `Uncaught TypeError` errors.Consider the example below:

```
let title: string;
name = title;
console.log(name);
```

When we compile and run the code above, we get the error below:

```
error TS2454: Variable 'title' is used before being assigned
```

The solution to this error is to assign a value to the variable before using it, as we see in the code block below:

```
let title: string = "Student"
name = title
console.log(name) 
```

## `noImplicitAny`

Every variable in Typescript has a type; either we define the type or Typescript tries to guess at it. Consider the example below:

```
function value(a) {
  return;
}
```

In the code block above, we have a function with an argument of `a`; since we didn’t define the type for that argument, then Typescript infers that the argument has an `any` type. With this compiler option set to true, the compiler generates the error below:

```
error TS7006: Parameter 'a' implicitly has an 'any' type
```

The solution to this is to make sure that you correctly define the type for every argument.

## `noImplicitThis`

With this compiler option set to true, Typescript will complain wherever there are instances where we are using the `this` keyword improperly or in a place that is not clear where the `this` refers to.

```
class Person {
  weight: number;
  height: number;
  
  constructor(weight: number, height: number) {
    this.weight = weight;
    this.height = height;
  }
  
  getBodyMassIndex() {
    return function () {
      return this.weight / (this.height * this.height);
    };
  }
}
```

We get the error below when we compile the code above due to scoping in Javascript. This is because the context of the `this` keyword is not bound to any instance of `Person` by default.

```
error TS2683: 'this' implicitly has type 'any' because it does not have a type annotation
```

The solution to this is arrow functions. This will work because arrow functions [use the parent’s execution context][5]:

```
class Person {
  weight: number;
  height: number;
  
  constructor(weight: number, height: number) {
    this.weight = weight;
    this.height = height;
  }
  
  getBodyMassIndex() {
    return () => {
      return this.weight / (this.height * this.height);
    };
  }
}
```

## `strictBindCallApply`

This compiler option ensures that you are using the `call()`, `bind()` and `apply()` functions with the right arguments.

```
const numHandler = (a: number) ={
  console.log(`log ${a}!`);
}

numHandler.call(undefined, 'Isaac')
```

When we run the above code with this compiler option set to true, we get an error:

```
error TS2345: Argument of type 'string' is not assignable to parameter of type 'number'
```

To resolve this, we need to pass in the correct argument, and the error will be resolved.

```
const numHandler = (a: number) ={
  console.log(`log ${a}!`)
}
    
numHandler.call(undefined, '25')
```

## Conclusion

In this article, we looked at some compiler options, the errors they generate, how to solve them and how to improve code quality by using them. Many other compiler options can help with code quality, and you can check them out [here][6].

[1]: https://www.typescriptlang.org/
[2]: https://eslint.org/docs/rules/no-unused-vars
[3]: https://github.com/openreplay/openreplay
[4]: https://github.com/openreplay/openreplay
[5]: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Functions#arrow_functions
[6]: https://www.typescriptlang.org/tsconfig
