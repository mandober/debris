# Parsers :: Values and types





We need to distinguish *total failure* (all parsers fail) from *partial failure* (at least one parser succeeded), in accordance with the shape (type) of the value we return on success.

- total failure: `[]`
  - possibilities: `null`, `undefined`, `""`, `[]`, …
  - "input" ---> ""
  - "input" ---> ["", "input"]
- partial failure (at least one parser succeeded): `""`
