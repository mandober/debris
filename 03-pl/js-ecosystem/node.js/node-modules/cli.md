# cli

https://github.com/nodejs/node/blob/v20.5.1/doc/api/cli.md

Node.js comes with a variety of CLI options. These options expose built-in debugging, multiple ways to execute scripts, and other helpful runtime options.

To view this documentation as a manual page in a terminal, run `man node`.

## Synopsis

```shell
node [options]
     [V8 options]
     [<program-entry-point> | -e "script" | -]
     [--]
     [arguments]

node inspect [<program-entry-point> | -e "script" | <host>:<port>] …

node --v8-options
```

Execute without arguments to start the REPL.

For more info about node inspect, see the debugger documentation.
