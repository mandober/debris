# JS :: Internals :: Executing JS

* Elements/Players/Components
  - JS hosting environment
  - JS engine
  - Web APIs
  - Event loop
  * Message queues
    - macro task queue
    - microtask queue
    - animation queue (rAF)
  * Page actions/calculations
    - S style calculation
    - L layering calculations
    - P paint calculation
- thread of execution (main thread)
- auxillary threads WebAPIs or Node/Deno background threads
- execution context, memory and var env
- function context
- call stack




- JS engine
  - interprets JS
  - communitates with Web APIs
  - executed in the main thread
- Web APIs
  - executed in other threads
  - worker threads
- JS hosting environment (browser, Node, Deno, dbs, apps, etc.)
  - hosting environment host JS engine and (Web) APIs
  - Event loop
    - in browser
    - in Node, Deno

- fetch
- The main thread
- rendering
- DOM lives here
- JS execution
- Browsers vs Node vs Deno
  - WebAPIs vs C++ runtime vs Rust runtime



WebAssembly

Shared components used by Firefox and other Mozilla software, including handling of Web content; Gecko, HTML, CSS, layout, DOM, scripts, images, networking, etc. Issues with web page layout probably go here, while Firefox user interface issues belong in the Firefox product.

## rhino
https://www-archive.mozilla.org/rhino/overview
Rhino 1.5 implements JavaScript 1.5, which conforms to Edition 3 of the Standard.

Rhino 1.6 also implements ECMA-357 ECMAScript for XML (E4X). See the specification for more information on the standard, and Rhino version 1.6R1 for details on the implementation in Rhino.
Several language features introduced in JavaScript 1.2 are now deprecated.

### JavaScript Language Versions


JavaScript 1.0
JavaScript 1.1
JavaScript 1.2
JavaScript 1.3
JavaScript 1.4
JavaScript 1.5 (ES3 conformation)
JavaScript 1.6
JavaScript 2.0 (ES4 mentioned)

(Version 1.3 and greater are ECMA conformant)


-version versionNumber
Specifies the language version to compile with. The string versionNumber must be one of 100, 110, 120, 130, 140, 150, or 160. See JavaScript Language Versions for more information on language versions.


Some behavior in the JavaScript engine is dependent on the language version. In browser embeddings, this language version is selected using the LANGUAGE attribute of the SCRIPT tag with values such as "JavaScript1.2".

Version 1.3 and greater are ECMA conformant

Operators == and !=
Version 1.2 only uses strict equality for the == and != operators. In version 1.3 and greater, == and != have the same meanings as ECMA. The operators === and !== use strict equality in all versions.

ToBoolean
Boolean(new Boolean(false)) is false for all versions before 1.3. It is true (and thus ECMA conformant) for version 1.3 and greater.

Array.prototype.toString and Object.prototype.toString
Version 1.2 only returns array or object literal notation ("[1,2,3]" or "{a:1, b:2}" for example). In version 1.3 and greater these functions are ECMA conformant.

Array constructor
Array(i) for a number argument i constructs an array with a single element equal to i for version 1.2 only. Otherwise the ECMA conformant version is used (an array is constructed with no elements but with length property equal to i).

String.prototype.substring
For version 1.2 only, the two arguments are not swapped if the first argument is less than the second one. All other versions are ECMA compliant.

String.prototype.split
For version 1.2 only, split performs the Perl4 special case when given a single space character as an argument (skips leading whitespace, and splits on whitespace). All other versions split on the space character proper as specified by ECMA.
