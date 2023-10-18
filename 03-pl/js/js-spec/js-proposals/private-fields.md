# Private fields proposal

https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes/Class_fields

Both Public and private field declarations are an experimental feature (stage 3) proposed at TC39, the JavaScript standards committee.

Both static and instance public fields are writable, enumerable, and configurable properties. As such, unlike their private counterparts, they participate in prototype inheritance.

## Public static fields

Public static fields are useful when you want a field to exist only once per class, not on every class instance you create. This is useful for caches, fixed-configuration, or any other data you don't need to be replicated across instances.

Public static fields are declared using the `static` keyword. They are added to the class constructor at the time of class evaluation using `Object.defineProperty()`. They are accessed again from the class constructor.

Fields without initializers are initialized to undefined.

Public static fields are not reinitialized on subclasses, but can be accessed via the prototype chain.

When initializing fields, this refers to the class constructor. You can also reference it by name, and use super to get the superclass constructor (if one exists).

...

## Private static fields 

Private fields are accessible on the class constructor from inside the class declaration itself. The limitation of static variables being called by only static methods still holds. 

```js
class ClassWithPrivateStaticField {
  static #PRIVATE_STATIC_FIELD

  static publicStaticMethod() {
    ClassWithPrivateStaticField.#PRIVATE_STATIC_FIELD = 42
    return ClassWithPrivateStaticField.#PRIVATE_STATIC_FIELD
  }
}

assert(ClassWithPrivateStaticField.publicStaticMethod() === 42)
```

Private static fields are added to the class constructor at class evaluation time.

There is a provenance restriction on private static fields. Only the class which defines the private static field can access the field.

This can lead to unexpected behaviour when using `this`.

```js
class BaseClassWithPrivateStaticField {
  static #PRIVATE_STATIC_FIELD

  static basePublicStaticMethod() {
    this.#PRIVATE_STATIC_FIELD = 42
    return this.#PRIVATE_STATIC_FIELD
  }
}

class SubClass extends BaseClassWithPrivateStaticField { }

assertThrows(() => SubClass.basePublicStaticMethod(), TypeError)
```

## Private instance fields

Private instance fields are declared with `#` names (pronounced "hash names"), which are identifiers prefixed with `#`. *The `#` is a part of the name itself* - it is used for declaration and accessing as well.

The encapsulation is enforced by the language. It is a syntax error to refer to hash names from out of scope.

```js
class ClassWithPrivateField {
  #privateField
  
  constructor() {
    this.#privateField = 42
    this.#randomField = 666 // Syntax error
  }
}

const instance = new ClassWithPrivateField()
instance.#privateField === 42 // Syntax error
```


## Private static methods

Like their public equivalent, private static methods are called on the class itself, not instances of the class. Like private static fields, they are only accessible from inside the class declaration.

Private static methods may be generator, async, and async generator functions.

...

## Private instance methods

Private instance methods are methods available on class instances whose access is restricted in the same manner as private instance fields.

```js
class ClassWithPrivateMethod {
  #privateMethod() {
    return 'hello world'
  }

  getPrivateMessage() {
      return this.#privateMethod()
  }
}

const instance = new ClassWithPrivateMethod()
console.log(instance.getPrivateMessage())
// expected output: "hello worl​d"
```

Private instance methods may be generator, async, or async generator functions. Private getters and setters are also possible:

```js
class ClassWithPrivateAccessor {
  #message

  get #decoratedMessage() {
    return `✨${this.#message}✨`
  }
  set #decoratedMessage(msg) {
    this.#message = msg
  }

  constructor() {
    this.#decoratedMessage = 'hello world'
    console.log(this.#decoratedMessage)
  }
}

new ClassWithPrivateAccessor();
// expected output: "✨hello worl​d✨"
```