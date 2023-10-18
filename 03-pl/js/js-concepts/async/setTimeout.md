# setTimeout

https://developer.mozilla.org/en-US/docs/Web/API/setTimeout

The global `setTimeout()` method sets a timer which executes
- a function
- code to eval
once the timer expires.

## Syntax

```js
// a function
setTimeout(functionRef)
setTimeout(functionRef, delay)
setTimeout(functionRef, delay, param1)
setTimeout(functionRef, delay, param1, param2)
setTimeout(functionRef, delay, param1, param2, /* …, */ paramN)
// code as string to eval
setTimeout(code)
setTimeout(code, delay)
```


### Parameters

`functionRef`
A function to be executed after the timer expires.

`code`
An alternative syntax that allows you to include a string instead of a function, which is compiled and executed when the timer expires. This syntax is discouraged for the same reasons as for the `eval()`.

`delay` (Optional)
The time, in milliseconds that the timer should wait before the specified function or code is executed. If this parameter is omitted, a value of 0 is used, meaning execute "immediately", or more accurately, the next event cycle. Note that in either case, the actual delay may be longer than intended (see "Reasons for delays longer than specified" below). Also note that if the value is not a number, implicit type coercion is silently done on the value to convert it to a number - which can lead to unexpected and surprising results (see "Non-number delay values are silently coerced into numbers").

`param𝒾` (Optional)
Additional args which are passed through to the `functionRef` function.

*Return value*
The returned `timeoutID` is a positive integer value that identifies the current timer instance. This value can be passed to `clearTimeout()` to cancel the timeout. It is guaranteed that a `timeoutID` value will never be reused by a subsequent call to `setTimeout()` or `setInterval()` on the same object (a window or a worker). However, different objects use separate pools of IDs.

## Examples

```js
// 0 delay = 1 ms == ~5ms
setTimeout(() => console.log("Delayed for 1 second."), 1)

// setTimeout with 0 ms is used to delay a computation to the next tick
setTimeout(() => console.log("Delayed for 1 second."), 0)

// "1000" is coerced to 1000 so this runs as expected after 1s
setTimeout(() => console.log("Delayed for 1 second."), "1000")
```

## Working with asynchronous functions

`setTimeout()` is an *asynchronous function*, meaning it doesn't block. It is used to dealy a function to the next tick (the next run through the event loop); i.e. to create a delay ("pause") before the next function in the call stack fires.

```js
setTimeout(() => console.log("this is message 1"), 5000)
setTimeout(() => console.log("this is message 2"), 3000)
setTimeout(() => console.log("this is message 3"), 1000)

// this is message 3
// this is message 2
// this is message 1
```

Being asynchronous, the first `setTimeout()` call does not mean that the execution pauses for 5s after the first fucntion is executed and the second function is called. Instead, the first function is called, but it waits 5s on another thread, off the main thread. The same happens with the second function. And with the third. Which means there may be as much as 3 distinct threads (besides the main thread) at some time.

The timer of the third function, having the shortest delay, expires first, at which time its callback (or associated code) is placed on the task queue where it is executed (as soon as the call stack becomes empty). And similarly with the other functions.

To create a progression in which one function only fires after the completion of another function, see Promises.

In summary, a call to `setTimeout()` 


## The "this" problem

When you pass a method to setTimeout(), it will be invoked with a this value that may differ from your expectation. The general issue is explained in detail in the JavaScript reference.

Code executed by setTimeout() is called from an execution context separate from the function from which setTimeout was called. The usual rules for setting the this keyword for the called function apply, and if you have not set this in the call or with bind, it will default to the window (or global) object. It will not be the same as the this value for the function that called setTimeout.

```js
const myArray = ["zero", "one", "two"];
myArray.myMethod = function (sProperty) {
  console.log(arguments.length > 0 ? this[sProperty] : this)
}
```

myArray.myMethod(); // prints "zero,one,two"
myArray.myMethod(1); // prints "one"
The above works because when myMethod is called, its this is set to myArray by the call, so within the function, this[sProperty] is equivalent to myArray[sProperty]. However, in the following:

JS
Copy to Clipboard

setTimeout(myArray.myMethod, 1.0 * 1000); // prints "[object Window]" after 1 second
setTimeout(myArray.myMethod, 1.5 * 1000, "1"); // prints "undefined" after 1.5 seconds
The myArray.myMethod function is passed to setTimeout, then when it's called, its this is not set, so it defaults to the window object.

There's also no option to pass a thisArg to setTimeout as there is in Array methods such as forEach() and reduce(). As shown below, using call to set this doesn't work either.

JS
Copy to Clipboard

setTimeout.call(myArray, myArray.myMethod, 2.0 * 1000); // error
setTimeout.call(myArray, myArray.myMethod, 2.5 * 1000, 2); // same error
Solutions
USE A WRAPPER FUNCTION
A common way to solve the problem is to use a wrapper function that sets this to the required value:

JS
Copy to Clipboard

setTimeout(function () {
  myArray.myMethod();
}, 2.0 * 1000); // prints "zero,one,two" after 2 seconds
setTimeout(function () {
  myArray.myMethod("1");
}, 2.5 * 1000); // prints "one" after 2.5 seconds
The wrapper function can be an arrow function:

JS
Copy to Clipboard

setTimeout(() => {
  myArray.myMethod();
}, 2.0 * 1000); // prints "zero,one,two" after 2 seconds
setTimeout(() => {
  myArray.myMethod("1");
}, 2.5 * 1000); // prints "one" after 2.5 seconds
USE BIND()
Alternatively, you can use bind() to set the value of this for all calls to a given function:

JS
Copy to Clipboard

