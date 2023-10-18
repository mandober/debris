/* Promises */

// express add with now or later values as a Promise

function add(xPromise,yPromise) {
    // Promise.all takes an array of promises and
    // returns a new promise that waits on them all to finish
    return Promise.all([xPromise, yPromise])
        // when it is resolved, the received values are added
        .then(values =>
            // values is array of messages from previously resolved promises
            values[0] + values[1]
        )
}

// fetchX and fetchY return promises
add(fetchX(), fetchY())
    // We get back a promise repr'ing the sum. We can chain the
    // calls with then() to wait for the resolution of that promise
    .then(sum => console.log(sum))
;


// ===========================================================================
