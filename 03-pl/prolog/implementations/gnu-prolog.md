# Prolog :: Implementations :: GNU Prolog

Home: http://www.gprolog.org/
Git: https://github.com/didoudiaz/gprolog
Manual: http://www.gprolog.org/manual/gprolog.html
Changelog: http://www.gprolog.org/ChangeLog
News: http://www.gprolog.org/NEWS
README: http://www.gprolog.org/README
@openhub: https://www.openhub.net/p/gprolog

GNU PROLOG - A Native Prolog Compiler with Constraint Solving over Finite Domains, Edition 1.50, for GNU Prolog version 1.5.0 (July 8, 2021)

Distros for Linux, Win, Mac
- Windows intel 64 bits auto-install setup (compiled under x86_64 / Windows 10 with MSVC++).
http://www.gprolog.org/setup-gprolog-1.5.0-msvc-x64.exe
- Windows intel 64 bits auto-install setup (compiled under x86_64 / Windows 10 with MinGW64 gcc under MSys2).
http://www.gprolog.org/setup-gprolog-1.5.0-mingw-x64.exe

- 1.5.0 (Jun 2019) last change
- 1.4.5 (Feb 2018)

## What is GNU Prolog

GNU Prolog is a free Prolog compiler with constraint solving over finite domains developed by Daniel Diaz.

GNU Prolog accepts Prolog + constraint programs and produces native binaries (like gcc does from a C source). The obtained executable is then stand-alone. The size of this executable can be quite small since GNU Prolog can avoid to link the code of most unused built-in predicates. Beside the native-code compilation, GNU Prolog offers a classical interactive interpreter (top-level) with a debugger.

The Prolog part conforms to the ISO standard for Prolog with many extensions very useful in practice (global variables, OS interface, sockets, etc.).

GNU Prolog also includes an efficient constraint solver over *Finite Domains* (FD). This opens contraint logic programming to the user combining the power of constraint programming to the declarativity of logic programming.

## Features

Prolog system:
- conforms to the ISO standard for Prolog (floating point numbers, streams, dynamic code, etc.)
- a lot of extensions: global variables, definite clause grammars (DCG), sockets interface, operating system interface, etc.
- more than 300 Prolog built-in predicates
- Prolog debugger and a low-level WAM debugger
- line editing facility under the interactive interpreter with completion on atoms
- powerful bidirectional interface between Prolog and C

Compiler:
- native-code compiler producing stand alone executables
- simple command-line compiler accepting a wide variety of files: Prolog files, C files, WAM files, etc.
- direct generation of assembly code 15 times faster than WAMCC + GCC
- most of unused built-in predicates are not linked (to reduce the size of the executables)
- compiled predicates (native-code) as fast as wamcc on average
- consulted predicates (byte-code) 5 times faster than wamcc

Constraint solver:
- FD variables well integrated into the Prolog environment (full compatibility with Prolog variables and integers). No need for explicit FD declarations
- very efficient FD solver (comparable to commercial solvers)
- igh-level constraints can be described in terms of simple primitives
- a lot of predefined constraints: arithmetic constraints, boolean constraints, symbolic constraints, reified constraints, etc.
- several predefined enumeration heuristics
- the user can define his own new constraints
- more than 50 FD built-in constraints/predicates

## How does GNU Prolog work

The GNU Prolog compiler is based on the *Warren Abstract Machine (WAM)*. It first compiles a Prolog program to a WAM file which is then translated to a low-level machine independent language called *mini-assembly* specifically designed for GNU Prolog. The resulting file is then translated to the assembly language of the target machine (from which an object is obtained).

This allows GNU Prolog to produce a native stand alone executable from a Prolog source (similarly to what does a C compiler from a C program). The main advantage of this compilation scheme is to produce native code and to be fast. Another interesting feature is that executables are small since the code of most unused built-in predicates can be excluded from the executables at link-time.

GNU Prolog also includes an efficient constraint solver over Finite Domains (FD). The key feature of the GNU Prolog solver is the use of a single (low-level) primitive to define all (high-level) FD constraints.

There are many advantages of this approach:
- constraints can be compiled
- the user can define his own constraints (in terms of the primitive)
- the solver is open and extensible (as opposed to black-box solvers like CHIP)

Moreover, the GNU Prolog solver is rather efficient, often more than commercial solvers.

## History

GNU Prolog is inspired by two systems developed by the same author:

* `wamcc`: a Prolog to C compiler. the key point of wamcc was its ability to produce stand alone executables using an original compilation scheme: the translation of Prolog to C via the WAM. Its drawback was the time needed by gcc to compile the produced sources. GNU Prolog can also produce standalone executables but using a faster compilation scheme.

* `clp(FD)`: a constraint programming language over FD. Its key feature was the use of a single primitive to define FD constraints. GNU Prolog is based on the same idea but extends the power of primitive to make it possible more complex constraint definitions. In comparison to clp(FD), GNU Prolog offers new predefined constraints, new predefined heuristics, reified constraints, etc.


The development of GNU Prolog started in January 1996 under the name Calypso.
