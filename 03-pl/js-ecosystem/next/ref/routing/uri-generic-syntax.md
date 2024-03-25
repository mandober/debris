# URI generic syntax

https://en.wikipedia.org/wiki/URL#Syntax

Every HTTP URL conforms to the syntax of a generic URI. The URI generic syntax consists of 5 components organized hierarchically in order of decreasing significance from left to right:

```js
URI = scheme ":" ["//" authority] path ["?" query] ["#" fragment]

scheme    := "mailto" | "ldaps" | "sftp" | "tftp" | "ws"  | "ssh" 
           | "gopher" | "query" | "http" | "ldap" | "vnc" | "git"
           | "finger" | "rtmfp" | "fish" | "file" | "pop" | "smb"
           | "telnet" | "rsync" | "data" | "news" | "wss" | "nfs"
           | "chrome" | "https" | "sips" | "snmp" | "svn" | "ftp"
           | "magnet" | "snews" | "nntp" | "imap" | "geo" | "sms"
           | "jabber" | "skype" | "dntp" | "iris" | "dav" | "dns"
           | "webcal" | "xmpp"  | "ed2k" | "doi"  | "mvn" | "irc"
           | "maps"   | "rtmp"  | "sip"  | "ms-settings"
           | "mailserver" | "javascript" | "view-source"
           | "chrome-extension"
           | …
authority := [userinfo "@"] host [":" port]
query     := key "=" value ["&" key "=" value]*
```

A component is undefined if it has an associated delimiter and the delimiter does not appear in the URI; the scheme and path components are always defined. A component is empty if it has no characters; the scheme component is always non-empty.

Examples
- https://en.wikipedia.org/wiki/URL
- https://en.wikipedia.org/wiki/URL#Syntax
- https://en.wikipedia.org/w/index.php?search=url&ns0=1
- https://en.wikipedia.org/wiki/List_of_URI_schemes
- http://localhost:3000
- http://username@localhost:3000
