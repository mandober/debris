# TDM-GCC

http://tdm-gcc.tdragon.net/download
https://sourceforge.net/projects/tdm-gcc


`tdm64-gcc-5.1.0-2.exe`
Bundle installer for the TDM64 MinGW-w64 edition
- GNU GCC 5.1.0
- GNU debugger (GDB) 64-bit
- C
- C++
- OpenMP support
- `SEH/SJLJ` exception handling, 
- `binutils` GNU toolchain programs
- `mingw-w64` Windows API libraries
- `mingw32-make` GNU make

## Installation

- I've chosen: `MinGW-w64/TDM64 (x32 and x64 bit installation)`
  `GCC 5.1.0`, `GDB 7.9.1 x64`
- components:
  - GCC (TDM64, current: 5.1.0-tdm64-1)
  - GCC subcomponents:
    - core (required base files and C support)
    - c++ (C++ support)
    - fortran, ada, objc, openmp
  - binutils (2.25-tdm64-1)
  - mingw64-runtime (mingw--w64 runtime snapshot: v4-git-2050618-gcc5-tdm64-1)
  - mingw32-make (mingw stable: 3.82.90-2-csv-20120902)
  - gdb (stable release: 7.9.1-tdm64-2)
  