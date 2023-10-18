# 1. Judgments and Rules

*Types* are the central organizing principle of the theory of programming languages.

*Language features* are manifestations of *type structure*.

The *syntax* of a language is governed by the constructs that define its types.

The *semantics* is determined by the interactions among those constructs.

The *soundness of a language design*, i.e. the absence of ill-defined programs, follows naturally.

The purpose of this book is to explain this remark. A variety of programming language features are analyzed in the unifying framework of *type theory*.

A language feature is defined by both its
- *statics*, the rules governing the use of the feature in a program
- *dynamics*, the rules defining how programs using this feature are executed

The concept of *safety* emerges as the coherence of the statics and the dynamics of a language.

In this way, we establish a foundation for the study of programming languages. But why these particular methods? The main justification is provided by the book itself. The methods we use are both precise and intuitive, providing a *uniform framework for explaining programming language concepts*.

Importantly, these methods scale to a wide range of programming language concepts, supporting rigorous analysis of their properties. Although it would require another book in itself to justify this assertion, these methods are also practical in that they are directly applicable to implementation and uniquely effective as a basis for mechanized reasoning. No other framework offers as much.
