# Fiddle

Fiddle allows you to build little experiments and mini-apps with Electron.

Each Fiddle has at least these files:
* main script
* renderer script
* preload script
* HTML index file

If you `require()` a module, Fiddle will automatically install it.
Fiddle also provides autocomplete info for the `electron` module. 


## Main JS script

Every Electron app starts with a main script, very similar to how a Node.js application is started. The main script runs in the "main process". To display a user interface, the main process creates renderer processes – usually in the form of windows, which Electron calls  BrowserWindow.

To get started, pretend that the main process is just like a Node.js process. All APIs and features found in Electron are accessible through the electron module, which can be required like any other Node.js module.

The default fiddle creates a new BrowserWindow and loads an HTML file.

## Main HTML file
In the default fiddle, `index.html` file is loaded in the `BrowserWindow`. 
Any HTML, CSS or JavaScript that works in a browser will also work therein. 
Electron allows executing Node.js code; you can `require()` modules as in Node.


## Renderer JS script

This script is required from the main HTML file. You can do anything that works in Node.js *and* anything that works in a browser.

To use a npm module just `require` it and Fiddle will detect that you've requested a module and install it as soon as you run your fiddle.
