# Docker Desktop for Windows

Docker for Windows
- uses SMB to mount Windows file system inside the Linux VM, which comes with a 50% tax on the file system performance


SMB2.1/3.02 support in Boot2Docker (Nov 26, 2018)
https://blog.docksal.io/smb2-1-support-in-boot2docker-b14e1b8e6e79

In October 2017, Microsoft made a decision to have SMB 1.0 support disabled with Windows 10 Fall Creators Update 1709. This change makes boot2docker not usable on Windows 10 with SMB mounted volumes out of the box. The only workaround is to manually enable SMB 1.0/CIFS Server package in Windows Features and reboot the host.

Enable "SMB 1.0/CIFS Server” package in Windows Features

Docker for Mac/Windows is using a different Linux distro under the hood called Moby Linux. Moby is based on Alpine Linux and has not been open sourced by the Docker team.


Checking mounts in Docker for Windows we can see that it uses the 3.02 SMB dialect

Update: boot2docker v18.09.0 switched to a new Tiny Core/Linux kernel version which enabled SMB3 support. Windows shares can now be mounted in boot2docker using any SMB protocol version: 1.0, 2.1, 3.0, 3.02.

With the recently released Docksal v1.11.0, we’ve switched to using docker/boot2docker v18.06.0-ce and can finally drop the dependency on the deprecated SMB1.0 protocol on Windows.


## Boot2Docker
https://github.com/boot2docker/boot2docker
Boot2Docker is a lightweight Linux distribution made specifically to run Docker containers. It runs completely from RAM, is a ~45MB download and boots quickly.
