# Ordering of callback and promise-based operations

Because they are executed asynchronously by the underlying thread pool, there is no guaranteed ordering when using either the callback or promise-based methods.

For example, the following is prone to error because the `fs.stat()` operation might complete before the `fs.rename()` operation.

```js
const fs = require('node:fs')

fs.rename('/tmp/hello', '/tmp/world', (err) => {
  if (err) throw err
  console.log('renamed complete')
})

fs.stat('/tmp/world', (err, stats) => {
  if (err) throw err
  console.log(`stats: ${JSON.stringify(stats)}`)
})
```


It is important to correctly order the operations by awaiting the results of one before invoking the other.

```js
import { rename, stat } from 'node:fs/promises'

const oldPath = '/tmp/hello'
const newPath = '/tmp/world'

try {
  await rename(oldPath, newPath)
  const stats = await stat(newPath)
  console.log(`stats: ${JSON.stringify(stats)}`)
} catch (error) {
  console.error('there was an error:', error.message)
}
```

How 'bout using monadic bind, `>>=`, to force ordering?

```hs
rename x y >>= \y -> stat y
-- i.e.
rename x y >>= stat
-- i.e.
do
  n <- rename x y
  stat n
```

Monadic bind is JS `.then()` method, right?

```js

await rename(oldPath, newPath)
  .then(newName => stat(newName))

```



Or, when using the callback APIs, move the `fs.stat()` call into the callback of the `fs.rename()` operation.

```js
import { rename, stat } from 'node:fs'

rename('/tmp/hello', '/tmp/world', (err) => {
  if (err) throw err
  stat('/tmp/world', (err, stats) => {
    if (err) throw err
    console.log(`stats: ${JSON.stringify(stats)}`)
  })
})
```
