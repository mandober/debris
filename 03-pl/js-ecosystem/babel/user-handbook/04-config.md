# Configuring Babel

<!-- TOC -->

- [.babelrc](#babelrc)
- [babel-preset-es2015](#babel-preset-es2015)
- [babel-preset-react](#babel-preset-react)
- [babel-preset-stage-x](#babel-preset-stage-x)

<!-- /TOC -->


## .babelrc

- configuration file `.babelrc` lives in the project root

```js
{
  "presets": [],
  "plugins": []
}
```

## babel-preset-es2015

Let's start by telling Babel to compile ES2015 (ES6) to ES5 (the version available in all environments) by installing the "es2015" Babel preset:

```bash
$ npm install --save-dev babel-preset-es2015
```

Next we'll modify our `.babelrc` to include that preset.

```diff
  {
    "presets": [
+     "es2015"
    ],
    "plugins": []
  }
```

## babel-preset-react

Setting up React is just as easy. Just install the preset:

```sh
$ npm install --save-dev babel-preset-react
```

Then add the preset to your `.babelrc` file:

```diff
  {
    "presets": [
      "es2015",
+     "react"
    ],
    "plugins": []
  }
```

## babel-preset-stage-x

JavaScript also has some proposals that are making their way into the standard through the TC39's (the technical committee behind the ECMAScript standard) process. This process is broken through a 5 stage (0-4) process. As proposals gain more traction and are more likely to be accepted into the standard they proceed through the various stages, finally being accepted into the standard at *stage 4*.

These are bundled in babel as 4 different presets:
- `babel-preset-stage-0`
- `babel-preset-stage-1`
- `babel-preset-stage-2`
- `babel-preset-stage-3`


There is no stage-4 preset as it is simply the `es2015` preset.

Each of these presets requires the preset for the later stages. i.e.
`babel-preset-stage-1` requires `babel-preset-stage-2` which requires
`babel-preset-stage-3`.

Simply install the stage you are interested in using:

```sh
npm install --save-dev babel-preset-stage-2
```

Then you can add it to your `.babelrc` config.

```diff
  {
    "presets": [
      "es2015",
      "react",
+     "stage-2"
    ],
    "plugins": []
  }
```
