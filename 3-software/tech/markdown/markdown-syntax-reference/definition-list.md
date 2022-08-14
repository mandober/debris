# Definition Lists

https://www.markdownguide.org/extended-syntax/#definition-lists

Some Markdown processors allow you to create definition lists of terms and their corresponding definitions. To create a definition list, type the term on the first line. On the next line, type a colon followed by a space and the definition.

First Term
: This is the definition of the first term.

Definiens
  : May indent some the definiend

Second Term
: This is one definition of the second term.
: This is another definition of the second term.


## HTML

The rendered HTML looks something like this:

<style>

dl > dt {
  font-style: unset !important;
  /* color: cornflowerblue; */
  color: wheat;
}
dl > dd {
  margin-left: 5px !important;
}
</style>

<dl>
  <dt>First Term</dt>
   <dd>This is the definition of the first term.</dd>
  <dt>Second Term</dt>
   <dd>This is one definition of the second term. </dd>
   <dd>This is another definition of the second term.</dd>
</dl>
