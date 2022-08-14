# Pipeline operator

https://github.com/tc39/proposal-pipeline-operator

There are two competing proposals:
* F# Pipelines
  - [Explainer](https://github.com/valtech-nyc/proposal-fsharp-pipelines/blob/master/README.md)
  - [Specification](https://valtech-nyc.github.io/proposal-fsharp-pipelines/)
* Smart Pipelines
  - [Explainer](https://github.com/js-choi/proposal-smart-pipelines/blob/master/readme.md)
  - [Specification](https://jschoi.org/18/es-smart-pipelines/spec)

[latest presentation to TC39](https://docs.google.com/presentation/d/1eFFRK1wLIazIuK0F6fY974OIDvvWXS890XAMB59PUBA/edit#slide=id.p)

[recent GitHub issues](https://github.com/tc39/proposal-pipeline-operator/issues?utf8=%E2%9C%93&q=is%3Aissue+sort%3Aupdated-desc+)


https://github.com/tc39/proposal-pipeline-operator/wiki

https://docs.google.com/presentation/d/1eFFRK1wLIazIuK0F6fY974OIDvvWXS890XAMB59PUBA/edit#slide=id.p


https://github.com/js-choi/proposal-smart-pipelines/blob/master/readme.md
https://github.com/js-choi/proposal-smart-pipelines


https://github.com/isiahmeadows/lifted-pipeline-strawman/blob/master/README.md#syntax-for-loops-and-pipeline-manipulation



## Pipe

A binary infix operator |> that evaluates its LHS, then applies the RHS to the LHS's value as a unary function call:

```js
3 |> succ |> double |> square // 64

// before
exclaim(
  capitalize(
    doubleSay(
      "hello"
    )
  )
)

// after
"hello" |> doubleSay |> capitalize |> exclaim


// before
new User.Message(
  capitalize(
    doubledSay(value, ', ')
  ) + '!'
)

// after
value
  |> (x => doubleSay(x, ', '))
  |> capitalize
  |> (x => x + '!')
  |> (x => new User.Message(x))
```
