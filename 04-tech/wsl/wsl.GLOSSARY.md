# WSL : GLOSSARY

## Container
## Orchestration
## Component Library
## Assemblies
## Moby Tools
## Image Management
## Secret Management
## Configuration Management
## Networking
## Provisioning
## Paravirtualization
## Virtualization
## Nested virtualization
## Virtual network
## Virtual bridge

## CBL-Mariner
CBL-Mariner (CBL stands for Common Base Linux) is an open-source Linux distribution developed by Microsoft. It is the base container OS for Microsoft Azure services and the graphical component of WSL 2.

## Default distro
Since it is possible to have multiple Lunux distros installed (even some running in WSL 1 and some in WSL 2), there are situations that require appointing the default distro, at least so that commands (e.g. issued by `wsl.exe`) know which distro you're referring to.

## gWSL
The further advancement of WSL 2 technology that offers running GNU GUI app inside a Linux distro, but with its GUI displayed and integrated with the Windows desktop (as if running a native Win32 app).

## Kubernetes
Kubernetes is a toll for managing a swarm of (Docker) containers.

## .wslconfig
The `.wslconfig` is a Windows-side file (win path `%UserProfile%\.wslconfig`) used to configure settings pertaining to the lightweight VM in which the Linux distros run, as well as to offer a one-place configuration for those settings that might be common to multiple distros.

## WSL 1
The original Windows Subsystem for Linux, now known as WSL 1, that uses a translation layer to convert Linux system calls into their Windows system approximations.

## WSL 2
The successor of the original Windows Subsystem for Linux, known as WSL 2, that uses a virtual machine and thus offers support for more (but still not all) Linux services and system calls.

## wsl.conf
The `wsl.conf` is per-distro configuration file (linux path `/etc/wsl.conf`) used to configure settings specific to that particular distro.

## WSL version
Usually refers to the WSL stack, so, either version 1 (for WSL 1) or version 2 (for WSL 2).



------------------------------------------------------------------------------
# WSL : Abbreviations
------------------------------------------------------------------------------

## VM
Virtual Machine

## WSL
Windows Subsystem for Linux
