# Variables

A variable is an area of memory that has been given a name. The idea is you get to use a name to specify where to store data. For example, `int a = 10` is an instruction to store the data value 10 in the area of memory named `a`. This is fundamental, but there is another way of referring to particular memory location - a pointer.

The CPU accesses the main memory, not by using variables, but by using a memory mapping where each location in memory is uniquely indexed by a number. A pointer is a variable that can directly store this number that represents a memory location (memory address).

---

Different types require different amounts and alignment of memory; they provide specific set of operations (methods) inherently. A typical variable declaration is of the form:

```text
<type> identifier;
// or for multiple variables:
<type> identifier_1, identifier_2, identifier_n;
```

Concretely:

```c
// declaration: single
int num1;

// declaration: multiple
int num2, num3;

// declaration of pointer to int and an int
int *p1, p2;

// declaration of 2 pointers to int
int *pi1, *pi2;

// definition: single
int num5 = 22;

// first, multi-declaration:
int num6, num7;
// then, chained definition:
num6 = num7 = 44;
// both, num6 and num7, are 44 now
printf("%d, %d", num6, num7);
```

An identifier consists of alphanumeric characters and underscore, but it must not start with a number.
