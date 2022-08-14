# Links


## Links
https://webassembly.github.io/
https://webassembly.studio/
https://github.com/WebAssembly/wabt/



## Specs

WebAssembly official homepage:
https://webassembly.github.io/

WebAssembly Specification - WebAssembly 1.0:
https://webassembly.github.io/spec/core/

Issue Tracker:
http://github.com/webassembly/spec/issues/

Latest Draft:
http://webassembly.github.io/spec/core/

Syntax Conventions:
https://webassembly.github.io/spec/core/syntax/conventions.html


## Online Tools

`WebAssembly Studio`
https://webassembly.studio/
https://github.com/wasdk/WebAssemblyStudio
WebAssembly online editor lets you compile Rust/C/C++ code to WebAssembly and run it in the browser.

`WasmFiddle`
https://wasdk.github.io/WasmFiddle/
https://github.com/wasdk/WasmFiddle
WasmFiddle lets you compile C/C++ code to WebAssembly and run it in the browser.


## Tools

`WebAssembly Binary Toolkit`
https://github.com/WebAssembly/wabt/
WABT is used to assemble and disassemble .wasm files.


`LLVM`

`Clang Format`
Used to format C/C++ files.


`Rust`

- [Emscripten](http://emscripten.org/)


`Cmake`

- [asm2wasm](https://github.com/WebAssembly/binaryen/blob/master/src/asm2wasm.h)
Compiles asm.js to WebAssembly

- [AssemblyScript](https://github.com/AssemblyScript/assemblyscript)
Compiles TypeScript to Binaryen IR.

- [wasm2js](https://github.com/WebAssembly/binaryen/blob/master/src/wasm2js.h)
Compiles WebAssembly to JS

- [Asterius](https://github.com/tweag/asterius)
Compiles Haskell to WebAssembly


- [Binaryen](https://github.com/WebAssembly/binaryen/)
  - Compiler infrastructure and toolchain library for WebAssembly, in C++.
  - `wasm-opt`: Loads WebAssembly and runs Binaryen IR passes on it.
  - `wasm-as`: assembles text to binary format (through Binaryen IR).
  - `wasm-dis`: disassembles binary into text format (through Binaryen IR).
  - `wasm2js`: wasm-to-JS compiler; used by Emscripten to generate JS 
  - `wasm-shell`: shell wasm interpreter; can also run the spec test suite.
  - `wasm-emscripten-finalize`: performs emscripten-specific passes over a .wasm produced by llvm+lld
  - `asm2wasm`: asm.js to WebAssembly compiler, using Emscripten's asm optimizer infrastructure; used by Emscripten in Binaryen mode when it uses Emscripten's fastcomp asm.js backend.
  - `wasm-ctor-eval`: tool to execute C++ global constructors ahead of time; used by Emscripten.
  - `binaryen.js`: standalone JS lib of Binaryen API for creating and optimizing WASM modules.



## Concepts

`S-expression`
en.wikipedia.org/wiki/S-expression


## Portals

- [WebAssembly Rocks!](https://www.wasmrocks.com)
- [Awesome wasm](https://github.com/mbasso/awesome-wasm)
- [wasm weekly](http://wasmweekly.news/)




---

- [WebAssembly.org][wado]
  WebAssembly or wasm is a portable, size and load-time efficient low-level programming language for in-browser client-side scripting, designed to be faster than JS.
- [asm.js][asmj]
  Optimizable, low-level, subset of JS as intermediate programming language designed to allow software written in languages such as Rust to be run as web applications while maintaining performance characteristics considerably better 
  than standard JS.
- [Emscripten][emsc]
  Emscripten is a source-to-source compiler that runs as a backend to the LLVM compiler and produces a subset of JavaScript as asm.js or WebAssembly.   
  [git repo](https://github.com/kripken/emscripten.git)
- [Clang][clng]
  The goal of the Clang project is to create a new C based language front-end: C, C++, Objective C/C++, OpenCL C and others for the LLVM compiler.
- [LLVM][llvm]
  Collection of modular and reusable compiler and toolchain technologies.
- [binaryen](https://github.com/WebAssembly/binaryen)
  Binaryen is a compiler and toolchain infrastructure library for WebAssembly, written in C++. It aims to make compiling to WebAssembly easy, fast, and effective.
- [awesome-wasm](https://github.com/mbasso/awesome-wasm)
- [wasm weekly](http://wasmweekly.news/)

[wado]: http://webassembly.org/
[asmj]: http://asmjs.org/
[emsc]: http://kripken.github.io/emscripten-site/
[llvm]: http://llvm.org/
[clng]: http://clang.llvm.org/

## crates
- https://github.com/koute/cargo-web
- stdweb, a "standard library for the client-side web".
  https://github.com/koute/stdweb/
- Yew, a framework for client-side web apps.
  https://github.com/DenisKolodin/yew
