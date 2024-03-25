# Structs in C

https://en.cppreference.com/w/c/language/struct
https://en.cppreference.com/w/c/language/declarations
https://en.cppreference.com/w/c/language/struct_initialization
https://en.cppreference.com/w/c/language/operator_member_access

A **struct** is a type consisting of a *sequence of members* whose storage is allocated in an ordered sequence (as opposed to union, which is a type consisting of a sequence of members whose storage overlaps).

*struct type specifier* is identical to the *union type specifier* except for the keyword used (`struct` vs `union`):

## Syntax

>struct attr-spec-seq  (optional) name  (optional) { struct-declaration-list }

Struct definition: introduces the new type struct name and defines its meaning.


>struct attr-spec-seq (optional) name

If used on a line of its own, as in `struct name;`, declares but does not define the struct name (*forward declaration*). In other contexts, names the previously-declared struct, and [attr-spec-seq] is not allowed.

- [name] name of the struct that's being defined
- [struct-declaration-list] any number of variable declarations, bit-field declarations, and static assert declarations. Members of incomplete type and members of function type are not allowed (except for the flexible array member described)
- [attr-spec-seq] optional list of attributes, applied to the struct type (C23)


## Explanation

Within a struct object, addresses of its elements (and the addresses of the *bit-field allocation units*) increase in order in which the members were defined.

A *pointer to a struct* can be cast to a pointer to its first member (or, if the member is a bit-field, to its allocation unit). Likewise, a pointer to the first member of a struct can be cast to a pointer to the enclosing struct.

There may be *unnamed padding* between any two members of a struct or after the last member, but not before the first member.

>The size of a struct is at least as large as the sum of the sizes of its members.



If a struct defines at least one *named member*, it is allowed to additionally declare its last member with *incomplete array type*.

When an element of the *flexible array member* is accessed (in an expression that uses operator `.` or `->` with the flexible array member's name as the right-hand-side operand), then the struct behaves as if the array member had the longest size fitting in the memory allocated for this object.

If no additional storage was allocated, it behaves as if an array with 1 element, except that the behavior is undefined if that element is accessed or a pointer one past that element is produced.

Initialization and the assignment operator ignore the flexible array member. `sizeof` omits it, but may have more trailing padding than the omission would imply.

Structures with flexible array members (or unions who have a *recursive-possibly structure member with flexible array member*) cannot appear as array elements or as members of other structures.
