# Proxy

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Proxy

The `Proxy` object is used to create a proxy for a target object in order to intercept and redefine *fundamental operations* for the target object.

The object that acts as a proxy to another object is then used in place of the original object, but the fundamental `Object` operations like getting, setting, and defining properties can be redefined in a transparent manner.

Proxy objects are commonly used to log property accesses, validate, format or sanitize inputs, etc.

Objects involved:
- target aka original, proxied JS object

- **target**: JS object to be proxied
  - *original object*: regular JS object
  - *proxied object*: regular JS object that has a proxy attached
- **handler**: an object that defines proxied operations
  - *proxy*: an object that is accessed in place of the original object
- **trap**: the function that defines the behavior for the corresponding object internal method


It contains the traps which define the behavior of the proxy.


Neither original nor handler object need exist (be bound to a variable) prior to the *proxying operation*.

```js
const proxy = new Proxy({a: 1, b: 2}, {})
```

Here, the target (original, to-be-proxified) object is the literal `{a:1, b:2}`, and the handler object is the empty object literal `{}`. The call to the `Proxy` ctor returns a new object that now acts as the proxy for the object in the first argument. Since the handler object was empty, all operations are intercepted, but they and merely forwarded from the proxy to the original object.





A Proxy is created by passing it 2 parameters:
- target
- handler

For example, this code creates a proxy for the target object.


```js
const proxy = new Proxy({a: 1, b: 2}, {})
// original, target, proxied JS object
const target = {
  m1: "hello",
  m2: "everyone",
}
// handler, proxy JS object
const handler1 = {}
const proxy1 = new Proxy(target, handler1)

```
