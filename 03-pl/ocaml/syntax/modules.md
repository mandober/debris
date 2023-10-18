# Modules

https://cs3110.github.io/textbook/chapters/modules/modules.html

- 5.2. Modules
- 5.2.1. Module Definitions
- 5.2.2. Scope and Open
- 5.2.3. Module Type Definitions
- 5.2.4. Module Type Semantics
- 5.2.5. Module Types are Static
- 5.2.6. First-Class Modules


A structure is a collection of definitions, but unlike records, structures can define new types, exceptions, and more. Since structures are not first-class citizens, you need to bind a structure to a name:

```ml
module MyModule = struct
  let inc x = x + 1
  type primary_color = Red | Green | Blue
  exception Oops
end
(*
module MyModule :
  sig
    val inc : int -> int
    type primary_color = Red | Green | Blue
    exception Oops
  end
*)
```

In the comment is how OCaml responds to this declaration. The output from OCaml has the form: `module MyModule : sig ... end`. This indicates that `MyModule` has been defined, and that it has been inferred to have the *module type* (that appears to the right of the colon after MyModule) which is written as a signature.

The *signature* itself is a collection of specifications. The specifications for variant types and exceptions are their original definitions; the specification for `inc` is written with the `val` keyword, exactly as the utop would respond.

The definitions in a module are more closely related than those in MyModule. Often a module will implement a data structure. For example, here is a module for stacks implemented as linked lists:

```ml
module ListStack = struct
  (** [empty] is the empty stack. *)
  let empty = []

  (** [is_empty s] is whether [s] is empty. *)
  let is_empty = function [] -> true | _ -> false

  (** [push x s] pushes [x] onto the top of [s]. *)
  let push x s = x :: s

  (** [Empty] is raised when an operation cannot be applied
      to an empty stack. *)
  exception Empty

  (** [peek s] is the top element of [s].
      Raises [Empty] if [s] is empty. *)
  let peek = function
    | [] -> raise Empty
    | x :: _ -> x

  (** [pop s] is all but the top element of [s].
      Raises [Empty] if [s] is empty. *)
  let pop = function
    | [] -> raise Empty
    | _ :: s -> s
end

(*
module ListStack :
  sig
    val empty : 'a list
    val is_empty : 'a list -> bool
    val push : 'a -> 'a list -> 'a list
    exception Empty
    val peek : 'a list -> 'a
    val pop : 'a list -> 'a list
  end
*)
```

We can use this module to manipulate a stack:

```ml
ListStack.push 2 (ListStack.push 1 ListStack.empty)
ListStack.(empty |> push 1 |> push 2)

(* One way to avoid repeating the module's qualification *)
ListStack.(push 2 (push 1 empty))
```

>By writing `ModuleName.(e)`, all the names from `ModuleName` become usable in the exp `e` without needing to write the prefix `ModuleName` each time.

## 5.2.1. Module Definitions

The `module` definition keyword is much like the `let` definition keyword, but tht difference is that `let` binds a *value* to a name, whereas `module` binds a *module value* to a name.

The most common syntax for a module definition:

```ml
module ModuleName = struct
  module_items
end
```

where `module_items` inside a structure can include definitions like let, type, and exception defs, as well as nested module definitions.

Module names must begin with an uppercase letter, and idiomatically they use CamelCase rather than Snake_case.

A more accurate syntax for a module definition:

```ml
module ModuleName = module_expression
```

where a `struct` is just one sort of `module_expression`. Another one can be a name of an already defined module. For example, you can write `module L = List` if you'd like a short alias for the `List` module.

### Dynamic semantics

Expressions are evaluated to values, and similarly, a *module expression* is evaluated to a *module value* (or just module for short).

The only interesting kind of module expression we have so far, from the perspective of evaluation anyway, is the structure.

Evaluation of structures: evaluate each definition in it, in the order they occur. Because of that, earlier definitions are therefore in scope in later definitions, but not vice versa.

### Static semantics

A structure is well typed if all the definitions in it are themselves well-typed, according to the typing rules.

## 5.2.2. Scope and Open

After a module `M` has been defined, you can access the names within it using the dot operator, `M.name`.

Outside the module those names are not defined, so we have to first bring the definitions of a module into the current scope using `open M`. Opening a module is like writing a local definition for each name defined in the module in the current scope.

`open String` brings all the definitions from the [String](https://ocaml.org/api/String.html) module into scope, and has an effect similar to the following on the local namespace:

```ml
let length = String.length
let get = String.get
let lowercase_ascii = String.lowercase_ascii
...
```

The special module [Stdlib](https://ocaml.org/api/Stdlib.html) is automatically opened in every OCaml program. It contains the "built-in" functions and operators. You don't need to prefix any of the names it defines, but you can in case there's ambiguity.

An `open` is another sort of `module_item`. We can open one module inside another.

Now we have a problem, because String also defines the name `map`, but with a different type than `List`. A later definition shadows an earlier one, so it's `String.map` that gets chosen instead of `List.map`.

### Limiting the Scope of Open

Inside `e` all the names from module `M` are in scope, `M.(e)`.

To bring a module into scope for an entire function (or some other block of code) the syntax is: `let open M in e`. It makes all the names from `M` be in scope in `e`.

## 5.2.3. Module Type Definitions

We've already seen that OCaml will infer a signature as the type of a module. Let's now see how to write those modules types ourselves. As an example, here is a module type for our list-based stacks:

```ml
module type LIST_STACK = sig
  module_spec
end

(* associate module type to the module's def *)
module ListStack : LIST_STACK = struct
  module_items
end
```

For example, for the `ListStack` module, we'd first declare the *module type* `LIST_STACK`. We need to tell OCaml that `ListStack` is associated witht the module type specified by `LIST_STACK`: `module ListStack : LIST_STACK = struct`

```ml
module type LIST_STACK = sig
  (** [Empty] is raised when an operation cannot be applied
      to an empty stack. *)
  exception Empty

  (** [empty] is the empty stack. *)
  val empty : 'a list

  (** [is_empty s] is whether [s] is empty. *)
  val is_empty : 'a list -> bool

  (** [push x s] pushes [x] onto the top of [s]. *)
  val push : 'a -> 'a list -> 'a list

  (** [peek s] is the top element of [s].
      Raises [Empty] if [s] is empty. *)
  val peek : 'a list -> 'a

  (** [pop s] is all but the top element of [s].
      Raises [Empty] if [s] is empty. *)
  val pop : 'a list -> 'a list
end

module ListStack : LIST_STACK = struct
  let empty = []

  let is_empty = function [] -> true | _ -> false

  let push x s = x :: s

  exception Empty

  let peek = function
    | [] -> raise Empty
    | x :: _ -> x

  let pop = function
    | [] -> raise Empty
    | _ :: s -> s
end
```


The most common syntax for a module type:

```ml
module type ModuleTypeName = sig
  specs
end
```

where specifications inside a signature can include val declarations, type definitions, exception definitions, and nested module type definitions. Like structures, a signature can be written on many lines or just one line, and the empty signature sig end is allowed.

A more accurate version of the syntax would be:

```ml
module type ModuleTypeName = module_type
```

where a signature is just one sort of `module_type`. Another would be the name of an already defined module type, e.g. `module type LS = LIST_STACK`.

By convention, module type names are usually CamelCase, like module names.

In OCaml the namespaces for *modules* and *module types* are distinct, so it's perfectly valid to have a module and a module type named the same.
