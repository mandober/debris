# Directives

https://vuejs.org/v2/api/#Directives
Vue's directives are special HTML attributes with `v-` prefix.

v-text    v-if            v-on
v-html    v-else-if       v-bind
v-show    v-else          v-model
v-once    v-slot  v-pre   v-cloak

Directives:
* `v-text`  Updates element's `textContent`
* `v-html`  Updates element's `innerHTML`
* `v-show`  Toggle element's display
* `v-if`, `v-else-if`, `v-else` Conditional rendering
* `v-for`   Loop rendering
* `v-bind`  Dynamically bind attributes or component `prop` to expr
* `v-once`  Render element and component once only
* `v-cloak` Marks elements Vue readiness, removed when el is ready
* `v-pre`   Skip compilation for this element and its children; show raw
* `v-slot`  Denote named slots, or slots that expect to receive props
* `v-model` Creates two-way binding on a form input element or component
* `v-on` or `@` Attaches an event listener to the element


Most directives are `key="value"` pairs. To use a directive, add it to a HTML tag as if it were a HTML attribute, e.g. `<p v-DIR="EXPR">`, where EXPR may be any JS expr, including a Vue `data` property, e.g. `this.myval`.

Directives and string interpolations accept expressions:
`<div v-DIR="EXPR">{{ EXPR }}</div>`

```vue
<div id="app">
  <p v-if="myval">This p tag is rendered if myval is truthy.</p>
  <p v-else>Otherwise, this one is. Note: v-else is valueless key.</p
</div>

<script>
new Vue({
  el: '#app',
  data: {
    myval: true
  }
});
</script>
```

