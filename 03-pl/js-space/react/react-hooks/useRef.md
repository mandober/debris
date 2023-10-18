# React :: React hooks :: useRef

https://react.dev/reference/react/useRef

`useRef` is a React Hook that lets you reference a value that is not needed for rendering.

Call `useRef` at the top level of your component to declare a `ref`.

```js
// prototype
const ref = useRef(initialValue)


// example
import { useRef } from 'react'

function MyComponent() {
  const intervalRef = useRef(0)
  const inputRef = useRef(null)



// sig
useRef :: initialValue -> { current: initialValue }
```

Argument: `initialValue`
- the value you want the `ref` object's current property to be initially
- it can be a value of any type
- after the initial render, `initialValue` argument is ignored

Returns
- `useRef` returns an object with a single property: `current`
- Initially, `current` is set to the `initialValue` you passed.
- You can later set it to something else
- If you pass the `ref` object to React 
  as a `ref` attribute to a *JSX node*, 
  React will set its `current` property
- On the next renders, `useRef` returns the same object

Caveats
- Unlike state, `ref.current` property is mutable. 
  However, if it holds an object that is used for rendering 
  (e.g. a piece of your state), then you shouldn't mutate that object.
- When you change the `ref.current` property, 
  *React does not re-render your component*.
  React is not aware of when you change it because a ref is a POJO.
- Do not write/read `ref.current` during rendering, except for initialization. 
  This makes your component's behavior unpredictable.
- In *Strict Mode*, 
  React calls your component function twice 
  in order to help find accidental impurities. 
  This is development-only behavior and does not affect production. 
  Each ref object is created twice, but one is discarded. 
  If your component function is pure (as it should be), 
  this should not affect the behavior.


`useRef` returns a *ref object* with a single property `current` initially set to the provided `initialValue`. On the next renders, useRef returns the same object. You can change the `current` property to store info and read it later.

This might remind you of state, but there is an important difference: *changing a ref does not trigger a rerender*. This means refs are perfect for storing information that doesn't affect the visual output of your component.

To update the value inside the ref, you need to manually change its `current` property.


By using a ref, you ensure that:
* You can store information between re-renders 
  (unlike regular variables, which reset on every render).
* Changing it does not trigger a re-render 
  (unlike state variables, which trigger a re-render).
* The information is local to each copy of your component 
  (unlike the variables outside, which are shared).


Changing a ref does not trigger a re-render, so refs are not appropriate for storing information you want to display on the screen. Use state for that instead.

* Choosing between useRef and useState
https://react.dev/learn/referencing-values-with-refs#differences-between-refs-and-state


## Use cases

Store an `setInterval` ID (number) in a ref.

```js
const handleStartClick = () => {
  const intfn = () => console.log("Do not forget to clear me")
  const intervalId = setInterval(intfn, 100000)
  intervalRef.current = intervalId
}

// Later, read the interval's ID from the ref in order to clear it:
const handleStopClick = () => clearInterval(intervalRef.current)
```



## Referencing values with Refs
https://react.dev/learn/referencing-values-with-refs
