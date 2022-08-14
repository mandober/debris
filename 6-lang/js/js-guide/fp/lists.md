# List

Functional programming's favorite data structure is a list, a recursive data type of course, defined as an empty list or a node, the so-called "cons" cell, that holds some payload and a reference to the next cell in the list.

> A list is an empty list or a node with a value and the rest of list attached.

This is easily spotted in Haskell's definition of the list data structure:

```hs
-- the bitter version
data List a = Nil | Cons a (List a)

-- the (compiler aided) sweet version
data [] a = [] | a : [a]
```

there are several variants like the doubly-linked list.

Lists are commonly implemented as the *singly-linked* node.


A *node*, or a *cons cell* in case of lists,  is a two-field data structure: one field, usually named `data`, holds some kind of payload, and the other, usually labelled `next`, holds a reference (commonly in the form of a C-like pointer) to the next cell in the list. The end of list is marked by the special value known as *nil*, (at the lower level, possibly implemented as a null pointer).

An example implementation in C would possibly include a struct called `cell` with two fields: the `data` field would hold a value (typically referred to as a payload) and the `next` field would be a pointer holding the address of the the next list cell. To mark the end of a list, the last cell's pointer would reference the *null* value (null pointer).


We will have a head, the first item in a list, and a tail, the remaining items in the list.

Typically, we use some data structure (e.g. a `struct` in C) that groups the `data` and the `next` field, where the latter holds a reference to the next item in the list. We know we are at the end of the list when the last item points to some null reference.

```c
struct node {
  int          data;
  struct node* next;
};

struct list_s {
  struct node* head;
   usize       length;
};
```



```
          .
          .
        d/ \n
       a/   \e
      t/     \x
     a/       \t
  value       cell

--- a single cell ---


          : --> cons
         / \
        1   :
`data` <-- / \ --> `next`
          2   :
             / \
payload <-- 3   ∅ --> nil

    --- a list ---
```











## List Folding

```
    (:)   foldr f v    f            (:)     foldl f v     f
    / \               / \           / \                  / \
   1  (:)            1   f         1  (:)               f   1
       / \               / \           / \             / \
      2  (:)            2   f         2  (:)          f   2
         / \               / \           / \         / \
        3  []             3   v         3  []       v   3
```
