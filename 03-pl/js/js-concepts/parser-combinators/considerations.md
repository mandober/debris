# Parsers :: Considerations

We need to consider:
- types
- values, shape of values
- input
  - input value
    - plain text, string
    - stream
  - input type
- output
  - output value, shape, carier
  - output type
- result, payload, successfully parsed part of input
- the rest of input
- failure
  - signalling failure
  - signalling complete failure
  - signalling partial failure
  - values returned in each case
- parsers
  - primitive
  - simple
  - compound
    - possibly return multiple results



>Remember, the input is unbeknownst to us. We have some rough idea, but, in general, we don't know what the input start with or what may appear in it. **We probe it by throwing different parsers at it**.
