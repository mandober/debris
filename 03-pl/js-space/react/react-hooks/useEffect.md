# React :: React hooks :: useEffect

https://react.dev/reference/react/useEffect

- `useEffect` is a React Hook that lets you synchronize a component with an external system.
- with no deps array, useEffect is called after every single render (and re-render) of the component.
- with empty deps array, useEffect is called only once when the component mounts
- with nonempty deps array, useEffect runs after the initial render and every time any of the dependency changes

* With empty deps array, if your Effect truly doesn't use any reactive values, it will only run after the initial render. Even with empty dependencies, setup and cleanup will run one extra time in development (to help you find bugs).

* The *setup* function may also optionally return a *cleanup* function, that is executed when the component unmounts.


## useEffect

`useEffect(setup, dependencies?)`

### Example

```jsx
import { useEffect } from 'react'
import { createConnection } from './chat.js'

function ChatRoom({ roomId }) {
  const [serverUrl, setServerUrl] = useState('https://localhost:1234')

  useEffect(() => {
    const connection = createConnection(serverUrl, roomId)
    connection.connect()
    return () => {
      connection.disconnect()
    };
  }, [serverUrl, roomId])
  // ...
}
```


### Parameters

*setup*: The function with the Effect's logic. 
The setup function may also optionally return a cleanup function. 
When your component is added to the DOM, React will run your setup function. 

>After every re-render with changed dependencies, React will first run the cleanup function (if you provided it) with the old values, and then run your setup function with the new values. After your component is removed from the DOM, React will run your cleanup function.

*optional dependencies*: The list of all reactive values referenced inside of the setup code.

Reactive values include props, state, and all the variables and functions declared directly inside your component body. 

If your linter is configured for React, it will verify that every reactive value is correctly specified as a dependency. 

The list of dependencies must have a constant number of items and be written inline like `[dep1, dep2, dep3]`. 

React will compare each dependency with its previous value using the Object.is comparison. 

If you omit this argument, your Effect will re-run after every re-render of the component. 

See the difference between passing an array of dependencies, an empty array, and no dependencies at all.


### Returns

`useEffect` returns `undefined`.

## Caveats

* useEffect is a Hook, so you can only call it at the top level of your component or your own Hooks. You can't call it inside loops or conditions. If you need that, extract a new component and move the state into it.

* If you're not trying to synchronize with some external system, you probably don't need an Effect.

* When *Strict Mode* is on, React will run one extra development-only setup + cleanup cycle before the first real setup. This is a stress-test that ensures that your cleanup logic "mirrors" your setup logic and that it stops or undoes whatever the setup is doing. If this causes a problem, implement the cleanup function.

* If some of your dependencies are objects or functions defined inside the component, there is a risk that they will cause the Effect to re-run more often than needed. To fix this, remove unnecessary object and function dependencies. You can also extract state updates and non-reactive logic outside of your Effect.

* If your Effect wasn't caused by an interaction (like a click), React will let the browser paint the updated screen first before running your Effect. If your Effect is doing something visual (for example, positioning a tooltip), and the delay is noticeable (for example, it flickers), replace useEffect with `useLayoutEffect`.

* Even if your Effect was caused by an interaction (like a click), the browser may repaint the screen before processing the state updates inside your Effect. Usually, that's what you want. However, if you must block the browser from repainting the screen, you need to replace useEffect with `useLayoutEffect`.

* Effects only run on the client. They don't run during server rendering.
