

Documentation
  Reference manual
    Built-in Predicates
      Declaring predicate properties
        dynamic/1
        dynamic/2
        compile_predicates/1
        multifile/1
        discontiguous/1
        public/1
        non_terminal/1

Set the ISO flag.
This defines that the predicate cannot be redefined inside a module.

* `discontiguous` :PredicateIndicator, ...
Availability:built-in
Informs the system that the clauses of the specified predicates might not be together in the source file. See also `style_check/1`.
src: https://www.swi-prolog.org/pldoc/doc/_SWI_/boot/init.pl?show=src#discontiguous/1
