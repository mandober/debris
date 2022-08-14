# Decorators

Decorators Proposal
https://github.com/wycats/javascript-decorators

Exploring EcmaScript Decorators
https://medium.com/google-developers/exploring-es7-decorators-76ecb65fb841

Reserved decorator-like syntax
https://github.com/littledan/proposal-reserved-decorator-like-syntax


Decorators make it possible to annotate and modify classes and properties at design time. While ES5 object literals support arbitrary expressions in the value position, *ES6 classes only support literal functions as values*. Decorators restore the ability to run code at design time, while maintaining a declarative syntax.

A decorator is:
- an expression
- that evaluates to a function
- that takes the target, name, and decorator descriptor as arguments
- and optionally returns a decorator descriptor to install on the target object

`@` introduces a decorator and `mydecorator` references a function by that name. A decorator takes the function being decorated as an argument and returns the decorated function.

Basically, it is just a sugar for calling a HOF (a functional) with a function as an argument, e.g.

```js
// before
const f_curried = curry(f);
// and now we use the decorated `f_curried`

// after, with decorators

@curry
function f(a,b,c) {
    return a+b+c;
}
```

Decorators are convenience for endowing functions and other syntactic forms (classes, properties, and object literals) with extra functionality, such as currying, memoization, enforced access control and authentication, instrumentation, timed functions, logging, throttling, defering, etc.
