# Clean

https://wiki.clean.cs.ru.nl
https://wiki.clean.cs.ru.nl/*NIX_Instructions
https://wiki.clean.cs.ru.nl/Projects
https://wiki.clean.cs.ru.nl/Clean_platform

* Download page
https://wiki.clean.cs.ru.nl/Download_Clean
Both nightly developments builds and the traditionally versioned Clean 3.1 are publicly available from our download page.

* Nightly builds
https://ftp.cs.ru.nl/Clean/builds

At this moment the following packages are available:
- `clean-bundle-itasks-*`: The most recent packaging of clean (3.1) with everything that's needed to build *iTasks* applications included. These packages are built for linux-x64, windows-x86 and macos-x64.
- `clean-classic-*`: A classic clean distribution similar to the 2.4 release and older. This package is built for linux (x86 and x64), windows (x86 and x64) and macos (x64).

* Latest packages
To get started with clean and iTasks quickly, download `latest` package:
- Linux x64 [clean-bundle-complete-linux-x64-latest.tgz](https://ftp.cs.ru.nl/Clean/builds/linux-x64/clean-bundle-complete-linux-x64-latest.tgz)
- Windows x64 [clean-bundle-complete-windows-x64-latest.zip](https://ftp.cs.ru.nl/Clean/builds/windows-x64/clean-bundle-complete-windows-x64-latest.zip)



* Clean wiki
https://wiki.clean.cs.ru.nl/Clean

* Daily builds
https://ftp.cs.ru.nl/Clean/builds/

* Cloogle is the official Clean search engine. It searches the Clean standard libraries for type definitions and functions.
https://cloogle.org/

* Docker images for Clean
https://hub.docker.com/r/itasks/clean/

* vim-clean
https://gitlab.com/clean-and-itasks/vim-clean
It has syntax highlighting for both Clean and ABC code, compiler error formats, allows you to switch easily between definition and implementation modules and has Cloogle integration.

* Clean System
https://wiki.clean.cs.ru.nl/Clean_System
The Clean System is a cross-platform software development system. Clean IDE is currently only available on Windows. On the other platforms (Linux and macOS) command line tools are available to build and manage your clean projects.


## Language features

* Quick impression
https://wiki.clean.cs.ru.nl/Quick_impression

* Language features
https://wiki.clean.cs.ru.nl/Language_features

Clean is a general purpose, state-of-the-art, pure and lazy functional programming language designed for making real-world applications. Here is a list of the most notable language features:

* Clean is a lazy, pure, and higher-order functional programming language with explicit graph-rewriting semantics.
* Although Clean is by default a lazy language, one can smoothly turn it into a strict language to obtain optimal time/space behavior: functions can be defined lazy as well as (partially) strict in their arguments; any (recursive) data structure can be defined lazy as well as (partially) strict in any of its arguments.
* Clean is a strongly typed language based on an extension of the well-known Milner/Hindley/Mycroft type inferencing/checking scheme including the common higher-order types, polymorphic types, abstract types, algebraic types, type synonyms, and existentially quantified types.
* Clean has pattern matching, guards, list comprehensions, array comprehensions and a lay-out sensitive mode.
* Clean supports type classes and type constructor classes to make overloaded use of functions and operators possible.
* The uniqueness typing system of Clean makes it possible to develop efficient applications. In particular, it allows a refined control over the single-threaded use of objects which can influence the time and space behavior of programs. Uniqueness typing can also be used to incorporate destructive updates of objects within a pure functional framework. It allows destructive transformation of state information and enables efficient interfacing to the nonfunctional world (to C but also to I/O systems like X-Windows) offering direct access to file systems and operating systems.
* Clean offers records and (destructively updateable) arrays and files.
* The Clean type system supports dynamic types, allowing values of arbitrary types to be wrapped in a uniform package and unwrapped via a type annotation at run time. Using dynamics, code and data can be exchanged between Clean applications in a flexible and type-safe way.
* Clean provides a built-in mechanism for generic functions.
* There is a Clean IDE
* There are many libraries available offering additional functionality.

* *Clean Compiler* is the most important component. Clean is a modular language consisting of definition modules (.dcl files) and implementation modules (.icl files). The Clean Compiler translates Clean source code to platform independent ABC-code (.abc files), a byte code for the abstract ABC machine.

* *Clean Code Generator* is written in C (for historical reasons) and translates ABC-code into very efficient native object code (.obj or .o files). The Code Generator can generate code for different types of processors.

* *Static Linker*, which is written in Clean, combines all the object code and special code (the Clean Run Time System including automatic garbage collectors) into an executable application. The Static Linker is an optimizing linker, it will not link in unused functions. It can also link in C code. There are several kinds of Clean libraries available which can help to reduce the amount of code you have to write significantly. Some linkers also (will) have the possibility to combine several object modules into one library module.

* *Time and Space profiling*: The IDE communicates with other tools which can help you to write better programs. There is a *Time Profiler* to measure the amount of time functions are consuming. Time consuming functions can be tuned by writing better algorithms or by using one of the many facilities Clean offers to speed up execution (strictness annotations, uniqueness typing). There is a *Heap Profiler* to measure the space consumption which can help you to find "space leaks".

* *The Dynamic Linker*: On Windows an alternative for the static linker is available, the Dynamic Linker which is again written in Clean. The Dynamic Linker does the same work as the Static Linker, but the difference is that the Dynamic Linker links object code to a running Clean application. An executing Clean application can communicate with the Dynamic Linker and request to plug-in some Clean function defined in some specific Clean module. If the object code is not available the Dynamic Linker can ask the Code Generator to generate it just-in-time. It would also be possible to ask the Clean Compiler to compile Clean source code just-in-time (this option is not chosen because you might run into compilation errors). The Dynamic Linker can also deal with Dynamics, a new feature of Clean 2.0. Dynamics are dynamically typed Clean expressions that can be stored on disk with just one Clean function call. Dynamics can contain code as well as data and when they are read in their types can be checked dynamically via pattern matching.


## Clean files

Clean code
- `prog.icl` implementation module, the actual function definitions
- `prog.dcl` definition module, the exported definitions 
   (data types and functions), list only the type of functions
- `prog.prj` project file of main module, project settings, paths, etc.

Machine code
- `prog.abc` generated abstract machine code
- `prog.o` object code, generated machine code
- `prog` executable, `prog.exe` windows executable

Modules
- the `main` module does not need a `.dcl` file
- the first line is: `module filename`, not `implementation module filename`
- any Clean program starts evaluating the function `Start`

```hs clean
-- file prog.icl

-- module name must match file name
module prog

-- import standard library
import StdEnv

fac :: Int -> Int
fac 0 = 1
fac n = n * fac (n-1)

-- the main function
Start :: Int
Start = fac 7
```

curl -o clean.zip https://ftp.cs.ru.nl/Clean/builds/linux-x64/clean-bundle-complete-linux-x64-latest.tgz

is this file:
`clean-bundle-complete-linux-x64-20220513.tgz`, 2022-05-13 03:00, 59M
