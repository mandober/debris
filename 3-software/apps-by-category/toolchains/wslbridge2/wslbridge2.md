## wslbridge2

https://github.com/Biswa96/wslbridge2

Explores various ways to connect WSL with Windows terminal emulators.

* Issues
Combine wslbridge2 and hvpty
https://github.com/Biswa96/wslbridge2/issues/11

## USAGE

wslbridge2 v0.8 : Runs a program within a Windows Subsystem for Linux (WSL) pty.
Copyright (C) 2019-2021 Biswapriyo Nath.
Licensed under GNU General Public License version 3 or later.

### Usage:

    wslbridge2 [options] [--] [command]...

### Options:

-b, --backend BACKEND
Overrides the default path of wslbridge2-backend to BACKEND.

-d, --distribution DISTRO
Run the specified distribution.

-e VAR
Copies VAR into the WSL environment.

-e VAR=VAL
Sets VAR to VAL in the WSL environment.

-h, --help
Show this usage information.

-l, --login
Start a login shell.

-s, --show
Shows hidden backend window and debug output.

-u, --user USERNAME
Run as the specified user.

-w, --windir DIR
Changes the working directory to Windows style path.

-W, --wsldir DIR
Changes the working directory to Unix style path.

-x, --xmod
Enables X11 forwarding (unimplemented).



## README for wslbridge2

Requirements:
- Windows 10 version 1809 build 17763 (aka October 2018 Update)
- A POSIX-compatible environment, cygwin or msys2
- A terminal emulator, mintty or ConEmu
- For compiling: gcc, make, linux-headers

### Compile
Clone this git repository. Run `make` in cygwin (or msys2) and WSL to make all. To build individual programs, go to `src` folder and run `make` command with the corresponding Makefile. By default the `make` command will create dynamically linked executables. For statically liked binaries, use `make RELEASE=1` command. All binaries will be placed in `bin` folder.

### Usage
Download the released stable binaries, or to test nightly builds, download the `wslbridge2.zip` from Appveyor project link:
https://ci.appveyor.com/api/projects/Biswa96/wslbridge2/artifacts/wslbridge2.zip?branch=master&job=Image%3A%20Visual%20Studio%202019

---

Here are some info about the directories of this project.

* samples: sample C code using Hyper-V sockets

Pick up any one of 1. `win_client` & `wsl_server` 2. `win_server` & `wsl_client`.
Run `wsl.exe` first. Paste the VM ID from the last argument of `wslhost.exe`
process's command line. Compile the `win_` part in cygwin or msys2 and
the `wsl_` part in WSL. Run the server part first. It will wait for the client.

* wslbridge2: connect with WSL using network sockets

Place `wslbridge2.exe` and `wslbridge2-backend` in same Windows folder.
Run `wslbridge2.exe`. This requires cygwin or msys2 environment.

### Options

Running `wslbridge2.exe` without any options will open default shell in default WSL distribution.

Here are the list of valid options:
- `-b` or `--backend`       Overrides the default path of backend binaries.
- `-d` or `--distribution`  Run the specified distribution.
- `-e` or `--env`           Copies Windows environment variable into the WSL.
- `-h` or `--help`          Show this usage information.
- `-l` or `--login`         Start a login shell in WSL.
- `-s` or `--show`          Shows hidden backend window and debug output.
- `-u` or `--user`          Run as the specified user in WSL.
- `-w` or `--windir`        Changes the working directory to a Windows path.
- `-W` or `--wsldir`        Changes the working directory to WSL path.
- `-x` or `--xmod`          Enables X11 forwarding.

* Always use single quote or double quote to mention any folder path.
* For paths in WSL, `"~"` can also be used for user's home folder.
* The non-options arguments will be executed as is; e.g. `wslbridge2.exe ls` will execute `ls` in current working directory in default WSL distro.


## Frequently Asked Questions

See the [FAQ page](FAQ.md) for the answers to commonly asked questions.


## Caveats

* The graphics may lag sometimes due to multiple layers of data transitions
between Windows and WSL side programs. Suggestions are welcomed to speed it up.

