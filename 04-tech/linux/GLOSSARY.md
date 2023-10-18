# Glossary

Linux Dictionary version 0.16 (2014)
- https://tldp.org/LDP/Linux-Dictionary/html/index.html
- INDEX: https://tldp.org/LDP/Linux-Dictionary/html/c46.html

GNU/Linux Command-Line Tools Summary
- TOC: https://tldp.org/LDP/GNU-Linux-Tools-Summary/html/index.html
- INDEX: https://tldp.org/LDP/GNU-Linux-Tools-Summary/html/doc-index.html

## apropos
Command to show info about words

## w
Command to show who is logged on and what they are doing.

## Landlock
Landlock - unprivileged access control. The goal of Landlock is to enable to restrict ambient rights (e.g. global filesystem access) for a set of processes. Because Landlock is a stackable LSM, it makes possible to create safe security sandboxes as new security layers in addition to the existing system-wide access-controls. This kind of sandbox is expected to help mitigate the security impact of bugs or unexpected/malicious behaviors in user space applications. Landlock empowers any process, including unprivileged ones, to securely restrict themselves.

## systemd
systemd is a suite of basic building blocks for a Linux system. It provides a system and service manager that runs as PID 1 and starts the rest of the system. systemd provides aggressive parallelization capabilities, uses socket and D-Bus activation for starting services, offers on-demand starting of daemons, keeps track of processes using Linux control groups, maintains mount and automount points, and implements an elaborate transactional dependency-based service control logic. systemd supports SysV and LSB init scripts and works as a replacement for sysvinit. Other parts include a logging daemon, utilities to control basic system configuration like the hostname, date, locale, maintain a list of logged-in users and running containers and virtual machines, system accounts, runtime directories and settings, and daemons to manage simple network configuration, network time synchronization, log forwarding, and name resolution.
