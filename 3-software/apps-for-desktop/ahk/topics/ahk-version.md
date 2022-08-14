# Versions

Currently, there are plenty of AutoHotkey forks and versions - here are some pros and cons.

## AutoHotkey classic

AutoHotkey classic (basic, vanilla) is the original AutoHotkey version, coded by Chris Mallett. Unmaintained. No bug fixes, no Unicode, no 64-bit support, no new features (Arrays, COM).

## AutoHotkey_L

This fork is based on the original AutoHotkey code, and it is developed by Lexikos (Steve Gray). Actively maintained. AutoHotkey_L has new features like Arrays, Objects, classes, native COM, but also features useful for hotkey scripters, and 64bit support.

AutoHotkey_L is offered in an ANSI and an Unicode version. This describes a different script encoding. You may not know a lot about it, but Unicode often makes dealing with advanced topics (Windows API), but also hotkeys with special characters (ä, ö, ü, ß, Ø, Њ, ڵ, …) easier. On the other side, some old scripts from the forum might have minor issues.

IronAHK
This fork is a complete rewrite of AutoHotkey classic in C# (by polyethene and other contributors), which will enable cross-platform AutoHotkey. You'll be able to compile scripts into regular .NET assemblies, plus it will offer new features such as Arrays / Objects and Unicode. It will require (of course) the .NET framework or Mono to be installed.

Why the future tense here? Well, IronAHK (or IA) is not yet finished, it's in alpha stage. And unfortunately, development seems to be paused here, too. Many things don't work yet, others produce errors.

Although it is a very interesting project, currently it is not recommended to install it (as a beginner).

AutoHotkey v2
AutoHotkey v2 is based on Chris' plans for AutoHotkey's future + AutoHotkey_L code. It is developed by Lexikos, too. It cleans up syntax, and introduces many script-breaking changes. You can already use it, although it may have some bugs. But you might have to change your scripts for every new version, and you cannot use a lot of forum scripts. AutoHotkey v2 is Unicode-only.

It is not (yet) recommended to install this version.

AutoHotkey_H
AutoHotkey_H is a custom build of AutoHotkey_L, maintained by HotKeyIt.

It allows multithreading within AutoHotkey, and can be used to run dynamic AHK code, use wildcards in #Includes or dynamic #Includes, or exit all threads.

There's also a version based on AutoHotkey v2 available.

You can use this version if you need its advanced features. Otherwise you should use AutoHotkey_L.

AutoHotkey.dll
AutoHotkey.dll is a DLL version included with AutoHotkey_H. It can be used to run AutoHotkey_H code from within other scripting or programming languages. There is a COM interface, so it can easily be used from AutoHotkey_L, AutoHotkey_H, AutoHotkey v2, VBScript, Javascript, etc.

Legacy versions
AutoHotkeyU
AutoHotkeyU was a Unicode version of AutoHotkey_L rev. 41 by jackieku. This has been merged into AutoHotkey_L.

It is no longer recommended to install this version.

AutoHotkey64
AutoHotkey64 was a 64bit version of AutoHotkey_L by fincs. This has been merged into AutoHotkey_L.

It is no longer recommended to install this version. AutoHotkey_L has 64bit support.

multiple versions aside
…

Conclusion
Now you'll have to choose your version. Personally, I recommend AutoHotkey_L Unicode, and I'm not the only one to do so, but it's your choice.

The examples in this book will contain code for all versions of AutoHotkey, except for features that aren't supported by some version. The AutoHotkey version will be in a comment in the first line of each example.

A version information like AutoHotkey_L or later or AutoHotkey_L or similarly newer versions indicates a feature is supported in AutoHotkey_L as well as in AutoHotkey_H, AutoHotkey v2 and AutoHotkey_H v2, as those versions derive from AutoHotkey_L.

version overview
A small diagram to illustrate AutoHotkey's version development (click to view in full size): diagram
