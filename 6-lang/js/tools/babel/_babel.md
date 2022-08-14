Exploring Babel

repo: js-exploring-babel

ref: [https://github.com/thejameskyle/babel-handbook/blob/master/translations/en/user-handbook.md]



# Setting up Babel

## `babel-cli`

compile file (`-o|--out-file`):
`babel index.js -o bundle.js`

compile directory (`-d|--out-dir`):
`babel src --out-dir lib`


## `babel-register`

This option allows to run Babel just by requiring files.

create a register.js file in the project and write the following code:
`require("babel-register");`
`require("./index.js");`

What this does is registers Babel in Node's module system and begins compiling every file that is require'd.

Now, instead of running `node index.js` we can use `register.js` instead.
`node register.js`

## `babel-node`

If you are just running some code via the node CLI the easiest way to integrate Babel might be to use the babel-node CLI which largely is just a drop in replacement for the node CLI.

First make sure that you have babel-cli installed, then replace wherever you are running node with `babel-node`.

## `babel-core`

If you need to use Babel programmatically for some reason, you can use the babel-core package itself.




# Configuring Babel
[http://babeljs.io/docs/setup]

`.babelrc`
Configuration file; create it at the root of your project.



## Presets

`babel-preset-es2015`
ES6 to ES5

`babel-preset-es2016`
ES2016(ES7) to ES6

`babel-preset-es2017`
Only compiles what's in ES2017 to ES2016

`babel-preset-env`
a preset that configures Babel for you
[http://2ality.com/2017/02/babel-preset-env.html]
[https://babeljs.io/docs/plugins/preset-env/]
This is a special preset that will contain all yearly presets so user’s won’t need to specify each one individually. It currently includes: es2017, es2016, es2015

`babel-preset-react`
Setup for React

`babel-preset-stage-`x
where x is 0-3
There is no stage-4 preset as it is simply the es2015 preset above.


Many other presets on npm:
[https://www.npmjs.com/search?q=babel-preset]


# Executing Babel-generated code








