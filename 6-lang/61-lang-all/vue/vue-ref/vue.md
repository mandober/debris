# Vue.js

https://vuejs.org/
https://github.com/vuejs/vue

JS framework for building user interfaces (UI) and single-page apps (SPA).

## Install

### Include from CDN
Although Vue can be used as a JavaScript module in more sophisticated  setups, it can also simply be included as an external script in the body of
your HTML document:
```
<script src="https://unpkg.com/vue/dist/vue.js"></script>
```

### Install Vue CLI

```
npm install -g @vue/cli
```

### Instant Prototyping

You can rapidly prototype with just a single .vue file with the `vue serve` and `vue build` commands, provided this global addon is also installed:
```
npm install -g @vue/cli-service-global
```

*vue serve* serves a .js or .vue file in dev mode with zero config.
Usage: serve [options] [entry]
Options:
-o, --open         Open browser
-c, --copy         Copy local url to clipboard
-p, --port <port>  Port used by the server (default: 8080 or next available)
-h, --help         Output usage information

You also need an `App.vue` file:
```js
<template>
  <h1>Hello!</h1>
</template>
```

Then in the directory with the App.vue file, run:
```
vue serve
```

`vue serve` uses the same default setup (webpack, babel, postcss & eslint) as projects created by `vue create`. It infers the entry file in PWD, which can be one of `main.js`, `index.js`, `App.vue` or `app.vue`.

You can also explicitly specify the entry file:
```
vue serve MyComponent.vue
```

If needed, you can also provide an `index.html` and `package.json` to install and use local dependencies, or configure babel, postcss & eslint.

*vue build* builds a .js or .vue file in production mode with zero config.

Usage: build [options] [entry]

Options:
-t, --target <target>  Build target (app|lib|wc|wc-async,default: app)
-n, --name <name>      name for lib or web-component (default:entry filename)
-d, --dest <dir>       output directory (default: dist)
-h, --help             output usage information

You can also build the target file into a production bundle for deployment with vue build:
```
vue build MyComponent.vue
```
vue build also provides the ability to build the component as a library or a web component. 



