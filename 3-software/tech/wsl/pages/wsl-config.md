# WSL configuration
Advanced settings configuration in WSL (03-07-2022)

There are two files for configuring WSL:
- `.wslconfig`
- `wsl.conf`


## .wslconfig

- Windows-side, global config file
- for: WSL 2 only
- location: `%UserProfile%\.wslconfig`
- https://docs.microsoft.com/en-us/windows/wsl/wsl-config#wslconfig
- 
used to configure settings pertaining to the lightweight VM in which the Linux distros run, as well as to offer a one-place configuration for those settings that might be common to multiple distros.

## wsl.conf

- Linux-side, per-distro config file
- for: WSL 1 and WSL 2
- location: `/etc/wsl.conf`
- https://docs.microsoft.com/en-us/windows/wsl/wsl-config#wslconf

The `wsl.conf` is per-distro configuration file (linux path `/etc/wsl.conf`) used to configure settings specific to that particular distro.


WSL 2 runs as a virtual machine (VM), so it uses *virtualization* settings that can be controlled (the amount of memory, the number of processors assigned to the VM, and similar).
