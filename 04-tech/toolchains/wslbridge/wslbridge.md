# wslbridge

- link: https://github.com/rprichard/wslbridge
- desc: Bridge from Cygwin to WSL pty/pipe I/O (intended for WSL 1)
- latest version: wslbridge 0.2.4 (Aug 15, 2017)
- Win side file: `wslbridge.exe`
- WSL side file: `wslbridge-backend`


* Issues

Mounting Windows drives to non-default location in wsl.conf stops wslbridge from starting
https://github.com/rprichard/wslbridge/issues/22


## wslbridge - readme

# wslbridge

wslbridge is a Cygwin program that allows connecting to the WSL command-line
environment over TCP sockets, as with ssh, but without the overhead of
configuring an SSH server.

## Building wslbridge

You'll need a Cygwin (32 or 64 bit) environment, as well as a WSL environment
(or any other Linux environment).  Make sure you have the g++ and make packages
installed.

In Cygwin:

    $ cd frontend
    make

In WSL/Linux:

    $ cd backend
    make

The Cygwin frontend program is written to `out/wslbridge.exe`.  The ELF64
backend program is written to `out/wslbridge-backend`.  The files can be copied
somewhere more convenient, but they need to be on a letter drive (e.g. not a
`\\server\share\...` UNC path).  They also need to be on an NTFS volume.  The
frontend looks for the backend in its own directory.

## Usage

Usage is similar to that of `ssh`.  Run `wslbridge` with no arguments to start
a bash session in a WSL pty.  Append a command-line to run that command in WSL
without a pty (i.e. using 3 pipes for stdio).

`wslbridge` runs its WSL command with either a pty or using pipes.  Pass `-t`
to enable pty mode or `-T` to enable pipe mode.  Pass `-t -t` to force pty mode
even if stdin is not a terminal.

Pass `-eVAR=VAL` to set an environment variable within WSL.  Pass just `-eVAR`
to copy the value from the Cygwin environment.

## wsltty (mintty/wslbridge package)

The mintty project provides [wsltty](https://github.com/mintty/wsltty), a
standalone WSL terminal package containing mintty, wslbridge, and part of
Cygwin (e.g. the runtime library).


## wslbridge - release notes

### Version 0.2.5

* Version 0.2.5 is the upcoming version, not yet released

* When available, use `wslpath` to find the WSL path to `wslbridge-backend` rather than assume it is available on a `/mnt/<drv>` mount. Fixes a problem with custom mounts in `/etc/wsl.conf`.

[#22](https://github.com/rprichard/wslbridge/issues/22)

* By default, start the user's configured shell rather than assume it is `/bin/bash`, and invoke it in login mode (i.e. prefix `argv[0]` with a dash).

Add `-l` (and `--no-login`) options to allow overriding the default login shell.

`wslbridge -l zsh` and `wslbridge -t zsh -l` will both create a login shell with a pty, but the first command does so using `-zsh argv[0]`

[#18](https://github.com/rprichard/wslbridge/issues/18)

* Added a `--backend` option to specify a custom path to `wslbridge-backend`.

[#23](https://github.com/rprichard/wslbridge/issues/23)


# Version 0.2.4 (2017-08-14)

Changes since 0.2.3

 * Added a --distro-guid option that allows selecting which WSL Linux
   distribution to use.

# Version 0.2.3 (2017-06-30)

Changes since 0.2.2

 * Binaries are linked with -static-libgcc and -static-libstdc++.

 * Build the binaries with an Ubuntu 14.04 WSL installation.  The binaries
   for 0.2.2 were built with Ubuntu 16.04, and do not work on 14.04.

# Version 0.2.2 (2017-06-23)

Changes since 0.2.1

 * Fix a race condition affecting spawn failure.

 * Capture and report errors from the Microsoft Bash Launcher (bash.exe).
   In particular, don't hang if the user tries to simultaneously run elevated
   and non-elevated WSL instances.
   [#13](https://github.com/rprichard/wslbridge/issues/13)

# Version 0.2.1 (2016-11-14)

Changes since 0.2.0

 * The frontend now synchronizes the Cygwin environment with the Win32
   environment before creating the WSL backend process.
   https://github.com/mintty/wsltty/issues/14

# Version 0.2.0 (2016-09-28)

Changes since 0.1.0:

 * Added a `-C` option that changes the working directory before running the
   command.  The argument is a WSL path.  A `~` component at the start of the
   argument is replaced with the user's home directory.  (i.e. `$HOME`).
   [#2](https://github.com/rprichard/wslbridge/issues/2)

 * The frontend now canonicalizes its path to the `wslbridge-backend` binary.
   [#4](https://github.com/rprichard/wslbridge/issues/4)

# Version 0.1.0 (2016-08-17)

Initial release
