# Advanced Configuration

Most people can get by using Babel with just the built-in presets, but Babel exposes much finer-grained power than that.

## Manually specifying plugins

Babel presets are simply collections of pre-configured plugins, if you want to
do something differently you manually specify plugins. This works almost exactly
the same way as presets.

First install a plugin:

```sh
$ npm install --save-dev babel-plugin-transform-es2015-classes
```

Then add the `plugins` field to your `.babelrc`.

```diff
  {
+   "plugins": [
+     "transform-es2015-classes"
+   ]
  }
```

This gives you much finer grained control over the exact transforms you are
running.

For a full list of official plugins see the
[Babel Plugins page](http://babeljs.io/docs/plugins/).

Also take a look at all the plugins that have been
[built by the community](https://www.npmjs.com/search?q=babel-plugin). If you
would like to learn how to write your own plugin read the
[Babel Plugin Handbook](plugin-handbook.md).

## <a id="toc-plugin-options"></a>Plugin options

Many plugins also have options to configure them to behave differently. For
example, many transforms have a "loose" mode which drops some spec behavior in
favor of simpler and more performant generated code.

To add options to a plugin, simply make the following change:

```diff
  {
    "plugins": [
-     "transform-es2015-classes"
+     ["transform-es2015-classes", { "loose": true }]
    ]
  }
```

> I'll be working on updates to the plugin documentation to detail every option
> in the coming weeks.
> [Follow me for updates](https://twitter.com/thejameskyle).

## <a id="toc-customizing-babel-based-on-environment"></a>Customizing Babel based on environment

Babel plugins solve many different tasks. Many of them are development tools
that can help you debugging your code or integrate with tools. There are also
a lot of plugins that are meant for optimizing your code in production.

For this reason, it is common to want Babel configuration based on the
environment. You can do this easily with your `.babelrc` file.

```diff
  {
    "presets": ["es2015"],
    "plugins": [],
+   "env": {
+     "development": {
+       "plugins": [...]
+     },
+     "production": {
+       "plugins": [...]
+     }
    }
  }
```

Babel will enable configuration inside of `env` based on the current
environment.

The current environment will use `process.env.BABEL_ENV`. When `BABEL_ENV` is
not available, it will fallback to `NODE_ENV`, and if that is not available it
will default to `"development"`.

**Unix**

```sh
$ BABEL_ENV=production [COMMAND]
$ NODE_ENV=production [COMMAND]
```

**Windows**

```sh
$ SET BABEL_ENV=production
$ [COMMAND]
```

> **Note:** `[COMMAND]` is whatever you use to run Babel (ie. `babel`,
> `babel-node`, or maybe just `node` if you are using the register hook).
>
> **Tip:** If you want your command to work across unix and windows platforms
> then use [`cross-env`](https://www.npmjs.com/package/cross-env).

## <a id="toc-making-your-own-preset"></a>Making your own preset

Manually specifying plugins? Plugin options? Environment-based settings? All
this configuration might seem like a ton of repetition for all of your projects.

For this reason, we encourage the community to create their own presets. This
could be a preset for the specific
[node version](https://github.com/leebenson/babel-preset-node5) you are running,
or maybe a preset for your
[entire](https://github.com/cloudflare/babel-preset-cf)
[company](https://github.com/airbnb/babel-preset-airbnb).

It's easy to create a preset. Say you have this `.babelrc` file:

```js
{
  "presets": [
    "es2015",
    "react"
  ],
  "plugins": [
    "transform-flow-strip-types"
  ]
}
```

All you need to do is create a new project following the naming convention
`babel-preset-*` (please be responsible with this namespace), and create two
files.

First, create a new `package.json` file with the necessary `dependencies` for
your preset.

```js
{
  "name": "babel-preset-my-awesome-preset",
  "version": "1.0.0",
  "author": "James Kyle <me@thejameskyle.com>",
  "dependencies": {
    "babel-preset-es2015": "^6.3.13",
    "babel-preset-react": "^6.3.13",
    "babel-plugin-transform-flow-strip-types": "^6.3.15"
  }
}
```

Then create an `index.js` file that exports the contents of your `.babelrc`
file, replacing plugin/preset strings with `require` calls.

```js
module.exports = {
  presets: [
    require("babel-preset-es2015"),
    require("babel-preset-react")
  ],
  plugins: [
    require("babel-plugin-transform-flow-strip-types")
  ]
};
```

Then simply publish this to npm and you can use it like you would any preset.

----

# <a id="toc-babel-and-other-tools"></a>Babel and other tools

Babel is pretty straight forward to setup once you get the hang of it, but it
can be rather difficult navigating how to set it up with other tools. However,
we try to work closely with other projects in order to make the experience as
easy as possible.

## <a id="toc-static-analysis-tools"></a>Static analysis tools

Newer standards bring a lot of new syntax to the language and static analysis
tools are just starting to take advantage of it.

### <a id="toc-linting"></a>Linting

One of the most popular tools for linting is [ESLint](http://eslint.org),
because of this we maintain an official
[`babel-eslint`](https://github.com/babel/babel-eslint) integration.

First install `eslint` and `babel-eslint`.

```sh
$ npm install --save-dev eslint babel-eslint
```

Next create or use the existing `.eslintrc` file in your project and set the
`parser` as `babel-eslint`.

```diff
  {
+   "parser": "babel-eslint",
    "rules": {
      ...
    }
  }
```

Now add a `lint` task to your npm `package.json` scripts:

```diff
  {
    "name": "my-module",
    "scripts": {
+     "lint": "eslint my-files.js"
    },
    "devDependencies": {
      "babel-eslint": "...",
      "eslint": "..."
    }
  }
```

Then just run the task and you will be all setup.

```sh
$ npm run lint
```

For more information consult the
[`babel-eslint`](https://github.com/babel/babel-eslint) or
[`eslint`](http://eslint.org) documentation.

### <a id="toc-code-style"></a>Code Style

> JSCS has merged with ESLint, so checkout Code Styling with ESLint.

JSCS is an extremely popular tool for taking linting a step further into
checking the style of the code itself. A core maintainer of both the Babel and
JSCS projects ([@hzoo](https://github.com/hzoo)) maintains an official
integration with JSCS.

Even better, this integration now lives within JSCS itself under the `--esnext`
option. So integrating Babel is as easy as:

```
$ jscs . --esnext
```

From the cli, or adding the `esnext` option to your `.jscsrc` file.

```diff
  {
    "preset": "airbnb",
+   "esnext": true
  }
```

For more information consult the
[`babel-jscs`](https://github.com/jscs-dev/babel-jscs) or
[`jscs`](http://jscs.info) documentation.

<!--
### Code Coverage

> [WIP]
-->

### <a id="toc-documentation"></a>Documentation

Using Babel, ES2015, and Flow you can infer a lot about your code. Using
[documentation.js](http://documentation.js.org) you can generate detailed API
documentation very easily.

Documentation.js uses Babel behind the scenes to support all of the latest
syntax including Flow annotations in order to declare the types in your code.

## <a id="toc-frameworks"></a>Frameworks

All of the major JavaScript frameworks are now focused on aligning their APIs
around the future of the language. Because of this, there has been a lot of work
going into the tooling.

Frameworks have the opportunity not just to use Babel but to extend it in ways
that improve their users' experience.

### <a id="toc-react"></a>React

React has dramatically changed their API to align with ES2015 classes
([Read about the updated API here](https://babeljs.io/blog/2015/06/07/react-on-es6-plus)).
Even further, React relies on Babel to compile it's JSX syntax, deprecating it's
own custom tooling in favor of Babel. You can start by setting up the
`babel-preset-react` package following the
[instructions above](#babel-preset-react).

The React community took Babel and ran with it. There are now a number of
transforms
[built by the community](https://www.npmjs.com/search?q=babel-plugin+react).

Most notably the
[`babel-plugin-react-transform`](https://github.com/gaearon/babel-plugin-react-transform)
plugin which combined with a number of
[React-specific transforms](https://github.com/gaearon/babel-plugin-react-transform#transforms)
can enable things like *hot module reloading* and other debugging utilities.

<!--
### Ember

> [WIP]
-->

## <a id="toc-text-editors-and-ides"></a>Text Editors and IDEs

Introducing ES2015, JSX, and Flow syntax with Babel can be helpful, but if your
text editor doesn't support it then it can be a really bad experience. For this
reason you will want to setup your text editor or IDE with a Babel plugin.

- [Sublime Text](https://github.com/babel/babel-sublime)
- [Atom](https://atom.io/packages/language-babel)
- [Vim](https://github.com/jbgutierrez/vim-babel)
- [WebStorm](https://babeljs.io/docs/setup/#webstorm)

<!--
# Debugging Babel

> [WIP]
-->

----

# <a id="toc-babel-support"></a>Babel Support

Babel has a very large and quickly growing community, as we grow we want to
ensure that people have all the resources they need to be successful. So we
provide a number of different channels for getting support.

Remember that across all of these communities we enforce a
[Code of Conduct](https://github.com/babel/babel/blob/master/CODE_OF_CONDUCT.md).
If you break the Code of Conduct, action will be taken. So please read it and
be conscious of it when interacting with others.

We are also looking to grow a self-supporting community, for people who stick
around and support others. If you find someone asking a question you know the
answer to, take a few minutes and help them out. Try your best to be kind and
understanding when doing so.

## <a id="toc-babel-forum"></a>Babel Forum

[Discourse](http://www.discourse.org) has provided us with a hosted version of
their forum software for free (and we love them for it!). If forums are your
thing please stop by [discuss.babeljs.io](https://discuss.babeljs.io).

## <a id="toc-babel-chat"></a>Babel Chat

Everyone loves [Slack](https://slack.com). If you're looking for immediate
support from the community then come chat with us at
[slack.babeljs.io](https://slack.babeljs.io).

<!--
## Babel Stack Overflow

> [WIP]
-->

## <a id="toc-babel-issues"></a>Babel Issues

Babel uses the issue tracker provided by
[Github](http://github.com).

You can see all the open and closed issues on
[Github](https://github.com/babel/babel/issues).

If you want to open a new issue:

- [Search for an existing issue](https://github.com/babel/babel/issues)
- [Create a new bug report](https://github.com/babel/babel/issues/new)
  or [request a new feature](https://github.com/babel/babel/issues/new)

### <a id="toc-creating-an-awesome-babel-bug-report"></a>Creating an awesome Babel bug report

Babel issues can sometimes be very difficult to debug remotely, so we need all
the help we can get. Spending a few more minutes crafting a really nice bug
report can help get your problem solved significantly faster.

First, try isolating your problem. It's extremely unlikely that every part of
your setup is contributing to the problem. If your problem is a piece of input
code, try deleting as much code as possible that still causes an issue.

> [WIP]

----

> ***For future updates, follow [@thejameskyle](https://twitter.com/thejameskyle)
> on Twitter.***
