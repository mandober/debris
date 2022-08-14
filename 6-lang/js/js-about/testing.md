

## Decorators

https://www.telerik.com/blogs/decorators-in-javascript


## Property Based Testing

https://hackage.haskell.org/package/QuickCheck
https://github.com/jsverify/jsverify
https://stackoverflow.com/questions/23608007/quickcheck-for-javascript
https://jsverify.github.io/
https://github.com/dubzzz/fast-check
https://marmelab.com/blog/2019/04/18/property-based-testing-js.html
https://medium.com/javascript-inside/generative-testing-in-javascript-f91432247c27
https://www.youtube.com/watch?v=a2J_FSkxWKo
https://www.endpoint.com/blog/2016/03/16/quickcheck-property-based-testing-in



## Property Based Testing in JS

https://marmelab.com/blog/2019/04/18/property-based-testing-js.html

Testing is necessary but writing tests manually means you have to come up with a very diverse set of inputs in order to test functionality thoroughly because the quality of tests depends on the quantity and quality of the test input space. You have to invent a bunch of expected, less expected and practically unexpected inputs to be absolutely certain you code handles all the cases well.

**Property based testing** is used in Haskell, via the tool called *QuickCheck*. The idea consists in automatically generating inputs for testing a function. For each function you want to test, you have to determine the *invariants*, i.e. a set of properties indipendent of anything else in your code. A property that must hold in any imaginable case is then stressed - QuickCheck randomly generates a huge number of inputs and checks that the property holds in each case.

For example, suppose you want to test the "McCarthy91" function (because its value is always 91):

const mac = n => n > 100 ? n-10 : mac(mac(n + 11))
