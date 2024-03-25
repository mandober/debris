

- Error: no such file or directory
  - Error.code: `ENOENT`
  - Error.errno: -4058
  - Error.syscall: open
  - Error.path:
- Error: file already exists
  - Error.err.code: `EEXISTS`
  - Error.errno: -4075
  - Error.syscall: mkdir
  - Error.path:


## Example: handling errors

```js
import { open, close } from 'node:fs'

open('file', 'wx', (err, fd) => {
  if (err) {
    if (err.code === 'EEXIST') {
      console.error('file already exists')
      return
    }
    throw err
  }

  try {
    writeMyData(fd)
  }
  finally {
    close(fd, err => if (err) throw err)
  }
})
```
