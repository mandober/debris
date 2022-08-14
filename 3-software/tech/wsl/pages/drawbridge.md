# Drawbridge

https://www.microsoft.com/en-us/research/project/drawbridge/

Established: September 19, 2011

*Drawbridge* is a research prototype of a new form of virtualization for application sandboxing. Drawbridge combines two core technologies: First, a picoprocess, which is a process-based isolation container with a minimal kernel API surface. Second, a library OS, which is a version of Windows enlightened to run efficiently within a picoprocess.

Hardware-based Virtual Machines (VMs) have fundamentally changed computing in data centers and enabled the cloud. VMs offer three compelling qualities:

Secure Isolation: isolating applications so that an ill-behaved application can't compromise other applications or its host.
Persistent Compatibility: allowing host and application to evolve separately. Changes in the host don't break applications.
Execution Continuity: allowing applications to be freed of ties to a specific host computer. A running application isn't tied to the computer on which it was started, but can be moved from computer to computer across space and time within a single run.
Despite these advantages, VMs have large resource overheads in terms of disk footprint, memory, CPU, and administrative costs.

Drawbridge combines two ideas from the literature, the picoprocess and the library OS, to provide a new form of computing, which retains the benefits of secure isolation, persistent compatibility, and execution continuity, but with drastically lower resource overheads.

While still an experiment, Drawbridge runs many existing Windows applications without modifications ranging from desktop applications like Microsoft Office 2010 and Internet Explorer to server applications like IIS.

## Picoprocess

The Drawbridge picoprocess is a lightweight, secure isolation container. It is built from an OS process address space, but with all traditional OS services removed. The application binary interface (ABI) between code running in the picoprocess and the OS follows the design patterns of hardware VMs; it consists of a closed set of 45 downcalls with fixed semantics that provide a stateless interface. All ABI calls are serviced by the security monitor, which plays a role similar to the hypervisor or VM monitor in traditional hardware VM designs.

While the Drawbridge picoprocess interface follows the design patterns of hardware VM interfaces, it uses a high level of abstraction. The Drawbridge picoprocess interface surfaces threads, private virtual memory, and I/O streams instead of low-level hardware abstractions like CPUs, MMUs, and device registers. These higher-level abstractions allow for much more efficient implementations of OS code hosted within the picoprocess. These higher-level abstractions also allow for much more efficient resource utilization.

## The Library OS

A better sandbox container is a necessary, but not sufficient condition for greater scalability of virtualized applications. The key second ingredient is the library OS. A library OS is an operating system refactored to run as a set of libraries within the context of an application.

While Drawbridge can run many possible library OSes, a key contribution of Drawbridge is a version of Windows that has been enlightened to run within a single Drawbridge picoprocess. The Drawbridge Windows library OS consists of a user-mode NT kernel-informally referred to as NTUM-which runs within the picoprocess. NTUM provides the same NT API as the traditional NT kernel that runs on bare hardware and in hardware VMs, but is much smaller as it uses the higher-level abstractions exposed by the Drawbridge ABI. In addition to NTUM, Drawbridge includes a version of the Win32 subsystem that runs as a user-mode library within the picoprocess.

Upon the base services of NTUM and the user-mode Win32 subsystem, Drawbridge can run many of the DLLs and services from the hardware-based versions of Windows. As a result, the Drawbridge prototype can run large classes of Windows desktop and server applications with no modifications to the applications.
