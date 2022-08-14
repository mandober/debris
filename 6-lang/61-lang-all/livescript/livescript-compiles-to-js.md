---
downloaded:       2022-02-12
page-url:         http://livescript.net/#introduction
page-title:       LiveScript - a language which compiles to JavaScript
article-title:    a language which compiles to JavaScript
---
# LiveScript - a language which compiles to JavaScript

LiveScript is a language which compiles to JavaScript. It has a straightforward mapping to JavaScript and allows you to write expressive code devoid of repetitive boilerplate. While LiveScript adds many features to assist in functional style programming, it also has many improvements for object oriented and imperative programming.
## Overview

**LiveScript** is a language which **compiles to JavaScript**. It has a straightforward mapping to JavaScript and allows you to write expressive code devoid of repetitive boilerplate. While LiveScript adds many features to assist in functional style programming, it also has many improvements for object oriented and imperative programming.

LiveScript is a fork of [Coco][1] and an indirect descendant of CoffeeScript, with which it has much [compatibility][2].

**`npm install -g livescript`**

[Follow @gkzahariev][3] for updates on LiveScript.

Featured blog post: **[LiveScript 1.4.0 - Source Maps and more!][4]**

Double-click an example to load it into the compiler/REPL. Docs in French: [Français][5].

### Some Examples

##### LiveScript

\# Easy listing of implicit objects table1 =
  \* id: 1 name: 'george' \* id: 2 name: 'mike' \* id: 3 name: 'donald' table2 =
  \* id: 2 age: 21 \* id: 1 age: 20 \* id: 3 age: 26 \# Implicit access, accessignment up-case-name = (.name .= to-upper-case!) \# List comprehensions, destructuring, piping \[{id:id1, name, age} for {id:id1, name} in table1 for {id:id2, age} in table2 when id1 is id2\]
|> sort-by (.id) \# using 'sort-by' from prelude.ls |> each up-case-name \# using 'each' from prelude.ls |> JSON.stringify #=> #\[{"id":1,"name":"GEORGE","age":20}, \# {"id":2,"name":"MIKE",  "age":21}, \# {"id":3,"name":"DONALD","age":26}\] \# operators as functions, piping map (.age), table2 |> fold1 (+) #=> 67 ('fold1' and 'map' from prelude.ls)

\# Easy listing of implicit objects
table1 =
  \* id: 1
    name: 'george'
  \* id: 2
    name: 'mike'
  \* id: 3
    name: 'donald'





table2 =
  \* id: 2
    age: 21
  \* id: 1
    age: 20
  \* id: 3
    age: 26




# Implicit access, accessignment
up-case-name = (.name .= to-upper-case!)

# List comprehensions, destructuring, piping
\[{id:id1, name, age} for {id:id1, name} in table1
                     for {id:id2, age} in table2
                     when id1 is id2\]
|> sort-by (.id) # using 'sort-by' from prelude.ls
|> each up-case-name # using 'each' from prelude.ls
|> JSON.stringify
#=>
#\[{"id":1,"name":"GEORGE","age":20},
# {"id":2,"name":"MIKE",  "age":21},
# {"id":3,"name":"DONALD","age":26}\]











# operators as functions, piping
map (.age), table2 |> fold1 (+)
#=> 67 ('fold1' and 'map' from prelude.ls)

##### JavaScript

var table1, table2, upCaseName, id1, name, id2, age; table1 \= \[ { id: 1, name: 'george' }, { id: 2, name: 'mike' }, { id: 3, name: 'donald' } \]; table2 \= \[ { id: 2, age: 21 }, { id: 1, age: 20 }, { id: 3, age: 26 } \]; upCaseName \= function(it){ return it.name \= it.name.toUpperCase(); }; JSON.stringify( each(upCaseName)( sortBy(function(it){ return it.id; })( (function(){ var i$, ref$, len$, ref1$, j$, len1$, ref2$, results$ \= \[\]; for (i$ \= 0, len$ \= (ref$ \= table1).length; i$ < len$; ++i$) { ref1$ \= ref$\[i$\], id1 \= ref1$.id, name \= ref1$.name; for (j$ \= 0, len1$ \= (ref1$ \= table2).length; j$ < len1$; ++j$) { ref2$ \= ref1$\[j$\], id2 \= ref2$.id, age \= ref2$.age; if (id1 \=== id2) { results$.push({ id: id1, name: name, age: age }); } } } return results$; }())))); fold1(curry$(function(x$, y$){ return x$ + y$; }))( map(function(it){ return it.age; }, table2)); function curry$(f, bound){ var context, \_curry \= function(args) { return f.length \> 1 ? function(){ var params \= args ? args.concat() : \[\]; context \= bound ? context || this : this; return params.push.apply(params, arguments) < f.length && arguments.length ? \_curry.call(context, params) : f.apply(context, params); } : f; }; return \_curry(); }

Unnested callbacks and parentheses free chaining:

##### LiveScript

<- $ 'h1' .on 'click' alert 'boom!'

<- $ 'h1' .on 'click'
alert 'boom!'

##### JavaScript

$('h1').on('click', function(){ return alert('boom!'); });

---

## Installation

You can install LiveScript through [npm][6]: **`sudo npm install -g livescript`**.

Alternately, you can also download it ([zip][7], [tar.gz][8]), enter its directory, and run `sudo make install`. Using git to download: `git clone git://github.com/gkz/LiveScript.git && cd LiveScript && sudo make install`. [Node.js][9] is required to be installed on your system.

You can also use it directly in the browser by including the file in `LiveScript/browser/livescript.js` via a script tag. You must then call `require("livescript").go()`. If you use this, your LiveScript scripts have to be placed after the included `livescript.js` file, and the script tags must have the attribute `type="text/ls"`.

For example:

<script src\="livescript.js"\></script> <script type\="text/ls"\> console.log "boom #{window.location}" </script> <script> var LiveScript \= require("livescript"); LiveScript.go(); </script>

## Usage

### Command Line:

Usage: `lsc [options]... [file]...`

Use `lsc` with no options to start REPL.

#### General:

Usage: lsc \[option\]... \[file\]...

Use 'lsc' with no options to start REPL.

Misc:
  -v, --version              display version
  -h, --help                 display this help message
  -c, --compile              compile to JavaScript and save as .js files
  -e, --eval code::String    pass as string from the command line as input
  -d, --prelude              automatically import prelude.ls in REPL
  -r, --require paths::\[String\]  require libraries before executing
  -s, --stdin                read stdin
  -j, --json                 print/compile as JSON
  -n, --nodejs               pass options after this through to the 'node' binary
  -w, --watch                watch scripts for changes, and repeat
  -k, --const                compile all variables as constants

Output control:
  -o, --output path::String  compile into the specified directory
  -p, --print                print the result to stdout
  -b, --bare                 compile without the top-level function wrapper
  --no-header                do not add "Generated by" header
  -l, --lex                  print the tokens the lexer produces
  -t, --tokens               print the tokens the rewriter produces
  -a, --ast                  print the syntax tree the parser produces
  --debug                    print debug output when compiling
  -m, --map String           generate source maps - either: 'none', 'linked',
                             'linked-src', 'embedded', or 'debug'
  --no-warn                  suppress compiler warnings

Version 1.6.0
<http://livescript.net/>

### Command Line Examples

-   Run a LiveScript file (through node.js): `lsc file.ls` - you can omit the `.ls` if you wish.
-   Compile a LiveScript file, creating a `file.js`: `lsc -c file.ls`
-   Watch a file and compile on changes: `lsc -wc file.ls`
-   Compile a directory and output to another directory: `lsc -co output src`
-   Watch a directory, compile on change into an output directory: `lsc -wco output src`
-   Compile a one-liner and print the JS: `lsc -bpe '[1 to 5]'`
-   Start the LiveScript REPL: `lsc` - `Ctrl-D` to exit, use `Ctrl-J` for multiline input.

### JSON

You can compile LiveScript style JSON to `.json` files by using the `.json.ls` file extension, or by passing in the `-j,--json` flag.

You can combine `-e,--eval` with JSON data for functional style command line JSON processing. The JSON data you supply is bound to `this` in the eval expression. You can either pipe in JSON, and use the `-j,--json` flag, or use a file with the `.json`extension.

$ lsc -e '@name' package.json
"livescript"
$ cat package.json | lsc -je '@name'
"livescript"

You can include [prelude.ls][10] with the `-d,--prelude` flag.

$ lsc -de '@files |> map (.to-upper-case!)' package.json
\[
  "LIB",
  "BIN",
  "README.MD",
  "LICENSE"
\]

You can easily require modules as well, with the `-r,--require` flag.

lsc -r 'path' -de '@files |> map -> \[it, path.resolve it\]' package.json
\[
  \[
    "lib",
    "/home/z/open-source/LiveScript/lib"
  \],
  \[
    "bin",
    "/home/z/open-source/LiveScript/bin"
  \],
  \[
    "README.md",
    "/home/z/open-source/LiveScript/README.md"
  \],
  \[
    "LICENSE",
    "/home/z/open-source/LiveScript/LICENSE"
  \]
\]

### Programmatic API:

Require it into your Node or Browserify project with `var LiveScript = require('livescript');` or `require! livescript`, or use the installation steps above for in-browser installation. In Node, requiring this also registers it in `require.extensions`.

#### General:

`LiveScript.compile(code :: String, options :: Object?) -> String`

Compile a string of LiveScript code into plain JavaScript. If the string fails to compile, a SyntaxError is thrown.

Options:

bare :: Boolean = false

if true, compile without the top-level function wrapper

header :: Boolean = true

if true, add the "Generated by" header

const :: Boolean = false

if true, compile all variables as constants

json :: Boolean = false

if true, compile to JSON instead of JavaScript

warn :: Boolean = true

if false, suppress compiler warnings

filename :: String?

an optional filename to use for compilation errors

`LiveScript.run(code :: String, options :: Object?) -> String`

Evaluate a string of LiveScript code. If the string fails to compile, a SyntaxError is thrown. Note that this uses the Function constructor.

Options:

const :: Boolean = false

if true, compile all variables as constants

filename :: String?

an optional filename to use for errors

#### Utilities:

`LiveScript.ast(code :: String|Array) -> Object`

Generate the AST representation of the LiveScript source, if it is a string, or the token stream if it is an array. If it is a string that cannot be parsed as LiveScript code, a SyntaxError is thrown. If it is an Array, an Error is thrown if the stream is not valid.

`LiveScript.tokens(code :: String, options :: Object?) -> Array`

Generate a token stream from LiveScript code. Note that this does keep state between calls.

Options

raw :: Boolean = false

if true, do not flush the token stream before tokenizing - recommended to leave as default

line :: Number = 0

the starting line number for the token stream

`LiveScript.lex(code :: String)`

Equivalent to `LiveScript.tokens(code, {raw: true})`.

`LiveScript.ast.* :: Object...`

All the AST constructors used for `LiveScript.ast()`.

#### Browser-specific methods:

`LiveScript.stab(code :: String, callback :: (err :: Error?) -> void, filename :: String?) -> void`

Run a string of code, and call back with an optional error.

`LiveScript.load(url :: String, callback :: (err :: Error?) -> void) -> void`

Load a remote LiveScript file via an `XMLHttpRequest` at `url` and call back with an optional error.

`LiveScript.go() -> void`

Load all scripts with a `type` attribute of either `"text/ls"` or `"application/ls"`.

## Standard Library

[prelude.ls][11] is the recommended base library when using LiveScript. It allows you to do things such as:

\[1 2 3\] |> map (\* 2) |> filter (> 3) |> fold1 (+) #=> 10

You can automatically import prelude.ls to the REPL by using the `-d` or `--prelude` options.

Prelude is loaded on this page and you can use it when running things in the compiler/REPL to the right.

---

## Source Maps

Use the `-m, --map` option when compiling to generate source maps. It has several possible values, `none` - the default, `linked`, `linked-src`, `embedded`, and `debug`

There are three files involved when generating sourcemaps:

1.  The original LiveScript source
2.  The sourcemap
3.  The generated JavaScript source

`a` can optionally be embedded inside `b`, and `b` can optionally be embedded inside `c` via a comment.

`linked`: No embedding, `c` links to `b` via a relative path, and same for `b` to `a`

`linked-src`: `b` is embedded inside `c`, but `a` is linked to

`embedded`: Everything is embedded inside `c`

`debug`: Same as linked, but will also output a human readable representation of the source-node tree (similar to the output from the `ast` option) to a '.map.debug' file.

Use `linked` or `linked-src` if you are directly serving the output from lsc to the browser - (ie. not performing further processing). They keep the original source separate, so the JavaScript file is still small. `linked-src` just means you have one fewer file to carry around at the expense of increasing the size of the JavaScript file.

Use `embedded` for everything else - it's self-contained and it's the only form most other tools such as browserify will accept as input. The file will be significantly larger, but you can remedy this by running a separate tool at the end of your build pipeline to split the output back into the `linked` form.

## Introduction

Like many modern languages, blocks are delimited by whitespace indentation and newlines are used instead of semicolons to terminate statements (you can still use semicolons if you want to fit more than one statement on a line).

For example (LiveScript on the left, compiled JavaScript on the right):

if 2 + 2 == 4 do-something()

if 2 + 2 == 4
  do-something()

if (2 + 2 \=== 4) { doSomething(); }

You can try all these examples for yourself using the LiveScript compiler/REPL to the right.

To further clear things up, you can omit the parentheses when calling a function.

And comments are:

\# from here to the end of the line.

\# from here to the end of the line.

// from here to the end of the line.

Lisp hackers, you may be pleased to know that you can use dashes in the name of your variables and functions. The names are equivalent to, and are compiled to, camel case. Eg. `my-value = 42` == `myValue = 42`.

The file extension for LiveScript is `.ls`.

### Defining Functions

Defining functions is very lightweight in LiveScript:

(x, y) -> x + y -> \# an empty function times = (x, y) -> x \* y \# multiple lines, and be assigned to \# a var like in JavaScript

(x, y) -> x + y



-> # an empty function

times = (x, y) ->
  x \* y
# multiple lines, and be assigned to
# a var like in JavaScript

var times; (function(x, y){ return x + y; }); (function(){}); times \= function(x, y){ return x \* y; }; 

As you see, function definitions are considerably shorter! You may also have noticed that we have omitted `return`. In LiveScript, almost everything is an expression and the last one reached is automatically returned. However, you can still use `return` to force returns if you want, and you can add a bang `!` before the arrow to suppress auto-returning `no-ret = (x) !-> ...`.

### Assignment

Basic assignment is as you would expect, `variable = value`, and there is no need for variable declarations. However, unlike CoffeeScript, you must use `:=` to modify variables in upper scopes.

x = 10 do -> x = 5 x #=> 10 do -> x := 2 x #=> 2

x = 10


do ->
  x = 5

x #=> 10

do ->
  x := 2

x #=> 2

var x; x \= 10; (function(){ var x; return x \= 5; })(); x; (function(){ return x \= 2; })(); x;

Almost everything is an expression, which means you can do things like:

x = if 2 + 2 == 4 then 10 else 0 x #=> 10

x = if 2 + 2 == 4
    then 10
    else 0
x #=> 10

var x; x \= 2 + 2 \=== 4 ? 10 : 0; x;

Things such as loops, switch statements, and even try/catch statements are all expressions.

If you want to simply declare a variable and not initialize it, you can use `var`.

You can also declare constants in LiveScript using `const`. They are checked at compile time - the compiled JS is no different.

Attempting to compile the following:

const x = 10 x = 0

Results in `redeclaration of constant "x" on line 2`.

However, objects are not frozen if declared as constants - you can still modify their properties. You can force all variables to be constants if you compile with the `-k` or `--const` flags.

### Info

For differences from CoffeeScript, see the [CoffeeScript to LiveScript Conversion Guide][12].

You can double click any of the examples to load the LiveScript code into the compiler to the right, or you can play around and try out your own code. Press run to execute the compiled JavaScript. Note that LiveScript wraps compiled JS in a safety wrapper `(function(){...contents...}).call(this);` - this wrapper has been omitted in all examples and this page's compiler output for conciseness.

## Literals

### Numbers

`.4` is not valid, it must be preceded with a zero, eg. `0.4`.

42 17.34 0.4

42
17.34
0.4

Underscores and appended letters are ignored.

Any base can be used from 2 to 36 using `~`.

6~12 2~1000 16~ff

6~12
2~1000
16~ff

### Booleans, Void, Null

Aliases as in CoffeeScript.

true false on off yes no

true
false
on
off
yes
no

true; false; true; false; true; false;

In JavaScript, `undefined` can be redefined, so it is prudent to use the `void` operator which produces the undefined value, always.

`void` at the top level (not used as an expression) compiles to nothing (for use as a placeholder) - it must be used as a value to compile.

void x = void null

void
x = void

null

var x; // void compiles to nothing here! x \= void 8; null;

### Strings

You can use double or single quotes.

'a string' "a string"

'a string'
"a string"

Strings can be written with a preceding backslash instead of quotes. Backslash strings can't contain `, ; ] ) }` or whitespace.

\\word func \\word, \\word;
(func \\word)
\[\\word\]
{prop:\\word}

\\word
func \\word, \\word;
(func \\word)
\[\\word\]
{prop:\\word}

'word'; func('word', 'word'); func('word'); \['word'\]; ({ prop: 'word' });

Double quoted strings allow interpolation. Single quoted strings are passed through as-is. Simple variables can be interpolated without curly braces.

"The answer is #{2 + 2}" 'As #{is}' variable = "world" "Hello #variable"

"The answer is #{2 + 2}"
'As #{is}'

variable = "world"
"Hello #variable"

var variable; "The answer is " + (2 + 2); 'As #{is}'; variable \= "world"; "Hello " + variable;

Prefixing your interpolated string with `%` returns and the raw parts as an array. This allows you to join the result as you wish.

Multiline strings (can also do the same but with double quotes for use with interpolation):

multiline = 'string can be multiline \\
            and go on and on \\
            beginning whitespace is \\
            ignored' heredoc = '''
            string can be multiline
            with newlines
            and go on and on
            beginning whitespace is
            ignored
''' nospaces = 'deadbeef
            deadbeef'

multiline = 'string can be multiline \\
            and go on and on \\
            beginning whitespace is \\
            ignored'
heredoc = '''
            string can be multiline
            with newlines
            and go on and on
            beginning whitespace is
            ignored
