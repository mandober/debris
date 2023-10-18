# All predicates

- Documentation
  - Reference manual
    - Built-in Predicates
      - Term reading and writing

## Built-in Predicates
https://www.swi-prolog.org/pldoc/man?section=builtin

- Notation of Predicate Descriptions
- Character representation
- Loading Prolog source files
- Editor Interface
- Verify Type of a Term
- Comparison and Unification of Terms
- Control Predicates
- Meta-Call Predicates
- Delimited continuations
- Exception handling
- Printing messages
- Handling signals
- DCG Grammar rules
- Database
- Declaring predicate properties
- Examining the program
- Input and output
- Status of streams
- Primitive character I/O
+ Term reading and writing
- Analysing and Constructing Terms
- Analysing and Constructing Atoms
- Localization (locale) support
- Character properties
- Operators
- Character Conversion
- Arithmetic
- Misc arithmetic support predicates
- Built-in list operations
- Finding all Solutions to a Goal
- Forall
- Formatted Write
- Global variables
- Terminal Control
- Operating System Interaction
- File System Interaction
- User Top-level Manipulation
- Creating a Protocol of the User Interaction
- Debugging and Tracing Programs
- Debugging and declaring determinism
- Obtaining Runtime Statistics
- Execution profiling
- Memory Management
- Windows DDE interface
- Miscellaneous

## Term reading and writing




## display/1

https://www.swi-prolog.org/pldoc/doc_for?object=edinburgh%3Adisplay/1

Write a term, ignoring operators and special syntax constructs such as brace terms `{a}` and lists [a,b,c]. Currently does print dicts using the dict notation.

See also:
- `write_canonical/2`. SWI-Prolog's `write_canonical/2`, however, prints lists using list notation to reduce incompatibility due to the modified list functor ('[|]' rather than `.`) and reduce memory usage while parsing lists.
