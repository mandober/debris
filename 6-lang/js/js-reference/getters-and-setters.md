# Getters and Setters

https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Objects/Inheritance

- Getter is a method that act like a proxy for reading a propery.
- Setter is a method that act like a proxy for writing a propery.
- Useful when we want to validate modifications, useful for computed values.
- Getters and setters work in pairs on a property:
  - getter administrates what is returned when a prop is read
  - corresponding setter admins the changes when a prop is written


```js
class Teacher extends Person
{
    constructor(first, subject, grade) {
        // must instantiate super
        super(first);
        // subject and grade are Teacher-specific
        this._subject = subject;
        this.grade = grade;
    }

    get subject() {
        return this._subject;
    }

    set subject(newSubject) {
        this._subject = newSubject;
    }
}
```
