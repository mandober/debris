# Deno

Deno is a JavaScript/TypeScript runtime with secure defaults and a great developer experience, built on V8, Rust and Tokio.

Features
- Secure by default, file, network, env access must be explicit
- Supports TypeScript out of the box
- Ships a single executable, `deno`
- builtin utilities:
  - package manager
  - dependency inspector `deno info`
  - code formatter `deno fmt`
- audited std modules guaranteed to work with Deno
- Scripts can be bundled into a single JS file
- URL protocol for loading modules


```bash
# linux install
curl -fsSL https://deno.land/x/install/install.sh | sh -s v1.0.2

# update
deno upgrade --version 1.0.2
```
