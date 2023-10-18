# globalThis

globalThis proposal is now fully implemented



https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/globalThis


The globalThis property provides a standard way of accessing the global this value (and hence the global object itself) across environments. Unlike similar properties such as window and self, it's guaranteed to work in window and non-window contexts. In this way, you can access the global object in a consistent manner without having to know which environment the code is being run in.To help you remember the name, just remember that in global scope the this value is globalThis.



## globalThis in Node

globalThis.__defineGetter__
globalThis.__defineSetter__
globalThis.__lookupGetter__
globalThis.__lookupSetter__
globalThis.__proto__

globalThis.hasOwnProperty
globalThis.isPrototypeOf
globalThis.propertyIsEnumerable
globalThis.toLocaleString
globalThis.toString
globalThis.valueOf
globalThis.constructor


globalThis._
globalThis._error
globalThis.Array
globalThis.ArrayBuffer
globalThis.assert
globalThis.async_hooks
globalThis.Atomics
globalThis.BigInt
globalThis.BigInt64Array
globalThis.BigUint64Array
globalThis.Boolean
globalThis.buffer
globalThis.Buffer
globalThis.child_process
globalThis.clearImmediate
globalThis.clearInterval
globalThis.clearTimeout
globalThis.cluster
globalThis.console
globalThis.crypto
globalThis.DataView
globalThis.Date
globalThis.decodeURI
globalThis.decodeURIComponent
globalThis.dgram
globalThis.dns
globalThis.domain
globalThis.encodeURI             
globalThis.encodeURIComponent
globalThis.Error                 
globalThis.escape                
globalThis.eval
globalThis.EvalError
globalThis.events                
globalThis.Float32Array          
globalThis.Float64Array
globalThis.fs
globalThis.Function              
globalThis.GLOBAL
globalThis.global                
globalThis.globalThis
globalThis.http                  
globalThis.http2
globalThis.https                 
globalThis.Infinity              
globalThis.inspector
globalThis.Int16Array
globalThis.Int32Array            
globalThis.Int8Array
globalThis.Intl                  
globalThis.isFinite              
globalThis.isNaN
globalThis.JSON
globalThis.Map                   
globalThis.Math
globalThis.module                
globalThis.NaN                   
globalThis.net
globalThis.Number
globalThis.Object                
globalThis.os                    
globalThis.parseFloat
globalThis.parseInt              
globalThis.path
globalThis.perf_hooks            
globalThis.process
globalThis.Promise
globalThis.Proxy                 
globalThis.punycode              
globalThis.querystring
globalThis.queueMicrotask        
globalThis.RangeError
globalThis.readline
globalThis.ReferenceError        
globalThis.Reflect
globalThis.RegExp                
globalThis.repl                  
globalThis.require
globalThis.root                  
globalThis.Set
globalThis.setImmediate
globalThis.setInterval           
globalThis.setTimeout
globalThis.SharedArrayBuffer     
globalThis.stream                
globalThis.String
globalThis.string_decoder
globalThis.Symbol                
globalThis.SyntaxError
globalThis.TextDecoder           
globalThis.TextEncoder
globalThis.tls                   
globalThis.trace_events
globalThis.tty                   
globalThis.TypeError
globalThis.Uint16Array           
globalThis.Uint32Array
globalThis.Uint8Array            
globalThis.Uint8ClampedArray
globalThis.undefined
globalThis.unescape              
globalThis.URIError
globalThis.url
globalThis.URL                   
globalThis.URLSearchParams
globalThis.util                  
globalThis.v8
globalThis.vm                    
globalThis.WeakMap               
globalThis.WeakSet
globalThis.WebAssembly           
globalThis.worker_threads
globalThis.zlib
