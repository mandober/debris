# Directive list

https://vuejs.org/v2/api/#Directives
Vue's directives are special HTML attributes with `v-` prefix.

v-text
v-html
v-show
v-if
v-else
v-else-if
v-for
v-on
v-bind
v-model
v-slot
v-pre
v-cloak
v-once


## v-text

Expects: string

Details: Updates the element's `textContent`.
If you need to update the part of `textContent`, use Mustache interpolations.

Example:
```html
<span v-text="msg"></span>

<!-- same as -->
<span>{{msg}}</span>
```


