# HTML in markdown: Block elements



## Details and summary

Collapsable details

- tag: `<details>`
- title tag: `<summary>`
- hide excessive details

<details> <summary>Collapsed block</summary>

Wrap the `<details>` tag around a block that is to be made collapsable. Initially, the block is in the collapsed state, hiding its content. It shows a small triangle as a hint that it is clickable. A click expands the block; in fact, clicking toggle the block's state. A block, either in the collapsed or expaned state, shows a default title "details", which may be changed by nesting the `<summary>` tag within it.

</details>


## Quote

> quote-1: one level of indentation

>> quote-2: two levels of indentation

>>> quote-3: three levels of indentation

seems to go on forever…

>>>>>>>>>> quote-n: n levels of indentation

Quote blocks snap to each other, levels are indicated with a vertical fat line.

> quote-1: Quote blocks
>> quote-2: snap to each other
>>> quote-3a: levels are indicated  
>>> quote-3b: with a vertical 
>>>> quote-4: fat line


## Block elements

### The pre tag

<pre>
The pre tag
In logic and probability theory, two events (or propositions) are mutually
exclusive or disjoint if they cannot both occur at the same time. A clear
example is the set of outcomes of a single coin toss, 

```js
var a = 4
console.log(a)
```

either heads or tails, but not both.
</pre>

### Fenced bode block

```js
var a = 4
console.log(a)
```

### Fieldset and legend

<fieldset>
<legend>Fieldset with a nested legend</legend>

In logic and probability theory, two events (or propositions) are mutually exclusive or disjoint if they cannot both occur at the same time. A clear example is the set of outcomes of a single coin toss, which can result in either heads or tails, but not both.

In the coin-tossing example, both outcomes are, in theory, collectively exhaustive, which means that at least one of the outcomes must happen, so these two possibilities together exhaust all the possibilities.[1] However, not all mutually exclusive events are collectively exhaustive. For example, the outcomes 1 and 4 of a single roll of a six-sided die are mutually exclusive (both cannot happen at the same time) but not collectively exhaustive (there are other possible outcomes; 2,3,5,6).

</fieldset>


## Definition

<dl>
  <dt>Coffee</dt>
  <dd>Black hot drink</dd>
  <dt>Milk</dt>
  <dd>White cold drink</dd>
</dl>

The <abbr title="World Health Organization">WHO</abbr> was founded in 1948.

<dfn>HTML</dfn>


<fieldset>

<label for="browser">Choose your browser from the list:</label>
<input list="browsers" name="browser" id="browser">
<datalist id="browsers">
  <option value="Edge">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>

</fieldset>