const myArray = ["zero", "one", "two"];
const myBoundMethod = function (sProperty) {
  console.log(arguments.length > 0 ? this[sProperty] : this);
}.bind(myArray);

myBoundMethod(); // prints "zero,one,two" because 'this' is bound to myArray in the function
myBoundMethod(1); // prints "one"
setTimeout(myBoundMethod, 1.0 * 1000); // still prints "zero,one,two" after 1 second because of the binding
setTimeout(myBoundMethod, 1.5 * 1000, "1"); // prints "one" after 1.5 seconds
Passing string literals
Passing a string instead of a function to setTimeout() has the same problems as using eval().

JS
Copy to Clipboard

// Don't do this
setTimeout("console.log('Hello World!');", 500);
JS
Copy to Clipboard

// Do this instead
setTimeout(() => {
  console.log("Hello World!");
}, 500);
A string passed to setTimeout() is evaluated in the global context, so local symbols in the context where setTimeout() was called will not be available when the string is evaluated as code.

Reasons for delays longer than specified
There are a number of reasons why a timeout may take longer to fire than anticipated. This section describes the most common reasons.

Nested timeouts
As specified in the HTML standard, browsers will enforce a minimum timeout of 4 milliseconds once a nested call to setTimeout has been scheduled 5 times.

This can be seen in the following example, in which we nest a call to setTimeout with a delay of 0 milliseconds, and log the delay each time the handler is called. The first four times, the delay is approximately 0 milliseconds, and after that it is approximately 4 milliseconds:

HTML
Play
Copy to Clipboard

<button id="run">Run</button>
<table>
  <thead>
    <tr>
      <th>Previous</th>
      <th>This</th>
      <th>Actual delay</th>
    </tr>
  </thead>
  <tbody id="log"></tbody>
</table>
JS
Play
Copy to Clipboard

let last = 0;
let iterations = 10;

function timeout() {
  // log the time of this call
  logline(new Date().getMilliseconds());
  // if we are not finished, schedule the next call
  if (iterations-- > 0) {
    setTimeout(timeout, 0);
  }
}

function run() {
  // clear the log
  const log = document.querySelector("#log");
  while (log.lastElementChild) {
    log.removeChild(log.lastElementChild);
  }

  // initialize iteration count and the starting timestamp
  iterations = 10;
  last = new Date().getMilliseconds();
  // start timer
  setTimeout(timeout, 0);
}

function logline(now) {
  // log the last timestamp, the new timestamp, and the difference
  const tableBody = document.getElementById("log");
  const logRow = tableBody.insertRow();
  logRow.insertCell().textContent = last;
  logRow.insertCell().textContent = now;
  logRow.insertCell().textContent = now - last;
  last = now;
}

document.querySelector("#run").addEventListener("click", run);
Play


Timeouts in inactive tabs
To reduce the load (and associated battery usage) from background tabs, browsers will enforce a minimum timeout delay in inactive tabs. It may also be waived if a page is playing sound using a Web Audio API AudioContext.

The specifics of this are browser-dependent:

Firefox Desktop and Chrome both have a minimum timeout of 1 second for inactive tabs.
Firefox for Android has a minimum timeout of 15 minutes for inactive tabs and may unload them entirely.
Firefox does not throttle inactive tabs if the tab contains an AudioContext.
Throttling of tracking scripts
Firefox enforces additional throttling for scripts that it recognizes as tracking scripts. When running in the foreground, the throttling minimum delay is still 4ms. In background tabs, however, the throttling minimum delay is 10,000 ms, or 10 seconds, which comes into effect 30 seconds after a document has first loaded.

See Tracking Protection for more details.

Late timeouts
The timeout can also fire later than expected if the page (or the OS/browser) is busy with other tasks. One important case to note is that the function or code snippet cannot be executed until the thread that called setTimeout() has terminated. For example:

JS
Copy to Clipboard

function foo() {
  console.log("foo has been called");
}
setTimeout(foo, 0);
console.log("After setTimeout");
Will write to the console:

After setTimeout
foo has been called
This is because even though setTimeout was called with a delay of zero, it's placed on a queue and scheduled to run at the next opportunity; not immediately. Currently-executing code must complete before functions on the queue are executed, thus the resulting execution order may not be as expected.

Deferral of timeouts during pageload
Firefox will defer firing setTimeout() timers while the current tab is loading. Firing is deferred until the main thread is deemed idle (similar to window.requestIdleCallback()), or until the load event is fired.

WebExtension background pages and timers
In WebExtensions, setTimeout() does not work reliably. Extension authors should use the alarms API instead.

Maximum delay value
Browsers store the delay as a 32-bit signed integer internally. This causes an integer overflow when using delays larger than 2,147,483,647 ms (about 24.8 days), resulting in the timeout being executed immediately.

Examples
Setting and clearing timeouts
The following example sets up two simple buttons in a web page and hooks them to the setTimeout() and clearTimeout() routines. Pressing the first button will set a timeout which shows a message after two seconds and stores the timeout id for use by clearTimeout(). You may optionally cancel this timeout by pressing on the second button.

HTML
HTML
Play
Copy to Clipboard

<button onclick="delayedMessage();">Show a message after two seconds</button>
<button onclick="clearMessage();">Cancel message before it happens</button>

<div id="output"></div>
JavaScript
JS
Play
Copy to Clipboard

let timeoutID;

function setOutput(outputContent) {
  document.querySelector("#output").textContent = outputContent;
}

function delayedMessage() {
  setOutput("");
  timeoutID = setTimeout(setOutput, 2 * 1000, "That was really slow!");
}

function clearMessage() {
  clearTimeout(timeoutID);
}
Result
Play


See also the `clearTimeout()` example.
