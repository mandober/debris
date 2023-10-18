# Node :: About :: Introduction

https://en.wikipedia.org/wiki/Node.js

Node
- open-source
- MIT license
- cross-platform (Windows, Linux, macOS)
- [ back-end ] JS { runtime, hosting, server } environment
- that [ runs | embeds ] the [ V8 | Chakra ] JS Engine
- and executes JS code [ on the server | outside web browsers ]
- processes incoming requests in an event loop
- relies on the C++ libraries to provide Web API services
- relies on `libuv` to handle asynchronous events
- relies on `nghttp2` for HTTP support
- since v19.5, relies on `simdutf` for fast Unicode validation and transcoding
- since v20 relies on `ada` library that provides up-to-date URL compliance
- initially released in 2009
- latest stable release Node.js LTS v.18.16.1 relesed in 2016
- written mostly in C++, with some Python and JavaScript


Node's dependencies include
- libuv
  - https://libuv.org/
  - https://github.com/libuv/libuv
  - https://en.wikipedia.org/wiki/Libuv
  - An Introduction to libuv
    https://nikhilm.github.io/uvbook/
  - libuv API documentation
    http://docs.libuv.org/
  - libuv design overview
    http://docs.libuv.org/en/latest/design.html
- nghttp2
  - https://www.nghttp2.org/
  - https://github.com/nghttp2/nghttp2
  - https://en.wikipedia.org/wiki/Nghttp2
  - https://nghttp2.org/documentation/
- ada
  - https://www.ada-url.com/
  - https://github.com/ada-url/ada
- simdutf
  - https://github.com/simdutf/simdutf



* Reactor design pattern
https://en.wikipedia.org/wiki/Reactor_pattern
https://en.wikipedia.org/wiki/Event_(computing)
https://en.wikipedia.org/wiki/Event_loop
https://en.wikipedia.org/wiki/Input/output_completion_port
https://en.wikipedia.org/wiki/Select_(Unix)/dev/poll
https://en.wikipedia.org/wiki/Epoll
https://en.wikipedia.org/wiki/Kqueue
https://en.wikipedia.org/wiki/Proactor_pattern
https://en.wikipedia.org/wiki/Application_server
https://en.wikipedia.org/wiki/C10k_problem
https://en.wikipedia.org/wiki/Asynchronous_method_invocation



Node.js lets developers use JS for server-side scripting. Consequently, Node.js represents a "JS everywhere" paradigm, unifying web development around a single programming language, as opposed to using different languages for the server-side vs client-side programming.

>Node.js has taken JS outside of the browser and made it into a proper, general purpose, programming language.

Node.js has
- an event-driven architecture
- capable of asynchronous I/O

These design choices aim to optimize throughput and scalability in web apps with many input/output operations, as well as for real-time Web apps (e.g. real-time communication programs and browser games).
