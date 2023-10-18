# Call stack

This diagram is a rought illustration of the JS call stack; specifically showing the stack during the execution of a recursive function.

The factorial function, implemented in the most straighforward ("naive") way, is used as an example of a recursive function:

```js
const fac = n =>
  n === 0
    ? 1
    : fac (n - 1) * n
```

When defining a recursive function, the first thing to cross of the checklist is the definition of the base case(s). It's hard to forget to specify the base case with these simple functions, but with complex functions, too often the blown stack serves as a reminder.

The art of programming recursive functions is so complex there is a whole field dedicates to this, called *total functional programming*, which is particularly intersted is having hard proofs that a recursive function does terminate. Determining whether a given function terminates or runs forever is the fundamental problem of CS called *the halting problem*. Even though the problem is, in general, resolved in the negative, there are many intricacies to it; limited situations do exist when it is possible to guarantee the termination of the given function. Each year the number of newly discovered "loopholes" around the Entscheidungsproblem increase. For example, to guarantee that a recursive function will terminate it is necessary to prove that the argument gets "smaller" with each recursive call. If the argument is a number, the proof that the current argument is smaller than the arg in the previous recursive call is straighforward; other types of arguments require more math.

(back to the issue at hand before drifting away again) The base case with `fac` is when `n` equals 0. In general, this happens in two ways: immediately, e.g. when the original call is `fac(0)`; otherwise, it will happen eventually - but more importantly, that call will be a part of the overall result, i.e. it will not stand alone, just for itself as in the direct call `fac(0)`, but it will be integrated in the overall result (clearer explanation to follow).


```
┌⁶────────────────────────┐
│ fac 0 = 1               │ (6) base case, returns 1 ↓
└── ↑ ────────────────────┘
    └───────┐₁
┌⁵───────── ↓ ────────────┐
│ fac 1 = fac 0 * 1       │ (5), receives 1 ↑, returns 1 ↓
└── ↑ ────────────────────┘
    └───────┐₁
┌⁴───────── ↓ ────────────┐
│ fac 2 = fac 1 * 2       │ (4) receives 1 ↑, returns 2 ↓
└── ↑ ────────────────────┘
    └───────┐₂
┌³───────── ↓ ────────────┐
│ fac 3 = fac 2 * 3       │ (3) receives 1 ↑, returns 6 ↓
└── ↑ ────────────────────┘
    └───────┐₆
┌²───────── ↓ ────────────┐
│ fac 4 = fac 3 * 4       │ (2) receives 6 ↑, returns 24 ↓
└── ↑ ────────────────────┘
    └───────┐₂₄
┌¹───────── ↓ ────────────┐
│ fac 5 = fac 4 * 5       │ (1) receives 24 ↑, returns 120 ↓
└── ↑ ────────────────────┘
    └───────┐₁₂₀
╍╍╍╍╍╍╍╍╍╍╍ ↓ ╍╍╍╍╍╍╍╍╍╍╍╍╍ (main) receives 120 ╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍╍
const x = fac 5
```

>First the stack is wound, i.e. the calls create new stack frames, one on top of the previous one, growing the stack upwards. The "flow arrows" go in the up direction. Each up arrow represents information (a question) that the current frame is requesting (asking) from the frame above it. When the base case is met (hit), the stack starts to unwind: the "flow arrows" now go in the down direction. Each stack frame now receives the answer to its question from the stack frame above it.

This is how the stack itself is used as a temporary storage with stack frames holding unfinished or partial computation. It takes the collaboration of all stack frames to complete the task. This is contrasted with loops that would complete this task, i.e. calculating `fac(5)`, in a different manner; they would not use meta/internal elements (such as the call stack) as the scratch space.




The calls proceed until the base case is hit, i.e. until the argument `n` equals 0. In that case, the answer (i.e. 1) is given immediately, without winding us up further. At that moment, the stack begins unwinding: the anwser to `fac(0)` is obtained, so the stack frame #6 is not needed anymore - it is popped off the stack and now the frame #5 is on the top. The frame #5, like the other frames below it, holds a computation with a hole - it cannot complete before that hole is filled. In the frame #5, the hole is on the right side of the equation, represented by the `fac 0` subexpression. Now that hole can be filled with the returned value from the frame above, and the expression in frame 5 is evaluated down to `fac 1 = 1`.

```js
//fac 0 = 1
//      ↓↓↓↓↓
fac 1 = fac 0 * 1
fac 1 =   1   * 1
fac 1 = 1
```

The frame 5 now holds the answer to `fac(1)`, i.e. 1, just like how frame 6 held the answer to `fac(0)`; although frame 6 held that answer directly, frame 5 had to work for it. So, now frame 5 has done its job and it can return that result down. Its stack frame is poppe doff and the frame 4 receives the value 1.
