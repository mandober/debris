# Variables

Kinds of variables include:
- fields
- array elements
- local variables
- parameters

Variables represent storage locations and every variable has a type that determines what values can be stored in the variable:
* Non-nullable value type:
  - can store value of that exact type
* Nullable value type:
  - null value
  - value of that exact type
* `object`:
  - null reference
  - reference to an object of any reference type
  - reference to a boxed value of any value type
* Class type:
  - null reference
  - reference to an instance of that class type
  - reference to an instance of a class derived from that class type
* Interface type:
  - null reference
  - reference to an instance of a class type that impl that interface
  - reference to a boxed value of a value type that impl that interface
* Array type:
  - null reference
  - reference to an instance of that array type
  - reference to an instance of a compatible array type
* Delegate type:
  - null reference
  - reference to an instance of that delegate type

