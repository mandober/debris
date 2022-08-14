# Expressions

- expressions
- statements
- expression statement
- statement expression
- comma operator
- comma as a list items separator
- grouping parenthesis
- function-call parenthesis
- returning an object parenthesis
- arrow functions
- maintaining expression mode in an arrow function
- parameter declaration


## My God, it's Full of Functions!

JS is a very dynamic bipolar language, having both expressions and statements, expression statements and statement expressions. Without even mentioning closures, constructors, reentrant functions, generators, async functions, callbacks, continuations or recursive functions, a plain old JS function has a million shapes: function declaration, function statement, function declaration statement, function definition, function expression, arrow function, arrow function expression, anonymous function, anonymous function expression relatively anonymous function expression (for it may reference itself from within itself by opting-in to make use of its internal name).

However, in the spirit of the Programmers Union's slogan, "ball -> maskenball" (loosely translated "if we're to have a ball, we might as well have a masquerade ball"), the overkill tradiotion introduced even more names: immediately-invoked function expression or IIFE which came to be the first language idiom to have a pet name. "Jiffy" has spawned a few own versions, such as plus Jiffy, stylized as +(Jiffy); bang Jiffy, stylized as !(Jiffy); "Jiffy and the Parenthesis"; with the last exciting a split into "Jiffy and the Function Call" vs "Jiffy wraps-it-all", sometimes "Jiffy wraps-the-call".


## Single-expression arrow function

The most favourable form for a function is the slander *arrow function*. But even arrows come in several flavours, and the only one that permits us to shed almost all of the boilerplate is *the single-expression arrow function* SEAF.

```js
// the beauty
const id = x => x

// and the beast
const id = function(x) {
    return x
}
```

SEAF has an implicit return - since its body is a single expression, it is clear what is implicitly returned. Also, as long as that is the case, the body of a SEAF dose not require parenthesis-wrapping. However, it's hard to keep the good looks; triggering any kinds of statement means wrapping the body in braces and employing the return keyword.

Concerning the parameters, a nullary function requires the presence of the empty pair of parens, and unary function is the only one that does not. All other (poliadic) functions require parenthesis.

```js
const nullary = ()     => 42
const unary   = x      => x
const binary  = (x, y) => x + y
```

Converting a poliadic function into a curryied form, allows us to get rid of parens around param list; however, this places the burden of parenthesis on the call site (well alright! let the client deal with it).

```js
// AUTHOR
//
// "tuple" function definition
const sum = (a, b, c, d) => a + b + c + d
//
// "curry" function definition
const sum = a => b => c => d => a + b + c + d


// CLIENT
//
// "tuple" function call
sum(5, 15, 20, 25)
//
// "curry" function call, "the squeeze"
sum(5)(15)(20)(25)
// "curry" function call, "spread 'em"
sum (5) (15) (20) (25)
```

A single param does not require parens, unless it is used with the rest operator or with a default value.

```js
const f = fs          => { }
const f = (...fs)     => { }
const f = (z = 2)     => { }
```


## Tips

Maintaining the expression mode in an arrow function lest break into the statement mode.

- declare needed vars as default params
- use lists with a comma operator to make assignments


```js
const fun = (f, x, ...arr) =>

    // defining a new var (decl + assignment) -> split it, move decl
    // to be a default param, use list with comma op to make assignment
    const k = f.length;

    // destructuring
    const [x, ...xs] = arr;

    return f(x);
;


const fun = f => x => ([x, ...xs]) => (k = f.length) =>
    // rebound k but only return f(x)
    (k = xs.length, f(x))
;
```
