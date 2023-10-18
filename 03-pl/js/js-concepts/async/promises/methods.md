# Promise methods

- Promise instance API has only 3 methods:
  - `then`
  - `catch`
  - `finally`
- Promise static API has several methods:
  - `Promise.all`
  - `Promise.allSettled`
  - `Promise.any`
  - `Promise.race`
  - `Promise.resolve`
  - `Promise.reject`


## Instance methods

### then

```js
(method) Promise<void>.then<R, E>(
  onfulfilled?: ((value: void) => R | PromiseLike<R>)   | null | undefined,
  onrejected ?: ((reason: any) => E | PromiseLike<...>) | null | undefined
): Promise<...>
```

- `then` attaches callbacks for the resolution and/or rejection of the Promise
- param `onfulfilled` is a callback to execute when the Promise is resolved
- param `onrejected` is a callback to execute when the Promise is rejected
- returns a Promise for the completion of which ever callback is executed

### catch

```js
(method) Promise<void>.catch<R>(
  onrejected?: ((reason: any) => R | PromiseLike<R>) | null | undefined
): Promise<void | R>
```

- `catch` attaches a callback for only the rejection of the Promise
- param `onrejected` is a callback to execute when the Promise is rejected
- returns a Promise for the completion of the callback

### finally

```js
(method) Promise<void>.finally(
  onfinally?: (() => void) | null | undefined
): Promise<void>
```

- attaches a callback that is invoked when the Promise is settled (fulfilled or rejected). The resolved value cannot be modified by this callback.
- param `onfinally` is a callback to execute when the Promise is settled (fulfilled or rejected).
- returns a Promise for the completion of the callback.


## Static methods

### Promise.resolve

### Promise.reject

### Primise.all

### Promise.allSettled

### Primise.any

### Promise.race
