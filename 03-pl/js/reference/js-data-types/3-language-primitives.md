# JS :: Ref :: Data types :: Language primitives

*Language primitive types* are influenced and constrained by the machine primitive types. A language may directly adopt and expose machine primitive types like integers and floats in their native flavors. Almost all general-purpose system programming languages offer integers, both signed and unsigned, `i8`, `i16`, `i32`, `i64` (unsigned integers classified by the size) and `u8`, `u16`, `u32`, `u64` (signed integers classified by the size), as well as floats `f32` and `f64`, possibly with a different naming scheme. Some languages see no use in offering their users all these flavors, so they choose a particular subset.

JS has chosen to expose only `f64` (aka `Double`), aka what the IEEE 754 standard for floating-point arithemtic calls `binary64`. On the surface, all numbers in JS are double-precision (64bit) floating-point numbers. However, internally, JS does make a distinction between floats and integers, and performs bit-wise operations on integers (they make no sense on floating-point numbers), by first converting the floats to integers. By OR-ing a number with 0, as in `42|0`, users can make sure their number is internally represented as an integer. So, numbers in JS are primitive values, classified by the `number` primitive type, which is a floating-point number type `binary64`.

Languages may also choose not to expose a machine primitive type directly; for example, `number` type in JS directly exposes the underlying machine primitive double-precision floating-point type. So, JS numbers are operated on by the FPU unit and registers in the CPU. In other words, JS `number` type maps directly (one-to-one) to the underlying machine primitive type. A languages that offers integers may not directly expose the machine integers, but wrap them in another abstraction layer. For example, Haskell's `Int` type classifies integers, but does not map directly onto machine integers. In fact, Haskell has a more primitivre integer type `Int#` that does map the machine integers completely. On the other hand, `Int` type classifies what are called lifted integers, i.e. integers, ℤ, extended with a bottom value, usually denoted `⊥`, in Haskell denoted by `undefined`, wherer the bottom value represent diverging computation, such as a failure, error, exception, infinite loop, and other unrecoverable conditions. The `Int` type is offered by default, it is the type normally used, while the access to the underlying `Int#` type is possible by jumping through some hoops.

Some languages pass-through machine types, but choose to represent some types, like Booleans, differently.

The set of the language primitive types that a languages makes available to its users are usually called *base types* or sometimes *ground types*.



In any PL, we can identify a set of *base values*, which are the most elementary, scalar, atomic (further indivisible) values. Since values are organized into types, so we usually talk about *base types*, also called *ground types*. A base type in a PL usually has a direct correspondence to a *machine primitive type* from which it originates. Other types are based on the base types, so we can call them *derived types*.

There are many classifications of types in a PL:
- primitive vs non-primitive
- base (ground) vs derived
- simple vs compound
- scalar vs compound
- std vs library

Primitive types of a PL are the simplest, scalar types that usually correspond to a machine's primitive types.

Machine primitive types are the types like integers, pointer, character, floating-point numbers.


However, there is often a difference between the primitive types of a PL and machine's primitives.

Some languages offer compound types (like lists) as a primitive, and pointer is a machine type that is not supported by many PLs.


Any computer has a set of machine primitive values, offered as particular *types of values*, all of which are (naturally) based on the bits (Boolean values). Nevertheless, a Boolean type is never a *native* machine primitive value because each CPU is constrained by the size of a *word*.

A **word** is the amount of bits handled as a unit. It is the fundamental unit in any CPU architecture as it influences and constrains many other things: the amount of bits that can be read (written) in a single operation from memory, the size (also called width) of the bus that carries the bits around (e.g. from memory to CPU), the unit size (or the size of the multiplicator) of CPU caches (where the bits are temporarily stored), the maximum capacity (size) of CPU registers (to where the bits must eventually end up in order be manipulated by the CPU). The size of a word determines all these things and also enforces the size of the *machine integers*.

In modern computers, a word is 64 bits (wide), which is 8 bytes. Consequentally, the size of the *native integers* is 2⁶⁴ (i.e. the width of integers is 64 bits, or integers are 64 bits wide, or just 64-bit integers). It also means that the size of machine *pointers* (memory addresses) is 64 bits. Basically, getting an integer from memory means reading 64 consequtive bits from memory, starting from the location as indicated by the value of a pointer, then transfering those 64 bits by a 64-bit wide bus, via a CPU cache memory, into one of the (64-bit wide) CPU registers. Everything is constrained, but also optimized to work with 64 bits (minimum) at a time. The sizes are either exactly 64 (bits) or the multiples of 64.

Some consequences of this setup are that types whose size is less than 64 bits are treated and manipulated as having 64 bits nonetheless. That's why there is no true machine Boolean type. A Boolean type has only two values and thus its storage requirements are perfectly matched with just 1 bit. However, since 1 bit cannot be directly manipulated (fetched, stored, moved around), the Boolean type must have 64 bits (1 used and 63 wasted bits).

It would be similar (but with a lot less waste) for the other standard integer types like u8 (8-bit integers), u16 (16-bit integers), u32 (32-bit integers). In a way, this implies that the fundamental computer type is not the Boolean (a single bit), but numbers (groups of bits) as various types of integers.

There is only one fundamental, native, most natural machine "type" and it has 64 bits. We might call this type "integer" just because any amount of bits can always be interpreted as a number (an integer) no matter what it is actually meant to represent. However, each integer type (size-wise) comes in two flavours: singed and unsigned. An unsigned integer 



Base values are almost always *scalar values*, meaning they have the simplest possible form that cannot be further divided (as opposed to compound values, that can).



A **literal value** is a completely evaluated expression.


An **expression** is a completely evaluated expression.


A **value** is a completely evaluated expression.

one of the base values a language offers.

In JS, in order to use a variable
