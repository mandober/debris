# Numbers

In MathML, numbers are represented as, e.g., <mn>127.3</mn>. itex2MML does its best to intelligently parse what's a number and what's not. Unfortunately, conventions for things like decimal markers are very culture-dependent, and incompatibly-so. If you don't like the way itex2MML parses the would-be numbers in your input, you can force it to interpret a certain string as a number, using the `\itexnum{}` command.
