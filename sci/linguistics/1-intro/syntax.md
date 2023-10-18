# Syntax

https://www.youtube.com/watch?v=koDRijZUQj8&list=PLp17O33E3qFw9Rh1XrZHVfsfK8lhFawJ0&index=15

*Syntax* studies the structure of sentences.

A sentence is grammatical if it follows the rules of the language known implicitly by the speakers (loose def).

Two kinds of *constraints* on grammatical sentences
- co-occurence
- word order

*Syntactic rules*, or *phrase structure rules*, capture these constraints. An example of a syntactic rule: S → NP VP.

*Lexical entries* are the rules that specify individual words for a syntactic category. They realize a syntactic category; they are concrete words forming a lexicon:
- nouns,                N   → cat, mouse, table, …
- intransitive verbs,   V   → run, sleep, …
- transitive verbs,     TV  → saw, like, …
- ditransitive verbs,   DTV → gave, sent, …
- sentential verbs,     SV  → thought, say, observe, …
- determiners,          Det → the, this, my, …
- adjectives,           Adj → furry, lazy, …
- propositions,         P   → from, to, of, away, …


**Syntactic categories**
- S     Sentence
- NP    Noun phrase
- N     Noun
- PropN Proper noun
- Det   Determiner
- Adj   Adjective
- VP    Verb phrase
- V     Intransitive verb
- TV    Transitive verb
- DTV   Ditransitive verb
- SV    Sentential complement verb
- Adv   Adverb
- P     Proposition
- PP    Propositional phrase


**Syntactic rules**

```
S  := NP VP
VP := V
    | TV NP
    | DTV NP NP
    | SV S
    | VP Adv
    | VP PP
NP := Det N
    | PropN
N  := Adj N
    | N PP
PP := P NP
```

**Lexicon**:
```
NP  → {she, Fluffy, Bob, Sally, …}
N   → {dog, cat, man, …}
Adj → {fluffy, cute, gray, …}
Det → {the, this, some, …}
VP  → {slept, barked, …}
TV  → {liked, devoured, …}
DTV → {gave, sent, …}
SV  → {thought, said, …}
P   → {to, for, with, on, under, …}
Adv → carefully, quickly, yesterday, …}
```

Phrase structure rules and their function:
- S  → NP VP       Allows VPs to combine with their subject NP
- NP → Det N       Allows Det to combine with a noun
- N  → Adj N       Allows attributive adjectives to be noun adjuncts
- VP → VP Adv      Allows adverbs to be VP adjuncts
- VP → TV NP       Allows TV to combine with their object NP
- VP → DTV NP NP   Allows DTV to combine with their object NPs
- VP → SV S        Allows SV to combine with their complement S
- PP → P NP        Allows P to combine with their complement NP
- N  → N PP        Allows PPs to be noun adjuncts
- VP → VP PP       Allows PPs to be VP adjuncts
