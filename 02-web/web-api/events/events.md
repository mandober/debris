# Events

* Event reference | MDN
https://developer.mozilla.org/en-US/docs/Web/Events

* Event - Web APIs | MDN
https://developer.mozilla.org/en-US/docs/Web/API/Event



## Introduction to events

* Introduction to events - Learn web development | MDN
https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Building_blocks/Events

>Web events are not part of the core JavaScript language - they are defined as part of the APIs built into the browser.

Events are "happenings" which the system lets you know about, so you can react to them.

An event is a user-triggered action like scrolling, but also some more abstract things like finishing loading some resource, or even custom user-defined things.

This is the fundamental theory of events, how they work in browsers, and how events may differ in different programming environments.

Events are things that happen in the system you are programming - the system "fires" a *signal* of some kind *when an event occurs*, and provides a mechanism by which an action can be automatically set to allow you to run some code when the event you are insterested in occurs.

Events are fired within the browser window, and tend to be attached to a specific element in it; it may be a single element, a set of elements, document in the current tab, or the entire browser window. There are many different types of events that can occur.

Events include or may be extracted from
- user actions: selection, clicks, hovering
- typing a key on the keyboard
- resizing or closing the browser window
- web page finishes loading
- form is submitted
- video is played, is paused, ends
- error occurs

To react to an event, you associate (attach) an *event handler* to it (in response to it), which is a function set up to automatically run when the event occurs.

Setting up an event handler to run in response to an event is called *registering an event handler*, or *subscribing to an event* - you subscribe to an event by passing a handler function to a particular event-related construct (such as `addEventListener`).

```js
button.addEventListener("click", () => alert("It happend!"))
```

`button` is the activation (or a trigger) HTML element - when some action occurs wrt the button, the associated handler runs. To associate a handler to the button, you first decide which action (which button-related event) you want to react to.

For example, the `click` event is associated with the button being pressed, but there are lots of ways in which the button ends up being pressed. Besides the usual left-mouse-clicking, the same effect can be achieved by hitting the enter key when the button is focused, by touching the button on a touch-screen devices, or the click can be triggered even programmatically. That is, the event name, i.e. `click`, is more a historical coincidence, than possibly the only presumed way to activate/push a button.

Anyway, when the `click` event occurs, the browser will look for all the handlers registered for that particular event (on that particular element) and call (invoke) them all. This implies that an event may have any number of handlers attached. Since handlers are functions, the browser will call each registered function-handler, passing it an *event object*, which contains all imaginable information about that particular occurence of that particular event.

Sometimes the term *event* names a specific event-thing in general, and sometiems it refers to a *particluar occurrence* of some specific event.


An **event listener** listens for a particular event, and an **event handler** is invoked in response to the occurrence of that event.

- event
- event model
- event mechanisms
  - `addEventListener()`
  - `removeEventListener()`
  - removing handlers with `AbortSignal`
  - Adding multiple listeners for a single event
    - provide different handlers to `addEventListener()`
- event listener
- event handler, event handler function
- firing an event
  - system-instigated
  - user-instigated, user action
  - via timer
  - programmatically
- registering an event handler, subscribing to an event
- event trigger
- deliberatly triggering an event
- browser events
- user-initiated events
- custom (user-defined) events
- event propagation
- event bubbling
- event cancelling
- event object passed to handlers
- event throttling, e.g. onScroll fires too much (too frequently)
- event deferring (react only to the last firing of the onScroll event)
  - at signal head
  - at signal tail
  `---xoxxxx---xxoxxxxx---oxxxx--ox---oo---xoo---o---`
      ↑ fire on first 'x'       fire on last 'o' ↑
- event capturing phase
- event bubbling, (optional) bubbling phase
- delegating events
- preventing default behavior (of some events)
- abort controller
- events in node.js, https://nodejs.org/api/events.html
  - event listeners
  - event emitters





Aside:

```js
// distributivity of (*) over (+) can easily fail with impure fns:
Math.random() * (number + 1) !== Math.random() * number + Math.random() * 1

// unless - but even this is impure
const r = Math.random()
r * (number + 1) !== r * number + r * 1
```

>So are events impure.
