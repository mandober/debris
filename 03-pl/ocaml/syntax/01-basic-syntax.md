# OCaml :: Syntax :: Basics

Primitive types:
- bool
- int
- char
- string


Strangely, there is no `string_of_char`, but the library function `String.make` can be used to accomplish the same goal.

* Conversion to string

Likewise, for the same three primitive types, there are built-in functions to convert from a string if possible:
- bool_of_string
- int_of_string
- float_of_string


There is no `char_of_string`, but the individual characters of a string can be accessed by a 0-based index.

The indexing operator is written with a dot and square brackets:

Zero-based indexing of strings: 
`"string".[0]` is 's' : char










```ml
let x : int = 3110
let y : int = match (42 : int) with | 0 -> 3 | _ -> 51

let inc x = x + 1

let _ = print_endline "Hello world!"

let fmul = 3.14 *. 2.
let s = "abc" ^ "def"
let si = string_of_int 42
let sb = string_of_bool true
let sf = string_of_float fmul



let c1 = String.make 1 'z'
let c2 = "abc".[0]

(* There are two equality operators in OCaml, = and ==
with corresponding inequality operators <> and !=

Operator = (and <>) examines structural equality
Operator == (and !=) examines physical equality
*)
let _ = if 3 + 5 > 2 then "yay!" else "boo!"

(* Another way to understand let definitions at the toplevel is that they are like let expression where we just haven't provided the body expression yet. Implicitly, that body expression is whatever else we type in the future.

Syntax:

  let x = e1 in e2

As usual, x is an identifier. These identifiers must begin with lower-case, not upper, and idiomatically are written with snake_case not camelCase. We call e1 the binding expression, because it's what's being bound to x; and we call e2 the body expression, because that's the body of code in which the binding will be in scope.

Dynamic semantics

  To evaluate let x = e1 in e2:

    Evaluate e1 to a value v1.
    Substitute v1 for x in e2, yielding a new expression e2'.
    Evaluate e2' to a value v2.
    The result of evaluating the let expression is v2.

  Here's an example:

        let x = 1 + 4 in x * 3
    -->   (evaluate e1 to a value v1)
        let x = 5 in x * 3
    -->   (substitute v1 for x in e2, yielding e2')
        5 * 3
    -->   (evaluate e2' to v2)
        15
          (result of evaluation is v2)

Static semantics

  If e1 : t1 and if under the assumption that x : t1
  it holds that e2 : t2, then (let x = e1 in e2) : t2

let x = 42
  has an expression in it (42) but is not itself an expression. Rather, it is a definition. Definitions bind values to names

*)

(** [fact n] is [n]! *)
let rec fact n = if n <= 0 then 1 else n * fact (n - 1)

(* OCaml integers are 63 bits. Why 31 or 63 instead of 32 or 64? The OCaml garbage collector needs to distinguish between integers and pointers. The runtime representation of these therefore steals one bit to flag whether a word is an integer or a pointer.)
*)

(* 
  Mutually recursive functions can be defined with the and keyword:

  let rec f x1 … xn = e1
  and g y1 … yn = e2

*)

let rec even n = n = 0 || odd (n - 1)
and odd n = n <> 0 && even (n - 1);;

(*
Functions
=========
Static semantics

  The static semantics of function definitions:

  For non-recursive functions:
    if by assuming that
      x1 : t1 and x2 : t2 and … and xn : tn
    we can conclude that
      e : u
    then
      f : t1 -> t2 -> … -> tn -> u

  For recursive functions:
    if by assuming that
      x1 : t1 and x2 : t2 and … and xn : tn and
        f : t1 -> t2 -> … -> tn -> u
      we can conclude that
        e : u
      then
        f : t1 -> t2 -> … -> tn -> u

Note how the type checking rule for recursive functions assumes that the function identifier f has a particular type, then checks to see whether the body of the function is well-typed under that assumption. This is because f is in scope inside the function body itself (just like the arguments are in scope).


Lambdas
=======
  Syntax

    fun x1 ... xn -> e

  Static semantics.

    If by assuming that 
      x1 : t1 and x2 : t2 and … and xn : tn
      we can conclude that e : u
      then fun x1 ... xn -> e : t1 -> t2 -> ... -> tn -> u

  Dynamic semantics.
    An anonymous function is already a value. 
    There is no computation to be performed.

*)

let id = fun x -> x

(*
OCaml supports labeled arguments to functions.
You can declare this kind of function using the following syntax:

  let f ~name1:arg1 ~name2:arg2 = arg1 + arg2;;
  val f : name1:int -> name2:int -> int = <fun>

This function can be called by passing the labeled arguments in either order:

  f ~name2:3 ~name1:4

Labels for arguments are often the same as the variable names for them. OCaml provides a shorthand for this case. These are equivalent:

  let f ~name1:name1 ~name2:name2 = name1 + name2
  let f ~name1 ~name2 = name1 + name2

The syntax to write both a labeled argument and an explicit type annotation for it is:

  let f ~name1:(arg1 : int) ~name2:(arg2 : int) = arg1 + arg2


It is also possible to make some ARGUMENTS OPTIONAL.
When called without an optional argument, a default value will be provided. To declare such a function, use the following syntax:

  let f ?name:(arg1=8) arg2 = arg1 + arg2
  val f : ?name:int -> int -> int = <fun>

You can then call a function with or without the argument:

  f ~name:2 7
  - : int = 9
  f 7
  - : int = 15

*)

let f31 ~name1:name1 ~name2:name2 = name1 + name2
let f32 ~name1 ~name2 = name1 + name2
let f33 ~name1:(arg1 : int) ~name2:(arg2 : int) = arg1 + arg2

let opt ?name:(arg1=8) arg2 = arg1 + arg2

(*
We could write (+) or ( + ), but it is best to include them.

Multiplication must be written as ( ⨯ ), because (⨯) would be parsed as beginning a comment.

We can define our own new infix operators, for example:

  let ( ^^ ) x y = max x y

And now 2 ^^ 3 evaluates to 3.

The rules for which punctuation can be used to create infix operators are not necessarily intuitive. Nor is the relative precedence with which such operators will be parsed.

*)
let ( ^& ) x y = max x y

let _ = 3 ^& 6

(** [print_stat name num] prints [name: num]. *)
let print_stat name num =
  print_string name;
  print_string ": ";
  print_float num;
  print_newline ()

let _ = print_stat "mean" 84.39

let print_stat' name num = Printf.printf "%s: %F\n%!" name num

(*  The earliest example of comprehensions seems to be the functional language NPL, which was designed in 1977. *)
let (//) f g x = f (g x)
```
