# Grammar



LISP: atoms, symbols, and numbers are given by the following grammar

```bnf
<atom>  ::= <symb>
          | <num>
          | <nil>

<symb>  ::= <char>
          | <symb> <char>
          | <symb> <digit>

<num>   ::= <digit> | <num> <digit>
<digit> ::= [0-9]
<char>  ::= [a-zA-Z_-]
<nil>   ::= SPECIAL


<sexp> ::= <atom>
        | (<sexp> . <sexp>)
```
