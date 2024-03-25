# Introduction to Electron

**Electron** is a library that brings together web technologies, such as HTML, CSS and JavaScript, to build GUI desktop apps that work on Windows, Linux and Mac OSs.

This is a great progress from writing an application 3 times, once for each OS due to their internal differences. Electron apps have a single source and they can run on any of these OSs (realizing the Java's dream, "write once, run anywhere").

Electron combines **Chromium** (handling web pages) and **Node.js** (handling fs and network) with a set of **custom APIs** that handle native OS functionality (handling dialogs, notifications, font rendering, etc.).

> Electron = Chromium + Node.js + custom APIs

The experience when developing with Electron is like doing web design, but additionally being able to use Node.js functionality. However, unlike traditional web design, you only have to concentrate on one browser, the latest version of Chrome.


## Main and Renderer Processes

https://www.electronjs.org/docs/tutorial/application-architecture#main-and-renderer-processes

The process that runs `package.json`'s `main` script is **the main process**. The script that runs in the main process can display a GUI by creating web pages. Electron apps always have exactly one main process at any time.

Since Electron uses Chromium for displaying web pages, Chromium's multi-process architecture is also used. Each web page in Electron runs in its own process, which is called **the renderer process**.

Normally, browsers run web pages inside a sandboxed environment, which also prevents acccess to a system's native resources. But in Electron, this ban is lifted, allowing programmers to use full power of Node.js APIs in web pages, which also includes making lower-level OS calls.

Differences between main and renderer process:
- The main process creates web pages by creating `BrowserWindow` instances. Each `BrowserWindow` instance runs the web page in its own renderer process. When a `BrowserWindow` instance is destroyed, the corresponding renderer process is also terminated.
- The main process manages all web pages and their corresponding renderer processes. Each renderer process is isolated and only cares about the web page running in it.
- In web pages, calling native GUI related APIs is not allowed because managing native GUI resources in web pages is very dangerous and it is easy to leak resources. If you want to perform GUI operations in a web page, the renderer process of the web page must communicate with the main process to request that the main process perform those operations.

**Communication Between Processes**   
In Electron, we have several ways to communicate between the main process and renderer processes, such as `ipcRenderer` and `ipcMain` modules for sending messages, and the *remote module for RPC style communication*.


## Main Process

The main process, commonly a file named `main.js`, is the entry point to every Electron app. It controls the life of the app, from open to close. It also calls the native elements and creates each new renderer process in the app. The full Node API is built in.

## Renderer Process

The renderer process is a browser window in your app. Unlike the main process, there can be multiple of these and each is independent. They can also be hidden. Usually one is named `index.html`. They're like typical HTML files but in Electron you've got the whole Node API available here, too, unlike any web browser.




## Using Electron APIs

Electron offers a number of APIs that support the development of a desktop application in both the main process and the renderer process. In both processes, you'd access Electron's APIs by requiring its included module:

```js
const electron = require('electron')
```

All Electron APIs are assigned a process type: many of them can only be used from the *main process*, some of them only from a *renderer process*, some from both. The documentation for each individual API will state which process it can be used from.

A window is created using the `BrowserWindow` class; it is only available in the main process.

```js
// this only works in the MAIN process, in RENDERER it evals to "undefined"
const { BrowserWindow } = require('electron')

const win = new BrowserWindow()
```

Using communication means between the two processes, a renderer process can call the main process to perform some tasks. The module `remote` exposes APIs usually only available on the main process.

In order to create a `BrowserWindow` from a renderer process, we'd use the `remote` as a proxy:

```js
// this only works in RENDERER process, in MAIN it evals to "undefined"
const { remote } = require('electron')
const { BrowserWindow } = remote

const win = new BrowserWindow()
```


## Using Node.js APIs

Electron exposes full access to Node.js, both in the main and the renderer process. This has two important implications:

1. All APIs available in Node.js are available in Electron. Calling the following code from an Electron app works:

```js
const fs = require('fs')

const root = fs.readdirSync('/')

// prints all root level files, which is either '/' or 'C:\'
console.log(root)
```

This has important security implications if you ever attempt to load remote content.


2. The ability to use well-maintained and tested npm packages.

For example, to use AWS SDK in your app, install it as a dependency:

```bash
npm install --save aws-sdk
```

Then, in your Electron app, require and use the module as if you were building a Node.js app:

```js
// ready-to-use S3 Client
const S3 = require('aws-sdk/clients/s3')
```

There is one important caveat: **native Node.js modules**, that is, modules that require compilation of native code before they can be used, will need to be recompiled to be used with Electron. The vast majority of Node.js modules are not native - only 400 out of the approx. 650,000 modules on npm are native.
