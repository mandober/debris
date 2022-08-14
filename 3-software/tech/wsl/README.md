# WSL

https://en.wikipedia.org/wiki/Windows_Subsystem_for_Linux

Windows Subsystem for Linux (WSL) is a *compatibility layer* for running Linux binary executables (ELF format executables) natively on Windows (Windows 10, Windows 11, Windows Server 2019.

The first release of WSL, *WSL 1*, provides a Linux-compatible kernel interface developed by Microsoft, containing no Linux kernel code, which can then run the user space of a Linux distribution on top of it (such as Ubuntu, openSUSE, SUSE Linux Enterprise Server, Debian, Kali Linux). Such a user space might contain a GNU Bash shell and command language, with native GNU command-line tools (sed, awk, etc.), programming-language interpreters (Ruby, Python, etc.), and even graphical applications (using an X11 server at the host side).

The architecture was redesigned in *WSL 2*, with a Linux kernel running in a lightweight virtual machine environment.



The initial release, later called WSL 1, in Aug 2016 brought the possibility to run GNU/Linux command line apps on Windows. WSL 1 uses a translation layer to convert Linux system calls into their Windows equivalent. The entire Linux file system was laid out Windows-side and thus accessible like Windows' local files, which often caused problems with permissions and shit. Although the WSL's first incarnation was frequently updated to support ever increasing number of system calls (pretty much everything depends on system calls hence their importance), Microsoft came to realize that Linux and NT kernel are after all significantly different so that there just was any way to efficiently support some of the more complex but crucial system calls (Cygwin project devs could've told them that from the start) needed as the foundation for further Linux subsystem enhancements (GUI support, pass-through devices support, etc.).


(tech corner) Whereas Microsoft's previous projects and the third-party Cygwin had focused on creating their own unique Unix-like environments based on the POSIX standard, WSL aims for native Linux compatibility. Instead of wrapping non-native functionality into Win32 system calls as Cygwin did, WSL's initial design (WSL 1) leveraged the NT kernel executive to serve Linux programs as special, isolated minimal processes, known as *pico processes*, attached to kernel mode *pico providers* as dedicated system call and exception handlers distinct from that of a vanilla NT process, opting to reutilize existing NT implementations wherever possible.


The next step that lead to the better Linux support came in June 2019 with the introduction of Linux subsystem version 2. The WSL 2 used the new (old) solution to support Linux distributions - a virtual machine! Or, as Microsoft calls it: a "lightweight" virtual machine, even though it's just a regular virtual machine accessible and configurable from the Hyper-V's management app (of course, the installed Linux distros appear as Hyper-V images). The attribute "lightweight" could be perhaps justified by the possibility to more easily interop between the two sides (Linux distro and Windows desktop), which made some devs satisfied as they were now able to work in (everyone's favorite) VS Code editor (installed in Windows) to author and compile the code for a programming language (and its accompanying tools) installed inside a WSL distro (even VS Code's extensions knew which side to install themselves in and run).

(I think) WSL 2, in terms of images, isn't the same to a Linux distro one chooses to install, but maybe it was some kind of a "pre-container"; or not. It's perhaps more probable that the custom Microsoft's Linux kernel pertains just to Ubuntu's releases that are explicitly configured to use it (somehow). Also, docker now has support to run from WSL 2; not sure if that means, docker (tm) has its own Linux distro it uses in that case, or maybe uses the the ms's custom kernel and image. Seems that WSL images themselves are now not particularly different than docker or Hyper-V's images. (still confusing).

- Oct 2021 GPU support for WSL 2 introduced in Windows build 20150. In April 2021, Microsoft released a Windows 10 test build that also includes the ability to run Linux graphical user interface (GUI) apps using WSL 2 and CBL-Mariner.
- Apr 2021 GUI support for WSL 2 introduced in Windows build 21364. The Windows Subsystem for Linux GUI (WSLg) was officially released at the Microsoft Build 2021 conference. It is included in Windows 10 Insider build 21364 or later.

The latest enhancement is _WSLg_ that enables running GNU/Linux GUI apps which are installed in a WSL2 distro, but whose window appears as if it is a native Windows app. At the time, only the recent Windows 10 builts (and Windows 11) fully supports gWSL. Here's a new line from June 2021, before Windows 11 was released:

Windows 11 comes with a fresh Display Driver Model that'll facilitate the ability to run graphical Linux apps directly and seamlessly on the Windows desktop via the updated WDDM 3.0 (Windows Display Driver Model). The apps will have access to the GPU (for hardware acceleration) and to other devices (audio).


However, everyone can still run GUI apps (perhaps not with the same level of integration) using a Windows-side X server. 
Confirmed to work with these versions:
- Windows 10 [10.0.19044.1706]
- WSL 2, Ubuntu Focal Fossa
- Linux `5.10.102.1-microsoft-standard-WSL2`
  #1 SMP Wed Mar 2 00:30:59 UTC 2022 x86_64 GNU/Linux
- vcxsrv X server
- configure $DISPLAY in .bashrc




## Links

* Issues found on WSL
https://github.com/Microsoft/WSL
Reporting of issues found within and when using Windows Subsystem for Linux.


## Historical links

* Windows Subsystem for Linux Overview, 04/22/2016
https://docs.microsoft.com/en-us/archive/blogs/wsl/windows-subsystem-for-linux-overview

* WSL System Calls, 06/08/2016
https://docs.microsoft.com/en-us/archive/blogs/wsl/wsl-system-calls

* WSL File System Support, 06/15/2016
https://docs.microsoft.com/en-us/archive/blogs/wsl/wsl-file-system-support

* Pico Process Overview, 05/23/2016
https://docs.microsoft.com/en-us/archive/blogs/wsl/pico-process-overview

* Drawbridge (Established: September 19, 2011)
https://www.microsoft.com/en-us/research/project/drawbridge/
Drawbridge is a research prototype of a new form of virtualization for application sandboxing. Drawbridge combines two core technologies: First, a picoprocess, which is a process-based isolation container with a minimal kernel API surface. Second, a library OS, which is a version of Windows enlightened to run efficiently within a picoprocess.


## Microsoft Links

- Microsoft Docs
  https://docs.microsoft.com

- Microsoft WSL Docs
  https://docs.microsoft.com/en-us/windows/wsl/about

- Troubleshooting issues and solutions
  https://msdn.microsoft.com/en-us/commandline/wsl/troubleshooting

- Release Notes
  https://docs.microsoft.com/en-us/windows/wsl/release-notes

- Command Line Blog (Active)
  https://blogs.msdn.microsoft.com/commandline/

- WSL Blog (Historical)
  https://blogs.msdn.microsoft.com/wsl

## Community Links

- Stack Overflow
  https://stackoverflow.com/questions/tagged/wsl

- Ask Ubuntu
  https://askubuntu.com/questions/tagged/wsl

- reddit
  https://www.reddit.com/r/bashonubuntuonwindows

- List of programs that work and don't work (WSL 1)
  https://github.com/ethanhs/WSL-Programs
  https://github.com/davatron5000/can-i-subsystem-it

- Awesome WSL
  https://github.com/sirredbeard/Awesome-WSL

- Tips and guides for new bash users
  https://github.com/abergs/ubuntuonwindows




https://github.com/Microsoft/WSL#community-links
https://stackoverflow.com/questions/tagged/wsl
https://askubuntu.com/questions/tagged/wsl
https://www.reddit.com/r/bashonubuntuonwindows
https://github.com/ethanhs/WSL-Programs
https://github.com/davatron5000/can-i-subsystem-it
https://github.com/sirredbeard/Awesome-WSL
https://github.com/abergs/ubuntuonwindows
https://github.com/Microsoft/WSL#troubleshooting
