# Magic Methods

There are 15 magic methods:

```php
// creation
public function __construct() {}
public function __destruct() {}
public function __clone() {}

// getters
public function __invoke() {}
public function __call() {}
public function __callStatic() {}
// getters and setters
public function __get() {}
public function __set() {}
public function __set_state() {}
public function __isset() {}
public function __unset() {}

// serialization
public function __sleep() {}
public function __wakeup() {}

// print out
public function __toString() {}
public function __debuginfo() {}
```

