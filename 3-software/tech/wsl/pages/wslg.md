# WSLg

WSLg is short for Windows Subsystem for Linux GUI built with the purpose of enabling support for running Linux GUI applications (X11 and Wayland) on Windows in a fully integrated desktop experience.

WSLg was officially released at the Microsoft Build 2021 conference. It is included in Windows 10 Insider build 21364 or later.

However, with the introduction of Windows 11 WSLg is finally shipping with a production build of Windows bringing support for both graphics and audio in WSL apps.

FreeRDP is used to encode all communications going from the RDP Server (in Weston) to the RDP Client (mstsc on Windows) according to the RDP protocol specifications.

Prerequisites for running WSLg include:
- Windows 11 or Windows 10 Insider Preview builds 21362-21390
- A system with virtual GPU (vGPU) enabled for WSL is recommended, as it will allow you to benefit from hardware accelerated OpenGL rendering


https://www.bleepingcomputer.com/news/microsoft/hands-on-with-wslg-running-linux-gui-apps-in-windows-10/

https://www.bleepingcomputer.com/news/microsoft/microsoft-windows-10-insiders-can-now-can-run-linux-gui-apps/


The Windows Subsystem for Linux GUI (WSLg) was officially released at the Microsoft Build 2021 conference and comes with Windows 10 Insider build 21364 or later. WSLg can launch Linux GUI apps by utilizing the *Wayland server* to display the apps in Windows 10.

WSLg starts a companion system distro, containing
- Wayland
- X server
- pulse audio server
- and everything else
needed to make Linux GUI apps communicate with Windows.
(as explained by Windows Developer Platform Program Manager Craig Loewen)
