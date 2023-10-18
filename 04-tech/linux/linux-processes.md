# Processes
https://ttt.bartificer.net/book.html#ttt08

# History

Until recently, computers had a single CPU that could execute only a single task at a time. It had only a single simultaneous thread of execution. In the old days, DOS was more of a thin-wrapper than an OS coz it would hand completely control of the system to the started program. Two programs could not run at the same time.

The concept of concurrency was experinced by many for the first time with Windows 3.1, which used time-slicing to run process in round-robin fashion, still managing to create the impression of multitasking. It used hardware interrupts to wrest control of the CPU from the running process, take a snap-shot of the running state, save it, then load the last saved state of the next process in the queue, and let it run for a bit. If you had 10 processes and a 1 MHz CPU, then each process got about 100,000 CPU cycles to work with per second, enough to give you the impression that all your programs were all running at the same time.

There is literally an entire university semester of material in designing strategies for efficiently dividing up available CPU-time between processes. The OS can associate priorities with processes, and it can use those priorities to give some processes preferential access over others.

Each app has at least one process associated with it, but once an app is running it can fork spawning as many child processes as it needs. For example, a word processing could be running in one process, while using a separate process for doing spell checking simultaneously in the background.

There are two broad classes of processes:
- *system processes*: used by the OS to provide system services
- *user processes*: instigated by users for their tasks

There are many processes that don't have any visual repre (windows) - these hidden processes are called *background processes*.

## Linux processes

Each running process on a Linux computer has an associated Process ID, **PID**, which is just an integer used to identify each process.

The very first process (kernel's), gets the PID 0, and every process that runs after it gets the next free PID. On Linux systems, the process with the PID 1 is usually `init`, which is the process Linux uses to manage system services, so the Kernel starts `init` which then starts all the other system processes.

Each process (except for the kernel), also has a reference to its parent process, as the Parent Process ID, **PPID**.

These two idntifiers make it possible to construct a tree (hierarchy) of processes, with the kernel at the root.

Another reference each process keeps is to a particular User ID, **UID**; in fact, it is said that each process runs as some users (eith the permissions and privileges of that user). So, whether a given file can be accessed by a process is determined by the user attached to it (and the permissions set on the file).

## Process environment

- PID
- PPID
- UID
- cwd
- envars (PATH)
- FDs
- umask
- ulimit


Generaly in Linux, a new process cannot be created from scratch - *the only way to create a new process is by forking an existing process*. Forking an existing process means creating its copy. The parent and the child process are therefore virtually identical apart from their distinct personal PIDs. The child's PPID will be set to the PID of the forked process, i.e. `Child PPID = Parent PID`.

This regularly happens in the shell when the shell needs to execute an external (non-builtin) command: the shell (level 1) spawns a subshell (child process, shell level 2) that actually executes the command. The shell (level 1) remain the controling process that manages the child shell, even forcibly killing it if it misbehaves (infanticide).

Since the child's environment is a copy of the parent's environment, all variables that were alive in the parent will be available to the child - *but strictly as the copies*! If the child process changes the value of some variable, that change won't propagate to the parent to affect that same varaible in the parent's environment (which can be a source of confusion for the beginners). When a shell spawns a subshell, any change made to the childs' environment is gone when the child is terminated (which for subshells is almost instantly).
