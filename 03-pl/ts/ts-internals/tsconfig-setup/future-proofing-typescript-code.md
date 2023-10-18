---
downloaded:       2023-08-25
page-url:         https://betterprogramming.pub/8-best-practices-for-future-proofing-your-typescript-code-2600fb7d8063
article-title:    8 Best Practices for Future-Proofing Your TypeScript Code
---
# 8 Best Practices for Future-Proofing Your TypeScript Code
by Markus Hanslik | Better Programming

## Make sure your TypeScript code survives the test of time

Whether you are building libraries, front-end or back-end applications using JavaScript, the small effort of switching to [TypeScript][5] is already a big step towards future-proofing your code.

If you disagree, I suggest you just try it out on at least some of your often-called code and compare uncaught exceptions before and after via an error reporting tool.

When you add types to your codebase, chances are that you will notice dead code due to logical errors, unchecked access to potentially nullable variables, functions with too many concerns (input/output parameters), and more, which will immediately help to reduce the number of issues in your code.

Additionally, it will make refactoring your code much easier, helping with future developments and reducing technical debt — because, now, the IDE (e.g. [VS Code][6]) knows what types your code uses, it can help with renaming, splitting up, moving around code, as well as show unused functions.

However, there are a few low-cost tricks to implement that will help you a great deal towards future-proofing your code even more, especially if you plan to work on your code in a team or if your code is more than just a prototype.

## 1. Turn Strict Checks On

By default, TypeScript doesn’t use its `strict` mode. This may be great if you don’t want to fully commit to TypeScript yet (e.g. only migrate parts of your JavaScript files to it), but it also means that many common JavaScript bugs will not be caught by TypeScript.

This happens because TypeScript will not expect you to add a type definition to everything (but instead mark parameters and variables as `any`), and will allow you to assign `null` or `undefined` to any type, amongst a few other rules (check out the [docs][7]).

You can improve your code’s stability a lot by simply turning on the `strict` flag in your project’s `tsconfig.json`. Having to explicitly type everything will improve your code’s documentation, allow you to more easily reason about your code’s expectations.

[1]: https://medium.com/@Markus.Hanslik?source=post_page-----2600fb7d8063--------------------------------
[2]: https://betterprogramming.pub/?source=post_page-----2600fb7d8063--------------------------------
[3]: https://unsplash.com/@joeel56?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText
[4]: https://unsplash.com/s/photos/code?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText
[5]: https://www.typescriptlang.org/
[6]: https://code.visualstudio.com/
[7]: https://www.typescriptlang.org/docs/handbook/compiler-options.html
