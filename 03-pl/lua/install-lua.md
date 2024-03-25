# Installing Lua 5.4.6

https://www.lua.org/manual/5.4/readme.html

* get the lastest release sources
`wget https://www.lua.org/ftp/lua-5.4.6.tar.gz`

* extract the tar.gz archive
`tar zxf lua-5.4.6.tar.gz`

`make linux test`

* make lua repl
`make linux-readline`

* install
`sudo make install`
cd src && mkdir -p 
  /usr/local/bin
  /usr/local/include
  /usr/local/lib
  /usr/local/man/man1
  /usr/local/share/lua/5.4
  /usr/local/lib/lua/5.4
cd src && install -p -m 0755 lua luac /usr/local/bin
cd src && install -p -m 0644 lua.h luaconf.h lualib.h lauxlib.h lua.hpp /usr/local/include
cd src && install -p -m 0644 liblua.a /usr/local/lib
cd doc && install -p -m 0644 lua.1 luac.1 /usr/local/man/man1

* Check
`lua -v`
Lua 5.4.6  Copyright (C) 1994-2023 Lua.org, PUC-Rio

`which lua`
/usr/local/bin/lua


## Install LuaRocks 3.9.2

https://github.com/luarocks/luarocks/wiki/Installation-instructions-for-Unix

* get latest sources
wegt https://luarocks.github.io/luarocks/releases/luarocks-3.9.2.tar.gz

* extract
tar zxf luarocks-3.9.2.tar.gz
cd luarocks-3.9.2/

This will attempt to detect your installation of Lua:
`./configure --with-lua-include=/usr/local/include`
  Configuring LuaRocks version 3.9.2...
  Lua version detected: 5.4
  Lua interpreter found: /usr/local/bin/lua
  lua.h found: /usr/local/include/lua.h
  unzip found in PATH: /usr/bin
  Done configuring.
  LuaRocks will be installed at......: /usr/local
  LuaRocks will install rocks at.....: /usr/local
  LuaRocks configuration directory...: /usr/local/etc/luarocks
  Using Lua from.....................: /usr/local
  Lua include directory..............: /usr/local/include
  * Type `make` and `make install`:
    to install to /usr/local as usual
  * Type `make bootstrap`:
    to install LuaRocks into /usr/local as a rock

so run
`make`

then, as superuser, run
`sudo make install`

### The default settings

The default settings are suitable for installing LuaRocks globally in your system while allowing both system-wide and per-user sets of rocks.

User accounts will be able to install their own rocks in their $HOME directory, and the superuser can install rocks that will be available for everyone.

By default *LuaRocks* will install itself in `/usr/local` (like Lua) and will use `/usr/local/etc/luarocks/config.lua` as a default path for the *configuration file*.

*The default system-wide rocks trees is configured* as `/usr/local/lib/luarocks`, and *per-user rocks install* at `$HOME/.luarocks/rocks/`.

*Command-line scripts provided by rocks* will be installed in `/usr/local/lib/luarocks/bin/` for system or `$HOME/.luarocks/bin/` for user.

The user may then add these directories to their `$PATH` variable.

Lua install dir      = /usr/local
LuaRocks install dir = /usr/local
configuration file   = /usr/local/etc/luarocks/config.lua

system rocks         = /usr/local/lib/luarocks
system scripts       = /usr/local/lib/luarocks/bin/

user rocks           = $HOME/.luarocks/rocks/
user scripts         = $HOME/.luarocks/bin/

PATH=.:$HOME/.luarocks/bin/:/usr/local/lib/luarocks/bin/:$PATH

### Customizing your settings

After installation, a default config file called config.lua will be installed at the directory defined by --sysconfdir. For further configuration of LuaRocks paths, see the Config file format.
