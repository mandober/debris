# mingw-w64

- x86_64-7.3.0-posix-seh-rt_v5-rev0:

T:/wsl/mingw-w64/x86_64-7.3.0-posix-seh-rt_v5-rev0/mingw64/bin


`stdio.h`:
- T:\wsl\mingw-w64\x86_64-7.3.0-posix-seh-rt_v5-rev0\mingw64\lib\gcc\x86_64-w64-mingw32\7.3.0\include\ssp\stdio.h
- T:\wsl\mingw-w64\x86_64-7.3.0-posix-seh-rt_v5-rev0\mingw64\lib\gcc\x86_64-w64-mingw32\7.3.0\include\c++\tr1\stdio.h
- T:\wsl\mingw-w64\x86_64-7.3.0-posix-seh-rt_v5-rev0\mingw64\x86_64-w64-mingw32\include\stdio.h


Arch:
- `mingw-w64` means the toolchain will generate 64bit binaries that will run on windows natively (64bit windows required)
- `mingw-w32` means the toolchain will generate 32bit binaries that will run on windows natively
In the SourceForge file area for the mingw-w64 project, please take note of the groups titled:
- Toolchains targetting Win32
- Toolchains targetting Win64

`Host`:
- "i686-cygwin"
- "i686-mingw"
- "x86_64-linux"
- "i686-linux"
This is the type of host that the toolchain you are downloading will run on.
If you are working in windows command prompt you will want "i686-mingw"
and so on.

`[_personal tag]`:
This is an optional tag that is used to distinguish personal builds from automated builds. An example of this is the build done by sezero. They are postfixed with "-sezero"

The mingw-w64 project maintains a C interface to msvcrt.dll that allow GNU GCC to run on and build for native windows






