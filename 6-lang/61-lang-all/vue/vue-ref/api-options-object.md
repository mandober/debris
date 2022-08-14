# Options object

A new Vue instance accepts an *options object*.
Full list of options in the API reference:
https://vuejs.org/v2/api/

Options object property categories:
* Data
* DOM
* Lifecycle Hooks
* Assets
* Composition
* Misc


Options object properties:
* *Data*
  - `data`
  - `props`
  - `propsData`
  - `computed`
  - `methods`
  - `watch`
* *DOM*
  - `el`
  - template
  - render
  - renderError
* *Lifecycle Hooks*
  - beforeCreate, created
  - beforeMount, mounted
  - beforeUpdate, updated
  - activated, deactivated
  - beforeDestroy, destroyed
  - errorCaptured
* *Assets*
  * Directives
  * Filters
  * Components
* *Composition*
  parent
  mixins
  extends
  provide / inject
* *Misc*
  - `name`         Name the component to allow it to recursively call itself
  - `delimiters`   Change interpolation delimiters. Default: `[ "{{", "}}" ]`
  - `functional`     Make component stateless (no `data`) and instanceless (no `this`)
  - `model`          Allow custom component to customize prop and event used with v-model
  - `inheritAttrs`   Allow parent to child passing of props; sort of
  - `comments`       `True` will preserve and render HTML comments found in templates.



## el property
One of the properties is `el` that tells Vue where to mount (inject) itself in the HTML page. The `el` may be given as a string with a node's id, or a HTML node object. Vue will have jurisdiction only inside this node, everything outside is off limits. Becasue Vue will replace this object when initialized, it is forbiden to define `<body>` or `<html>` nodes as the vues's root node - just stick with other regular nodes like div's.

```
let app = new Vue({
  el: '#app'
});
```


## Methods
The Vue configuration object also has a section for methods. Methods are not reactive, so you could define them outside of the Vue configuration without any difference in functionality, but the advantage to Vue methods is that they are passed the Vue instance as context and therefore have easy access to your other properties and methods.

