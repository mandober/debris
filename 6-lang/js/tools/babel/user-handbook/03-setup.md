# Setup Babel

<!-- TOC -->

- [babel-cli](#babel-cli)
- [babel-register](#babel-register)
- [babel-node](#babel-node)
- [babel-core](#babel-core)

<!-- /TOC -->

## babel-cli

**Babel CLI - global**
- Babel's CLI is used to compile files with Babel from the command line
- install it globally: `npm install --global babel-cli`
- compile a file: `babel index.js -o compiled.js`
- compile a dir: `babel src --out-dir lib`

**Babel CLI - project**
- install Babel CLI locally: `npm install --save-dev babel-cli`
- put commands in npm scripts which will use local (package's) Babel
- in `scripts` in `package.json` put: `"build": "babel src -d lib"`
- from then on run: `npm run build`

## babel-register
- allows running Babel just by requiring files
- not meant for production, better compile ahead of time, before deploying, 

Excellent for tinkering locally during dev
- create `index.js`
- if run with `node index.js` it wouldn't be Babeled,so setup `babel-register`
- install it: `npm install --save-dev babel-register`
- create `register.js` with: `require("babel-register"); require("./index.js");`
- this registers Babel in Node's module system and compiles `require`d files
- then use `node register.js`

You can't register Babel in the same file that you want to compile. As node is executing the file before Babel has a chance to compile it.

```js
require("babel-register");
// not compiled:
console.log("Hello world!");
```

## babel-node
- use `babel-node` CLI as a drop in replacement for `node` CLI
- not for production
- install `babel-cli`, then replace `node` with `babel-node`
- tip: you can also use [npm-run](https://www.npmjs.com/package/npm-run)

## babel-core
- to use Babel programmatically use `babel-core` package
- install it: `npm install babel-core`
- require it: ```var babel = require("babel-core")```
- compile js string directly using:

```js
babel.transform("code();", options);
// => { code, map, ast }
```

If you are working with files you can use either the **asynchronous api**:
```js
babel.transformFile("filename.js", options, function(err, result) {
  result; // => { code, map, ast }
});
```

or the **synchronous api**:
```js
babel.transformFileSync("filename.js", options);
// => { code, map, ast }
```

If you already have a Babel AST for whatever reason you may transform from the
AST directly.
```js
babel.transformFromAst(ast, code, options);
// => { code, map, ast }
```
For all of the above methods, `options` refers to
https://babeljs.io/docs/usage/api/#options
