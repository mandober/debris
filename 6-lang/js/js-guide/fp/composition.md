# Composition of functions

Composition requires
- first-class functions
- static functions (no `this`)
- free functions (no of a method dot call)
- no variadics, especially no optional params
- currying
- "operations-first data-last" order of parameter declarations
- or "never-say-data" point-free definitions of functions
- naturally: matching domains and codomains
- matching arity (more-less)


---

The compose function, defined above, accepts two or more fns,
and one or more arguments, that will be fed to the right-most function.
The output of the right-most fn (LSF) will then be fed as input to the next
fn on the left; so the flow of composition is in the RIGHT to LEFT (R2L) dir.

The most basic composition is of two unary functions:

g ∘ f  ≡ g . f  ≡ compose(g, f)
(math ...haskell ...javascript)

The composition allows us to NOT MENTION args (to the LSF fn) right away:

(g ∘ f) (x)  ≈  (g . f) a  ≈  (compose(g, f)) (42)

later, when the arg(s) are available, they can be fed into the composition:

(g ∘ f) (x) = g(f(x))

(g . f) a = g (f x)

(compose(g, f)) (42) = g(f(x))




Since the number of input functions, as well as the number of args for the rightmost finction is unknown, the compose declares its 2 parameters using the curryied form.

which is
of course, done in the right-to-left direction:



For max flexibility compose is variadic in both args:
    compose = (...fs) => (...xs) =>

Because of that compose is in the curryied form, otherwise only its last
arg could be variadic, i.e. have the 'rest' modifier.


Because of the former

variadic in the number of functions (1st, 'rest', arg)
and
variadic in the number of initial args (2nd, 'rest', arg)
that first go to the right-most function.

Fns of diff arity can be composed together,
but a fn on the LEFT
must have compatible domain
with the codomain of
a fn on the RIGHT.

y must have compatible domain and codomain
ONLY in the first arg

However, it has 3 convenience methods as props:
- compose.f2
- compose.f3
- compose.f4
when the number of functions to compose is known in advance.


---

Composing functions is at the heart of FP, and to be able to advantage of composing, functions have to accept parameters in a way that makes composition possible. Above all else this means that the parameter intended to bind the data (that the function is operating on) comes last, and equally important, that the functions are curryied.

Generally, higher-order functions are the units you work with in FP languages. They are designed to be as general as possible, so that they can produce many specialized functions. Of course, they can produce results directly, but it much more common that a HOF will produce another function that is particularly specilized for some concrete task. 

The basic example is the successor (i.e. increment) function - instead of going right ahead and coding such a function, basically as:

const succ = n => n + 1

FP should encourge the way of coding where you take a step back and think if this function is as reusable as possible, which usually means whether it is as general as it can be. This weak example clearly shows this is no the case, and that a more general function, that can add any two numbers, is actually more useful:

const add = (x, y) => x + y

Now, this function has two uses: it may be directly used for binary addition, but moreover, it may be used as a sort of factory that produces more specialized versions of functions involving addition, say, `succ`.

Actually, before it can become a "factory", it must be converted to the curryied form.

const add = x => y => x + y

Now, the call with a single argument will "fix" that argument in the position of the first parameter of the produced function:

const succ = add(1)

which is equivalent to this:

const succ = y => 1 + y

The currying is so important, FP languages perform it automatically, it is inherent to the language; However, in JS we have to do it manually; we need to create a resiliant curry function that will hopefully work in many strange circumstances, and we need to apply it, pretty much, all over the place. We need to "decorate" either every call-site or we could design our functions with currying in mind, which basically means just wrapping them in curry. When the JS decorators, which are now at stage 2, are accepted to the language, this will be easier - it will be done just by placing e.g. `@curry` above a function's definition.
