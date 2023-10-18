# React :: React hooks :: useState

https://react.dev/reference/react/useState

`useState` is a React Hook that lets you add a state variable to your component.

```jsx
import { useState } from 'react'

const [state, setState] = useState(initialState)
```

`initialState` can be a value of any type, but there is a special behavior for functions. This argument is *ignored after the initial render*.

If you pass a function arg, it will be treated as an **initializer function**. It should be pure, with no arguments. React will this function when initializing the component, and store its return value as the initial state.



`useState` returns an array with exactly two values:
- (current) `state`; during the first render, it is the `initialState`
- `setState` function lets you update the state and trigger a re-render

Caveats
- useState is a Hook, so you can *only call it at the top level* of component or custom Hooks. You can't call it inside loops or conditions. If you need that, extract a new component and move the state into it.
- In *React Strict Mode*, React will call your initializer function twice in order to help you find accidental impurities. This is development-only behavior and does not affect production. If your initializer function is pure (as it should be), this should not affect the behavior. The result from one of the calls will be ignored.

`setState(nextState)`
- `setState(value)` Update the state with nextState directly
- `setState(function)` Update the state via a function

If you pass a function as `nextState`, it will be treated as an **updater function**. It must be pure, should take the pending state as its only argument, and should return the next state. React will put your updater function in a queue and re-render your component. During the next render, React will calculate the next state by applying all of the queued updaters to the previous state.

e.g. `setState(prevState => prevState + 1)`

`set` functions do not have a return value.

Caveats

* The `set` function only updates the state variable for the next render. If you read the state variable after calling the `set` function, you will still get the old value that was on the screen before your call.

* If the new value you provide is identical to the current state, as determined by an `Object.is` comparison, React skips re-rendering the component and its children. This is an optimization. Although in some cases React may still need to call your component before skipping the children, it shouldn't affect your code.

* *React batches state updates*. It updates the screen after all the event handlers have run and have called their set functions. This prevents multiple re-renders during a single event. In the rare case that you need to force React to update the screen earlier, for example to access the DOM, you can use `flushSync`.

* Calling the set function during rendering is only allowed from within the currently rendering component. React will discard its output and immediately attempt to render it again with the new state. This pattern is rarely needed, but you can use it to store information from the previous renders.


Props is read-only information that's passed to components. State is information that can change over time, usually triggered by user interaction.

>Unlike props which are passed to components as the first function parameter, the state is initiated and stored within a component. You can pass the state information to children components as props, but the logic for updating the state should be kept within the component where state was initially created.
