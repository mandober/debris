# Introduction

- Babel is a generic multi-purpose trans/compiler for JavaScript that enables
- code transformation, code generation, tooling, macros, syntax plugins
- syntax extensions: JSX for React, Flow syntax for static type checking
- Babel is made up of modules, everything is a plugin
- integrations: Gulp, Browserify, Ember, Meteor, React, Flow, TypeScript
- interactive [setup page](http://babeljs.io/docs/setup)
- global install: `npm install --global babel-cli`
- compile file: `babel index.js -o compiled.js`
- compile dir: `babel src --out-dir lib`
- in `scripts` in `package.json` put: `"build": "babel src -d lib"`
- from then on run: `npm run build`
- Babel doesn't do anything by default
- must install plugins and presets (groups of plugins)
