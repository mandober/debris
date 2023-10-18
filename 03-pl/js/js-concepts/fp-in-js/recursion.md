# Recursion

## Call stack

JS engine (like the ubiquitous V8) manages the execution of JS code using the *call stack*. The stack and the heap are just memory (RAM), the main difference between them is the *access discipline*. In general, every process gets its own stack, but the heap memory may be shared/accessed by different processes (with adequate permissions). Given a random memory address, it may fall within the part of RAM designated for the heap or for the stack (of some process), or god knows where - besides being carved into the heap and the stack, memory has many other regions (e.g. memory map of a file's contents, device memeory, and a million other things). The point is, both stack and heap are just virtual regions of the same physical RAM, only each is accessed in a specific way. The stack is accessed in LIFO style - last in, first out; while the heap is accessed via a pointer (memory address). Like any memory location, the stack could also be accessed via a pointer, but accessing it in a disciplined way, i.e. using only the prescibed methods wastly improves efficiency. This is because, there is no need for pointers at all - there is only one "active" slot (location) in the stack, which is the item at the top. Just by saying `pop`, you get the top item off the stack - there's no need to specify memory address or anything - everything is implicit: each process has only one own stack, so it doesn't have to specify anything further. And each stack has only one place where the action happens. By issuing the `push x` command, the `x` is placed on top of the stack. Again, no need to specify anything further. This scheme is very simple yet efficient; a handful of stack operations is enough to use the stack to manipulate values in an efficient manner.

The stack is almost always used to manage the fucntion calls. Since JS is a single-threaded language, it gets one stack. That stack is used exactly for managing JS function calls. In the global scope, with nothing happening, the stack is empty. As soon as some function is called, the JS engine pushes (creates) a new *stack frame* onto the call stack. That stack frame contains everything the called function requires for its execution: its arguments and the return address.

The return address (usually specified relatively, in relation to the call stack frames) contains information where the function must return when done. Usually this is straightforward, a called function returns to the function (or to the 'main') that sits (is descibed by) in one stack frame below its frame. Whena function is done, its stack frame is popped (ignored as if it doesn't exist anymore, although it is still there) and the return value (if any) is forwarded (placed in a special slot in the stack frame) to its caller (which is usally in a stack frame below it, os after the pop, it becomes the top of the stack).




the called function retuns when it is done. In a chain of calls, where one function calls another, the called function returns to the caller which sits in the stack frame below it.

Normally, the called function returns to the caller, which may be managed by the previous stack frame.



, specified as relative value; - usually  each stack frame has)

, usually just its arguments. A nullary function that is used for side-effects doesn't even have arguments.




## Call stack and recursive calls

When doing recursion, one of the first things off the chacklist is determining the base case(s).


```hs
fac :: Int -> Int
fac 0 = 1
fac n = fac (n - 1) * n
-- or:
fac n = if n == 0
        then 1
        else fac (n - 1) * n
```

```ts
type fac = (n: number) => number
const fac: fac = n =>
  n === 0
    ? 1
    : fac (n - 1) * n
```
