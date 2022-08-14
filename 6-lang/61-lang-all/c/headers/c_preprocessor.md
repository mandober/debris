# Preprocessor

Preprocessing, performed before compilation (at translation phase four), produces a single file, which is then passed to the compiler.

## Directives
Directives control the behavior of the preprocessor.
- preprocessing instruction:
  - `include`
  - `define`
  - `undef`
  - `if` \<expression\>
  - `ifdef` \<identifier\> (eq to `#if defined` \<identifier\>)
  - `ifndef` \<identifier\> (eq to `#if !defined` \<identifier\>)
  - `elif` \<expression\> (zero or many)
  - `else` (zero or one)
  - `endif` (required terminator)
  - `line`
  - `error`
  - `pragma`
- arguments (dependent on the instruction) 
- line break
- the null directive, `#` followed by a line break, is noop
- implementations are tolerant to spaces after `#`, e.g. `#else` or `# else`
- if an identifier is defined multiple times as any type of macro, the program is ill-formed unless the definitions are identical.
- `#undef` directive undefines the identifier. If the identifier does not have an associated macro, the directive is ignored.

## Conditional inclusion
The preprocessor supports conditional compilation of parts of a source file, controlled by `#if, #else, #elif, #ifdef, #ifndef, #endif` directives.


## Conditional evaluation

- `#ifdef`, `#ifndef`: check if identifier was defined.
- `#if`, `#elif`: the expression is a constant expression, using only constants and identifiers, defined with `#define`. 
  - non-literal or undefined identifier evaluates to 0.
  - the expression may contain unary operators: `defined <identifier>` or
   `defined (<identifier>)` which return 1 or 0.
  - if the expression evaluates to nonzero, the controlled code block is included, otherwise skipped.
  - non-constant identifiers are replaced with ​0​.


Note:
`#if cond1` whether cond1 is true or not
`#elif cond2` this must be a valid expression
but:
`#if cond1` if true
`#else #if cond3` this is skipped

If cond1 is true, the second `#if` is skipped and cond3 does not need to be well-formed, while `#elif`'s cond2 must be a valid expression (until C11).


```c
#define ABCD 2
#include <stdio.h>

int main(void) {
#ifdef ABCD
  printf("1: yes\n");
#else
  printf("1: no\n");
#endif
 
#ifndef ABCD
  printf("2: no1\n");
#elif ABCD == 2
  printf("2: yes\n");
#else
  printf("2: no2\n");
#endif
 
#if !defined(DCBA) && (ABCD < 2*4-3)
  printf("3: yes\n");
#endif
}
// output: `yes` (3 times)
```



## Capabilities
The preprocessor has the source file translation capabilities: 
* __conditionally compile__ of parts of source file, controlled by directives: `#if`, `#ifdef`, `#ifndef`, `#else`, `#elif` and `#endif`
* __replace__ text macros while possibly concatenating or quoting identifiers   
  controlled by directives `#define` and `#undef`, and operators `#` and `##`
* __include__ other files, controlled by directive `#include`
* __cause an error__, controlled by directive `#error`

Aspects of the preprocessor that can be controlled: 
* implementation defined behavior, controlled by directive `#pragma` and operator `_Pragma` (since C99)
* file name and line information available to the preprocessor, controlled by directives `#line`

