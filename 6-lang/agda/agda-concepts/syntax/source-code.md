# Agda :: Syntax :: Source code

Agda source code is written in plain text files, UTF-8 encoded (without the BOM) and with the Unix-style line endings (LF). Like in other situations, the names of the source files are recommended to conform to the POSIX portable filename character set, but this is not enforced.

However, Agda does enforce that *the name of the file and the name of the contained module match*. Curiously, module names may begin with a digit followed by alphabetic chars, but the name cannot be all digits. Confirmed example: you cannot name a module "1" but "1-intro" is fine. Save a few exceptions, whatever name you give to a file, just repeat it as the name for the module within it.

Namelt, modules have a "personal" ("first") name which correspond to the name of the file they are located in; but all modules live in a particular namespace which corresponds to the hierarchy of files in the current project.



is written in UTF-8 encoded plain text files with the extension `.agda`.

Most unicode characters can be used in identifiers and whitespace is important, see Names and Layout below.
