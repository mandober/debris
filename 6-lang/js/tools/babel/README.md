# Babel


Babel 7.8.0 teleased 11-Jan-2020
- ECMAScript 2020
- .mjs configuration files and @babel/cli improvements
- https://babeljs.io/blog/2020/01/11/7.8.0
- Babel 7.8.0 supports the new *ECMAScript 2020* features by default: 
  you don't need to enable individual plugins for
  - nullish coalescing `??`
  - optional chaining `?.`
  - dynamic `import()`
  anymore with `preset-env`.
- finished aligning different config files with the formats natively supported by Node.js, a process that we started in the 7.7.0 release.
- Lastly, Babel's CLI now supports two new options: `--out-file-extension` and `--copy-ignored`
- changelog on GitHub: https://github.com/babel/babel/releases/tag/v7.8.0
