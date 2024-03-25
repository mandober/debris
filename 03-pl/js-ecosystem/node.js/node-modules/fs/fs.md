# Node :: Modules :: fs

- module name: fs - file system
- module stability: 2 - Stable
- source: [lib/fs.js](https://github.com/nodejs/node/blob/v20.5.1/lib/fs.js)
- docs (latest): https://nodejs.org/api/fs.html
- docs (v20.x): https://nodejs.org/docs/latest-v20.x/api/fs.html
- docs (git): https://github.com/nodejs/node/blob/main/doc/api/fs.md

The `node:fs` module enables interacting with the file system in a way modeled on standard POSIX functions.

All file system operations have 3 APIs:
- promise-based  (`readFile`) asynchronous API
- synchronous API (`readFileSync`)
- callback-based API

All file system operations are accessible using:
- ES6 modules (ESM)
- CommonJS modules (CJS)

```js
// promise-based APIs
import * as fs from 'node:fs/promises'   // ESM
const fs = require('node:fs/promises')   // CJS

// callback and sync APIs
import * as fs from 'node:fs'            // ESM
const fs = require('node:fs')            // CJS
```

## Examples

### Promise example

Promise-based operations return a promise that is fulfilled when the asynchronous operation is complete.

```js
import { unlink } from 'node:fs/promises'

try {
  await unlink('/tmp/hello')
  console.log('successfully deleted /tmp/hello')
} catch (error) {
  console.error('there was an error:', error.message)
}
```

### Callback example

The callback form takes a *completion callback function* as its last argument and invokes the operation *asynchronously*.

The arguments passed to the completion callback depend on the method, but **the first argument is always reserved for an exception**; if the operation is completed successfully, then the first argument is `null` or `undefined`.

```js
import { unlink } from 'node:fs'

unlink('/tmp/hello', err => {
  if (err) throw err
  console.log('successfully deleted /tmp/hello')
})
```

The callback-based versions of `node:fs` APIs are preferable over the use of the promise APIs *when maximal performance* (both in terms of execution time and memory allocation) is required.

### Synchronous example

*The synchronous APIs is blocking*; it blocks the Node.js event loop and further JS execution until the operation is complete. *Exceptions are thrown immediately* and can be handled using `try…catch`, or let to bubble up.

>Synchronous methods are suffixed with "-Sync" (`readDirSync` vs `readDir`)

```js
import { unlinkSync } from 'node:fs'

try {
  unlinkSync('/tmp/hello')
  console.log('successfully deleted /tmp/hello')
} catch (err) {
  // handle the error
}
```

## Promises API

The `fs/promises` API provides asynchronous file system methods that return promises.

The promise APIs use the *underlying Node.js threadpool* to perform file system operations *off the event loop thread*.

These *operations are not synchronized or threadsafe*.

Care must be taken when *performing multiple concurrent modifications* on the same file or data corruption may occur.