* There is no documented way to get VM ID of running WSL2 utility VM. See this
[issue](https://github.com/microsoft/WSL/issues/4131). Hence `GetVmId.cpp` will
change in future Windows 10 releases due to usage of undocumented COM methods.


## Further Readings

  - [Make your own integration services][6]
  - [Linux kernel: af_vsock.c][7]
  - [Linux kernel: vm_sockets.h][8]
  - [VMWare: VMCI Socket Programming Guide][9]
  - [man7: vsock(7)][10]
  - [wslbridge][11]
  - [win32-console-docs][12]
  - [XConPty][13]



[2]: https://github.com/Biswa96/wslbridge2.git
[3]: https://github.com/Biswa96/wslbridge2/releases
[4]: https://ci.appveyor.com/project/Biswa96/wslbridge2
[5]: https://ci.appveyor.com/api/projects/Biswa96/wslbridge2/artifacts/wslbridge2.zip?branch=master&job=Image%3A%20Visual%20Studio%202019
[6]: https://docs.microsoft.com/en-us/virtualization/hyper-v-on-windows/user-guide/make-integration-service
[7]: https://github.com/torvalds/linux/blob/master/net/vmw_vsock/af_vsock.c
[8]: https://github.com/torvalds/linux/blob/master/include/uapi/linux/vm_sockets.h
[9]: https://www.vmware.com/support/developer/vmci-sdk/
[10]: http://man7.org/linux/man-pages/man7/vsock.7.html
[11]: https://github.com/rprichard/wslbridge.git
[12]: https://github.com/rprichard/win32-console-docs.git
[13]: https://github.com/Biswa96/XConPty.git
[14]: https://github.com/Biswa96/wslbridge2/graphs/contributors




## Changelog

* v0.8 Latest

- Fix for new Windows 10 Cobalt.
- Make network logic of WSL2 same as WSL1.
- Fix locale issue.
- (Read about how to use in README and some Frequently Asked Questions for further details)
- Here backends are compiled with musl libc statically just to make the binaries small.
- Note: To incorporate this in `wsltty`, open `%LocalAppData%\wsltty\bin` folder then extract all from the zip files as mentioned above.

Assets
- wslbridge2_cygwin_x86_64.zip  1.13 MB
- wslbridge2_msys2_x86_64.zip   1.14 MB
- Source code (zip)
- Source code (tar.gz)


* v0.7
Jan 22, 2021
Improve WSL version detection.
Improve debug window messages.

Assets
- wslbridge2_cygwin_x86_64.zip  1.35 MB
- wslbridge2_msys2_x86_64.zip   1.36 MB
- Source code (zip)
- Source code (tar.gz)

------------------------------------------------------------------------------

## FAQ

<!--
 * This file is part of wslbridge2 project.
 * Licensed under the terms of the GNU General Public License v3 or later.
 * Copyright (C) 2019-2020 Biswapriyo Nath.
 *
 * FAQ.md: questions and answers for developers and enthusiasts
-->

# FAQ

## Terms used:

Some familiarity with the working principle of ssh and telnet will be useful.
See this beautiful scheme on [how SSH works][1] in Unix & Linux Stack Exchange.
Please be familiar with these following terms used in this project.

* frontend - wslbridge2.exe Windows executable PE binary.
* backend - wslbridge2-backend Linux executable ELF binary.
* IP - Internet Protocol.
* AF_INET - Address family which uses IPv4 addresses to communicate.
* AF_VSOCK (Linux) or AF_HYPERV (Windows) - Address family uses vSockets.


## Q&A

Here are the commonly asked questions and some tips & tricks.
Thanks to Brian Inglis (@BrianInglis) for asking [these questions][2].

**Q1: How does this work?**

**A1:** The story begins when user runs wslbridge2.exe in Windows.

  - First, it parses the valid options and stores arguments for further use.
  - Then it finds the backend and wsl.exe path and stitches them into a valid
command line string. The command line containing wsl.exe is used to create
the backend process which is generally hidden (use `-x` option to show).
  - Now both frontend and backend create sockets to connect with each other.
The socket domain is AF_INET in WSL1 and AF_VSOCK in WSL2.
  - Three network sockets from each side connects and tunnels the I/O buffers.
  - In WSL side, the backend creates a pseudo tty where master side connects
to the frontend and slave side execs the child process or default shell.
  - Remember, wslbridge2 does not know or care what buffer is passed through
the sockets. The responsibility goes to the terminal emulator or command line
program in Windows side which can understand the buffer.

------

**Q2: WSL1 vs WSL2 -- what does wslbridge2 do differently?**

**A2:** Only the socket creation is different, the rest is as above.

  - In case of WSL1: The frontend creates three sockets, binds and listens for
the connection. The backend process gets the port numbers from command line.
Backend creates three sockets using those ports and the connections are
accepted in frontend. tl;dr, three sockets, three ports.

  - In case of WSL2: First frontend creates a server socket and listens for
connection. After the backend connection is accepted, the backend sends the
random port number to frontend and listens for connection. Now the frontend
creates three sockets using that port number and backend accepts those.
tl;dr, three sockets, one port.

------

**Q3: wslbridge vs wslbridge2 -- any difference?**

**A3:** The underlying concept is same for both. Only socket creation procedure
and buffer handling are different.

------

**Q4: How to get Windows IP address in WSL2 quickly?**

**A4:** Run `wslbridge2.exe` command as usual. IPv4 address of Windows 10 side
is set to `WSL_HOST_IP` and of WSL2 side is set to `WSL_GUEST_IP` environment
variable. e.g. for GUI programs, use `export DISPLAY=$WSL_HOST_IP:0`.

------

**Q5: What are the error code starting with 0x8?**

**A5:** Generally the [system error codes][3] are translated into error
messages and shown in output. But there are some custom HRESULT values that
are returned from WSL APIs and Lxss COM methods. Here are some of those
HRESULT values and their meanings (copied form wsl.exe output):

  * 0x80040302 - There is no distribution with the supplied name.
  * 0x80040304 - The Legacy distribution does not support WSL2.
  * 0x80040308 - User not found.


<!-- Links -->

[1]: https://unix.stackexchange.com/a/158604/336403/
[2]: https://github.com/mintty/mintty/issues/921
[3]: https://docs.microsoft.com/en-us/windows/win32/debug/system-error-codes
