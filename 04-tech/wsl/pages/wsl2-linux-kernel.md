# WSL2 Linux kernel

- Window 10 (version 10.0.19044.1706)
- Window Subsystem for Linux version 2 (WSL2)
- Ubuntu Focal 20.04
- Microsoft's custom Linux kernel for WSL2: version 5.10.102.1
- `uname -a`: Linux drivan `5.10.102.1-microsoft-standard-WSL2` #1 SMP Wed Mar 2 00:30:59 UTC 2022 x86_64 x86_64 x86_64 GNU/Linux


## Custom WSL2 kernel update

```shell
# Manual check (and upgrade) of the custom MS kernel
$ wsl --update
Checking for updates...
No updates are available.
Kernel version: 5.10.102.1
```
