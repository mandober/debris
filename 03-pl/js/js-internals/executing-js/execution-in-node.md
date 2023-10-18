# Execution in node

## NodeJS Event Loop Overview

While JS engine in browsers relies on WebAPIs to for executing task in the auxillary threads, Node is code in C++ and uses libuv (on Linux) for the implementation of event loop.

NodeJS is single-threaded but the underlying C++ APIs replace the role of WebAPIs available to browser-hosted JS.

operates on a platform written by C++. ​​​​​​​This platform uses multi-thread to carry out tasks at the same time.
