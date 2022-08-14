# Callbacks


## Summary

Callbacks are the fundamental unit of asynchrony in JS, but they suffer from inversion of control (third-party trust issues). We need a better way to express asynchrony in a more synchronous, sequential, blocking manner.

## Callbacks

Callbacks are a common way to express asynchrony in JS. An async event leaves a callback function that is invoked by the event loop on that event, or when that event completes (mouse click, keypress, ajax data arrives, etc.).

## Continuations

A callback function encapsulates the continuation of the program. It is invoked later, when some consition is met, as a way to continue with that task's exectution.

## Nested/Chained Callbacks

```js
listen("click", function handler(evt) {
    setTimeout( function request() {
        ajax("http://some.url.1",
            function response(text) {
                if (text === "hello") handler()
                if (text === "world") request()
            }
        )
    }, 500)
})
```

## Control

The most troublesome problem with callbacks is inversion of control leading to a complete breakdown along all those trust lines.

Can you really trust 3rd party utilities, or even the utilities that you do theoretically control?

If you give a callback to another party plenty of things can go wrong:
- Call the callback too early
- Call the callback too late or never
- Call the callback too few or too many times
- Fail to pass along any necessary environment/parameters to your callback
- Swallow any errors/exceptions that may happen
- etc.


There are some variations of callback design pattern that have attempted to address some of the issues, one of which is to *split callback* into two callback functions, one for the success notification, one for the error notification. The split-callback approach is also used with the ES6 Promises.

Another approach is the *error-first style*, a style found in Node, where the first argument of a single callback is reserved for an error object (if any); on success, this argument will be empty/falsy and any subsequent arguments will be the success data; on failure, the first argument is set and truthy, and usually no other args are passed.

```js
function response(err, data) {
    // on error
    if (err) throw Error(err)
    
    // otherwise assume success
    console.log(data)
}

ajax( "http://some.url.1", response );
```

This style doesn't really resolve the trust issues, there's nothing preventing or filtering unwanted repeated invocations, or enforcing an invokaction (but only a single one).


```js
function toTimeout(fn,delay) {
    let intv = setTimeout( function(){
            intv = null;
            fn( new Error( "Timeout!" ) );
        }, delay )
    ;

    return function() {
        // timeout hasn't happened yet?
        if (intv) {
            clearTimeout( intv );
            fn.apply( this, [ null ].concat( [].slice.call( arguments ) ) );
        }
    };
}

// using "error-first style" callback design
function foo(err,data) {
    if (err) {
        console.error( err );
    }
    else {
        console.log( data );
    }
}

ajax( "http://some.url.1", toTimeout( foo, 500 ) );
```


What if you don't know whether the API in question will always execute async? You could invent a utility like this asyncify(..) proof-of-concept:

```js
function asyncify(fn) {
    var orig_fn = fn,
        intv = setTimeout( function() {
            intv = null;
            if (fn) fn();
        }, 0 )
    ;
    fn = null;

    return function() {
        // firing too quickly, before `intv` timer has fired to
        // indicate async turn has passed?
        if (intv) {
            fn = orig_fn.bind.apply(
                orig_fn,
                // add the wrapper's `this` to the `bind(..)`
                // call parameters, as well as currying any
                // passed in parameters
                [this].concat( [].slice.call( arguments ) )
            );
        }
        // already async
        else {
            // invoke original function
            orig_fn.apply( this, arguments );
        }
    };
}


// use
let result = data => console.log(a)
var a = 0
ajax( "..pre-cached-url..", asyncify( result ) )
a++
```


















## Links and resources

You Don't Know JS: Async & Performance, Chapter 2: Callbacks
https://github.com/getify/You-Dont-Know-JS/blob/1st-ed/async%20%26%20performance/ch2.md

Callbacks, synchronous and asynchronous
https://blog.ometer.com/2011/07/24/callbacks-synchronous-and-asynchronous/

Designing APIs for Asynchrony
https://blog.izs.me/2013/08/designing-apis-for-asynchrony
