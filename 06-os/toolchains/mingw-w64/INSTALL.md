# INSTALLATIONS of mingw-w64 for x32 and x64 Windows

base: `T:\wsl\mingw-w64`


## Installation variances
- `x86_64` or `i686`
- versions: `4.8.1` - `7.3.0`
- threads: `posix` or `win32`
- exception handling: `seh` or `sjlj` (or `dwarf` on i686 only)
- build revision: `0`, `1` or similar


## Available installations:

- MinGW-W64 GCC-7.3.0
	x86_64-posix-sjlj
	x86_64-posix-seh
	x86_64-win32-sjlj
	x86_64-win32-seh
	i686-posix-sjlj
	i686-posix-dwarf
	i686-win32-sjlj
	i686-win32-dwarf




## x86_64-7.3.0-posix-seh-rt_v5-rev0

Features:
- dir: `T:\wsl\mingw-w64\x86_64-7.3.0-posix-seh-rt_v5-rev0`
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

