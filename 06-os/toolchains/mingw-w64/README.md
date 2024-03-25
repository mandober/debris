# MinGW-w64 - for 32 and 64 bit Windows

## Links 
https://sourceforge.net/projects/mingw-w64/
https://sourceforge.net/projects/mingw-w64/files/?source=navbar
https://sourceforge.net/p/mingw-w64
https://sourceforge.net/projects/mingw-w64/
https://sourceforge.net/p/mingw-w64/wiki2/Home/
https://sourceforge.net/p/mingw-w64/wiki2/download%20filename%20structure/
https://stackoverflow.com/questions/15670169/what-is-difference-between-sjlj-vs-dwarf-vs-seh

### MinGW-w64 for 32 and 64 bit Windows:
Browse -> Toolchains targetting Win64 -> Personal Builds -> mingw-builds -> 7.3.0 ->

- [x86_64-posix-sjlj](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win64/Personal%20Builds/mingw-builds/7.3.0/threads-posix/sjlj/x86_64-7.3.0-release-posix-sjlj-rt_v5-rev0.7z)
- [x86_64-posix-seh](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win64/Personal%20Builds/mingw-builds/7.3.0/threads-posix/seh/x86_64-7.3.0-release-posix-seh-rt_v5-rev0.7z)
- [x86_64-win32-sjlj](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win64/Personal%20Builds/mingw-builds/7.3.0/threads-win32/sjlj/x86_64-7.3.0-release-win32-sjlj-rt_v5-rev0.7z)
- [x86_64-win32-seh](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win64/Personal%20Builds/mingw-builds/7.3.0/threads-win32/seh/x86_64-7.3.0-release-win32-seh-rt_v5-rev0.7z)
- [i686-posix-sjlj](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win32/Personal%20Builds/mingw-builds/7.3.0/threads-posix/sjlj/i686-7.3.0-release-posix-sjlj-rt_v5-rev0.7z)
- [i686-posix-dwarf](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win32/Personal%20Builds/mingw-builds/7.3.0/threads-posix/dwarf/i686-7.3.0-release-posix-dwarf-rt_v5-rev0.7z)
- [i686-win32-sjlj](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win32/Personal%20Builds/mingw-builds/7.3.0/threads-win32/sjlj/i686-7.3.0-release-win32-sjlj-rt_v5-rev0.7z)
- [i686-win32-dwarf](https://sourceforge.net/projects/mingw-w64/files/Toolchains%20targetting%20Win32/Personal%20Builds/mingw-builds/7.3.0/threads-win32/dwarf/i686-7.3.0-release-win32-dwarf-rt_v5-rev0.7z)



## About
The mingw-w64 project is a complete runtime environment for gcc to support 
binaries native to Windows 64-bit and 32-bit operating systems.

### Features:
- Compiler toolchain hosts natively
- Supports Native TLS Callbacks
- Supports Wide-Character Startup (-municode)
- Supports 32-bit and 64-bit Windows i386/x64
- Supports Multilib toolchains
- Supports bleeding edge gcc/binutils

### Headers, Libraries and Runtime
- More than a million lines of headers are provided, not counting generated 
  ones, and regularly expanded to track new Windows APIs.
- Everything needed for linking and running your code on Windows.
- `winpthreads` a `pthreads`library for C++11 threading support and 
  simple integration with existing project.
- `winstorecompat`, a work-in-progress convenience library that eases 
  conformance with the Windows Store.
- Better-conforming and faster math support compared to Visual Studio's.

### Tools:
- `gendef`: generate Visual Studio .def files from .dll files.
- `genidl`: generate .idl files from .dll files.
- `widl`: compile .idl files.



## GCC Exception Handling (EH)

GCC supports two methods for EH: `dwarf-2 (dw2)` and `setjmp/longjmp (sjlj)`

### DWARF-2 (DW2)
which requires the use of `DWARF-2` (or `DWARF-3`) debugging information.
DW-2 EH can cause executables to be slightly bloated because large call
stack unwinding tables have to be included in the executables.

### SJLJ
A method based on setjmp/longjmp (SJLJ).
SJLJ-based EH is much slower than DW2 EH (penalising even normal execution 
when no exceptions are thrown), but can work across code that has not been 
compiled with GCC or that does not have call-stack unwinding information.

## Windows Exception Handling

### SEH
Windows uses its own exception handling mechanism known as Structured
Exception Handling (SEH). Unfortunately, GCC does not support SEH yet.



