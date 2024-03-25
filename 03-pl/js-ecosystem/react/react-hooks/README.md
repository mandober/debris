# React :: React hooks

React hooks in react@18.2.0
- [useRef](./useRef.md)
- [useMemo](./useMemo.md)
- [useState](./useState.md)
- [useEffect](./useEffect.md)
- [useContext](./useContext.md)
- [useReducer](./useReducer.md)
- [useCallback](./useCallback.md)
- useId
- useTransition
- useDebugValue
- useLayoutEffect
- useDeferredValue
- useInsertionEffect
- useImperativeHandle
- useSyncExternalStore

Hooks
- `useRef`
  Maintain stable references across re-renders (for DOM element access, etc.)
- `useState`
  Create stateful functional components
- `useEffect`
  Execute external effects inside a component
- useContext
  Access shared state across many components
- useReducer
  Manage multivalue interdependent state using pure functions
- useMemo
  Memoize complex values across component renders for optimization
- useCallback
  Generate stable functions to be used for callbacks and event handlers for memoized components
- useLayoutEffect
  Run effects synchronously before the DOM paints to reduce perceived performance lag
- useDeferredValue
  Mark a local variable as lower-priority memoization, only returning fresh values if React has idle time
- useTransition
  Schedule lower-priority state updates to be executed whenever React has idle time
- useId
  Generate deterministic identifiers based on the component tree structure for perfect client-side hydration
- useImperativeHandle
  Expose imperative functionality to parent components
- useSyncExternalStore
  Synchronize external libraries with the React internal state while respecting React's Concurrent Mode
- useInsertionEffect
  Insert stylesheets into the document at the proper time in specialized external libraries
- useDebugValue
  Debug your applications easily by assigning custom labels to hooks for the React debugger
