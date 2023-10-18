# Expressions

- expressions vs statements
- expression statement vs statement expression
- comma operator
- parenthesis
  - grouping parenthesis
  - function-call parenthesis
  - expression-making parenthesis
    - parens around a function statement -> function expression
  - expression-disambiguating parenthesis
    - returning an object from an arrow function is interpreted as a label and a code block - wrap obj in parens to regain its identity
- arrow functions bind outer scope's `this`
- maintaining expression mode in arrows
  - sneak var declaration and init as an extra param with default value
  - use comma operator to sequence "expressions": all evaled, last returned
  - assignment is an exp - the assigned value is returned; but if a new var is needed, declaration is a hard statement

## Expression mode

JS arrow functions might be one of the syntactically nicest realizations of succinct lambda denotations. Lambda abstraction, `λx.x`, takes the short cake, but JS is not far behind with `x => x`, the same as Haskell with `\x -> x`. Never again will JS get so close to Haskell, it almost felt functional for a moment there until the reality set in: unless the "expression mode" is maintained, the body of an arrow function will require braces and an explicit return statement, as well as parens around the formal params if more than one is introduced (in the same tuple-of-args), regressing into this 'orrible beast: `(x, y) => { let z = 2; return z ** x + y }`.

An arrow is pretty for as long as it remains single-parameterized and its body expressive; unbraced and free of explicit returns. "Brace for a statement!", the sudden announcement terminated the body language with semicolons. Real functional programmers hate semicolons, so avoid them as plague (functional programmers, that is). Avoid redundant syntax whenever possible - wrapping layers of parens and braces around code blocks serves no purpose unless it does; as a precaution and a matter of fact, avoid all syntax if possible. No, let *pretty* the linter prettify the code for you and as per your instructions; on save, paste or whenever possible. It tends to get annoying whenever possible.


## My God, it's full of functions!

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
