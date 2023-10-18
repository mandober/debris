# Windows :: Registry

- https://en.wikipedia.org/wiki/Windows_Registry
- https://learn.microsoft.com/en-us/windows/win32/sysinfo/registry
- https://learn.microsoft.com/en-us/windows/win32/shell/app-registration
- https://learn.microsoft.com/en-us/windows/win32/sysinfo/structure-of-the-registry
- https://learn.microsoft.com/en-us/troubleshoot/windows-server/performance/windows-registry-advanced-users

What
A *central hierarchical database*, used in Windows operating systems since Windows 98, which stores things that include critical system and hardware device configuration, application settings, user settings. Third party utilities can opt in to also store their settings in registry (as opposed to deploying a custom solution for maintaining their settings).

Why
In Windows 3.1 


The Windows Registry is a central location for storing configuration settings, as contrasted by the Unix-like solution where the directory `/etc` serves as the main, system-wide, directory for storing the settings as plain text files (although each app can also choose to store its configuration in its own directory).

The Windows Registry is a database backed up by several binary files.

The Windows Registry is where the Windows OS itself, as well as many builtin apps, store their configuration settings. 

The Windows registry is a collection of several databases. There are system-wide registry settings that apply to all users, and each Windows user account also has its own user-specific settings.

On Windows 10, the system-wide registry settings are stored in files under `C:\Windows\System32\Config\`, while each Windows user account has its own `NTUSER.dat` file containing the user-specific keys, located in `%USERPROFILE%` directory (i.e. C:\Windows\Users\USER_NAME). These are binary files that comprise the registry's *hives* and they cannot be edited directly.

When you sign in, Windows loads these files into memory, reifying the registry.

The reified registry is presented as a FS-like hierarchy of folders and files. The forlders are called *keys*, and the files, called *values*, can have several types.

The two of the main registry braches are called `HKEY_CURRENT_USER` and `HKEY_LOCAL_MACHINE`. These are called *hives*.

Microsoft had introduced the registry back in Windows 3.1, but it was initially used only for certain types of software. In that era, Windows software had usually stored the settings in INI files that were scattered across the filesystem. The registry was an attempt to organize that.

Most internal Windows settings can be configured using the *Group Policy editor*, CMDEXE builtins, the `Settings` app, but they only offer a GUI and eventually write the settings to registry. Therefore, all Windows settings can be edited by "hacking" the registry directly.

HKEY_CLASSES_ROOT\*\shellex\