'''
nospaces = 'deadbeef
            deadbeef'

var multiline, heredoc, nospaces; multiline \= 'string can be multiline and go on and on beginning whitespace is ignored'; heredoc \= 'string can be multiline\\nwith newlines\\nand go on and on\\nbeginning whitespace is\\nignored'; nospaces \= 'deadbeefdeadbeef'; 

Single line comments start off with a `#`. They are not passed through to the compiled output.

\# single line comment

\# single line comment

Multiline comments are preserved in the output.

/\* multiline comments
   use this format and are preserved
   in the output unlike single line ones
\*/

/\* multiline comments
   use this format and are preserved
   in the output unlike single line ones
\*/

/\* multiline comments
   use this format and are preserved
   in the output unlike single line ones
\*/

### Objects

Braces are optional:

obj = {prop: 1, thing: 'moo'} person =
  age: 23 eye-color: 'green' height: 180cm oneline = color: 'blue', heat: 4

obj = {prop: 1, thing: 'moo'}



person =
  age:      23
  eye-color: 'green'
  height:   180cm

oneline = color: 'blue', heat: 4

var obj, person, oneline; obj \= { prop: 1, thing: 'moo' }; person \= { age: 23, eyeColor: 'green', height: 180 }; oneline \= { color: 'blue', heat: 4 };

Dynamic keys:

obj = "#variable": 234 (person.eye-color): false

obj =
  "#variable": 234
  (person.eye-color): false

var obj, ref$; obj \= (ref$ \= {}, ref$\[variable + ""\] \= 234, ref$\[person.eyeColor\] \= false, ref$);

Property setting shorthand - easily set properties with variables if you want the property name to be the same as the variable name.

x = 1 y = 2 obj = {x, y}

x = 1
y = 2
obj = {x, y}

var x, y, obj; x \= 1; y \= 2; obj \= { x: x, y: y };

Flagging shorthand - easily set boolean properties.

{+debug, -live}

{+debug, -live}

({ debug: true, live: false });

This - no need to use a dot `.` to access properties.

this @ @location

this
@
@location

this; this; this.location;

### Regular Expressions

Regular regex delineated with a single `/`.

Delineated with `//` - multiline, comments, spacing!

//
| \[!=\]==?             # equality | @@ # constructor | <\\\[(?:\[\\s\\S\]\*?\\\]>)? # words //g

//
| \[!=\]==?             # equality
| @@                  # constructor
| <\\\[(?:\[\\s\\S\]\*?\\\]>)? # words
//g

/|\[!=\]==?|@@|<\\\[(?:\[\\s\\S\]\*?\\\]>)?/g; 

### Lists

Regular list literal delineated with brackets:

\[1, person.age, 'French Fries'\]

\[1, person.age, 'French Fries'\]

\[1, person.age, 'French Fries'\];

Commas are not needed if the item preceding is not callable:

\[1 2 3 true void \\word 'hello there'\]

\[1 2 3 true void \\word 'hello there'\]

\[1, 2, 3, true, void 8, 'word', 'hello there'\];

Implicit lists created with an indented block. They need at least two items for it to work. If you have only one item, you can add a yaddayaddayadda `...` to force the implicit list.

my-list = 32 + 1 person.height 'beautiful' one-item = 1 ...

my-list =
  32 + 1
  person.height
  'beautiful'

one-item =
  1
  ...

var myList, oneItem; myList \= \[32 + 1, person.height, 'beautiful'\]; oneItem \= \[1\]; 

When implicitly listing, you can use an asterisk `*` to disambiguate implicit structures such as implicit objects and implicit lists. The asterisk does not denote an item of the list, but merely sets aside an implicit structure so that it is not muddled with the other ones being listed.

tree =
  \* 1 \* 2 3 4 \* 5 6 \* 7 8 \* 9 10 11 obj-list =
  \* name: 'tessa' age: 23 \* name: 'kendall' age: 19 obj =
  \* name: 'tessa' age: 23 obj-one-list =
  \* name: 'tessa' age: 23 ...

tree =
  \* 1
    \* 2
      3
    4
  \* 5
    6
    \* 7
      8
      \* 9
        10
    11

obj-list =
  \* name: 'tessa'
    age:  23
  \* name: 'kendall'
    age:  19


obj =
  \* name: 'tessa'
    age:  23

obj-one-list =
  \* name: 'tessa'
    age:  23
  ...

var tree, objList, obj, objOneList; tree \= \[\[1, \[2, 3\], 4\], \[5, 6, \[7, 8, \[9, 10\]\], 11\]\]; objList \= \[ { name: 'tessa', age: 23 }, { name: 'kendall', age: 19 } \]; obj \= { name: 'tessa', age: 23 }; objOneList \= \[{ name: 'tessa', age: 23 }\];

Lists of words:

<\[ list of words \]>

<\[ list of words \]>

### Ranges

`to` means up to and *including* the number. `til` means up *until* but not including the number.

You can optionally add a `by` which defines the step of the range.

If you omit the first number, it is assumed to be `0`.

With number/string literals:

\[1 to 5\] #=> \[1, 2, 3, 4, 5\] \[1 til 5\] #=> \[1, 2, 3, 4\] \[1 to 10 by 2\] #=> \[1, 3, 7, 9\] \[4 to 1\] #=> \[4, 3, 2, 1\] \[to 5\] #=> \[0, 1, 2, 3, 4, 5\] \[\\A to \\D\] #=> \['A', 'B', 'C', D'\]

\[1 to 5\]       #=> \[1, 2, 3, 4, 5\]
\[1 til 5\]      #=> \[1, 2, 3, 4\]
\[1 to 10 by 2\] #=> \[1, 3, 7, 9\]
\[4 to 1\]       #=> \[4, 3, 2, 1\]
\[to 5\]         #=> \[0, 1, 2, 3, 4, 5\]
\[\\A to \\D\]     #=> \['A', 'B', 'C', D'\]

\[1, 2, 3, 4, 5\]; \[1, 2, 3, 4\]; \[1, 3, 5, 7, 9\]; \[4, 3, 2, 1\]; \[0, 1, 2, 3, 4, 5\]; \["A", "B", "C", "D"\];

With any expression - if your range uses expressions, and you want it to go downwards (ie. from a larger number to a smaller one) you must explicitly set `by -1`.

x = 4 \[1 to x\] #=> \[1, 2, 3, 4\] \[x to 0 by -1\] #=> \[4, 3, 2, 1, 0\]

x = 4
\[1 to x\]       #=> \[1, 2, 3, 4\]
\[x to 0 by -1\] #=> \[4, 3, 2, 1, 0\]

var x, i$; x \= 4; for (i$ \= 1; i$ <= x; ++i$) { i$; } for (i$ \= x; i$ \>= 0; \--i$) { i$; }

### Misc

Labels (useful for nested loops):

:label 4 + 2

:label 4 + 2

`constructor` shorthand.

constructor; constructor.x; x.constructor.y;

Yaddayaddayadda - a placeholder:

throw Error('unimplemented');

## Operators

### Number

The standard math operators:

1 + 2 #=> 3 3 - 4 #=> -1 6 \* 2 #=> 12 8 / 4 #=> 2

1 + 2 #=> 3
3 - 4 #=> -1
6 \* 2 #=> 12
8 / 4 #=> 2

1 + 2; 3 \- 4; 6 \* 2; 8 / 4;

There is a remainder operator, as in JavaScript - but we also add a proper modulo operator.

\-3 % 4 #=> -3 -3 %% 4 #=> 1

\-3 % 4  #=> -3
-3 %% 4 #=> 1

var ref$; \-3 % 4; ((-3) % (ref$ \= 4) + ref$) % ref$;

The power is right associative, and has higher precedence than unary ops. `^` is an alias for `**`

2 \*\* 4 #=> 16 3 ^ 4 #=> 81 -2 ^ 2 ^ 3 #=> -256

2 \*\* 4     #=> 16
3 ^ 4      #=> 81
-2 ^ 2 ^ 3 #=> -256

Math.pow(2, 4); Math.pow(3, 4); \-Math.pow(2, Math.pow(2, 3));

Increments and decrements:

n = 0 n++ #=> 0 ++n #=> 2 n\-- #=> 2 --n #=> 0 x = n++ #=> 0 x #=> 0 n #=> 1 x = ++n #=> 2 x #=> 2 n #=> 2

n = 0
n++ #=> 0
++n #=> 2
n-- #=> 2
--n #=> 0
x = n++ #=> 0
x #=> 0
n #=> 1
x = ++n #=> 2
x #=> 2
n #=> 2

var n, x; n \= 0; n++; ++n; n\--; \--n; x \= n++; x; n; x \= ++n; x; n;

Bitwise and shift operators:

14 .&. 9 #=> 8 14 .|. 9 #=> 15 14 .^. 9 #=> 7 ~9 #=> -10 9 .<<. 2 #=> 36 -9 .>>. 2 #=> -3 -9 .>>>. 2 #=> 1073741821

14 .&. 9   #=> 8
14 .|. 9   #=> 15
14 .^. 9   #=> 7
~9         #=> -10
9  .<<. 2  #=> 36
-9 .>>. 2  #=> -3
-9 .>>>. 2 #=> 1073741821

14 & 9; 14 | 9; 14 ^ 9; ~9; 9 << 2; \-9 \>> 2; \-9 \>>> 2;

Casting to a number:

+'4' #=>  4 -'3' #=> -3

+'4' #=>  4
-'3' #=> -3

### Comparison

Strict equality (no type coercion):

2 + 4 == 6 #=> true \\boom is 'boom' #=> true \\boom != null #=> true 2 + 2 is not 4 #=> false 0 + 1 isnt 1 #=> false

2 + 4 == 6      #=> true
\\boom is 'boom' #=> true

\\boom != null   #=> true
2 + 2 is not 4  #=> false
0 + 1 isnt 1    #=> false

2 + 4 \=== 6; 'boom' \=== 'boom'; 'boom' !== null; 2 + 2 !== 4; 0 + 1 !== 1;

Fuzzy equality (with type coercion):

2 ~= '2' #=> true \\1 !~= 1 #=> false

2 ~= '2'       #=> true
\\1 !~= 1       #=> false

Greater/less than:

2 < 4 #=> true 9 > 7 #=> true 8 <= 8 #=> true 7 >= 8 #=> false

2 < 4           #=> true
9 > 7           #=> true
8 <= 8          #=> true
7 >= 8          #=> false

2 < 4; 9 \> 7; 8 <= 8; 7 \>= 8;

Chained comparison:

1 < 2 < 4 #=> true 1 < 2 == 4/2 > 0 #=> true

1 < 2 < 4        #=> true
1 < 2 == 4/2 > 0 #=> true

var ref$; 1 < 2 && 2 < 4; 1 < 2 && 2 \=== (ref$ \= 4 / 2) && ref$ \> 0;

Minimum/maximum - returns the smaller/larger of the two operands.

4 >? 8 #=> 8 9 - 5 <? 6 #=> 4

4 >? 8     #=> 8
9 - 5 <? 6 #=> 4

var ref$; 4 \> 8 ? 4 : 8; (ref$ \= 9 \- 5) < 6 ? ref$ : 6;

When one of the operands of a equals (`==` or `is`, and the negatives for that) is a regex literal it will test the other operand against it. Equality compiles to `exec` so you can use the results, while the negative simply compiles to `test`.

/^e(.\*)/ is 'enter' #=> \["enter","nter"\] /^e(.\*)/ == 'zx' #=> null /moo/ != 'loo' #=> true

/^e(.\*)/ is 'enter' #=> \["enter","nter"\]
/^e(.\*)/ == 'zx'    #=> null
/moo/ != 'loo'      #=> true

/^e(.\*)/.exec('enter'); /^e(.\*)/.exec('zx'); !/moo/.test('loo');

### Logic

The basics:

true and false #=> false true && false #=> false true or false #=> true true || false #=> true not false #=> true !false #=> true

true and false #=> false
true && false  #=> false

true or false  #=> true
true || false  #=> true

not false      #=> true
!false         #=> true

true && false; true && false; true || false; true || false; !false; !false;

A logical operator not commonly seen in other languages - exclusive or:

false xor true #=> true false xor false #=> false 1 xor 0 #=> 1 1 xor 1 #=> false

false xor true  #=> true
false xor false #=> false
1 xor 0         #=> 1
1 xor 1         #=> false

!false !== !true && (false || true); !false !== !false && (false || false); !1 !== !0 && (1 || 0); !1 !== !1 && (1 || 1);

`and`, `or`, and `xor` close implicit calls, while `||` and `&&` do not.

even 0 and 3 #=> 3 even 0 && 3 #=> true

even 0 and 3 #=> 3
even 0 &&  3 #=> true

even(0) && 3; even(0 && 3);

You can call logic operators.

(f or g) 1 (f and g or h) 3 4

(f or g) 1
(f and g or h) 3 4

f(1) || g(1); f(3, 4) && g(3, 4) || h(3, 4);

### In/Of

Use `in` to check if and element is in a list; use `of` to check if a key is in an object.

list = \[7 8 9\] 2 in \[1 2 3 4 5\] #=> true 3 in list #=> false \\id of id: 23, name: \\rogers #=> true

list = \[7 8 9\]
2 in \[1 2 3 4 5\]             #=> true
3 in list                    #=> false
\\id of id: 23, name: \\rogers #=> true

var list; list \= \[7, 8, 9\]; 2 \=== 1 || 2 \=== 2 || 2 \=== 3 || 2 \=== 4 || 2 \=== 5; in$(3, list); 'id' in { id: 23, name: 'rogers' }; function in$(x, xs){ var i \= \-1, l \= xs.length \>>> 0; while (++i < l) if (x \=== xs\[i\]) return true; return false; }

### Piping

Instead of a series of nested function calls, you can pipe values in. `x |> f` and `f <| x` are equivalent to `f(x)`.

x = \[1 2 3\] |> reverse |> head #=> 3 y = reverse <| \[1 2 3\] #=> \[3,2,1\]

x = \[1 2 3\] |> reverse |> head #=> 3


y = reverse <| \[1 2 3\] #=> \[3,2,1\]

var x, y; x \= head( reverse( \[1, 2, 3\])); y \= reverse(\[1, 2, 3\]);

You can use newlines to space things out better.

4 |> (+ 1)
|> even #=> false

4
|> (+ 1)
|> even
#=> false

even( (function(it){ return it + 1; })( 4));

### Function

Composing allows you to create functions by *composing* them out of a series of functions. LiveScript has two operators for composing, forward `>>` and backwards `<<`.

`(f << g) x` is equivalent to `f(g(x))`, and `(f >> g) x` is equivalent to `g(f(x))`. For example:

odd = (not) << even odd 3 #=> true

odd     = (not) << even
odd 3   #=> true

var odd; odd \= compose$(even, not$); odd(3); function compose$() { var functions \= arguments; return function() { var i, result; result \= functions\[0\].apply(this, arguments); for (i \= 1; i < functions.length; ++i) { result \= functions\[i\](result); } return result; }; } function not$(x){ return !x; }

To be a bit more clear about the difference between the two operators:

add-two-times-two = (+ 2) >> (\* 2) times-two-add-two = (+ 2) << (\* 2) add-two-times-two 3 #=> (3+2)\*2 => 10 times-two-add-two 3 #=> (3\*2)+2 => 8

add-two-times-two = (+ 2) >> (\* 2)
times-two-add-two = (+ 2) << (\* 2)

add-two-times-two 3 #=> (3+2)\*2 => 10
times-two-add-two 3 #=> (3\*2)+2 => 8

var addTwoTimesTwo, timesTwoAddTwo; addTwoTimesTwo \= compose$((function(it){ return it + 2; }), (function(it){ return it \* 2; })); timesTwoAddTwo \= compose$((function(it){ return it \* 2; }), (function(it){ return it + 2; })); addTwoTimesTwo(3); timesTwoAddTwo(3); function compose$() { var functions \= arguments; return function() { var i, result; result \= functions\[0\].apply(this, arguments); for (i \= 1; i < functions.length; ++i) { result \= functions\[i\](result); } return result; }; }

You can use a spaced dot as an alias to `<<`, for example `f . g`, just as in Haskell.

### List

You can concatenate two lists together:

<\[ one two three \]> ++ \[\\four\] #=> \['one','two','three','four'\]

<\[ one two three \]> ++ \[\\four\]
#=> \['one','two','three','four'\]

\['one', 'two', 'three'\].concat(\['four'\]); 

Note that the concat operator must either be spaced on both sides `xs ++ ys`, or not spaced on both sides `xs++ys`. If it is spaced on one side only, then it is taken to be the increment operator.

List repetition when first is list literal:

\[\\ha\] \* 3 #=> \['ha','ha','ha'\]

\[\\ha\] \* 3 #=> \['ha','ha','ha'\]

Join when the right operand is a string literal:

<\[ one two three \]> \* \\| #=> 'one|two|three'

<\[ one two three \]> \* \\|      #=> 'one|two|three'

\['one', 'two', 'three'\].join('|');

Unary spread - when the operand is a list literal, apply the unary op to each item:  

r = +...\[4 5 6\] #=> \[+4, +5, +6\] t = typeof! ...\[\\b 5 {}\] #=> \["String", "Number", "Object"\] c = ~...\[4, 5\] #=> \[-5, -6\] ++...player<\[strength hp\]> \# also works with -, --, typeof, ! and delete! i = new ...\[some, classes\] c = ^^...\[copy, these, {}\] delete ...list\[1, 2, 3\] do ...\[a, b, c\]

r = +...\[4 5 6\]          #=> \[+4, +5, +6\]
t = typeof! ...\[\\b 5 {}\] #=> \["String", "Number", "Object"\]
c = ~...\[4, 5\]           #=> \[-5, -6\]
++...player<\[strength hp\]>
# also works with -, --, typeof, ! and delete!
i = new ...\[some, classes\]
c = ^^...\[copy, these, {}\]
delete ...list\[1, 2, 3\]
do ...\[a, b, c\]

var r, t, c, i, toString$ \= {}.toString; r \= \[+4, +5, +6\]; t \= \[toString$.call('b').slice(8, \-1), toString$.call(5).slice(8, \-1), toString$.call({}).slice(8, \-1)\]; c \= \[~4, ~5\]; ++player\['strength'\], ++player\['hp'\]; i \= \[new some, new classes\]; c \= \[clone$(copy), clone$(these), clone$({})\]; delete list\[1\], delete list\[2\], delete list\[3\]; a(), b(), c(); function clone$(it){ function fun(){} fun.prototype \= it; return new fun; }

### String

String concatenation:

'hello' + ' ' + 'world' #=> 'hello world' string = 'say ' #=> 'say ' string += \\yeah #=> 'say yeah'

'hello' + ' ' + 'world' #=> 'hello world'
string = 'say '         #=> 'say '
string += \\yeah         #=> 'say yeah'

var string; 'hello' + ' ' + 'world'; string \= 'say '; string += 'yeah';

String repetition when the first operand is a string literal:

'X' \* 3 #=> 'XXX'

'X' \* 3      #=> 'XXX'

String subtraction/division when the right operand is a string or regex literal - subtraction means `replace`, division is `split`.

'say yeah' - /h/ #=> 'say yea' 'say yeah' / \\y #=> \['sa',' ','eah'\]

'say yeah' - /h/ #=> 'say yea'
'say yeah' / \\y  #=> \['sa',' ','eah'\]

'say yeah'.replace(/h/, ''); 'say yeah'.split('y');

### Existence

The `?` operator can be used in a variety of contexts to check for existence.

bigfoot ? 'grizzly bear' #=> 'grizzly bear' string = \\boom if window? #=> 'boom' document?.host #=> 'gkz.github.com'

bigfoot ? 'grizzly bear'     #=> 'grizzly bear'
string = \\boom if window?    #=> 'boom'
document?.host               #=> 'gkz.github.com'

var string; (typeof bigfoot \== 'undefined' || bigfoot \=== null) && 'grizzly bear'; if (typeof window != 'undefined' && window !== null) { string \= 'boom'; } if (typeof document != 'undefined' && document !== null) { document.host; }

### Object

Instanceof - list literals to the right get expanded:

new Date() instanceof Date #=> true new Date() instanceof \[Date, Object\] #=> true

new Date() instanceof Date           #=> true
new Date() instanceof \[Date, Object\] #=> true

var ref$; new Date() instanceof Date; (ref$ \= new Date()) instanceof Date || ref$ instanceof Object;

Typeof - add a bang for a useful alternative:

typeof /^/ #=> object typeof! /^/ #=> RegExp

typeof /^/  #=> object
typeof! /^/ #=> RegExp

var toString$ \= {}.toString; typeof /^/; toString$.call(/^/).slice(8, \-1);

Delete returns the value of the deleted item:

obj = {one: 1, two: 2} r = delete obj.one r #=> 1

obj = {one: 1, two: 2}
r = delete obj.one
r #=> 1

var obj, r, ref$; obj \= { one: 1, two: 2 }; r \= (ref$ \= obj.one, delete obj.one, ref$); r;

`delete!` is like `delete` in JavaScript, and returns false only if the property exists and can't be deleted, otherwise returns true.

obj = {one: 1, two: 2} delete! obj.one #=> true delete! Math.PI #=> false

obj = {one: 1, two: 2}
delete! obj.one #=> true
delete! Math.PI #=> false

var obj; obj \= { one: 1, two: 2 }; delete obj.one; delete Math.PI;

Property copy - copy enumerable properties from right to left, and evaluate to the left. `<<<` for own properties, `<<<<` for all properties. `import` and `import all` are aliases for the two respectively with the exception that if you leave out the left operand, `this` is presumed.

obj = {one: 1, two: 2} obj <<< three: 3 #=> {one: 1, two: 2, three: 3} {go: true} <<<< window import obj

obj = {one: 1, two: 2}
obj <<< three: 3 #=> {one: 1, two: 2, three: 3}
{go: true} <<<< window
import obj

var obj; obj \= { one: 1, two: 2 }; obj.three \= 3; importAll$({ go: true }, window); import$(this, obj); function importAll$(obj, src){ for (var key in src) obj\[key\] \= src\[key\]; return obj; } function import$(obj, src){ var own \= {}.hasOwnProperty; for (var key in src) if (own.call(src, key)) obj\[key\] \= src\[key\]; return obj; }

Clone - creates a prototypical clone of the operand. It does not create a deep clone of the object, rather the resulting object's prototype is the operand. Remember that prototypes are ignored when serializing to JSON.

obj = {one: 1} obj2 = ^^obj obj2.two = 2 obj2 #=> {one: 1, two: 2} \# above includes its prototype's properties \# JSON serialization would be just \`{two: 2}\` obj #=> {one: 1}

obj = {one: 1}


obj2 = ^^obj
obj2.two = 2
obj2 #=> {one: 1, two: 2}
# above includes its prototype's properties
# JSON serialization would be just \`{two: 2}\`
obj  #=> {one: 1}

var obj, obj2; obj \= { one: 1 }; obj2 \= clone$(obj); obj2.two \= 2; obj2; obj; function clone$(it){ function fun(){} fun.prototype \= it; return new fun; }

The infix *with* (aka the *cloneport*) combines the clone and property copy operators for easy object creation. It is equivalent to `^^obj <<< obj2`. Remember that the clone operator creates a prototypical clone, and prototypes are not serialized in JSON.

girl = {name: \\hanna, age: 22} guy = girl with name: \\john guy #=> {name: 'john',  age: 22} \# the above result include the object's prototype \# in the result - the actual JSON: {name: 'john'} girl #=> {name: 'hanna', age: 22}

girl = {name: \\hanna, age: 22}
guy  = girl with name: \\john
guy  #=> {name: 'john',  age: 22}
# the above result include the object's prototype
# in the result - the actual JSON: {name: 'john'}
girl #=> {name: 'hanna', age: 22}

var girl, guy, ref$; girl \= { name: 'hanna', age: 22 }; guy \= (ref$ \= clone$(girl), ref$.name \= 'john', ref$); guy; girl; function clone$(it){ function fun(){} fun.prototype \= it; return new fun; }

### Partial Application, Operators as Functions

You can partially apply operators and use them as functions

(+ 2) 4 #=> 6 (\*) 4 3 #=> 12 (not) true #=> false (in \[1 to 3\]) 2 #=> true

(+ 2) 4         #=> 6
(\*) 4 3         #=> 12

(not) true      #=> false
(in \[1 to 3\]) 2 #=> true

(function(it){ return it + 2; })(4); curry$(function(x$, y$){ return x$ \* y$; })(4, 3); not$(true); (function(it){ return it \=== 1 || it \=== 2 || it \=== 3; })(2); function curry$(f, bound){ var context, \_curry \= function(args) { return f.length \> 1 ? function(){ var params \= args ? args.concat() : \[\]; context \= bound ? context || this : this; return params.push.apply(params, arguments) < f.length && arguments.length ? \_curry.call(context, params) : f.apply(context, params); } : f; }; return \_curry(); } function not$(x){ return !x; }

### export

By using the `export` operator instead of `exports` you get a more concise way to define modules.

 export func = -> export value export value-a, value-b, value-c export a: 1 b: -> 123 export class MyClass

export func = ->

export value

export value-a, value-b, value-c



export
  a: 1
  b: -> 123



export class MyClass

var func, ref$, MyClass, out$ \= typeof exports != 'undefined' && exports || this; out$.func \= func \= function(){}; out$.value \= value; out$.valueA \= valueA; out$.valueB \= valueB; out$.valueC \= valueC; ref$ \= out$; ref$.a \= 1; ref$.b \= function(){ return 123; }; out$.MyClass \= MyClass \= (function(){ MyClass.displayName \= 'MyClass'; var prototype \= MyClass.prototype, constructor \= MyClass; function MyClass(){} return MyClass; }());

### require!

Having to require a series of modules results in a lot of cruft. You can get rid of that cruft by using `require!`, which takes an ID, or a string, array, or object literal.

If you are requiring a module with dashes in its name, you must use a string literal.

You can rename what you are requiring by using an object literal.

You can destructure to get the contents of value.

require! lib require! 'lib1' require! prelude-ls \# no require! 'prelude-ls' require! \[fs, path\] require! <\[ fs path \]> require! jQuery: $ require! { fs path lib: foo }

require! lib
require! 'lib1'

require! prelude-ls # no
require! 'prelude-ls'

require! \[fs, path\]

require! <\[ fs path \]>


require! jQuery: $

require! {
  fs
  path
  lib: foo
}

var lib, lib1, preludeLs, fs, path, $, foo; lib \= require('lib'); lib1 \= require('lib1'); preludeLs \= require('preludeLs'); preludeLs \= require('prelude-ls'); fs \= require('fs'); path \= require('path'); fs \= require('fs'); path \= require('path'); $ \= require('jQuery'); fs \= require('fs'); path \= require('path'); foo \= require('lib'); 

You can easily require parts of modules with destructuring.

require! {
    fs: filesystem 'prelude-ls': {map, id}
    path: {join, resolve}:p }

require! {
    fs: filesystem
    'prelude-ls': {map, id}
    path: {join, resolve}:p
}

var filesystem, ref$, map, id, p, join, resolve; filesystem \= require('fs'); ref$ \= require('prelude-ls'), map \= ref$.map, id \= ref$.id; p \= require('path'), join \= p.join, resolve \= p.resolve;

Filenames are automatically extracted.

require! 'lib.js' require! './dir/lib1.js'

require! 'lib.js'
require! './dir/lib1.js'

var lib, lib1; lib \= require('lib.js'); lib1 \= require('./dir/lib1.js');

## Functions

Defining functions is very lightweight in LiveScript:

(x, y) -> x + y -> \# an empty function times = (x, y) -> x \* y \# multiple lines, and be assigned to \# a var like in JavaScript

(x, y) -> x + y


-> # an empty function

times = (x, y) ->
  x \* y
# multiple lines, and be assigned to
# a var like in JavaScript

var times; (function(x, y){ return x + y; }); (function(){}); times \= function(x, y){ return x \* y; };

As you see, function definitions are considerably shorter! You may also have noticed that we have omitted `return`. In LiveScript, almost everything is an expression and the last one reached is automatically returned.

You can prepend the function arrow with a bang `!` to suppress automatic returning.

f = !-> 2 g = (x) !-> x + 2

f = !-> 2
g = (x) !-> x + 2

var f, g; f \= function(){ 2; }; g \= function(x){ x + 2; };

### Calling

You can omit the parentheses when calling a function, and you can omit the comma separating the arguments if the preceding item is not callable, just like in arrays.

x = 4 Math.pow x, 3 #=> 64 Math.pow 2 3 #=> 8

x = 4
Math.pow x, 3 #=> 64
Math.pow 2 3  #=> 8

var x; x \= 4; Math.pow(x, 3); Math.pow(2, 3);

If you are calling the function with no arguments, you can use a bang `!` - as well you don't need to use a dot when chaining banged functions.

f!
\[1 2 3\].reverse!slice 1 #=> \[2,1\]

f!
\[1 2 3\].reverse!slice 1 #=> \[2,1\]

f(); \[1, 2, 3\].reverse().slice(1);

`and`, `or`, `xor`, spaced `.` or `?.` all close implicit calls - allowing for parentheses free chaining.

$ \\h1 .find \\a .text! #=> LiveScript

$ \\h1 .find \\a .text! #=> LiveScript

$('h1').find('a').text();

You can use `do` to call functions with no arguments:

do -> 3 + 2 #=> 5

do -> 3 + 2 #=> 5

(function(){ return 3 + 2; })();

If you use `do` on a named function, when the `do` is not used as an expression, the named function will remain a function statement.

i = 0 f 9 #=> 9 i #=> 1 do function f x ++i x i #=> 2

i = 0
f 9 #=> 9
i   #=> 1
do function f x
  ++i
  x
i   #=> 2

var i; i \= 0; f(9); i; function f(x){ ++i; return x; } f(); i;

You can't call a function with an implicit object, if you want to do that you can use `do`:

func do a: 1 b: 2

func do
  a: 1
  b: 2

`do` allows you to do many things without adding extra parentheses.

pow do 1 2 h 1 do a: 2 b: 5

pow do
  1
  2

h 1 do
  a: 2
  b: 5

pow(1, 2); h(1, { a: 2, b: 5 }); 

You can also call functions infix using backticks `` ` ``.

add = (x, y) -> x + y 3 \`add\` 4 #=> 7

add = (x, y) -> x + y
3 \`add\` 4 #=> 7

var add; add \= function(x, y){ return x + y; }; add(3, 4);

Calling a function with bare splats `...` implies calling it with the arguments of the current function. Especially useful when calling `super`.

f = (x, y) -> x + y g = (a, b) -> f ... g 3 4 #=> 7

f = (x, y) ->
  x + y

g = (a, b) ->
  f ...

g 3 4 #=> 7

var f, g; f \= function(x, y){ return x + y; }; g \= function(a, b){ return f.apply(this, arguments); }; g(3, 4);

### Parameters

Extended parameters:

set-person-params = ( person \# target object to set params person.age person.height
) -> person person = set-person-params {}, 21, 180cm #=> {age: 21, height: 180}

set-person-params = (
  person # target object to set params
  person.age
  person.height
) -> person

person = set-person-params {}, 21, 180cm
#=> {age: 21, height: 180}

var setPersonParams, person; setPersonParams \= function(person, age, height){ person.age \= age; person.height \= height; return person; }; person \= setPersonParams({}, 21, 180);

This is especially useful with `this`.

set-text = (@text) -> this

set-text = (@text) -> this

var setText; setText \= function(text){ this.text \= text; return this; };

You can set default arguments:

add = (x = 4, y = 3) -> x + y add 1 2 #=> 3 add 1 #=> 4 add! #=> 7

add = (x = 4, y = 3) -> x + y
add 1 2 #=> 3
add 1   #=> 4
add!    #=> 7

var add; add \= function(x, y){ x \== null && (x \= 4); y \== null && (y \= 3); return x + y; }; add(1, 2); add(1); add();

...or indeed use any logical operator (in parameters, `x = 2` is just sugar for doing `x ? 2`):

add = (x && 4, y || 3) -> x + y add 1 2 #=> 6 add 2 0 #=> 7

add = (x && 4, y || 3) -> x + y
add 1 2 #=> 6
add 2 0 #=> 7

var add; add \= function(x, y){ x && (x \= 4); y || (y \= 3); return x + y; }; add(1, 2); add(2, 0);

You can also destructure the arguments:

set-cords = ({x, y}) -> "#x,#y" set-cords y: 2, x: 3 #=> '3,2'

set-cords = ({x, y}) -> "#x,#y"
set-cords y: 2, x: 3 #=> '3,2'

var setCords; setCords \= function(arg$){ var x, y; x \= arg$.x, y \= arg$.y; return x + "," + y; }; setCords({ y: 2, x: 3 });

...and even set defaults (or use any logic) on those destructured parameters, functioning like Python's keyword arguments.

set-cords = ({x = 1, y = 3} = {}) -> "#x,#y" set-cords y: 2, x: 3 #=> '3,2' set-cords x: 2 #=> '2,3' set-cords y: 7 #=> '1,7' set-cords! #=> '1,3'

set-cords = ({x = 1, y = 3} = {}) -> "#x,#y"
set-cords y: 2, x: 3 #=> '3,2'
set-cords x: 2       #=> '2,3'
set-cords y: 7       #=> '1,7'
set-cords!           #=> '1,3'

var setCords; setCords \= function(arg$){ var ref$, x, ref1$, y; ref$ \= arg$ != null ? arg$ : {}, x \= (ref1$ \= ref$.x) != null ? ref1$ : 1, y \= (ref1$ \= ref$.y) != null ? ref1$ : 3; return x + "," + y; }; setCords({ y: 2, x: 3 }); setCords({ x: 2 }); setCords({ y: 7 }); setCords();

You can also use splats in your parameters:

f = (x, ...ys) -> x + ys.1 f 1 2 3 4 #=> 4

f = (x, ...ys) -> x + ys.1
f 1 2 3 4 #=> 4

var f; f \= function(x){ var ys, res$, i$, to$; res$ \= \[\]; for (i$ \= 1, to$ \= arguments.length; i$ < to$; ++i$) { res$.push(arguments\[i$\]); } ys \= res$; return x + ys\[1\]; }; f(1, 2, 3, 4);

You can even use unary operators in your parameters. You could use `+` and `!!` to cast your parameters to a number or boolean respectively, or use the clone operator `^^` to make sure any changes you make to the object are not reflected in the original. You can still use extended parameters, eg. `(!!x.x) ->`.

f = (!!x) -> x f 'truthy string' #=> true g = (+x) -> x g '' #=> 0 obj = {prop: 1} h = (^^x) -> x.prop = 99 x h obj obj.prop #=> 1

f = (!!x) -> x
f 'truthy string' #=> true




g = (+x) -> x
g '' #=> 0




obj = {prop: 1}
h = (^^x) ->
  x.prop = 99
  x
h obj
obj.prop #=> 1

var f, g, obj, h; f \= function(x){ x \= !!x; return x; }; f('truthy string'); g \= function(x){ x \= +x; return x; }; g(''); obj \= { prop: 1 }; h \= function(x){ x \= clone$(x); x.prop \= 99; return x; }; h(obj); obj.prop; function clone$(it){ function fun(){} fun.prototype \= it; return new fun; }

### Currying

Curried functions are very powerful. Essentially, when called with less arguments than defined with, they return a partially applied function. This means that it returns a function whose arguments are those which you didn't supply, with the values for what you did supply already bound. They are defined in LiveScript using the long arrow. Perhaps an example will make things more clear:

times = (x, y) --> x \* y times 2, 3 #=> 6 (normal use works as expected) double = times 2 double 5 #=> 10

times = (x, y) --> x \* y
times 2, 3       #=> 6 (normal use works as expected)
double = times 2
double 5         #=> 10

var times, double; times \= curry$(function(x, y){ return x \* y; }); times(2, 3); double \= times(2); double(5); function curry$(f, bound){ var context, \_curry \= function(args) { return f.length \> 1 ? function(){ var params \= args ? args.concat() : \[\]; context \= bound ? context || this : this; return params.push.apply(params, arguments) < f.length && arguments.length ? \_curry.call(context, params) : f.apply(context, params); } : f; }; return \_curry(); }

You can define bound curried functions with a long wavy arrow: `~~>`

If you call a curried function with no arguments, it will evaluate as is, allowing you to use default arguments.

f = (x = 5, y = 10) --> x + y f! #=> 15 g = f 20 g 7 #=> 27 g! #=> 30

f = (x = 5, y = 10) --> x + y
f! #=> 15
g = f 20
g 7 #=> 27
g!  #=> 30

var f, g; f \= curry$(function(x, y){ x \== null && (x \= 5); y \== null && (y \= 10); return x + y; }); f(); g \= f(20); g(7); g(); function curry$(f, bound){ var context, \_curry \= function(args) { return f.length \> 1 ? function(){ var params \= args ? args.concat() : \[\]; context \= bound ? context || this : this; return params.push.apply(params, arguments) < f.length && arguments.length ? \_curry.call(context, params) : f.apply(context, params); } : f; }; return \_curry(); }

### Named Functions

You can create named functions whose definition is hoisted to the top of the scope - this is useful for defining utility functions at the end of the file instead of the top. Name functions are constants, and can't be redefined.

util! #=> 'available above declaration' util2! #=> 2 function util 'available above declaration' function util2 then 2

util!  #=> 'available above declaration'
util2! #=> 2

function util
  'available above declaration'
function util2 then 2

util(); util2(); function util(){ return 'available above declaration'; } function util2(){ return 2; }

You can prepend the function definition with a `~` to make it a bound function.

~function add x, y @result = x + y

~function add x, y
  @result = x + y

var this$ \= this; function add(x, y){ return this$.result \= x + y; }

You can prepend it with a bang `!` to suppress returning.

util! #=> nothing !function util x then x

util! #=> nothing
!function util x then x

util(); function util(x){ x; }

You can combine the `~` and `!` to make a bound non-returning function if you wish.

### Bound Functions

Defined using the wavy arrow `~>`. Use the long wavy arrow for curried and bound functions `~~>`. Prepend a `~` to named functions to make them bound.

Bound functions have `this` lexically bound, not dynamically bound as normally. This means that it does not matter in which context they are called, the value of `this` in their body will always be the value of `this` where they were defined.

obj = new @x      = 10 @normal = -> @x @bound = ~> @x obj2 = x: 5 obj2.normal = obj.normal obj2.bound  = obj.bound obj2.normal! #=> 5 obj2.bound! #=> 10

obj = new
  @x      = 10
  @normal = -> @x
  @bound  = ~> @x

obj2 = x: 5
obj2.normal = obj.normal
obj2.bound  = obj.bound

obj2.normal! #=> 5
obj2.bound!  #=> 10

var obj, obj2; obj \= new function(){ var this$ \= this; this.x \= 10; this.normal \= function(){ return this.x; }; this.bound \= function(){ return this$.x; }; }; obj2 \= { x: 5 }; obj2.normal \= obj.normal; obj2.bound \= obj.bound; obj2.normal(); obj2.bound();

Check out the [OOP][13] section for more on bound functions when used in classes.

### Let, New

`let` is short for `(function(a){...}.call(this, b))`.

let $ = jQuery $.isArray \[\] #=> true

let $ = jQuery
  $.isArray \[\] #=> true

(function($){ $.isArray(\[\]); }.call(this, jQuery));

You can also define `this` (aka `@`) with `let`.

x = let @ = a: 1, b: 2 @b ^ 3 x #=> 8

x = let @ = a: 1, b: 2
  @b ^ 3
x #=> 8

var x; x \= (function(){ return Math.pow(this.b, 3); }.call({ a: 1, b: 2 })); x;

With new context:

dog = new @name = \\spot @mutt = true #=> {name: 'spot', mutt: true}

dog = new
  @name = \\spot
  @mutt = true
#=> {name: 'spot', mutt: true}

var dog; dog \= new function(){ this.name \= 'spot'; this.mutt \= true; };

### Access/Call Function Shorthand

There are especially useful for higher order functions like map and filter.

`(.prop)` is short for `(it) -> it.prop`.

map (.length), <\[ hello there you \]> #=> \[5,5,3\] filter (.length < 4), <\[ hello there you \]> #=> \['you'\]

map (.length), <\[ hello there you \]>
#=> \[5,5,3\]

filter (.length < 4), <\[ hello there you \]>
#=> \['you'\]

map(function(it){ return it.length; }, \['hello', 'there', 'you'\]); filter(function(it){ return it.length < 4; }, \['hello', 'there', 'you'\]);

You can also use this to call methods:

map (.join \\|), \[\[1 2 3\], \[7 8 9\]\] #=> \['1|2|3','7|8|9'\]

map (.join \\|), \[\[1 2 3\], \[7 8 9\]\]
#=> \['1|2|3','7|8|9'\]

map(function(it){ return it.join('|'); }, \[\[1, 2, 3\], \[7, 8, 9\]\]);

`(obj.)` is short for `(it) -> obj[it]`.

obj = one: 1, two: 2, three: 3 map (obj.), <\[ one three \]> #=> \[1,3\]

obj = one: 1, two: 2, three: 3
map (obj.), <\[ one three \]>
#=> \[1,3\]

var obj; obj \= { one: 1, two: 2, three: 3 }; map(function(it){ return obj\[it\]; }, \['one', 'three'\]);

### Backcalls

Backcalls are very useful. They allow you to unnest callbacks. They are defined using arrows pointed to the left. All the syntax is the same as regular arrows for defining bound functions (`<~`), curried functions (`<--, <~~`), suppressing return (`<-!`) - except that it is just pointing the other way.

<- $ alert \\boom

<- $
alert \\boom

$(function(){ return alert('boom'); });

They can take arguments, and you can specify a placeholder for where you want it to go.

x <- map \_, \[1 to 3\] x \* 2 #=> \[2, 4, 6\]

x <- map \_, \[1 to 3\]
x \* 2
#=> \[2, 4, 6\]

map(function(x){ return x \* 2; }, \[1, 2, 3\]);

If you wish to have further code after your backcalls, you can set them aside with a `do` statement.

do data <-! $.get 'ajaxtest' $ '.result' .html data processed <-! $.get 'ajaxprocess', data $ '.result' .append processed alert 'hi'

do
  data <-! $.get 'ajaxtest'
  $ '.result' .html data
  processed <-! $.get 'ajaxprocess', data
  $ '.result' .append processed

alert 'hi'

$.get('ajaxtest', function(data){ $('.result').html(data); $.get('ajaxprocess', data, function(processed){ $('.result').append(processed); }); }); alert('hi');

### Async and Await

If you will be running your compiled code on a platform that supports the `async` and `await` JavaScript keywords, then you can write true asynchronous functions in LiveScript. To mark a function as async, either add an extra `>` to the function arrow (`->>`, `~>>`, `-->>`, etc.), or write `async function` instead of `function` for named functions. Inside an async function, you can use the `await` keyword as you would in JavaScript.

f1 = (x) ->> await x async function f2 x a = await f1 x 

f1 = (x) ->> await x


async function f2 x
  a = await f1 x

var f1; f1 \= async function(x){ return (await x); }; async function f2(x){ var a; return a \= (await f1(x)); }

### Partial Application

You can partially apply functions using the underscore `_` as a placeholder. Sometimes, the function you want to deal with isn't curried, or if it is the arguments are not in a good order. In these cases partial application is very useful.

filter-nums = filter \_, \[1 to 5\] filter-nums even #=> \[2,4\] filter-nums odd #=> \[1,3,5\] filter-nums (< 3) #=> \[1,2\]

filter-nums = filter \_, \[1 to 5\]
filter-nums even  #=> \[2,4\]
filter-nums odd   #=> \[1,3,5\]
filter-nums (< 3) #=> \[1,2\]

var filterNums, slice$ \= \[\].slice; filterNums \= partialize$.apply(this, \[filter, \[void 8, \[1, 2, 3, 4, 5\]\], \[0\]\]); filterNums(even); filterNums(odd); filterNums((function(it){ return it < 3; })); function partialize$(f, args, where){ var context \= this; return function(){ var params \= slice$.call(arguments), i, len \= params.length, wlen \= where.length, ta \= args ? args.concat() : \[\], tw \= where ? where.concat() : \[\]; for(i \= 0; i < len; ++i) { ta\[tw\[0\]\] \= params\[i\]; tw.shift(); } return len < wlen && len ? partialize$.apply(context, \[f, ta, tw\]) : f.apply(context, ta); }; }

If you call a partially applied function with no arguments, it will execute as is instead of returning itself, allowing you to use default arguments.

Partially applied functions are also really useful for piping if the functions you are using don't have a nice argument order and aren't curried (like in underscore.js for instance).

\[1 2 3\]
|> \_.map \_, (\* 2)
|> \_.reduce \_, (+), 0 #=> 12

\[1 2 3\]
|> \_.map \_, (\* 2)
|> \_.reduce \_, (+), 0
#=> 12

\_.reduce(\_.map(\[1, 2, 3\], (function(it){ return it \* 2; })), curry$(function(x$, y$){ return x$ + y$; }), 0); function curry$(f, bound){ var context, \_curry \= function(args) { return f.length \> 1 ? function(){ var params \= args ? args.concat() : \[\]; context \= bound ? context || this : this; return params.push.apply(params, arguments) < f.length && arguments.length ? \_curry.call(context, params) : f.apply(context, params); } : f; }; return \_curry(); }

### Arguments

If you have only one argument, you can use `it` to access it without having to define an argument.

f = -> it + 2 f 3 #=> 5

f = -> it + 2
f 3 #=> 5

var f; f \= function(it){ return it + 2; }; f(3);

You can access the `arguments` object with the shorthand `&`. The first argument is `&0`, the second `&1`, and so on. `&` alone is `arguments` as a whole.

add-three-numbers = -> &0 + &1 + &2 add-three-numbers 1 2 3 #=> 6

add-three-numbers = -> &0 + &1 + &2
add-three-numbers 1 2 3 #=> 6

var addThreeNumbers; addThreeNumbers \= function(){ return arguments\[0\] + arguments\[1\] + arguments\[2\]; }; addThreeNumbers(1, 2, 3);

Note that currying won't work in that situation, as the number of declared arguments in `add-three-numbers` is 0.

### More

Check out the section on [composing functions][14], and [piping][15] as well.

## Generators and Yield

You can use generators and yield in your LiveScript code! A brief rundown:

function\* f yield "foo" g = ->\* yield from f! yield "bar" h = g! h.next!.value + h.next!.value #=> "foobar"

function\* f
    yield "foo"

g = ->\*
    yield from f!
    yield "bar"

h = g!
h.next!.value + h.next!.value #=> "foobar"

var g, h; function\* f(){ return (yield "foo"); } g \= function\*(){ (yield\* f()); return (yield "bar"); }; h \= g(); h.next().value + h.next().value;

You can create generators by either appending a star `*` to the `function` keyword, or appending it to LiveScript's arrow notation. This works with the variety of arrows we have.

`yield` is simply the same as in JavaScript, and `yield from` is JavaScript's `yield*`.

To run code using generators and yield using node 0.11, use the `--harmony` flag. If running directly with `lsc`, use `lsc file.ls --nodejs --harmony` to pass the harmony flag to node.

## If and Unless

There are several ways to format an `if` statement. (Note that the `if` statement is actually an expression, and be used as such).

The standard:

if 2 + 2 == 4 'something' else 'something else' if 2 + 2 == 4 then 'something' else 'something else' if 2 + 2 == 4 then 'something' else 'something else'

if 2 + 2 == 4
  'something'
else
  'something else'

if 2 + 2 == 4 then 'something' else 'something else'




if 2 + 2 == 4
then 'something'
else 'something else'

if (2 + 2 \=== 4) { 'something'; } else { 'something else'; } if (2 + 2 \=== 4) { 'something'; } else { 'something else'; } if (2 + 2 \=== 4) { 'something'; } else { 'something else'; }

The `else` is optional, and further `else if`s can be added.

if 2 + 2 == 4 'something' if 2 + 2 == 6 'something' else if 2 + 2 == 5 'something else' else 'the default'

if 2 + 2 == 4
  'something'

if 2 + 2 == 6
  'something'
else if 2 + 2  == 5
  'something else'
else
  'the default'

if (2 + 2 \=== 4) { 'something'; } if (2 + 2 \=== 6) { 'something'; } else if (2 + 2 \=== 5) { 'something else'; } else { 'the default'; }

It can be used as an expression:

result = if 2 / 2 is 0 then 'something' else 'something else'

result = if 2 / 2 is 0
         then 'something'
         else 'something else'

var result; result \= 2 / 2 \=== 0 ? 'something' : 'something else';

It can also be used postfix - it has a lower precedence than assignment, making this useful:

x = 10 x = 3 if 2 + 2 == 4 x #=> 3

x = 10
x = 3 if 2 + 2 == 4
x #=> 3

var x; x \= 10; if (2 + 2 \=== 4) { x \= 3; } x;

`unless` is the equivalent to `if not`.

unless 2 + 2 == 5 'something' x = 10 x = 3 unless 2 + 2 == 5

unless 2 + 2 == 5
  'something'

x = 10
x = 3 unless 2 + 2 == 5

var x; if (2 + 2 !== 5) { 'something'; } x \= 10; if (2 + 2 !== 5) { x \= 3; }

`that` refers implicitly to the value of the condition. It will unwrap existence checks.

time = days: 365 half-year = that / 2 if time.days #=> 182.5 if /^e(.\*)/ == 'enter' that.1 #=> 'nter' if half-year? that \* 2 #=> 365

time = days: 365



half-year = that / 2 if time.days
#=> 182.5

if /^e(.\*)/ == 'enter'
  that.1   #=> 'nter'

if half-year?
  that \* 2 #=> 365

var time, that, halfYear; time \= { days: 365 }; if (that \= time.days) { halfYear \= that / 2; } if (that \= /^e(.\*)/.exec('enter')) { that\[1\]; } if ((that \= halfYear) != null) { that \* 2; }

## Loops and Comprehensions

There are three basic forms of `for` loop. One that iterates through a range of numbers, one that iterates through items in a list, and one that iterates through keys and values of an object.

We will first examine the `for` loop that iterates through a range of numbers. It has the structure of: `for (let) (VAR) (from NUM) (to|til NUM) (by NUM) (when COND)` - (almost everything is optional).

`let` has the effect of wrapping the loop body in an immediately invoked function expression, useful for when you are creating functions in a loop and want the loop variables to be the current - not final - values in the function when it is called. It's also useful as it means the variables in your loop are not exposed to the loops surrounding scope.

Counting `from` a number, if omitted defaults to `0`.

Counting up `to` and including a number, or counting up `til` (but not including) a number.

`by` is the step value, the default is `1`.

`when`, (alias `case`, `|`) is an optional guard.

If used as an expression, loops will evaluate to a list.

for i from 1 to 10 by 3 i

for i from 1 to 10 by 3
  i

var i$, i; for (i$ \= 1; i$ <= 10; i$ += 3) { i \= i$; i; }

`for ... in` loops iterate through a list. They have the structure: `for (let) (VAL-VAR)(, INDEX-VAR) in EXP (by NUM) (when COND)` - again almost everything is optional.

`let`, `by`, and `when` are as before.

`VAL-VAR` evaluates to the current value, while `INDEX-VAR` evaluates to the current index of the list. Either one is optional.

`EXP` should evaluate to an array.

for x in \[1 2 3\] x xs = for let x, i in \[1 to 10\] by 2 when x % 3 == 0 -> i + x xs\[0\]! #=> 5 xs\[1\]! #=> 17

for x in \[1 2 3\]
  x

xs = for let x, i in \[1 to 10\] by 2 when x % 3 == 0
  -> i + x
xs\[0\]! #=> 5
xs\[1\]! #=> 17

var i$, ref$, len$, x, xs, res$, i; for (i$ \= 0, len$ \= (ref$ \= \[1, 2, 3\]).length; i$ < len$; ++i$) { x \= ref$\[i$\]; x; } res$ \= \[\]; for (i$ \= 0, len$ \= (ref$ \= \[1, 2, 3, 4, 5, 6, 7, 8, 9, 10\]).length; i$ < len$; i$ += 2) { i \= i$; x \= ref$\[i$\]; if (x % 3 \=== 0) { res$.push((fn$.call(this, i, x))); } } xs \= res$; xs\[0\](); xs\[1\](); function fn$(i, x){ return function(){ return i + x; }; }

`for ... of` loops iterate through an object. They have the structure: `for (own) (let) (KEY-VAR)(, VAL-VAR) of EXP (when COND)` - again almost everything is optional.

`let` and `when` are as before.

`own` uses the `hasOwnProperty` check on the properties, stopping the iteration of properties higher up in the prototype chain.

`KEY-VAR` evaluates to the key of the property, and `VAL-VAR` evaluates to the property value. Either one is optional.

`EXP` should evaluate to an object.

for k, v of {a: 1, b: 2} "#k#v" xs = for own let key, value of {a: 1, b: 2, c: 3, d: 4} when value % 2 == 0 -> key + value xs\[0\]! #=> 'b2' xs\[1\]! #=> 'd4'

for k, v of {a: 1, b: 2}
  "#k#v"

xs = for own let key, value of {a: 1, b: 2, c: 3, d: 4} when value % 2 == 0
  -> key + value
xs\[0\]! #=> 'b2'
xs\[1\]! #=> 'd4'

var k, ref$, v, xs, res$, i$, key, value, own$ \= {}.hasOwnProperty; for (k in ref$ \= { a: 1, b: 2 }) { v \= ref$\[k\]; k + "" + v; } res$ \= \[\]; for (i$ in ref$ \= { a: 1, b: 2, c: 3, d: 4 }) if (own$.call(ref$, i$)) { key \= i$; value \= ref$\[i$\]; if (value % 2 \=== 0) { res$.push((fn$.call(this, key, value))); } } xs \= res$; xs\[0\](); xs\[1\](); function fn$(key, value){ return function(){ return key + value; }; }

Regular nested loops will evaluate to a list of lists.

result = for x to 3 for y to 2 x + y result #=> \[\[0, 1, 2\], \[1, 2, 3\], \[2, 3, 4\], \[3, 4, 5\]\]

result = for x to 3
  for y to 2
    x + y
result #=> \[\[0, 1, 2\], \[1, 2, 3\], \[2, 3, 4\], \[3, 4, 5\]\]

var result, res$, i$, x, lresult$, j$, y; res$ \= \[\]; for (i$ \= 0; i$ <= 3; ++i$) { x \= i$; lresult$ \= \[\]; for (j$ \= 0; j$ <= 2; ++j$) { y \= j$; lresult$.push(x + y); } res$.push(lresult$); } result \= res$; result;

You can omit one or both variables in `in`/`of` loops.

res = for , i in \[1 2 3\] i res #=> \[0, 1, 2\] for til 3 then func! \# calls func three times \[6 for til 3\] #=> \[6, 6, 6\]

res = for , i in \[1 2 3\]
  i
res #=> \[0, 1, 2\]

for til 3 then func!
# calls func three times

\[6 for til 3\] #=> \[6, 6, 6\]

var res, res$, i$, len$, i; res$ \= \[\]; for (i$ \= 0, len$ \= \[1, 2, 3\].length; i$ < len$; ++i$) { i \= i$; res$.push(i); } res \= res$; res; for (i$ \= 0; i$ < 3; ++i$) { func(); } for (i$ \= 0; i$ < 3; ++i$) { 6; }

List comprehensions always produce a list. Nested comprehensions produce a flattened list.

\[x + 1 for x to 10 by 2 when x isnt 4\] #=> \[1,3,7,9,11\] \["#x#y" for x in \[\\a \\b\] for y in \[1 2\]\] #=> \['a1','a2','b1','b2'\]

\[x + 1 for x to 10 by 2 when x isnt 4\]
#=> \[1,3,7,9,11\]







\["#x#y" for x in \[\\a \\b\] for y in \[1 2\]\]
#=> \['a1','a2','b1','b2'\]

var i$, x, ref$, len$, j$, ref1$, len1$, y; for (i$ \= 0; i$ <= 10; i$ += 2) { x \= i$; if (x !== 4) { x + 1; } } for (i$ \= 0, len$ \= (ref$ \= \['a', 'b'\]).length; i$ < len$; ++i$) { x \= ref$\[i$\]; for (j$ \= 0, len1$ \= (ref1$ \= \[1, 2\]).length; j$ < len1$; ++j$) { y \= ref1$\[j$\]; x + "" + y; } }

You can use whitespace to better format comprehensions.

\[{id:id1, name, age} for {id:id1, name} in table1 for {id:id2, age} in table2 when id1 is id2\]

\[{id:id1, name, age} for {id:id1, name} in table1
                     for {id:id2, age} in table2
                     when id1 is id2\]

var i$, ref$, len$, ref1$, id1, name, j$, len1$, ref2$, id2, age; for (i$ \= 0, len$ \= (ref$ \= table1).length; i$ < len$; ++i$) { ref1$ \= ref$\[i$\], id1 \= ref1$.id, name \= ref1$.name; for (j$ \= 0, len1$ \= (ref1$ \= table2).length; j$ < len1$; ++j$) { ref2$ \= ref1$\[j$\], id2 \= ref2$.id, age \= ref2$.age; if (id1 \=== id2) { ({ id: id1, name: name, age: age }); } } }

You can use the cascade to implicit refer to the value being mapped.

\[.. + 1 for \[1 2 3\]\] #=> \[2, 3, 4\] list-of-obj =
  \* name: 'Alice' age: 23 \* name: 'Betty' age: 26 \[..name for list-of-obj\] #=> \['Alice', 'Betty'\]

\[.. + 1 for \[1 2 3\]\] #=> \[2, 3, 4\]



list-of-obj =
  \* name: 'Alice'
    age: 23
  \* name: 'Betty'
    age: 26




\[..name for list-of-obj\] #=> \['Alice', 'Betty'\]

var i$, x$, ref$, len$, listOfObj, y$; for (i$ \= 0, len$ \= (ref$ \= \[1, 2, 3\]).length; i$ < len$; ++i$) { x$ \= ref$\[i$\]; x$ + 1; } listOfObj \= \[ { name: 'Alice', age: 23 }, { name: 'Betty', age: 26 } \]; for (i$ \= 0, len$ \= listOfObj.length; i$ < len$; ++i$) { y$ \= listOfObj\[i$\]; y$.name; }

Object comprehensions produce an object.

{\[key, val \* 2\] for key, val of {a: 1, b: 2}} #=> {a: 2, b: 4}

{\[key, val \* 2\] for key, val of {a: 1, b: 2}}
#=> {a: 2, b: 4}

var key, ref$, val; for (key in ref$ \= { a: 1, b: 2 }) { val \= ref$\[key\]; \[key, val \* 2\]; }

`while` loops:

i = 0 list = \[1 to 10\] while n < 9 n = list\[++i\]

i = 0
list = \[1 to 10\]
while n < 9
  n = list\[++i\]

var i, list, n; i \= 0; list \= \[1, 2, 3, 4, 5, 6, 7, 8, 9, 10\]; while (n < 9) { n \= list\[++i\]; }

`until` is equivalent to `while not`.

`while`/`until` can also accept a `when` guard, and an optional `else` clause which runs if the didn't run at all.

i = 1 list = \[1 to 10\] until i > 7 when n isnt 99 n = list\[++i\] else 10

i = 1
list = \[1 to 10\]
until i > 7 when n isnt 99
  n = list\[++i\]
else
  10

var i, list, yet$, n; i \= 1; list \= \[1, 2, 3, 4, 5, 6, 7, 8, 9, 10\]; for (yet$ \= true; !(i \> 7);) { yet$ \= false; if (n !== 99) { n \= list\[++i\]; } } if (yet$) { 10; }

Do while:

i = 0 list = \[1 to 10\] do i++ while list\[i\] < 9

i = 0
list = \[1 to 10\]
do
  i++
while list\[i\] < 9

var i, list; i \= 0; list \= \[1, 2, 3, 4, 5, 6, 7, 8, 9, 10\]; do { i++; } while (list\[i\] < 9);

While can also accept an update clause.

i = 0 list = \[1 to 10\] while list\[i\] < 9, i++ then i

i = 0
list = \[1 to 10\]
while list\[i\] < 9, i++ then i

var i, list; i \= 0; list \= \[1, 2, 3, 4, 5, 6, 7, 8, 9, 10\]; for (; list\[i\] < 9; i++) { i; }

While true:

i = 0 loop \\ha break if ++i > 20 i = 0 for ever \\ha if ++i > 20 break

i = 0
loop
  \\ha
  break if ++i > 20



i = 0
for ever
  \\ha
  if ++i > 20
     break

var i; i \= 0; for (;;) { 'ha'; if (++i \> 20) { break; } } i \= 0; for (;;) { 'ha'; if (++i \> 20) { break; } }

## Switch

`break` is automatically inserted, and multiple conditions are allowed.

switch 6 case 1 then \\hello case 2, 4 then \\boom case 6 'here it is' default \\something

switch 6
case 1    then \\hello
case 2, 4 then \\boom
case 6
  'here it is'
default \\something

switch (6) { case 1: 'hello'; break; case 2: case 4: 'boom'; break; case 6: 'here it is'; break; default: 'something'; }

If you switch on nothing, you switch on true. (It compile to switching on false so it can cast the cases to booleans with one `!` instead of two).

switch case 5 == 6 \\never case false 'also never' case 6 / 2 is 3 'here'

switch
case 5 == 6
  \\never
case false
  'also never'
case 6 / 2 is 3
  'here'

switch (false) { case 5 !== 6: 'never'; break; case !false: 'also never'; break; case 6 / 2 !== 3: 'here'; }

You can use `fallthrough` to stop automatic `break` insertion. It must be the last expression of the case block. As well, you can use a switch statement as an expression.

result = switch 6 case 6 something = 5 fallthrough case 4 'this is it' result #=> 'this is it'

result = switch 6
case 6
  something = 5
  fallthrough
case 4
  'this is it'

result #=> 'this is it'

var result, something; result \= (function(){ switch (6) { case 6: something \= 5; // fallthrough case 4: return 'this is it'; } }()); result;

`|` is an alias for `case`, and `=>` is an alias for `then`. `| otherwise` and `| _` are aliases for `default`.

switch 'moto' | "some thing" => \\hello | \\explosion \\bomb => \\boom | <\[ the moto ? \]> => 'here it is' | otherwise => \\something

switch 'moto'
| "some thing"     => \\hello
| \\explosion \\bomb => \\boom
| <\[ the moto ? \]> => 'here it is'
| otherwise        => \\something

switch ('moto') { case "some thing": 'hello'; break; case 'explosion': case 'bomb': 'boom'; break; case 'the': case 'moto': case '?': 'here it is'; break; default: 'something'; }

You can use `that` with a switch statement:

switch num | 2 => console.log that | otherwise => console.log that

switch num
| 2         => console.log that
| otherwise => console.log that

var that; switch (that \= num) { case 2: console.log(that); break; default: console.log(that); }

An implicit `switch` is added after arrows (eg. `->`), `:`, and `=` if the next token is `case`.

func = (param) ->
  | param.length < 5 => param.length
  | otherwise => param.slice 3 func 'hello' #=> lo state = | 2 + 2 is 5 => 'I love Big Brother' | \_ => 'I love Julia'

func = (param) ->
  | param.length < 5 => param.length
  | otherwise        => param.slice 3

func 'hello' #=> lo





state = | 2 + 2 is 5 => 'I love Big Brother'
        | \_          => 'I love Julia'

var func, state; func \= function(param){ switch (false) { case !(param.length < 5): return param.length; default: return param.slice(3); } }; func('hello'); state \= (function(){ switch (false) { case 2 + 2 !== 5: return 'I love Big Brother'; default: return 'I love Julia'; } }());

You can also use CoffeeScript style `switch` statements.

day = \\Sun switch day when "Mon" then 'go to work' when "Tue" then 'go to a movie' when "Thu" then 'go drinking' when "Fri", "Sat" 'go dancing' when "Sun" then 'drink more' else 'go to work'

day = \\Sun
switch day
  when "Mon" then 'go to work'
  when "Tue" then 'go to a movie'
  when "Thu" then 'go drinking'
  when "Fri", "Sat"
      'go dancing'
  when "Sun" then 'drink more'
  else 'go to work'

var day; day \= 'Sun'; switch (day) { case "Mon": 'go to work'; break; case "Tue": 'go to a movie'; break; case "Thu": 'go drinking'; break; case "Fri": case "Sat": 'go dancing'; break; case "Sun": 'drink more'; break; default: 'go to work'; }

## Assignment

Basic assignment is as you would expect, `variable = value`, and there is no need for variable declarations. However, unlike CoffeeScript, you must use `:=` to modify variables in upper scopes.

x = 10 do -> x = 5 x #=> 10 do -> x := 2 x #=> 2

x = 10


do ->
  x = 5

x #=> 10

do ->
  x := 2

x #=> 2

var x; x \= 10; (function(){ var x; return x \= 5; })(); x; (function(){ return x \= 2; })(); x;

Almost everything is an expression, which means you can do things like:

x = if 2 + 2 == 4 then 10 else 0 x #=> 10

x = if 2 + 2 == 4
    then 10
    else 0
x #=> 10

var x; x \= 2 + 2 \=== 4 ? 10 : 0; x;

Things such as loops, switch statements, and even try/catch statements are all expressions.

If you want to simply declare a variable and not initialize it, you can use `var`.

You can also declare constants in LiveScript using `const`. They are checked at compile time - the compiled JS is no different.

Attempting to compile the following:

const x = 10 x = 0

Results in `redeclaration of constant "x" on line 2`.

However, objects are not frozen if declared as constants - you can still modify their properties. You can force all variables to be constants if you compile with the `-k` or `--const` flags.

### Operators

Compound assignment:

(`?`, `||`, or `&&` can prefix any compound assign.)

x = 2 #=> 2 x += 2 #=> 4 x -= 1 #=> 3 x \*= 3 #=> 9 x /\= 3 #=> 3 x %= 3 #=> 0 x %%= 3 #=> 0 x <?= -1 #=> -1 x >?= 2 #=> 2 x \*\*= 2 #=> 4 x ^= 2 #=> 16 x ?= 10 x #=> 16 x ||= 5 #=> 16 x &&= 5 #=> 5 x &&+= 3 #=> 8 x ?\*= 2 #=> 16 xs = \[1 2\] xs ++= \[3\] xs #=> \[1 2 3\]

x = 2    #=> 2
x += 2   #=> 4
x -= 1   #=> 3
x \*= 3   #=> 9
x /= 3   #=> 3
x %= 3   #=> 0
x %%= 3  #=> 0
x <?= -1 #=> -1
x >?= 2  #=> 2
x \*\*= 2  #=> 4
x ^= 2   #=> 16

x ?= 10
x        #=> 16

x ||= 5  #=> 16
x &&= 5  #=> 5

x &&+= 3 #=> 8
x ?\*= 2  #=> 16

xs = \[1 2\]
xs ++= \[3\]
xs #=> \[1 2 3\]

var x, ref$, xs; x \= 2; x += 2; x \-= 1; x \*= 3; x /= 3; x %= 3; x \= ((x) % (ref$ \= 3) + ref$) % ref$; x <= (ref$ \= \-1) || (x \= ref$); x \>= 2 || (x \= 2); x \= Math.pow(x, 2); x \= Math.pow(x, 2); x \== null && (x \= 10); x; x || (x \= 5); x && (x \= 5); x && (x += 3); x != null && (x \*= 2); xs \= \[1, 2\]; xs \= xs.concat(\[3\]); xs;

Unary Assignment:

y = \\45 +  = y #=> 45   (make into number) !! = y #=> true (make into boolean) -~-~ = y #=> 3    (intcasting bicrement)

y = \\45
+  = y   #=> 45   (make into number)
!! = y   #=> true (make into boolean)
-~-~ = y #=> 3    (intcasting bicrement)

var y; y \= '45'; y \= +y; y \= !!y; y \= \-~-~y;

Assignment defaults - you can use `||`, `&&`, and `?`.

You can use `=` instead of `?` in function parameters.

x ? y = 10 y #=> 10 f = (z = 7) -> z f 9 #=> 9 f! #=> 7

x ? y = 10
y        #=> 10

f = (z = 7) -> z
f 9      #=> 9
f!       #=> 7

var y, f; (typeof x \== 'undefined' || x \=== null) && (y \= 10); y; f \= function(z){ z \== null && (z \= 7); return z; }; f(9); f();

Soak assign - performs assign only if the right operand exists:

age = 21 x? = age x #=> 21 x? = years x #=> 21

age = 21
x? = age
x #=> 21


x? = years
x #=> 21

var age, x; age \= 21; if (age != null) { x \= age; } x; if (typeof years != 'undefined' && years !== null) { x \= years; } x;

### Destructuring

Destructuring is a powerful way to extract values from variables. Rather than assigning to a simple variable, you can assign to data structures, which extract the values. For example:

\[first, second\] = \[1, 2\] first #=> 1 second #=> 2

\[first, second\] = \[1, 2\]
first  #=> 1
second #=> 2

var ref$, first, second; ref$ \= \[1, 2\], first \= ref$\[0\], second \= ref$\[1\]; first; second;

You can also use splats:

\[head, ...tail\] = \[1 to 5\] head #=> 1 tail #=> \[2,3,4,5\] \[first, ...middle, last\] = \[1 to 5\] first #=> 1 middle #=> \[2,3,4\] last #=> 5

\[head, ...tail\] = \[1 to 5\]
head #=> 1
tail #=> \[2,3,4,5\]



\[first, ...middle, last\] = \[1 to 5\]
first  #=> 1
middle #=> \[2,3,4\]
last   #=> 5

var ref$, head, tail, first, i$, middle, last, slice$ \= \[\].slice; ref$ \= \[1, 2, 3, 4, 5\], head \= ref$\[0\], tail \= slice$.call(ref$, 1); head; tail; ref$ \= \[1, 2, 3, 4, 5\], first \= ref$\[0\], middle \= 1 < (i$ \= ref$.length \- 1) ? slice$.call(ref$, 1, i$) : (i$ \= 1, \[\]), last \= ref$\[i$\]; first; middle; last;

...and objects too!

{name, age} = {weight: 110, name: 'emma', age: 20} name #=> 'emma' age #=> 20

{name, age} = {weight: 110, name: 'emma', age: 20}
name #=> 'emma'
age  #=> 20

var ref$, name, age; ref$ \= { weight: 110, name: 'emma', age: 20 }, name \= ref$.name, age \= ref$.age; name; age;

You can also name the entity which you are destructuring using `:label`, as well as arbitrarily nest the destructuring.

\[\[x, ...xs\]:list1, \[y, ...ys\]:list2\] = \[\[1,2,3\],\[4,5,6\]\] x #=> 1 xs #=> \[2,3\] list1 #=> \[1,2,3\] y #=> 4 ys #=> \[5,6\] list2 #=> \[4,5,6\]

\[\[x, ...xs\]:list1, \[y, ...ys\]:list2\] = \[\[1,2,3\],\[4,5,6\]\]
x     #=> 1
xs    #=> \[2,3\]
list1 #=> \[1,2,3\]
y     #=> 4
ys    #=> \[5,6\]
list2 #=> \[4,5,6\]

var ref$, list1, x, xs, list2, y, ys, slice$ \= \[\].slice; ref$ \= \[\[1, 2, 3\], \[4, 5, 6\]\], list1 \= ref$\[0\], x \= list1\[0\], xs \= slice$.call(list1, 1), list2 \= ref$\[1\], y \= list2\[0\], ys \= slice$.call(list2, 1); x; xs; list1; y; ys; list2;

### Substructuring

Easily set properties of lists and objects.

mitch =
  age: 21 height: 180cm pets:    \[\\dog, \\goldfish\] phile = {} phile{height, pets} = mitch phile.height #=> 180 phile.pets #=> \['dog', 'goldfish'\]

mitch =
  age:    21
  height: 180cm
  pets:    \[\\dog, \\goldfish\]


phile = {}
phile{height, pets} = mitch
phile.height #=> 180
phile.pets   #=> \['dog', 'goldfish'\]

var mitch, phile; mitch \= { age: 21, height: 180, pets: \['dog', 'goldfish'\] }; phile \= {}; phile.height \= mitch.height, phile.pets \= mitch.pets; phile.height; phile.pets;

## Property Access

The standard:

\[1 2 3\]\[1\] #=> 2 {a: 1, b: 2}.b #=> 2

\[1 2 3\]\[1\]     #=> 2
{a: 1, b: 2}.b #=> 2

\[1, 2, 3\]\[1\]; ({ a: 1, b: 2 }).b;

Dot Access - dot operators can accept many more things other than identifiers as their right operand, including numbers, strings, parentheses, brackets, and braces.

x = "hello world": \[4 \[5 boom: 6\]\] x.'hello world'.1.\[0\] #=> 5

x = "hello world": \[4 \[5 boom: 6\]\]
x.'hello world'.1.\[0\] #=> 5

var x; x \= { "hello world": \[ 4, \[ 5, { boom: 6 } \] \] }; x\['hello world'\]\[1\]\[0\];

Accessignment using `.=`.

document.title .= to-upper-case! #=> LIVESCRIPT ...

document.title .= to-upper-case! #=> LIVESCRIPT ...

document.title \= document.title.toUpperCase();

Array slice and splice:

list = \[1 2 3 4 5\] list\[2, 4\] #=> \[3,5\] list\[1 to 3\] #=> \[2,3,4\] list\[1 til 3\] #=> \[2,3\] list\[1 til 4 by 2\] #=> \[2,4\] list\[1 til 3\] = \[7 8\] list #=> \[1,7,8,4,5\]

list = \[1 2 3 4 5\]
list\[2, 4\]         #=> \[3,5\]
list\[1 to 3\]       #=> \[2,3,4\]
list\[1 til 3\]      #=> \[2,3\]
list\[1 til 4 by 2\] #=> \[2,4\]
list\[1 til 3\] = \[7 8\]
list               #=> \[1,7,8,4,5\]

var list, ref$; list \= \[1, 2, 3, 4, 5\]; \[list\[2\], list\[4\]\]; \[list\[1\], list\[2\], list\[3\]\]; \[list\[1\], list\[2\]\]; \[list\[1\], list\[3\]\]; ref$ \= \[7, 8\], list\[1\] \= ref$\[0\], list\[2\] \= ref$\[1\]; list;

Object slice:

obj = one: 1, two: 2 obj{first: one, two} #=> {first: 1, two: 2}

obj = one: 1, two: 2
obj{first: one, two} #=> {first: 1, two: 2}

var obj; obj \= { one: 1, two: 2 }; ({ first: obj.one, two: obj.two });

Length star `*`.

list = \[1 2 3 4 5\] list\[\*\] = 6 list #=> \[1,2,3,4,5,6\] list\[\*-1\] #=> 6

list = \[1 2 3 4 5\]
list\[\*\] = 6
list        #=> \[1,2,3,4,5,6\]
list\[\*-1\]   #=> 6

var list; list \= \[1, 2, 3, 4, 5\]; list\[list.length\] \= 6; list; list\[list.length \- 1\];

Semiautovivification `.{}`, `.[]` ensures that the property exists as an object or as an array.

x = "hello world": \[4 \[5 boom: 6\]\] x.\[\]'hello world'.1.{}1.boom #=> 6 x.\[\]arr.{}1.y = 9 x.arr.1.y #=> 9

x = "hello world": \[4 \[5 boom: 6\]\]
x.\[\]'hello world'.1.{}1.boom #=> 6


x.\[\]arr.{}1.y = 9
x.arr.1.y #=> 9

var x, ref$; x \= { "hello world": \[ 4, \[ 5, { boom: 6 } \] \] }; ((ref$ \= (x\['hello world'\] || (x\['hello world'\] \= \[\]))\[1\])\[1\] || (ref$\[1\] \= {})).boom; ((ref$ \= x.arr || (x.arr \= \[\]))\[1\] || (ref$\[1\] \= {})).y \= 9; x.arr\[1\].y;

Binding access `.~` retrieves an object's method as bound to the object. With automatic dot insertion you can just use `~`.

Note that this is not the same as the `.bind` method on `Function`. With `.~`, the method is dynamically bound; `foo~bar` will refer to the value of `bar` on `foo` at the time the bound function is invoked, not at the time the binding access is made.

obj =
  x: 5 add: (y) -> @x + y target =
  x: 600 not-bound: obj.add
  bound: obj~add target.not-bound 5 #=> 605 target.bound 5 #=> 10 \# Binding access is dynamic: obj.add = (y) -> @x + 1000\*y target.bound 5 #=> 5005

obj =
  x: 5
  add: (y) -> @x + y

target =
  x: 600
  not-bound: obj.add
  bound: obj~add

target.not-bound 5 #=> 605
target.bound 5     #=> 10

# Binding access is dynamic:
obj.add = (y) -> @x + 1000\*y
target.bound 5     #=> 5005

var obj, target; obj \= { x: 5, add: function(y){ return this.x + y; } }; target \= { x: 600, notBound: obj.add, bound: bind$(obj, 'add') }; target.notBound(5); target.bound(5); obj.add \= function(y){ return this.x + 1000 \* y; }; target.bound(5); function bind$(obj, key, target){ return function(){ return (target || obj)\[key\].apply(obj, arguments) }; }

### Cascades

A cascade always evaluates to the item being accessed, and not to the return value of the accessing operations.

Beautiful chaining:

a = \[2 7 1 8\]
  ..push 3 ..shift!
  ..sort! a #=> \[1,3,7,8\] document.query-selector \\h1 ..style
    ..color = \\red ..font-size = \\large ..inner-HTML = 'LIVESCRIPT!'

a = \[2 7 1 8\]
  ..push 3
  ..shift!
  ..sort!
a #=> \[1,3,7,8\]

document.query-selector \\h1
  ..style
    ..color = \\red
    ..font-size = \\large
  ..inner-HTML = 'LIVESCRIPT!'

var x$, a, y$, z$; x$ \= a \= \[2, 7, 1, 8\]; x$.push(3); x$.shift(); x$.sort(); a; y$ \= document.querySelector('h1'); z$ \= y$.style; z$.color \= 'red'; z$.fontSize \= 'large'; y$.innerHTML \= 'LIVESCRIPT!';

Cascades are callable, and can include arbitrary code.

console.log x = 1 y = 2 .. x, y \# prints \`1 2\` to the console

console.log
  x = 1
  y = 2
  .. x, y
# prints \`1 2\` to the console

var x$, x, y; x$ \= console.log; x \= 1; y \= 2; x$(x, y);

You can use `with` to specify the part of the preceding expression to cascade.

x = with {a: 1, b: 2}
  ..a = 7 ..b += 9 x #=>  {a: 7, b: 11}

x = with {a: 1, b: 2}
  ..a = 7
  ..b += 9
x #=>  {a: 7, b: 11}

var x, x$; x \= (x$ \= { a: 1, b: 2 }, x$.a \= 7, x$.b += 9, x$); x;

## Exceptions

You can throw exceptions with the aptly named `throw`.

throw new Error 'an error has occurred!'

throw new Error 'an error has occurred!'

throw new Error('an error has occurred!');

You can catch and deal with exceptions with the `try` `catch` `finally` block. Both `catch` and `finally` are optional.

The `try` block is attempted. If an exception occurs, the `catch` block is executed. It is supplied with the exception object. If you do not specify the name of this variable it will default to `e`. Unlike JavaScript, the exception variable is scoped to the nearest function, not the `catch` block. You can destructure the exception object if you wish.

try ... try ... catch 2 + 2 e.message x = try ... catch {message} message x #=> unimplemented

try
  ...

try
  ...
catch
  2 + 2
e.message

x = try
  ...
catch {message}
  message

x #=> unimplemented

var e, x, message; try { throw Error('unimplemented'); } catch (e$) {} try { throw Error('unimplemented'); } catch (e$) { e \= e$; 2 + 2; } e.message; x \= (function(){ try { throw Error('unimplemented'); } catch (e$) { message \= e$.message; return message; } }()); x;

The `finally` block is executed after the `try` or `catch`, regardless of what has happened.

try ... catch handle-exception e finally do-something! try ... finally do-something!

try
  ...
catch
  handle-exception e
finally
  do-something!

try
  ...
finally
  do-something!

var e; try { throw Error('unimplemented'); } catch (e$) { e \= e$; handleException(e); } finally { doSomething(); } try { throw Error('unimplemented'); } finally { doSomething(); }

## Object Oriented Programming

Classes are simple sugar for the definition of constructor functions and the setting of their prototype.

The constructor function is defined as function literal at the top level of the class definition.

Properties of its prototype are defined by object literals at the top level.

class A (num) -> @x = num property: 1 method: (y) -> @x + @property + y a = new A 3 a.x #=> 3 a.property #=> 1 a.method 6 #=> 10

class A
  (num) ->
    @x = num
  property: 1
  method: (y) ->
    @x + @property + y

a = new A 3
a.x        #=> 3
a.property #=> 1
a.method 6 #=> 10

var A, a; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; function A(num){ this.x \= num; } A.prototype.property \= 1; A.prototype.method \= function(y){ return this.x + this.property + y; }; return A; }()); a \= new A(3); a.x; a.property; a.method(6);

Static properties (properties attached to the constructor) are defined by adding properties to `this` at the top level. These properties can be accessed in methods by accessing `constructor` (shorthand `@@`).

class A @static-prop = 10 get-static: -> @@static-prop + 2 A.static-prop #=> 10 a = new A a.get-static! #=> 12

class A
  @static-prop = 10
  get-static: ->
    @@static-prop + 2

A.static-prop #=> 10
a = new A
a.get-static! #=> 12

var A, a; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; A.staticProp \= 10; A.prototype.getStatic \= function(){ return constructor.staticProp + 2; }; function A(){} return A; }()); A.staticProp; a \= new A; a.getStatic();

Private static properties are defined as just regular variables in the class body. (note: private instance properties are not possible in JavaScript, and thus, LiveScript.)

class A secret = 10 get-secret: -> secret a = new A a.get-secret! #=> 10

class A
  secret = 10

  get-secret: ->
    secret

a = new A
a.get-secret! #=> 10

var A, a; A \= (function(){ A.displayName \= 'A'; var secret, prototype \= A.prototype, constructor \= A; secret \= 10; A.prototype.getSecret \= function(){ return secret; }; function A(){} return A; }()); a \= new A; a.getSecret();

You can define bound methods (using `~>`, which have their definition of `this` bound to the instance.

class A x: 10 bound-func: (x) ~> @x
  reg-func: (x) -> @x a = new A obj =
  x: 1 bound: a.bound-func
  reg: a.reg-func obj.bound! #=> 10 obj.reg! #=> 1

class A
  x: 10
  bound-func: (x) ~>
    @x
  reg-func: (x) ->
    @x

a = new A
obj =
  x: 1
  bound: a.bound-func
  reg: a.reg-func

obj.bound! #=> 10
obj.reg!   #=> 1

var A, a, obj; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; A.prototype.x \= 10; A.prototype.boundFunc \= function(x){ return this.x; }; A.prototype.regFunc \= function(x){ return this.x; }; function A(){ this.boundFunc \= bind$(this, 'boundFunc', prototype); } return A; }()); a \= new A; obj \= { x: 1, bound: a.boundFunc, reg: a.regFunc }; obj.bound(); obj.reg(); function bind$(obj, key, target){ return function(){ return (target || obj)\[key\].apply(obj, arguments) }; }

You can easily set properties in constructor functions and in methods using the object setting parameter shorthand.

class A (@x) ->

  f: (@y) -> @x + @y a = new A 2 a.x #=> 2 a.f 3 #=> 5 a.y #=> 3

class A
  (@x) ->

  f: (@y) ->
    @x + @y

a = new A 2
a.x   #=> 2
a.f 3 #=> 5
a.y   #=> 3

var A, a; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; function A(x){ this.x \= x; } A.prototype.f \= function(y){ this.y \= y; return this.x + this.y; }; return A; }()); a \= new A(2); a.x; a.f(3); a.y;

If you define the constructor as a bound function `~>`, you don't need to use `new` when making a new instance.

class A (@x) ~> a = A 4 a.x #=> 4

class A
  (@x) ~>

a = A 4
a.x #=> 4

var A, a; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; function A(x){ var this$ \= this instanceof ctor$ ? this : new ctor$; this$.x \= x; return this$; } function ctor$(){} ctor$.prototype \= prototype; return A; }()); a \= A(4); a.x;

For higher level libraries and frameworks, there is the ability to define the constructor as an external function, by setting the property `constructor$$`. This is not recommended for regular coding.

f = (@x) -> class A constructor$$: f a = new A 5 a.x #=> 5

f = (@x) ->

class A
  constructor$$: f

a = new A 5
a.x #=> 5

var f, A, a; f \= function(x){ this.x \= x; }; A \= (function(){ A.displayName \= 'A'; var constructor$$, prototype \= A.prototype, constructor \= A; function A(){ return constructor$$.apply(this, arguments); } constructor$$ \= f; return A; }()); a \= new A(5); a.x;

You can inherit with `extends`

class A -> @x = 1 @static-prop = 8 method: -> @x + 2 class B extends A -> @x = 10 B.static-prop #=> 8 b = new B b.x #=> 10 b.method! #=> 12

class A
  ->
    @x = 1
  @static-prop = 8
  method: ->
    @x + 2

class B extends A
  ->
    @x = 10

B.static-prop #=> 8
b = new B
b.x       #=> 10
b.method! #=> 12

var A, B, b; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; function A(){ this.x \= 1; } A.staticProp \= 8; A.prototype.method \= function(){ return this.x + 2; }; return A; }()); B \= (function(superclass){ var prototype \= extend$((import$(B, superclass).displayName \= 'B', B), superclass).prototype, constructor \= B; function B(){ this.x \= 10; } return B; }(A)); B.staticProp; b \= new B; b.x; b.method(); function extend$(sub, sup){ function fun(){} fun.prototype \= (sub.superclass \= sup).prototype; (sub.prototype \= new fun).constructor \= sub; if (typeof sup.extended \== 'function') sup.extended(sub); return sub; } function import$(obj, src){ var own \= {}.hasOwnProperty; for (var key in src) if (own.call(src, key)) obj\[key\] \= src\[key\]; return obj; }

This is especially useful with `super`. If bare, `super` is a reference to the appropriate function. If you want to call it with all arguments, use `super ...`.

class A -> @x = 1 method: (num) -> @x + num class B extends A -> @y = 2 super!

  method: (num) -> @y + super ... b = new B b.y #=> 2 b.method 10 #=> 13

class A
  ->
    @x = 1
  method: (num) ->
    @x + num

class B extends A
  ->
    @y = 2
    super!

  method: (num) ->
    @y + super ...

b = new B
b.y #=> 2
b.method 10 #=> 13

var A, B, b; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; function A(){ this.x \= 1; } A.prototype.method \= function(num){ return this.x + num; }; return A; }()); B \= (function(superclass){ var prototype \= extend$((import$(B, superclass).displayName \= 'B', B), superclass).prototype, constructor \= B; function B(){ this.y \= 2; B.superclass.call(this); } B.prototype.method \= function(num){ return this.y + superclass.prototype.method.apply(this, arguments); }; return B; }(A)); b \= new B; b.y; b.method(10); function extend$(sub, sup){ function fun(){} fun.prototype \= (sub.superclass \= sup).prototype; (sub.prototype \= new fun).constructor \= sub; if (typeof sup.extended \== 'function') sup.extended(sub); return sub; } function import$(obj, src){ var own \= {}.hasOwnProperty; for (var key in src) if (own.call(src, key)) obj\[key\] \= src\[key\]; return obj; }

You can use mixins through `implements`. You can only inherit from one class, but can mixin as many objects as you like. Remember, if you want to implement a class, not just a simple object, you must implement the class's prototype.

Renameable =
  set-name: (@name) ->
  get-name: -> @name ? @id class A implements Renameable -> @id = Math.random! \* 1000 a = new A a.get-name! #=> some random number a.set-name 'moo' a.get-name! #=> 'moo'

Renameable =
  set-name: (@name) ->
  get-name: -> @name ? @id

class A implements Renameable
  ->
    @id = Math.random! \* 1000

a = new A
a.get-name! #=> some random number
a.set-name 'moo'
a.get-name! #=> 'moo'

var Renameable, A, a; Renameable \= { setName: function(name){ this.name \= name; }, getName: function(){ var ref$; return (ref$ \= this.name) != null ? ref$ : this.id; } }; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; importAll$(prototype, arguments\[0\]); function A(){ this.id \= Math.random() \* 1000; } return A; }(Renameable)); a \= new A; a.getName(); a.setName('moo'); a.getName(); function importAll$(obj, src){ for (var key in src) obj\[key\] \= src\[key\]; return obj; }

To modify the prototype, you can use the shorthand `::`, and you can use the `::=` operator if you wish to modify several properties.

class A prop: 10 f: -> @prop a = new A b = new A a.f! #=> 10 A::prop = 6 a.f! #=> 6 b.f! #=> 6 A ::=
  prop: 5 f: -> @prop + 4 a.f! #=> 9 b.f! #=> 9

class A
  prop: 10
  f: ->
    @prop

a = new A
b = new A
a.f! #=> 10

A::prop = 6
a.f! #=> 6
b.f! #=> 6

A ::=
  prop: 5
  f: ->
    @prop + 4
a.f! #=> 9
b.f! #=> 9

var A, a, b, ref$; A \= (function(){ A.displayName \= 'A'; var prototype \= A.prototype, constructor \= A; A.prototype.prop \= 10; A.prototype.f \= function(){ return this.prop; }; function A(){} return A; }()); a \= new A; b \= new A; a.f(); A.prototype.prop \= 6; a.f(); b.f(); ref$ \= A.prototype; ref$.prop \= 5; ref$.f \= function(){ return this.prop + 4; }; a.f(); b.f();

If you don't wish to support older browsers, and desire the use of `Object.defineProperty`, you can use the following shorthand:

class Box dimensions:~
    -> @d
    (\[width, height\]) -> @d = "#{width}x#height" b = new Box b.dimensions = \[10 5\] b.dimensions #=> '10x5'

class Box
  dimensions:~
    -> @d
    (\[width, height\]) -> @d = "#{width}x#height"

b = new Box
b.dimensions = \[10 5\]
b.dimensions #=> '10x5'

var Box, b; Box \= (function(){ Box.displayName \= 'Box'; var prototype \= Box.prototype, constructor \= Box; Object.defineProperty(Box.prototype, 'dimensions', { get: function(){ return this.d; }, set: function(arg$){ var width, height; width \= arg$\[0\], height \= arg$\[1\]; this.d \= width + "x" + height; }, configurable: true, enumerable: true }); function Box(){} return Box; }()); b \= new Box; b.dimensions \= \[10, 5\]; b.dimensions;

---

## CoffeeScript to LiveScript Conversion Guide

-   Change all your fat arrows `=>` to wavy arrows `~>`
-   Change all your block comments `### ###` to `/* */`
-   Change all `undefined` to `void`
-   Change any range syntax creating lists from `[x..y]` to `[x to y]` and change `[x...y]` to `[x til y]`. If your range goes downwards, ie. from a larger number to a smaller number, and it is not obvious (the from and to are not literals), then you must add `by -1`, eg. `[x to -3 by -1]`
-   Similarly, change any range syntax in for loops from `for i in [x..y]` to `for i from x to y` and change `for i in [x...y]` to `for i from x til y`
-   Change any list comprehensions from `(x for x in list)` to `[x for x in list]`. Any postfix loops which you do not want returning a list, change to not postfixed, eg. change `increase x for x in list` to `for x in list then increase x`. You can shave characters if you wish by using the alias to `then`, the fat arrow `=>`
-   Change any number literals starting with a dot, eg. `.5` to start with a zero `0.5`
-   Change any regular expression literals from `/// ///` to `// //`
-   Change any splats you are using from `(args...) ->` to be prefixed like `(...args) ->`
-   Remove the parentheses from function definitions with no parameters, `() ->` simply becomes `->` - this is because `()` is always a call.
-   Change your constructor functions in your classes from being defined as
    
    class Item
      constructor: ->
    
    to simply being functions at the top level of your class body, eg.
    
    class Item
      ->
    
    If your constructor is an external function, define it with the special property `constructor$$`.
-   Change any calls to super from `super` to `super ...` - this is because `super` is a direct reference to the parent function rather than a call itself.
-   Change any bitwise operators to themselves surrounded by dots. Eg. `&` is now `.&.` and `>>` is now `.>>.`
-   If you are modifying variables in upper scopes at any time, eg.
    
    x = 10
    do ->
      x = 5
    
    you must use `:=` instead of just `=` as that will declare a new (shadowing) variable in LiveScript. Thus, the above code would need to be
    
    x = 10
    do ->
      x := 5
    
    if you wanted to modify `x`
-   If you are using nested list comprehensions (eg. `(x + y for x in [1, 2] for y in [3, 4])`, you will need to change this to a regular (non-postfixed) nested loop, as instead of the result being a lists within a list as in CoffeScript (the result of the example would be `[[4,5],[5,6]]`), the result is flattened (the result of the example in LiveScript would be `[4,5,5,6]`). Eg. change
    
    result = (x + y for x in \[1, 2\] for y in \[3, 4\])
    
    to
    
    result = for x in \[1, 2\]
      for y in \[3, 4\]
        x + y
    
    in order to get the non-flattened result.
-   Change the name of any of your variables named `it`, `that`, `fallthrough`, or `otherwise`. Those are terrible names for variables so you should change them anyway. This technically isn't required in all cases, but will be less confusing if you do so in all cases. `it` is used as the implicit argument of functions defined with no parameters, eg. `reverse = -> it.reverse!`. `that` refers to the value of the condition, for instance `that + 2 if (x + 10)/(y - 18)`, `that == (x + 10)/(y-18)`. `fallthrough`, if used at the end of a case block makes that block fallthrough to the next case. `otherwise`, if used directly after case, turns that case into default.
-   If you have any multiline strings non triple quoted strings (using `"string"` or `'string'`), eg.
    
    text = "hi 
            there"
    
    you will have to change them as in CoffeeScript this would be `"hi         there"` while LiveScript ignores indentation after newlines so it would be `"hi there"`
-   `and`, `or` and spaced `.` and `?.` close implicit calls, so you will have to change any code involving those where you have depended on CoffeeScript to not close the call. Eg. `f a .g b or h c` would be `f(a.g(b || h(c)))` in CoffeeScript and `f(a).g(b) || h(c)` in LiveScript. You can use `||` instead of `or` and `&&` instead of `and` as those versions do not close implicit calls.
-   Change any `do`s special casing function literals to using `let`. Eg. in CoffeeScript `do ($ = jQuery) -> $` change to
    
    let $ = jQuery
      $
    
-   Change any implicit calls against blocks starting with an implicit objects to use `do`. Eg. change
    
    f
      a: b
    
    into
    
    f do
      a: b
    
-   Change any JavaScript code literals, eg. `` `js code here` `` to ` ``js code here`` `
-   Change any dually spaced property access, eg. `x . y` to be either spaced on only one side or not at all. A dually spaced dot is now used to compose functions.
-   Change any non spaced identifier subtraction, eg. `a-b` to spaced `a - b`. `a-1` and `1-b` are still fine. This is because `a-b` is a valid identifier in LiveScript, equivalent to its camel case, `aB`.

## Changelog

### 1.6.0

#### Breaking changes

-   `{a, b, ...c} = a: 1 b: 2 c: 3 x: 4` now sets `c = c: 3 x: 4` instead of `c = {} <<< 3`. (See [#941][16].)
-   `o{k: a.complex.expression}`, `{a xor b}`, `foo.bar = [a, b]:c`, `{...x ? y} = z` are all now errors. (See [#958][17] for rationales.)
-   `a ?+= b` now means `a? && a += b` instead of `a? || a += b` (See [#969][18].)

#### Features

-   Added `async` functions and generators ([#978][19], [#1063][20])
-   Added support for more complex object shorthand, such as `{a.b!c?key}` ([#958][21])
-   Support ES6 iterators in splats ([#963][22])
-   In Node, added a `process.argv.lsc` property for getting interpreted script arguments reliably ([#1014][23])

#### Fixes

-   Anaphorization bugs ([#743][24], [#957][25])
-   Report error for labeled and curried functions ([#751][26])
-   Implicit `it` parameter not defined when used in object shorthand ([#899][27])
-   Forking bug ([#916][28])
-   `for in` lexing bug ([#923][29])
-   `match` bug ([#926][30])
-   REPL bugs ([#928][31], [#929][32])
-   Binding access and object slices ([#930][33])
-   Reporting source file line numbers ([#953][34])
-   Various bugs with object slicing ([#958][35])
-   No more unreachable `break`s in compiled `switch` code ([#931][36])
-   Fixes for `-ce`, `-aj` combinations of options ([#993][37])
-   Loop variable in `for let ... when` guard ([#992][38])
-   Script argument regression ([#1013][39])
-   `a[]b ++ c`, `a[]b ++= c` ([#542][40], [#1028][41])
-   Show errors when running with `-w` option ([#1015][42])
-   `for [] ... else` ([#1035][43])
-   Move shebang lines above header comment ([#1032][44])
-   Empty words literal `<[ ]>` ([#739][45])
-   `for arr case .. in` ([#1039][46])
-   Fix for `_.member` in `match` ([#1025][47])
-   `yield` and `await` inside various `let` blocks ([#1019][48], [#1021][49], [#1023][50])
-   REPL mode on Windows ([#897][51])

### 1.5.0

#### Breaking changes

-   The LHS of `[a, ..., b, c, d] = [1 2 3]` now behaves the same as `[a, ...m, b, c, d]`. (See [#858][52].)
-   Unary operator spreading now requires a `...` before the list to spread over. (See [#863][53].)

#### Features

-   REPL gains a saved history file and autocompletion for globals ([#695][54])
-   Embedded source maps get generated when requiring a `.ls` file ([#786][55])
-   `.json.ls` files are handled appropriately when `require`d ([#884][56])
-   Class members are now assigned using the `ClassName.prototype.memberName =` pattern that permits JS optimization tools to identify them as such ([#853][57])
-   Added support for `[for x by y]` ([#837][58]), `[.. for from i to j by k]` ([#859][59])

#### Fixes

-   Grouping of logical expressions in match cases ([#584][60])
-   Bound binary operators ([#634][61])
-   Yield inside for-let ([#749][62])
-   Yield is callable ([#823][63])
-   Error evaluating `.ls` files with source maps on ([#830][64])
-   Windows path bug ([#835][65])
-   Loop edge cases you are very unlikely to encounter ([#841][66])
-   Heregexes ([#844][67])
-   Autovivification with slices ([#847][68])
-   Parsing error with nested comprehensions ([#854][69])
-   Performance improvement for splat args ([#857][70])

### 1.4.0

-   Changed npm name to `livescript` as npm no longer allows publishing updates to packages with upper-case letters
-   Added source map support using the `-m,--map` flag
-   Added command line JSON processing with JSON and the `-e,--eval` flag. Inbound JSON is bound to `this`
-   Fixed a regression from previous versions that did not allow for flag style positionals after a first positional (eg. `lsc app.ls --flag` caused an error)
-   Generators are no longer auto-hushed, moving behavior in line with what was expected
-   Allow backcall generators, eg. `*<-`
-   Added back `-k` shorthand for the `--const` flag
-   Made it possible to use the `by` keyword in slices, eg. `list[1 til 5 by 2]`
-   Object comprehension bug fixes
-   Fixed various backcall issues
-   Fixed composition operator spacing issues
-   Yield bug fixes - including allowing it to be used with no operand
-   Replaced deprecated usage of `customFds` in `child_process.spawn`
-   Added CLI tests
-   Many other bug fixes

### 1.3.1

-   Fixed bug with calling lsc file.ls with arguments ([#569][71])
-   Some object comprehension fixes
-   Fixed prededence of `return` and `throw` in respect to pipes.
-   Added back the `--require` option missing in 1.3.0, this option is great when starting the REPL. Also made modules accesible in a similar manner to `require!`. Eg. `--require './boom.js'` requires the file and allows you to access it with `boom`.
-   Fixed bug with `require!` compilation - an error is now thrown when it should be

### 1.3.0

-   Added support for generators and yield
-   Improved `require!`, more like regular destructering now
-   Fixed pipe and assign precedence
-   Removed auto infused IIFE, just use `for let` now
-   Browser versions changed to use browserify
-   Option parsing uses [Optionator][72]
-   Added `--no-header` option, to remove "Generated by..." header
-   Removed `livescript` from bin, just use `lsc`
-   Removed Slake and Slakefiles
-   Can now use `that` in the default case of a switch statement

### 1.2.0

-   Bug fixes
-   Better compilation of partially applied functions, eg. `10 |> f _, 2` is the same as `f 10, 2` when compiled
-   Better compilation of compose - no longer using helper function
-   Using prelude.ls version 1.0.3
-   `--prelude/-d` flag only used for repl now, does not add prelude.ls include when compiling
-   Generated header is added to the top of compiled files, specifying which version of LiveScript the JS was compiled with
-   Removed single line cascade due to lack of usefulness and ambiguity with other syntax
-   Removed deprecated features - inexistance op `!?`, `+++`, `where`, `undefined` (alias to void), short function syntax
-   To hush functions (stop them from automatically adding a return statement), you can now always add a `!` in front of the arrow. Eg. `(x) !-> x + x`
-   Autocompile `.json.ls` to `.json`
-   Added `for let`

### 1.1.1

-   Fix/close [#194][73], [#206][74], [#150][75], [#217][76], [#236][77], [#238][78], [#151][79], [#215][80], [#213][81], [#237][82], [#232][83], [#161][84], [#241][85]
-   Added `++` as array concat operator, to replace `+++` (which is now deprecated).
-   Added `++=` operator to complement the above.
-   Added quick map in comprehensions, using cascade reference. For example, instead of doing `[x + 1 for x in xs]` you can now write `[.. + 1 for xs]`, `..` being the implicit value. See [section for more details][86].
-   Added the ability to have unary operators in parameters. Eg. `(!x) -> ...` desugars to `(x) -> x = !x; ...`. You can use this to cast parameters to either booleans `(!!x) ->` or numbers `(+x) ->`. You can also clone objects so that you don't modify the original: `(^^x) ->`. See [section for more][87].
-   Bound curried functions `~~>` actually work now, and partially applied functions, eg. `f _, 1` are bound at the first time they are partially applied.
-   Deprecated the `+++` array concatenation operator, please use `++` instead. `+++` will be removed in the next major LiveScript release.
-   Deprecated the `where` statement. Please use `let` and/or local variables instead. `where` will be removed in the next major LiveScript release.
-   Deprecated `undefined` as an alias to `void`. Please use `void` instead. `undefined` will be removed in the next major LiveScript release.
-   Deprecated the `!?` inexistence operator. When used postfix, please negate the existence operator instead, eg. change `x!?` to `not x?`. If used as a logic operator, please use an if statement and the existence operator instead, eg. change `x !? f!` to `f! if x?`. `!?` will be removed in the next major LiveScript release.
-   Please also remember that the short function syntax is also currently deprecated and will be removed in the next major LiveScript release. Eg. `f(x) = ...` type functions - please use the long arrow to defined curried functions instead, eg. `f = (x) --> ...`.

### 1.1.0

-   `lsc` is now an alias for the `livescript` command, as `livescript` is quite long. Think "LiveScript Compiler".
-   Added single line cascades. Eg. `[1 2 3]..push 3 ..shift!..sort!`
-   Cascades are callable, eg.
    
    (+)
      .. 2 3
    
-   Removed previous usage of `with`, use `let @ = x` instead.
-   `with` can be used to specify the part of the expression to cascade. Eg.
    
    x = with \[1 2 3\]
      ..push 3
    
-   An empty catch `try x catch` returns its catchee.
-   `by -1` is not required in ranges where it is obvious.
-   Added shorthand for `constructor`: `@@`
-   Changed semiautovivification from using `x@y` and `x@@y` to using `x{}y` and `x[]y`
-   Nested loops (not comprehensions) no longer return flattened results when used as an expression.
    
    res = for x to 2
      for y to 3
        "#x#y"
    res #=> \[ \['00', '01', '02', '03'\], \['10', '11', '12', '13'\], \['20', '21', '22', '23'\] \]
    
    Use comprehensions instead if you want a flattened result. To make things easier, comprehensions can now be multiline.
    
    \["#x#y" for x to 2
                  for y to 3\]
    #=> \['00', '01', '02', '03', '10', '11', '12', '13', '20', '21', '22', '23'\]
    
-   Fixed bug where comprehensions inside comprehensions were returning flattened results, eg.
    
    \[\[x + y for x to 2\] for y to 3\]
    #=> \[ \[0, 1, 2\], \[1, 2, 3\], \[2, 3, 4\], \[3, 4, 5\] \]
    
    now returns an array of arrays as expected. If you were relying on this behavior, simply remove the brackets of the inner comprehension to make it a nested comprehension.
-   Added `require!`, which takes either a object, array, or string literal and creates a series of require statements. See [documentation][88].
-   Added the ability to call `super` outside of the class body, when adding static or instance methods to a class. Eg.
    
    class A extends B
    A::meth -> super ...
    A.stat -> super ...
    
-   The 'from' number in a range can be omitted, to be consistent with for loops. If the number is omitted, it is assumed to be `0`.
    
    \[to 3\]  #=> \[0, 1, 2, 3\]
    \[til 3\] #=> \[0, 1, 2\]
    
-   You can now define an external constructor in a class. This is mostly for compatibility with CoffeeScript, and for higher level libraries and frameworks. It is defined with `constructor$$:`. eg.
    
    class A
      constructor$$: some-external-func
    
-   You can now splat `new` eg. `new A ...a`
-   Class bodies are now executable. You can do things like:
    
    class A
      if condition
        method: -> ...
      else
        method2: -> ...
    
      for key of obj
        (key): -> ...
    
-   If you `do` a named function, and the `do` statement is not being used as an expression, the function retains its hoisting. Eg.
    
    f 1 #=> 1
    do function f x
      x
    
    compiles to
    
    f(1);
    function f(x){
      return x;
    } f();
    
-   You can now omit all variables from for loop definitions over a range. Eg.
    
    \[1 for til 3\] #=> \[1, 1, 1\]
    for til 3 then f!
    \[f! for from 1 to 5\]
    
-   Added `delete!` statement, like `delete` in JavaScript. This is slightly different from `delete` in LiveScript, which returns the deleted item if used as an expression.
    
    delete! x.y
    
-   Added back JavaScript code literals, for the sole purpose of allowing CoffeeScript to LiveScript compilation compatibility. Not to be used in regular code. JS literals are denoted with two backticks. ` ``js code`` `
-   `for` loop and comprehension indices are immutable. Use a `while` loop if you want to mutate indices. Also, the last value of the index is the last value it has in the loop.
-   You can destructure the `catch` parameter.
-   `in` works on sparse arrays for compatibility with CoffeeScript.
-   Bug fixes.

### 1.0.1

-   Bug fixes.

### 1.0.0

-   Nicer compilation for the compose op
-   The `--prelude`/`-d` flags work for the repl
-   New func syntax eg. `f(x) = x` now uses `~` for bound funcs, liked named funcs, eg. `~f(x) = x`
-   Removed no return option for new func syntax
-   Added function keyword arguments ala python, eg. `f = ({x = 2, y = 3}) -> x + y`, and then application with `f y: 4`
-   Removed overloading of `+` for list concatination (just use `+++`)
-   Readded bitwise compound assign, eg. `.&.=`
-   Added `where`, like `let` but comes after instead of before - also allows for nested assignments
-   Changed fuzzy equals (`==` in JS) to `~=`, `!~=` for the negation
-   Added `xor` operator, exclusive or - true if only one side or the other is true
-   Doing equals on a regex literal will compile to an exec, eg. `x == /[ae]/g` is `/[ae]/g.exec(x)` - you can use `that` to get the results if used in an if statement. The negation simply uses test.
-   Binary logic is callable, eg. `(f or g) x` is `f(x) || g(x)`
-   Allow splicing like in CoffeeScript, eg. `list[1 to x] = [1 2 3]`
-   Static functions are now inherited and support calls to `super`
-   Generated reference variables are now named with a `$` after them instead of `__` preceding. eg. `ref$` instead of `__ref`
-   Removed constructor shorthand, just use `constructor`
-   Added cascade op from coco `..`
-   Added deep compare, allows the comparison of objects, arrays, and more. `===` - experimental
-   Added `match` statement - experimental

### 0.9.12

-   Changed bitwise/shift operator syntax to be more clear. Now simply as in JS, but surrounded by dots. Eg. `&` is `.&.`, and `>>` is `.>>.`
-   Speed improvements
-   Allowed arbitrary expressions in slicing syntax, eg. `list[1 to x]`
-   Made classes work more like in CoffeeScript - details:
-   Constructors are now inherited
-   Allowed empty class definitions, eg. `class A extends B`
-   Bound methods (eg. `f: ~>`) are bound to the instance, not to the class

### 0.9.11

-   Bug fixes
-   Updated to work with node 0.8.x
-   Added partial application of funcs using `_` placeholder
-   Added infix `with` "cloneport", clones head and imports tail into that
-   Allow partial application of pipe `|>` and backpipe `<|` and use as function
-   Better compilation of various operators-as-functions
-   Added existential soak implicit call/lookup, eg. `(?length)`
-   Allow partially applied assign - `=`, `+=`, etc.
-   Removed `|>>` pipe operator - use normal pipes and partial application now
-   Changed backcall placeholder to underscore `_`
-   Added underscore `_` as alias to `otherwise` in switch statements
-   Added `--prelude` or `-d` option to automatically include [prelude.ls][89] in compiled files
-   Added `--const` or `-k` option to compile as if all variables are constants
-   Added partial application of property accessor eg. `(obj.)`
-   Removed cons `&` operator
-   Added `&` as alias to `arguments`, allowing `-> &0 + &1` etc.
-   Removed `@@` as alias to `arguments`
-   Increased precedence of the pipe `|>` operator to allow assignment of the entire thing without parens, not just of the first section
-   Added mixin feature `implements` thanks to Coco, eg. `class Cow extends Animal implements Mooer`, which does `::<<< Mooer` in the class body.

### 0.9.10

-   Now have \`const\` and \`var\` thanks to Coco
-   Implicit access and call functions, eg. `(.length)` and `(.join \|)` - useful for mapping/filtering, etc.
-   Bug fixes
-   Improved repl

### 0.9.9

-   Various bug fixes
-   Calling a curried funciton with no args calls it as is rather than returning itself
-   Allow partial application of second arg for infix functions

### 0.9.8

-   Object comprehensions added
-   Dashes in identifiers allowed (transformed to camel case)

### 0.9.7

-   Bug fixes
-   Precedence change of `&` and `+++`
-   Nicer pipe `|>` compilation

### 0.9.6

-   Partially applied operators
-   Operators as functions

### 0.9.5

-   Infix function calls added
-   JS literals removed
-   Improved CLI

### 0.9.4

-   Added proper list comprehensions
-   Removed post-fix loops

### 0.9.3

-   Changed node requirements

### 0.9.2

-   Improved CLI
-   Enabled expressions in range syntax

### 0.9.1

-   Changed number radix symbol to `~`
-   Added `%%=`

### 0.9.0

-   Initial public release, many changes. See [Changes from Coco][90] for more details.

For more details see [Changes from Coco][91].

---

## Inspiration

-   Functional languages in general
-   Haskell
-   F#

## Name

LiveScript was one of the original names for JavaScript, so it seemed fitting. It's an inside joke for those who know JavaScript well.

## Thanks

You can find the full list of contributors [here][92]. That list includes contributors to LiveScript and its predecessors.

People who have contributed directly to LiveScript include [George Zahariev][93], [Satoshi Murakami][94], [Joshua Weinstein][95], [Josh Perez][96], [Paul Miller][97], [vendethiel][98], [killdream][99], [audreyt][100], [clkao][101], [viclib][102], [dtinth][103], [racklin][104], [Raine Virta][105], [Diggory Blake][106], [Haspaker][107], [synapsos][108], [Rafael Belvederese][109], [Kara Brightwell][110], [Ryan Hendrickson][111], [impinball][112], [skovsgaard][113], [Piotr Klibert][114], [appedemic][115], [Geza Kovacs][116], [Isiah Meadows][117], [Kevin Goslar][118], [Kyle Kirby][119], [Richard][120], [Rob Loach][121], [Viacheslav Lotsmanov][122], [Vladislav Botvin][123], [Yin Zhong][124], [Allen Haim][125], [Bartosz][126], [dk00][127], [Marek Pepke][128], [Patrick Kettner][129].

Thank you to [Niels Groot Obbink][130] for giving me the [livescript.org][131] domain name.

An extra special thanks to Satoshi, as this project is a fork of his project [Coco][132] and would not be possible without it. It has been a pleasure to work off of his beautiful Coco compiler.

## Contributing Guide

Fork [LiveScript][133] and make your changes. Always write tests first (in the `/test` directory).

Check out the Makefile included - it has all the available commands.

Always make sure you can `make full` - ie. build the compiler itself. Useful: `git checkout -- lib && make full`: cleans out your `lib` and compiles twice and tests. Only send a pull requests if all tests pass. Once all tests pass, rewrite any of the compiler that needs rewriting, and then `make full`. Use `make test-harmony` to test with generators and such with node's `--harmony` flag.

Don't submit patches with a built browser file (`browser/livescript.js`) created by `make build-browser`. This file is only built before releasing a new version.

## Changes from Coco: Detail and Rationale

This section is has not been updated since 1.0.x

-   Renamed everything from Coco and Coke to LiveScript and Slake, and file extension from .co to .ls. Rationale for names chosen: LiveScript was the name of JavaScript before it was named JavaScript - thus it seemed like an appropriate name, also few if any other projects are named LiveScript. Slake because lake was taken and lsake sounds bad.
-   Switched so that `==` compiles into `===`, and also for the negatives. Rationale: Most people would want to use the JavaScript `===` more often than `==` and less typing is better, also this makes things more similar to CoffeeScript which compiles `==` to `===` so there is less code for people to change coming from CoffeeScript. The compilation of `is` to `===` stays the same.
-   Switched `in` and `of` so that they are like in CoffeeScript. In goes over values, of over keys. Rationale: People have to change less of their CoffeeScript code, they're used to it, and using `in` for checking if a value is in an array just seems right, using `of` just feels weird.
-   All bitwise operators except `~` have changed to be surrounded by dots, eg. `&` is now `.&.` and `>>` is `.>>.`. Bitwise assign equals (eg. `&=`) have been removed. Rationale: People rarely use the bitwise operators all the time, and they take up valuable symbols that could be used for other purposes. They are still available, just in a longer form. `~` is still there as is.
-   `=>`, the pipe operator using `_`, is removed. Free up => (for `then` alias), (`|` is used as an alias for case). Use other pipes (`|>`) and partial application instead.
-   `|` is an alias for `case` (used in switch) Rationale: less typing, looks good. Modelled after Haskell's guards.
-   `=>` is an alias for `then`. Rationale: will not be encouraged for use in if statements as it looks slightly odd - really for use in switch statements, when combined with `|`, to create a succinct and easy to understand structure. Based off of Haskell's use of -> in case expressions.
-   Added `otherwise` and underscore `_` as a contextual keyword, when used after `case` or `|`, making that the default statement. Rationale: same as in Haskell (otherwise), underscore as in Scala - and shorter. It allows `| otherwise => 4 + 9`, which fits in with the rest of the structure.
-   Added implicit `switch` after `->`, `~>`, `:`, or an assign when they are followed by case tokens (either `case` or `|`). Rationale: reduces typing and increases beauty in a common situation for using a switch, with no increase in ambiguity.
-   Added list concat operator, `+++`. Eg. `xs +++ ys` is `xs.concat(ys)`. Rationale: less typing, more beautiful, inspired by the ++ function in Haskell (had to use 3 pluses in order to avoid ambiguity with increment operator.)
-   `^` is now an alias to `**`, the power operator. Rationale: it was available, and is used in other languages.
-   Power precedence is now proper, and the power operator has precedence over multiplication and division. It also has higher precedence than unary ops. Eg. 2\*4^2 == 32, not 64 as in Coco. Also, -2^2 == -4. Rationale: math should work properly - this is how it's done in many languages including Haskell.
-   Power operator is now right associative. eg. 2^2^3 == 2^(2^3) == 256. Rationale: follwing Haskell's and many other languages lead on this one.
-   Added magic auto curried functions, defined using `-->` and `~~>`. With this you can do `times = (x, y) --> x * y`, `timesTwo = times 2`, `timesTwo 4 #=> 8`. If you call a curried function with no arguments, it calls itself as is, instead of returning itself (you can just reference it if you want it itself). Rationale: more Haskell like, useful functionality.
-   Added new function definition syntax, eg. `add(x, y) = x + y` == `add = (x, y) --> x + y`. You can also use it in object literals and class definitions eg. `add(x, y): x + y` == `add: (x, y) --> x + y`. You can also suppress return on both by starting with a bang, eg. `!nothingness(params) = true` will not return anything. As well you can have lexically bound this using `id@(param) = something` which is suger for `id = (param) ~~> something` (notice the wavy arrow). You can go crazy and do something like this if you wish: `@!func@! = something` which is a function assigned to this, which takes no parameters and returns nothing, while being lexically bound to this. All functions defined using this syntax are curried. Rationale: more beautiful, less typing, more Haskell like.
-   Added `obj ::= obj2` as alias to `obj::<<<obj2`. Rationale: seems to be the intuitive behavior expected, looks cleaner.
-   Added `yes / on` as aliases to `true` and `no / off` as aliases to `false`. Added `undefined` as an alias to `void`, and aliased `isnt` to `is not`. Rationale: ease transition from CoffeeScript, which has all these features, to LiveScript.
-   Added `when` as alias to `case` (and `|`). Rationale: ease transition from CoffeeScript.
-   Allowed guards in loops using case statement, eg. `x for x from 1 to 10 when x % 2 is 0`. Rationale: ease transition from CoffeeScript and have guards in comprehensions like other languages (Haskell).
-   Added the use of `else` for default in switch. Rationale: ease transition from CoffeeScript.
-   Added `loop` as alias for `while true`. Rationale: ease transition from CoffeeScript.
-   Added pipe operator `|>` ala F#, `val |> func` is the same as `func(val)`. Very useful in combination with curried functions. Rationale: useful, as in F#.
-   Added backwards pipe operator `<|` ala F#: `f <| x` is the same as `f x`. This is more useful than it looks, and can help you avoid parens. For instance for a definition of toCase that returns a function that either uppercases or lowercases a word, `toCase \up <| \hello` rather than `toCase(\up) \hello`. Rationale: useful as per above, as in F#.
-   Added function composition operators ala F#. `>>` and `<<`. `(f >> g) x` is `g(f(x))` and `(f << g) x` is `f(g(x))`. Rationale: very useful, especially with curried functions. As in F# (and Haskell, there it's the dot operator).
-   Added `%%` operator (and corresponding `%%=` operator), `x %% y` is `(x % y + y) % y`. Eg. `-3 % 4 == -3; -3 %% 4 == 1`. Rationale: this is how the `%` op behaves in other languages such as Python and Ruby.
-   Changed number base format from `7r4` to `7~4`. This is because using `r` causes ambiguity with number comments. For instance, `36rpm` - is that the number `36` with the number comment `rpm` or is it `pm` base `36` (922). Also now accept any number as radix, so that a better error can be thrown when that radix is not 2-36. Rationale: fixes ambiguity.
-   Allowed expression in range syntax, eg. `[x to y/2]` instead of just number literals. This has the side effect of removing naked ranges, eg. `2 to 5` without enclosing brackets (for loops remain unchanged). Rationale: expressions in ranges are useful, much more than naked ranges which have really limited use. Also closer to CoffeeScript, easing transition again.
-   Changed CLI to bare compilation so that defined variables are attached to global scope. Improved repl to continue when lines end with `->`, `~>`, or `=`
-   Added list comprehensions (eg. `[x for x in list when x is \something]`) and removed postfix loops (eg. `something x for x in list`). Comprehensions always return a list. Nested list comprehensions behave properly, ie. the last for is the inner most loop. Rationale: following Haskell and Python. More consistent behavior. Easier to deal with in your head. More intuitive.
-   Changed JS literals to use two backticks, eg. ` ``js code here`` ` instead of `` `js code here` ``. Rationale: it was seldom needed; frees up backticks for infix function application.
-   Add infix function application, eg. ``3 `add` 2``. Rationale: as in Haskell. This allows for partial application of their second argument, like operators eg. ``(`times` 2)``.
-   Changed unary clone operator from `^` to `^^`. Rationale: disambiguate with partial application of power operator.
-   Added partial application of operators. Eg. `(+ 2)` returns a function which adds 2 to its argument. Also allowed is simply `(*)` which is a function which multiplies its two arguments. `(+x)` and `(-x)` still mean the application of those unary operators - the operator must be spaced to be the partial application of that operator. Using the length star `*` is no longer allowed within parens (sometimes used when setting dynamic keys), due to ambiguity with the partially applied multiplication operator. Rationale: awesome. As in Haskell.
-   Added unary operators as functions. Eg. you can use `(not)` as a function, compose it, etc. Rationale: very useful, as in Haskell.
-   Added `.` as alias to `<<` in composing functions. This disallows property access in the style of `x . y`. Rationale: as in Haskell. Dually spaced property access should never be used anyway.
-   Added object comprehensions. Eg. `{[key, val * 2] for key, val of obj}` would return an object with all the values double of the original. The first part of the array literal gets translated into the key, the second part into the value. Rationale: very useful when dealing with objects. Can now map and filter objects back into objects.
-   Dashes are now supported in identifiers, they get converted into camel case. Eg. `get-room` is equivalent to `getRoom`, `encode-URI` is `encodeURI`. Rationale: enable different styles which other people may enjoy. As in the lisp family of languages.
-   Added implicit call/lookup eg. `(.length)` is equivalent to `-> it.length` and `(.join \*)` is equivalent to `-> it.join \*`. `(obj.)` is `-> obj[it]`. Rationale: useful when mapping, filtering, etc.
-   Added infix `with` operator ("cloneport"). Eg. `personA = personB with name: \alice` is equivalent to `personA = ^^personB <<< name: \alice`. Ie. it clones the head and imports the tail into that new object. `personB` is unmodified. Rationale: really nice may to create new objects out of old ones.
-   Add partial application, `_` is the placeholder. Eg. `f = add-three-numbers 1, _, 3` then `f 2 #=> 6`. Can be multiple times, and like curried functions if called with no args will invoke, allowing use of default args. Rationale: really useful, for when function args aren't in a nice order so you can use a curried version.
-   Changed backcall `<-` placeholder to underscore `_`. Rationale: fit in with partial application placeholder.
-   Changed `arguments` alias to `&`, removed `@@` as that alias. Eg. `-> &0 + &1`. Rationale: shorter - less typing.
-   Added `-d, --prelude` option for automatically adding prelude.ls. Rationale: make it easier to use prelude.ls.
-   Added `-k, --const` option for compiling as if all variables as constants. Rationale: some people coming from languages with all immutable values may find this nice.
-   Allowed arbitrary expressions in slicing syntax, eg. `list[1 to x]`. Rationale: useful.
-   Changed so that constructors are inherited. Rationale: useful, and more like in CoffeeScript.
-   Allowed empty class definitions, ie. with no block. Rationale: useful and more like CoffeeScript.
-   Bound methods are bound to the instance, not the class. Rationale: seems pretty useless to be bound to the class, so this is more useful. Also more like CoffeeScript.
-   Added function keyword arguments like in python. Rationale: useful.
-   Added a exclusive or `xor` operator. Rationale: logic completeness.
-   Binary logic is callable. Ratioanle: useful.
-   Allow splicing like in CoffeeScript. Rationale: easier transition, useful.
-   Overloaded equals when using regex to mean exec/test. Rationale: shorter.
-   Static functions are inherited. Rationale: as in CoffeeScript - ease transition.
-   Removed the constructor shorthand. Rationale: rarely useful, use it for cascade instead.
-   Changed cascade op from `&` to `..`. Rationale: like in other languages.
-   Added match statement and deep compare. Rationale: experimental, will see if good.
-   For changes after 1.0.0, see the [changelog][134] section.

[1]: https://satyr.github.com/coco/
[2]: http://livescript.net/#coffee-to-ls
[3]: https://twitter.com/gkzahariev
[4]: http://livescript.net/blog/livescript-1.4.0-source-maps-more.html
[5]: http://livescript.net/index-fr.html
[6]: https://npmjs.org/
[7]: https://github.com/gkz/LiveScript/zipball/1.6.0
[8]: https://github.com/gkz/LiveScript/tarball/1.6.0
[9]: https://nodejs.org/
[10]: http://www.preludels.com/
[11]: http://preludels.com/
[12]: http://livescript.net/#coffee-to-ls
[13]: http://livescript.net/#oop
[14]: http://livescript.net/#composing
[15]: http://livescript.net/#piping
[16]: https://github.com/gkz/LiveScript/issues/941
[17]: https://github.com/gkz/LiveScript/pull/958
[18]: https://github.com/gkz/LiveScript/pull/969
[19]: https://github.com/gkz/LiveScript/pull/978
[20]: https://github.com/gkz/LiveScript/pull/1063
[21]: https://github.com/gkz/LiveScript/pull/958
[22]: https://github.com/gkz/LiveScript/issues/963
[23]: https://github.com/gkz/LiveScript/pull/1014
[24]: https://github.com/gkz/LiveScript/issues/743
[25]: https://github.com/gkz/LiveScript/pull/957
[26]: https://github.com/gkz/LiveScript/issues/751
[27]: https://github.com/gkz/LiveScript/issues/899
[28]: https://github.com/gkz/LiveScript/issues/916
[29]: https://github.com/gkz/LiveScript/issues/923
[30]: https://github.com/gkz/LiveScript/issues/926
[31]: https://github.com/gkz/LiveScript/pull/928
[32]: https://github.com/gkz/LiveScript/pull/929
[33]: https://github.com/gkz/LiveScript/issues/930
[34]: https://github.com/gkz/LiveScript/issues/953
[35]: https://github.com/gkz/LiveScript/pull/958
[36]: https://github.com/gkz/LiveScript/issues/931
[37]: https://github.com/gkz/LiveScript/issues/993
[38]: https://github.com/gkz/LiveScript/issues/992
[39]: https://github.com/gkz/LiveScript/issues/1013
[40]: https://github.com/gkz/LiveScript/issues/542
[41]: https://github.com/gkz/LiveScript/issues/1028
[42]: https://github.com/gkz/LiveScript/issues/1015
[43]: https://github.com/gkz/LiveScript/issues/1035
[44]: https://github.com/gkz/LiveScript/pull/1032
[45]: https://github.com/gkz/LiveScript/issues/739
[46]: https://github.com/gkz/LiveScript/issues/1039
[47]: https://github.com/gkz/LiveScript/issues/1025
[48]: https://github.com/gkz/LiveScript/issues/1019
[49]: https://github.com/gkz/LiveScript/issues/1021
[50]: https://github.com/gkz/LiveScript/issues/1023
[51]: https://github.com/gkz/LiveScript/issues/897
[52]: https://github.com/gkz/LiveScript/issues/858
[53]: https://github.com/gkz/LiveScript/pull/863
[54]: https://github.com/gkz/LiveScript/pull/695
[55]: https://github.com/gkz/LiveScript/pull/786
[56]: https://github.com/gkz/LiveScript/pull/884
[57]: https://github.com/gkz/LiveScript/issues/853
[58]: https://github.com/gkz/LiveScript/pull/837
[59]: https://github.com/gkz/LiveScript/pull/859
[60]: https://github.com/gkz/LiveScript/issues/584
[61]: https://github.com/gkz/LiveScript/issues/634
[62]: https://github.com/gkz/LiveScript/issues/749
[63]: https://github.com/gkz/LiveScript/pull/823
[64]: https://github.com/gkz/LiveScript/issues/830
[65]: https://github.com/gkz/LiveScript/pull/835
[66]: https://github.com/gkz/LiveScript/pull/841
[67]: https://github.com/gkz/LiveScript/issues/844
[68]: https://github.com/gkz/LiveScript/issues/847
[69]: https://github.com/gkz/LiveScript/issues/854
[70]: https://github.com/gkz/LiveScript/issues/857
[71]: https://github.com/gkz/LiveScript/issues/569
[72]: https://github.com/gkz/optionator
[73]: https://github.com/gkz/LiveScript/issues/194
[74]: https://github.com/gkz/LiveScript/issues/206
[75]: https://github.com/gkz/LiveScript/issues/150
[76]: https://github.com/gkz/LiveScript/issues/217
[77]: https://github.com/gkz/LiveScript/issues/236
[78]: https://github.com/gkz/LiveScript/issues/238
[79]: https://github.com/gkz/LiveScript/issues/151
[80]: https://github.com/gkz/LiveScript/issues/215
[81]: https://github.com/gkz/LiveScript/issues/213
[82]: https://github.com/gkz/LiveScript/issues/237
[83]: https://github.com/gkz/LiveScript/issues/232
[84]: https://github.com/gkz/LiveScript/issues/161
[85]: https://github.com/gkz/LiveScript/issues/241
[86]: http://livescript.net/#cascade-implicit-map
[87]: http://livescript.net/#params-unary-ops
[88]: http://livescript.net/#require
[89]: https://gkz.github.com/prelude-ls/
[90]: http://livescript.net/#changes
[91]: http://livescript.net/#changes
[92]: https://github.com/gkz/LiveScript/graphs/contributors
[93]: https://github.com/gkz
[94]: https://github.com/satyr
[95]: https://github.com/josher19
[96]: https://github.com/goatslacker
[97]: https://github.com/paulmillr
[98]: https://github.com/vendethiel
[99]: https://github.com/killdream
[100]: https://github.com/audreyt
[101]: https://github.com/clkao
[102]: https://github.com/viclib
[103]: https://github.com/dtinth
[104]: https://github.com/racklin
[105]: https://github.com/raine
[106]: https://github.com/Diggsey
[107]: https://github.com/Haspaker
[108]: https://github.com/synapsos
[109]: https://github.com/blvz
[110]: https://github.com/apaleslimghost
[111]: https://github.com/rhendric
[112]: https://github.com/impinball
[113]: https://github.com/skovsgaard
[114]: https://github.com/piotrklibert
[115]: https://github.com/appedemic
[116]: https://github.com/gkovacs
[117]: https://github.com/isiahmeadows
[118]: https://github.com/kevgo
[119]: https://github.com/kkirby
[120]: https://github.com/igl
[121]: https://github.com/RobLoach
[122]: https://github.com/unclechu
[123]: https://github.com/darky
[124]: https://github.com/summivox
[125]: https://github.com/misterfish
[126]: https://github.com/bartosz-m
[127]: https://github.com/dk00
[128]: https://github.com/pepkin88
[129]: https://github.com/patrickkettner
[130]: http://nielsgrootobbink.com/
[131]: http://livescript.org/
[132]: https://github.com/satyr/coco
[133]: https://github.com/gkz/LiveScript
[134]: http://livescript.net/#changelog
