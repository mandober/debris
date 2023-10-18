# Null Character


Escape sequence `\0` is defined to be a *null character* - a character with all bits set to zero. It is the first character in UTF-8/ASCII table, usually denoted as `NUL`.

It has nothing to do with pointers. However you may see something similar to this code:

`if (!*string_pointer)`
checks if the string pointer is pointing at a null character

`if (*string_pointer)`
checks if the string pointer is pointing at a non-null character

Don't get these confused with null pointers. Just because the bit representation is the same, and this allows for some convenient cross over cases, they are not the same thing.

Additionally, '\0' is (like all character literals) an integer constant, in this case with the value zero. So '\0' is completely equivalent to an unadorned 0 integer constant - the only difference is in the intent that it conveys to a human reader i.e. "using this as a null character".
