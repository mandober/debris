# Class types

A class name is used as both a type and value.

```ts
class Bag {
  constructor(type: string) {
    this.type = type
  }
}

const bag: Bag = new Bag('leather')
//         ↑↑↑       ↑↑↑
```
