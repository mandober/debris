# 8. Function Definitions and Values

8. Function Definitions and Values
  8.1 First-Order Functions
  8.2 Higher-Order Functions
  8.3 Evaluation Dynamics and Definitional Equality
  8.4 Dynamic Scope

## 8. Function Definitions and Values

In the language E, we may perform calculations such as the doubling of a given expression, but *we cannot express doubling as a concept in itself*.

To capture the pattern of doubling a number, we *abstract away from the particular number being doubled* using a variable to stand for a fixed, but unspecified, number, to express the doubling of an arbitrary number.

Any particular *instance of doubling* may then be obtained by substituting a numeric expression for that variable.

In general, an expression may involve many distinct variables, necessitating that we specify which of several possible variables is varying in a particular context, giving rise to a function of that variable.

In this chapter, we will consider two extensions of E with functions. 

The first, and perhaps most obvious, extension is by *adding function definitions* to the language. 

A *function is defined* by binding a name to an abt with a bound variable that serves as the argument of that function. 

A *function is applied* by substituting a particular expression (of suitable type) for the bound variable, obtaining an expression.

The domain and range of defined functions are limited to the types `nat` and `str`, because these are the only types of expression.

Such functions are called *first-order functions*, in contrast to *higher-order functions*, which permit functions as arguments and results of other functions.

Because the domain and range of a function are types, this requires that we introduce *function types* whose elements are functions.

Consequently, we may form *functions of higher type*, those whose domain and range may themselves be function types.

## 8.1 First-Order Functions

The language ED extends E with function definitions and function applications as described by the following grammar:

```
Exp   e := apply{f}(e)               f(e)                               (app)
         | fun{τ₁; τ₂}(x₁.e₂; f.e)   fun f(x₁ : τ₁) : τ₂ = e₂ in e      (def)
```

The expression `fun{τ₁; τ₂}(x₁.e₂; f.e)` binds the function name `f` within `e` to the pattern `x₁.e₂`, which has argument `x₁` and definition `e₂`.

The domain and range of the function are, respectively, the types `τ₁` and `τ₂`.

The exp `apply{f}(e)` instantiates the binding of `f` with the arg `e`.

## 8.2 Higher-Order Functions
