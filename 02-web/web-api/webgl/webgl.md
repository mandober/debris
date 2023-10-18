# WebGL

https://en.wikipedia.org/wiki/WebGL

https://get.webgl.org/
https://www.khronos.org/webgl/

## terms

OpenGL
vulcan
Skia Renderer
WebGL
WebGL2
WDDM
GLES
EGL Driver


Chrome flags
- COLR v1 Fonts - Display COLR v1 color gradient vector fonts.
- Enable CSS Container Queries - Enables support for @container, inline-size and block-size values for the contain property, and the LayoutNG Grid implementation.
- Experimental QUIC protocol - Enable experimental QUIC protocol support
- WebUI tab strip: When enabled makes use of a WebUI-based tab strip
- WebUSB
- Web Bluetooth
- Vulkan: Use vulkan as the graphics backend
- Web Share: Enables the Web Share (navigator.share) APIs on experimentally supported platforms
- WebXR Incubations: Enables experimental features for WebXR
- keyboard.lock() API
- TLS 1.3 Early Data
This option enables TLS 1.3 Early Data, allowing GET requests to be sent during the handshake when resuming a connection to a compatible TLS 1.3 server.
- Auto Dark Mode for Web Contents
Automatically render all web contents using a dark theme.



- Omnibox Bookmark Paths: *Allows inputs to match with bookmark paths*.
e.g. `planets jupiter` can suggest 
a bookmark titled `Jupiter` 
with URL `en.wikipedia.org/wiki/Jupiter` 
located in a path containing `planet`
  - Default
  - Enabled
  - Disabled
  - Enabled Default UI            Title - URL
  - Enabled Replace URL           Title - Path
  - Enabled Append after title    Title : Path - URL
  - Enabled Dynamic Replace URL   Title - Path|URL
  - Enabled Replace title         Path/Title - URL

- Omnibox Site Search Starter Pack: Enables scopes in Omnibox Site Search/Keyword Mode:
  - `@history`
  - `@bookmarks`
  - `@settings`

- History Journeys: Enables the History Journeys UI

- Page content annotations
  Enables page content to be annotated on-device.
  - Default
  - Enabled
  - Enabled All Annotations and Persistence on Content ✔
  - Enabled All Annotations and Persistence on Title
  - Disabled

- Page entities content annotations
Enables annotating the page entities model for each page load on-device
- Page visibility content annotations
Enables annotating the page visibility model for each page load on-device
- Reading List: Click on the Bookmark icon or right click on a tab to add tabs to a reading list.
Side panel drag and drop
Enables drag and drop of bookmarks within the side panel. 
Unified side panel
Revamp the side panel experience
Accessible PDF Forms
Enables accessibility support for PDF forms
- Enable Portals.
Portals are an experimental web platform feature that allows embedding and seamless transitions between pages. See https://github.com/WICG/portals and https://wicg.github.io/portals/
- Web Bundles
Enables experimental supports for Web Bundles (Bundled HTTP Exchanges) navigation
- Page info history
Enable a history section in the page info.




## Chrome quick check

chrome:gpu

* Graphics Feature Status
  Canvas: Hardware accelerated
  Canvas out-of-process rasterization: Disabled
  Direct Rendering Display Compositor: Disabled
  Compositing: Hardware accelerated
  Multiple Raster Threads: Enabled
  OpenGL: Enabled
  Rasterization: Unavailable
  Raw Draw: Disabled
  Skia Renderer: Enabled
  Video Decode: Hardware accelerated
  Video Encode: Hardware accelerated
  Vulkan: Disabled
  WebGL: Hardware accelerated
  WebGL2: Unavailable
