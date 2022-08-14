# Chrome flags

> Chrome version 100.0.4896.127 (Official Build) (64-bit) (2022-04-22)


- COLR v1 Fonts
  Display COLR v1 color gradient vector fonts.

- Enable CSS Container Queries
  Enables support for @container, inline-size and block-size values for the contain property, and the LayoutNG Grid implementation.

- Experimental QUIC protocol
  Enable experimental QUIC protocol support

- WebUI tab strip
  When enabled makes use of a WebUI-based tab strip

- WebUSB

- Web Bluetooth

- Vulkan
  Use vulkan as the graphics backend

- Web Share
  Enables the Web Share (`navigator.share`) APIs

- WebXR Incubations
  Enables experimental features for WebXR

- `keyboard.lock()` API

- TLS 1.3 Early Data
  This option enables TLS 1.3 Early Data, allowing GET requests to be sent during the handshake when resuming a connection to a compatible TLS 1.3 server.

- Auto Dark Mode for Web Contents
  Automatically render all web contents using a dark theme.

- **Omnibox Bookmark Paths**
  Allows inputs to match with bookmark paths.
  e.g. `planets jupiter` can suggest a bookmark titled `Jupiter` with URL `en.wikipedia.org/wiki/Jupiter` located in a path containing `planet`.
    - Default
    - Enabled
    - Disabled
    - Enabled Default UI            Title - URL
    - Enabled Replace URL           Title - Path
    - Enabled Append after title    Title : Path - URL
    - Enabled Dynamic Replace URL   Title - Path|URL
    - Enabled Replace title         Path/Title - URL

- **Omnibox Site Search Starter Pack**
  Enables scopes in *Omnibox Site Search* / *Keyword Mode*
  - `@history`
  - `@bookmarks`
  - `@settings`

- **History Journeys**
  Enables the History Journeys UI

- *Page content annotations*
  Enables page content to be annotated on-device.
  - Default
  - Enabled
  - Enabled All Annotations and Persistence on Content [✔]
  - Enabled All Annotations and Persistence on Title
  - Disabled

- Page entities content annotations
  Enables annotating the page entities model for each page load on-device

- Page visibility content annotations
  Enables annotating the page visibility model for each page load on-device

- Reading List
  Click on the Bookmark icon or rclick on a tab to add tabs to a reading list.

- Side panel drag and drop
  Enables drag and drop of bookmarks within the side panel.

- Unified side panel
  Revamp the side panel experience

- Enable Portals
  Portals are an experimental web platform feature that allows embedding and seamless transitions between pages. See:
  - https://github.com/WICG/portals
  - https://wicg.github.io/portals/

- Web Bundles
  Enables experimental supports for Web Bundles (Bundled HTTP Exchanges) navigation

- Page info history
  Enable a history section in the page info.

- Enable download bubble
  Enables the download bubble instead of the download shelf

- Web MIDI
  Enables the implementation of the Web MIDI API. When disabled the interface will still be exposed by Blink.

- Enable upcoming sharing features.
  This flag enables all upcoming sharing features, in the experiment arms that are most likely to be shipped. This is a meta-flag so which features are upcoming at any given time may change.

- Tab audio muting UI control
  When enabled, the audio indicators in the tab strip double as tab audio mute controls

- Extensions Menu Access Control
  Enables a redesigned extensions menu that allows the user to control extensions site access

- Share context menu
  Whether the sharing options in various context menus are grouped into a common submenu

- Partitioned cookies
  Controls if the Partitioned cookie attribute is enabled

- Fuzzy search for Tab Search
  Enable fuzzy search for Tab Search.

- Show Chrome What's New page at chrome://whats-new
  Enables Chrome What's New page at [chrome://whats-new][chrome://whats-new]

- Show 'New' badge on 'What's New' menu item.
  Enables 'New' promo badge on 'What's New' in the Help portion of the main menu

- Throttle non-visible cross-origin iframes
  When enabled, all cross-origin iframes with zero visibility (either display:none or zero area) will be throttled, regardless of whether they are same-process or cross-process. When disabled, only cross-process iframes will be throttled.

- Sanitizer API
  Enable the Sanitizer API. See:
  https://github.com/WICG/sanitizer-api 

- Chrome Labs
  Access Chrome Labs through the toolbar menu to see featured user-facing experimental features

- Revamped Incognito New Tab Page
  When enabled, Incognito new tab page will have an updated UI

- Enable clear browsing data dialog in Incognito
  When enabled, clear browsing data option would be enabled in Incognito which upon clicking would show a dialog to close all Incognito windows.

- Enable JXL image format
  Adds image decoding support for the JPEG XL image format.

- Commander
  Enable a text interface to browser features. Invoke with `Ctrl-Space`.

- Restructured Language Settings (Desktop)
  Enable the new restructured language settings page

- Detailed Language Settings (Desktop)
  Enable the new detailed language settings page

- Page info history
  Enable a history section in the page info.

- 'About this site' section in page info
  Enable the 'About this site' section in the page info.
