# Development Environment

Deps:
- node
- npm
- bower
- `npm install -g purescript`
- `npm install -g spago`
- `npm install -g pulp`

Create a new project in an empty directory using spago init:

```shell
# new project setup
mkdir purintro && cd purintro
spago init

# you should now be able to build the project and run the tests
spago build
spago test
```

- packages.dhall  Spago configuration
- spago.dhall     Library dependency information
- src/Main.purs   Entry point module for your project
- test/Main.purs  An empty test suite
