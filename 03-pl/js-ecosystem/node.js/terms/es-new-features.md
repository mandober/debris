# ECMAScript

* Features implemented in Node by version
https://node.green/


Node.js is built against modern versions of V8. By keeping up-to-date with the latest releases of this engine, we ensure new features from the JavaScript ECMA-262 specification are brought to Node.js developers in a timely manner, as well as continued performance and stability improvements.

JavaScript ECMA-262 specification
http://www.ecma-international.org/publications/standards/Ecma-262.htm

All ECMAScript 2015 (ES6) features are split into 3 groups:
- for-shipping
- staged
- in-progress

* All **shipping features**, which V8 considers stable, are turned on by default
* **Staged features**, almost-completed features, not considered stable by the V8 team, require a runtime `--harmony` flag
* **In-progress features** can be *activated individually by their respective harmony flag*, although this is discouraged


`node --v8-options | grep "in progress"`
--harmony-string-replaceall             "harmony String.prototype.replaceAll"
--harmony-regexp-sequence               "RegExp Unicode sequence properties"
--harmony-weak-refs                     "harmony weak references"
--harmony-regexp-match-indices          "harmony regexp match indices"
--harmony-top-level-await               "harmony top level await"
--harmony-intl-displaynames-date-types  "Intl.DisplayNames date types"

`node --v8-options | grep "ship"`
--harmony-shipping      (all shipped harmony features)
--future                (all staged that we want to ship in the near future)

`node --v8-options | grep "stage"`
--wasm-staging          (enable staged wasm features)

The current behaviour of the `--harmony` flag on Node.js is to enable staged features only. After all, it is now a synonym of `--es_staging`


> find which version of V8 ships with a particular version of Node.js
Node.js provides a simple way to list all dependencies and respective versions that ship with a specific binary through the *process global object*. In case of the V8 engine, use this to retrieve its version:
`node -p process.versions.v8`
8.1.307.30-node.30
