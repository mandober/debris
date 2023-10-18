# Semantics

https://www.youtube.com/watch?v=U1N8ix6dOaM&list=PLp17O33E3qFw9Rh1XrZHVfsfK8lhFawJ0&index=17

- sense and reference
- the sense of a word
- the reference of a word
- semantic relationships among words

## Sense vs Reference

We distinguish between two aspects of linguistic meaning: sense and reference.

*Sense* is a mental representation of a meaning; e.g. the concept that forms in your mind when you hear some word. *Sense* is a mental representation of the meaning of a linguistic expression.

*Reference* is the actual entity in the world that the word refers to; e.g. the referant of "this table" is the actual physical object, not a concept in the mind. *Reference* is the set of real objects in the world that a linguistic expression in a particular particular utterance refers to.

*Some expressions have sense but no reference* (e.g. a unicorn); its reference is the empty set; it has no reference in the actual world. Also: "the king of Europe", "first person on Neptune", etc.

*Some expressions have multiple senses but the same reference*. For example: The most populous country in the world, The country that hosted the 2008 Olympics, (China).

One way you can tell the senses are different is that it's possible that in the future (or the past) the reference for these expressions might diverge into two different things.

We can think of a sense as a kind of definition of a word (although we're going to have to extend that notion also to sentences). And we can think of reference as the actual objects the physical objects that are picked out by a word in context; the set of objects in the world that match the definition given by the sense.

## Compositional vs Lexical semantics

These are two kinds of semantics, two sub-branches within the scientific field of semantics.

*Semantics* is about how the form of a linguistic expression relates to its meaning in terms of sense and reference.

*Lexical semantics* is the study of the sense and reference of words.

*Compositional semantics* is the study of how the meanings of words combine together to form the meanings of sentences.

- How does the mind represent the sense of a word?
- What is the sense of a word and how does the mind represent it?

Have no clear answer, they are still investigated.

One theory is the *theory of dictionary definitions* according to which the mind stores something like the definition of word, the definition that you might find it in a dictionary. But the dictionary defines words in terms of other words, and it is often circular.

*Mental image theory* says that the sense of a word is something like a mental image that pops up in your mind when you hear a word. So, if the sense of the word "bird" is an image of some prototypical bird then in what sense can we say that penguins are birds. Another problem with the idea of mental images is that different people conjure up very different images for the same word.

The third option for what is the sense of a word and how is it represented in the mind is the usage-based definitions. It is the current best guess. A **usage-based definition** defines the sense of a word in terms of the contexts that the word can be used in. If you see an unknown word in a context where you've seen familiar words, you can guess its meaning since you know that their sense is similar. We still don't know how the human mind represents word meanings, but usage-based definitions are based on the intuition that if you know the sense of a word, then you know in what contexts it can be used. Maybe a sense of a word just is a set of conditions on when the word can be used.

## Reference of a Word

Words have different kinds of reference. A proper name (a word like Nic Cage or China) refers to a *single particular entity* in the world.

The reference of a *common noun* like cat refers to the set of all cats in the world.

The reference of an *adjective* is the set of all things describable by that adjective. An adjective like "green" is a set of all green things in the world.

The reference of an *intransitive verb* ("sleep") is the set of all things describable by that verb.

## Relationships Between Words

- hypernymy: hypernym vs hyponyms
- synonymy, synonyms
- antonynymy, anotonyms
  - complementary antonyms
  - gradable antonyms

All the words in a language are linked together in a web of semantic relationships which can be defined in terms of their reference.

We define these relationships among words using their reference because the sense of a word is still a thorny question, but the reference of a word is well understood. The set of entities referred to by the word "poodle" is a subset of the set of entities referred to by the word "dog". The reference of "poodle" is a subset of the reference of "dog". Thus, "poodle" is a **hyponym** of "dog". And "dog" is a **hypernym** of "poodle". This kind of a relationship is called **hypernymy**.

* `X` is a *hypernym* of `Y` iff the reference of `Y` is a subset of the reference of `X`.
* `X` is a *hyponym* of `Y` iff the reference of `Y` is a superset of the reference of `X`.
* `X` and `Y` are *synonyms* iff they have the same reference.

### Antonymy

`X` and `Y` are *antonyms* iff their references are in some kind of contrasting relation, but there's lots of different ways that references can contrast.

Two words X and Y can be **complementary antonyms** (no overlap between the sets) iff there is no entity that is simultaneously in the reference of both X and Y ("alive" vs "dead"). A test for whether two words are complementary antonyms: does not X imply Y, and vice versa. (if someone is not dead does it imply they're alive).

**Gradable antonyms** identify different levels of some property; they have a gradual scale (hot vs cold).


## Semantic ambiguity

- homonyms
- Polysemous, polysemy

Words may have multiple meanings.

**Homonyms** are words that sound the same but have unrelated meaning ("bat").

**Polysemous** words have multiple, but related meanings ("paper").

## Composition semantics

>Composition semantics studies how the meaning of words combine to form the meaning of a sentence.

"It is raining today" is compositional, but "It is raining cats and dogs" is not.

An **idiom** is a phrase whose meaning is not a function of the meaning of its parts.

*Intersective adjectives* - their meaning is the set intersection of their references.

*Subsective adjectives* ("big whale") - their reference dependes on the noun they are modifying.

*Non-intersective adjectives* ("fake gun")

## Reference of a sentence

**Sense of a sentence** is a *proposition*, i.e. a truth-valued statement. Sentences (propositions) have a truth value.

*Reference of a sentence* is the truth value of a sentence.

(Problem: All true sentences have the same reference, i.e. the truth value 'true', and similarly for all false sentences.)

A sentence expresses a proposition if it makes sense to assert it in *any possible world*.

Proposition test: a sentence `X` is a proposition if it is sensible to add the prefix "`It is true (false) that`" to `X`. For example, "China is the most populous country in the world" expresses a proposition because it is sensible to say: "`It is true that` China is the most populous country in the world".

## Truth conditions

Truth conditions are the conditions that make a proposition true in a possible world.

## Building propositions

A proposition may be NP + VP.

The *sense* of a NP + VP combination is the proposition:
"The reference of the NP is a subset of the reference of VP".

The *references* of a NP + VP combination in a world is one of the two truth values (true or false).

## Relations between propositions

Entailment is a relation between propositions. Entailment is the name for *logical consequence* viewed as a relation between premises and a conclusion.

Entailment is a relation between premises and a conclusion. The *entailment* relation holds if the conclusion is indeed the logical consequence of the premises.

- All dogs bark ⇒ Poodles bark
- Italy and Spain are European countries ⇒ Spain is in Europe

>A proposition X *entails* a proposition Y iff, in all possible worlds where X is true, Y is also true, provided X and Y are related propositions.

Propositions are related if they are in "nym" relation: hyponym, hypernym, synopnym, antonym, etc.

- All dogs bark ⇒ Dobermanns bark

Dobermann is a *hyponym* of dog. The reference of dobermann is a subset of the reference of dog, `⟨dobermann⟩ ⊆ ⟨dog⟩`.

- Ian has a female sybling ⇔ Ian has a sister

*Mutual entailment* is like a biconditional, i.e. entails in both directions.

Two propositions are *incompatible* if there is no possible world i nwhich they are both true.
