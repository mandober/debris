# Type narrowing










## Narrowing in Generic Functions

https://www.totaltypescript.com/typescript-5-3

TypeScript, as it exists now, doesn't do a great job of narrowing inside generic functions, so using `as` to cast types is actually encouraged.

```ts
interface Example {
  foo: string,
  bar: number,
}

function exampleFunc<T extends keyof Example>(key: T): Example[T] {
  if (key === "foo") {
    return "abc"
    // Type 'string' is not assignable to type 'Example[T]'.
    // Type 'string' is not assignable to type 'never'.
  } else {
    return 123
    // Type 'number' is not assignable to type 'Example[T]'.
    // Type 'number' is not assignable to type 'never'.
  }
}
```

Above, we're trying to return a value from an object based on a key. If we pass in 'foo', we're returning a string, if we pass 'bar', we're returning a number. However, TS gives an error, despite the code being correct.

The reason for this is that TS is not narrowing `Example[T]` to be the correct key. Any narrowing applied to `Example[T]` ends up in it being typed as `never`, hence the errors.

As of TS v.5.2, the only way to get this working is to cast the return types to `never`, which feel artificial.

```ts
function exampleFunc<T extends keyof Example>(key: T): Example[T] {
  if (key === "foo") {
    return "abc" as never
  } else {
    return 123 as never
  }
}
```

TS 5.3 might solve this long-standing issue finally.
