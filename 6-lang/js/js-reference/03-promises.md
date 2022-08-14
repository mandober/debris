# Promises

Promises have arisen from the need to address two concerns regarding callbacks: lack of trust and sequentiality.

The issue with trust is the inversion of control - we wrap up the continuation of our program in a callback function, and hand that callback over to another party and hope it will do the right thing.

Instead of handing the continuation of our program out (and with it the control over our program), *Promises* enable us to require from a third party the acknowledgement that/when the task is complete, so we can then decide how to proceed.

When you reason about a value, e.g. on which you'd like to perform some arithmetic calculations, you are assuming something very fundamental about that value: that it is a concrete, "now", already available, already *resolved*, value.

```js
// "now" values
let x, y; y=2, console.log(x+y) // NaN (x is undefined)

// "later" values
function add(getX, getY, cb) {
    getX(($x, x = $x) => y || cb(x + y));
    getY(($y, y = $y) => x || cb(x + y));
};

// fetchX and fetchY are sync or async functions
add(fetch(x), fetch(y), sum => console.log(sum))
```

The "later" snippet corresponds to "Add x and y, but if either of them isn't ready yet, wait, and add them as soon as possible". In that snippet, we treated x and y as future values, and we express an addition that (from the outside's perspective) doesn't care whether x or y, or both, are available now or later. This normalizes "now" and "later" such that we can rely on a predictable outcome of the addition operation. 

There, a *temporally consistent* operation add behaves the same whether values are available right away or later - the async code seems sync and therefore much easier to reason about.

> To consistently handle both "now" and "later" values, both should be made into "later", that is all values and operations shoudl be async.


To express this above (add) as a Promise:

```js
function add(xPromise,yPromise) {
    // Promise.all takes an array of promises and
    // returns a new promise that waits on them all to finish
    return Promise.all([xPromise, yPromise])

    // when it is resolved, the received values are added
    .then(values =>
        // values is array of messages from previously resolved promises
        values[0] + values[1];
    )
}

// fetchX and fetchY return promises
add(fetchX(), fetchY())
    // We get back a promise repr'ing the sum. We can chain the calls with
    // then() to wait for the resolution of that promise
    .then(sum => console.log(sum))
;
```



---

It's possible that the resolution of a Promise is rejection instead of fulfillment. Unlike a fulfilled Promise, where the value is always programmatic, a rejection value (commonly called a rejection reason) can either be set directly by the program logic, or it can result implicitly from a runtime exception.

With Promises, the then() call can actually take two functions, for fulfillment and the second for rejection.

```js
add( fetchX(), fetchY() )
.then(
    // fulfillment handler
    function(sum) {
        console.log( sum );
    },
    // rejection handler
    function(err) {
        console.error( err ); // bummer!
    }
);
```

Promises are an easily repeatable mechanism for encapsulating and composing future values.


The constructor `Promise()` must be used with `new`, and must be provided a sync callback. This callback function is passed two function callbacks that act as resolution capabilities for the promise. commonly labelled `resolve` and `reject`.

```js
var p = new Promise( function(resolve,reject){
    // call resolve() to resolve the promise
    // call reject()  to reject  the promise
});
```

`reject` simply rejects the promise, but `resolve` can either fulfill the promise or reject it, depending on what it's passed. If `resolve` is passed an immediate, non-Promise, non-`then`able value, then the promise is fulfilled with that value. But if `resolve` is passed a genuine Promise or a `then`able value, that value is unwrapped recursively, and whatever its final resolution state is, will be adopted by the promise.






## Links and resources

You Don't Know JS: Async & Performance, Chapter 3: Promises
https://github.com/getify/You-Dont-Know-JS/blob/1st-ed/async%20%26%20performance/ch3.md
