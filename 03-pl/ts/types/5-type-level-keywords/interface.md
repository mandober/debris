# interface

An interface is used to describe the shape of objects and can be extended by other interfaces, either explicitly with `extends` or automatically if the name of interfaces is the same (even if they are is separate files they will be merged).

An interface describes most of JS objects and classes, although classes can describe their type themselves (most types can be given as fields before the ctor is defined, and the rest can be annotated inline.)

Almost everything in JS is an object and interface was designed to match this behaviour.

`interface` and `type` have almost the same description:

```ts
interface JSONResponse extends Response, HTTPable {
  version: number,             // prop
  isAbsent?: boolean           // opt prop
  mustBeHere!: string          // "trust me it exists" prop
  update: (x: number) => void  // fn prop (arrow)
  update(x: number): void      // fn prop (alt form)
  (): JSONResponse             // interface is callable
  new(s: string): JSONResponse // interface is new-able
  [key: string]: string        // shape of future props
  readonly body: string        // immutable prop
}
```

- `prop?.val` is an optional property that may not be on the object (that is described by the interface)
- `prop!.val` is a prop guaranteed (by the user) to exist on the object
- function properties have two forms: fn statement and arrow form
- the weird syntax, `(): T`, arks the object as being callable (perhaps a function constructor?).
- the syntax `new(x: A): R` means that the object is also "newable" besides being callable; so it can be called both as `T()` and as `new T()`.
- `[key: K]: V` defined the shape of future properties (props not defined so far), both the type of the prop names (as `K`) and the type of their values (as `V`). Since both K and V will be instantiated once (and remain fixed), this means all properties will have the same types of both keys and values.
- a property with a `readonly` prefix cannot be changed
