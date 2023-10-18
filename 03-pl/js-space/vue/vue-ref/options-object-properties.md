# Options object properties

A new Vue instance accepts an *options object*.
Full list of options in the API reference:
https://vuejs.org/v2/api/#Options-Data

- `el` 		 identifies DOM element the root component will mount on
- `props`    lists properties a child accepts from the parent
- `template` defines the output the component generates
- `data`     component's local state as an object (main) or obj returning func
- `methods`  component's methods
- `computed` properties associated with a component
- `watch`    component's watchers


## methods
The Vue configuration object also has a section for methods. Methods are not reactive, so you could define them outside of the Vue configuration without any difference in functionality, but the advantage to Vue methods is that they are passed the Vue instance as context and therefore have easy access to your other properties and methods.

## props
A list/hash of attributes that are exposed to accept data from the parent component.

## data
The `data` property is directly given an object (root data object) only in the main component, and a function that returns an object elsewhere. Vue recursively converts data object's properties into getters and setters, thereby making them reactive. Once observed, you can no longer add *reactive properties* to the *root data object*; therefore it's recommended to declare all *root-level reactive properties* upfront, before creating instances. After instance creation, original *data object* is accessed with `vm.$data`.

Vue *proxies* all the properties of the data object (ref as `vm.a` instead of `vm.$data.a`). Properties that start with `_` or `$` are not proxied because they may conflict with Vue's internal properties and API methods, however they are still accessible using `vm.$data._property`.

Arrow functions lack `this` binding, but you may still reference the current object by declaring a parameter which will be automatically bound to the current instance. So, you will be able to reference it after all with, e.g., `data: vm => ({ a: vm.myProp })`.


## el
One of the properties is `el` that tells Vue where to mount (inject) itself in the HTML page. The `el` may be given as a string with a node's id, or a HTML node object. Vue will have jurisdiction only inside this node, everything outside is off limits. Becasue Vue will replace this object when initialized, it is forbiden to define `<body>` or `<html>` nodes as the vues's root node - just stick with other regular nodes like div's.

