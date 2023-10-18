# GCC flags

All flags prefixed with `-W`:

- `all`
- `extra`


`all` turns on these flags:

- char-subscripts Warn if an array subscript has type char.
- bool-compare
- bool-operation
- int-in-bool-context
- address
- comment
- format
- array-bounds=1 (only with `-O2`)
- duplicate-decl-specifier (C and Objective-C only)
- enum-compare (in C/ObjC; this is on by default in C++)
- implicit (C and Objective-C only)
- implicit-int (C and Objective-C only)
- implicit-function-declaration (C and Objective-C only)
- main (only for C/ObjC and unless -ffreestanding)
- logical-not-parentheses
- memset-elt-size
- memset-transposed-args
- missing-attributes
- misleading-indentation (only for C/C++)
- missing-braces (only for C/ObjC)
- multistatement-macros
- openmp-simd
- parentheses
- reorder
- restrict
- return-type
- sequence-point
- pointer-sign
- sizeof-pointer-div
- sizeof-pointer-memaccess
- strict-aliasing
- nonnull
- nonnull-compare
- strict-overflow=1
- switch
- tautological-compare
- trigraphs
- volatile-register-var
- uninitialized
- maybe-uninitialized
- unused-function
- unused-label
- unused-value
- unused-variable
- unknown-pragmas
- c++11-compat  -Wc++14-compat
- init-self (only for C++) 
- narrowing (only for C++)  
- sign-compare (only in C++)  
- catch-value (C++ and Objective-C++ only)  


---

`-Wextra`
This enables some extra warning flags that are not enabled by -Wall:

-Wclobbered  
-Wcast-function-type  
-Wempty-body  
-Wignored-qualifiers 
-Wimplicit-fallthrough=3 
-Wmissing-field-initializers  
-Wmissing-parameter-type (C only)  
-Wold-style-declaration (C only)  
-Woverride-init  
-Wsign-compare (C only) 
-Wtype-limits  
-Wuninitialized  
-Wshift-negative-value (in C++03 and in C99 and newer)  
-Wunused-parameter (only with -Wunused or -Wall) 
-Wunused-but-set-parameter (only with -Wunused or -Wall)  