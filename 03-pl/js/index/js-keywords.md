# JS :: Index :: Keywords



>A **keyword** is a token that matches IdentifierName but has syntactic use too.
That is, it appears literally, in a fixed width font, in some syntactic production. The keywords of ECMAScript include if, while, async, await, and many others.

>A **reserved word** is an IdentifierName that cannot be used as an identifier.
Many keywords are reserved words, but some are not, and some are reserved only in certain contexts.

`if` and `while` are reserved words. 
`await` is reserved only inside async functions and modules. 
`async` is not reserved; it can be used as a variable name or statement label without restriction.

This specification uses a combination of grammatical productions and early error rules to specify which names are valid identifiers and which are reserved words. All tokens in the `ReservedWord` list below, except for `await` and `yield`, are unconditionally reserved. Exceptions for await and yield are specified in 13.1, using parameterized syntactic productions. Lastly, several early error rules restrict the set of valid identifiers. See 13.1.1, 14.3.1.1, 14.7.5.1, and 15.7.1.

In summary, there are 5 categories of identifier names:
- Those that are always allowed as identifiers, and are not keywords, such as Math, window, toString, and _;
- Those that are never allowed as identifiers, namely the ReservedWords listed below except await and yield
- Those that are contextually allowed as identifiers, namely
>await and yield
- Those that are contextually disallowed as identifiers, in strict mode code:
>let, static, implements, interface, package, private, protected, and public
- Those that are always allowed as identifiers, but also appear as keywords within certain syntactic productions, at places where Identifier is not allowed:
>as, async, from, get, meta, of, set, target

The term *conditional keyword*, or *contextual keyword*, is sometimes used to refer to the keywords that fall in the last 3 categories, and thus can be used as identifiers in some contexts and as keywords in others.


Syntax
ReservedWord :: one of
>await break case catch class const continue debugger default delete do else enum export extends false finally for function if import in instanceof new null return super switch this throw true try typeof var void while with yield

NOTE 1: Per 5.1.5, keywords in the grammar match literal sequences of specific *SourceCharacter* elements. A code point in a keyword cannot be expressed by a `\` *UnicodeEscapeSequence*. 

An IdentifierName can contain `\` *UnicodeEscapeSequences*, but it is not possible to declare a variable named "else" by spelling it `els\u{65}`. The early error rules in 13.1.1 rule out identifiers with the same *StringValue* as a reserved word.

NOTE 2: `enum` is not currently used as a keyword in this specification. It is a *future reserved word*, set aside for use as a keyword in future language extensions. 

Similarly, `implements`, `interface`, `package`, `private`, `protected`, and `public` are future reserved words in strict mode code.

NOTE 3: The names `arguments` and `eval` are not keywords, but they are subject to some restrictions in strict mode code. See 13.1.1, 8.6.4, 15.2.1, 15.5.1, 15.6.1, and 15.8.1.



## Refs

* MDN: JS Reference: Operators
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators

* 12.7.2 Keywords and Reserved Words
https://tc39.es/ecma262/multipage/ecmascript-language-lexical-grammar.html#sec-keywords-and-reserved-words
