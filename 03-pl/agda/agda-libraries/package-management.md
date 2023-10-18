# Agda libraries

The main (current user) agda dir is `$HOME/.agda/`. The main agda dir contains 2 files used for library management, `libraries` and `defaults`.

An Agda library (for lack of a better name, since there's no standard package manager for Agda after all, and the term package is not to common for now) is a standalone, complete unit of agda code that provides some functionality. In fact, the agda stdlib is just another library.

To qualify as a "official" library, the exact directory structure is not important as long as there is an important file in the root of the package, named `LIB.agda-lib` where LIB is the actual name of the library/package (e.g. `standard-library.agda-lib`, `cubical.agda-lib`, `agda-prelude.agda-lib`, etc.)

> Every library comes with a `.agda-lib` file in the root directory, intended for use with the library management system.

Most libraries are obtained mostly from github, right off their development repos.



* For info how Agda package system works, see the official documentation:
https://agda.readthedocs.io/en/latest/tools/package-system.html
https://github.com/agda/agda/blob/master/doc/user-manual/tools/package-system.rst


### My setup

  contains 2 files:
  - `$HOME/.agda/defaults`
    Agda libraries which are made available globally, in all projects.
  - `$HOME/.agda/libraries`
    The `libraries` file contains the list (of full paths) of all "registered" libraries Agda knows how to find. A library can be made available to all projects by putting it into the `defaults` file. Each library can be selectively made available to an individual project by having the file in the project root.



```bash
cd $HOME/.agda/
libraries
defaults

cd $HOME/.agda/stdlibs/
agda-prelude/
agda-stdlib-1.7/
agda-stdlib-1.7.1/
cubical/
```


### Example

```bash
cat libraries
/usr/local/lib/agda/standard-library.agda-lib
/Users/mietek/.agda/categories.agda-lib
/Users/mietek/.agda/agda-nplib.agda-lib
/Users/mietek/.agda/agda-parametricity.agda-lib
/Users/mietek/.agda/agda-toolbox.agda-lib

04:29:21 .agda $ cat defaults
standard-library
agda-nplib
agda-parametricity
agda-toolbox

04:29:25 .agda $ cat categories.agda-lib
name: categories
include: /Users/mietek/Documents/Projects/Clones/categories
```
