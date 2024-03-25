# MinGW-w64 - for 32 and 64 bit Windows

https://sourceforge.net/projects/mingw-w64/
http://mingw-w64.org/doku.php

https://sourceforge.net/p/mingw-w64/wiki2/Home/
https://sourceforge.net/p/mingw-w64/wiki2/download%20filename%20structure/

The mingw-w64 project is a complete runtime environment for gcc to support 
binaries native to Windows 64-bit and 32-bit operating systems.

Features:
- Compiler toolchain hosts natively
- Supports Native TLS Callbacks
- Supports Wide-Character Startup (-municode)
- Supports 32-bit and 64-bit Windows i386/x64
- Supports Multilib toolchains
- Supports bleeding edge gcc/binutils


Headers, Libraries and Runtime
- More than a million lines of headers are provided, not counting generated 
  ones, and regularly expanded to track new Windows APIs.
- Everything needed for linking and running your code on Windows.
- __Winpthreads__ a __pthreads__ library for C++11 threading support and 
  simple integration with existing project.
- _Winstorecompat_, a work-in-progress convenience library that eases 
  conformance with the Windows Store.
- Better-conforming and faster math support compared to Visual Studio's.

Tools:
- `gendef`: generate Visual Studio .def files from .dll files.
- `genidl`: generate .idl files from .dll files.
- `widl`: compile .idl files.


## MinGW-W64 GCC-7.3.0

x86_64-posix-sjlj
x86_64-posix-seh
x86_64-win32-sjlj
x86_64-win32-seh
i686-posix-sjlj
i686-posix-dwarf
i686-win32-sjlj
i686-win32-dwarf


## GCC Exception Handling (EH)

GCC supports two methods for EH: dwarf-2 (dw2) and setjmp/longjmp (sjlj)
1. __DWARF-2 (DW2) EH__
  which requires the use of DWARF-2 (or DWARF-3) debugging information. DW-2 EH can cause executables to be slightly bloated because large call stack unwinding tables have to be included in the executables.
2. __SJLJ-based EH__
  A method based on setjmp/longjmp (SJLJ).
  SJLJ-based EH is much slower than DW2 EH (penalising even normal execution when no exceptions are thrown), but can work across code that has not been compiled with GCC or that does not have call-stack unwinding information.

__Structured Exception Handling (SEH)__
Windows uses its own exception handling mechanism known as Structured Exception Handling (SEH). Unfortunately, GCC does not support SEH yet.


## INSTALL
- `x86_64` or `i686`
- version (? - `7.3.0`)
- threads: `posix` or `win32`
- exception handling: `seh` or `sjlj` or `dwarf`
- build

https://stackoverflow.com/questions/15670169/what-is-difference-between-sjlj-vs-dwarf-vs-seh


## x86_64-7.3.0-posix-seh-rt_v5-rev0

- dir: `T:\wsl\mingw-w64\x86_64-7.3.0-posix-seh-rt_v5-rev0`


Features:
- (build by gentee36)
- OpenMP
- LTO
- Graphite
- std Thread support library
- std Atomic operations library
- Native TLS Callbacks
- Wide-Character Startup (-municode)
- 32-bit and 64-bit Windows
- Multilib toolchains
- Cross-compiling from x86_64 for i686 and vice versa

