# Lifecycle Hooks

1. beforeCreate
2. created
3. beforeMount
4. mounted
5. beforeUpdate
6. updated
7. activated
8. deactivated
9. beforeDestroy
10. destroyed
11. errorCaptured

new Vue()
↓
init events and lifecycle
↓ *beforeCreate*
init injections and reactivity
↓ *created*
has `el`? -> no -> when
↓ yes             `vm.$mount(el)`
has `template`? <- is called
↓ yes      | ↓ no 
compile    | compile
template   | el's
into render| outerHTML
function   | as template
↓ *beforeMount*
create vm.$el and replace 'el'
↓ *mounted*

<- <- **MOUNTED** <- <- <-
↓                        ↑
↓  (when data changes)   ↑
↓                        ↑
↓  *beforeUpdate*        ↑
↓  Virtual DOM           ↑
↓  re-render & patch     ↑
↓  *updated*   ->   ->   ↑

(when `vm.$destroy()` is called)
↓ *beforeDestroy*
↓ Teardown watchers, child compoennts and event listeners
↓ *destroyed*
__DESTROYED__
