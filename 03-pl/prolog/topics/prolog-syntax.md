# Prolog Syntax

http://lpn.swi-prolog.org/lpnpage.php?pagetype=html&pageid=lpn-htmlse2

Expressions
- facts
- rules
- queries

Expressions are build out of terms.

There are 4 kinds of terms:
- atoms
- numbers
- variables
- complex terms (structures)

Terms:
* simple terms
  - constants
    - atoms
    - numbers
  - variables
* complex terms (structures)

Atoms and numbers are lumped together under the heading *constants*, and constants and variables together make up the *simple terms*.

Available characters (symbols)
- upper-case letters, A … Z
- lower-case letters  a … z
- digits 0 … 9
- the _ symbol
- special characters, including
  - `+` , `-` , `*` , `/`
  - `<` , `>`
  - `=`
  - `:`
  - `.`
  - `&`
  - `~`
  - space

A string is an unbroken sequence of characters.

An atom is either:
* A string of characters (identifier rules).
* An arbitrary sequence of characters enclosed in single quotes. 
  For example `'The Gimp'`, `'Five_Dollar_Shake'`, `'&^%&#@$ &*'`, and `'  '`. Single quotes allow us to use space. 
  The sequence of chars between the single quotes is called the *atom name*.
* A string of special characters. 
  For example: `@=`, `====>`, `;`, `:-` are all atoms. 
  Some of these atoms (such as `;` and `:-`) have a pre-defined meaning.
