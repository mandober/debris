# JS :: Frameworks :: NestJS

NestJS is a progressive NodeJS framework that will allow us to build reliable scalable, and maintainable server-side backend applications with incredible ease.

https://nestjs.com/
https://docs.nestjs.com/
https://docs.nestjs.com/first-steps


- NestJS *latest* version: v10.2.0 (2023-08-28)


## Installation

To get started, you can either scaffold the project with the Nest CLI, or clone a starter project (both will produce the same outcome).

To scaffold the project with the Nest CLI, run the following commands. This will create a new project directory, and populate the directory with the initial core Nest files and supporting modules, creating a conventional base structure for your project. Creating a new project with the Nest CLI is recommended for first-time users. We'll continue with this approach in First Steps.

```sh
# first
npm i -g @nestjs/cli
# then either
nest new nest
# or, create a new TypeScript project with stricter feature set
# https://www.typescriptlang.org/tsconfig#strict
nest new nest --strict
```

Alternatively, to install the TypeScript starter project with Git:

```sh
git clone https://github.com/nestjs/typescript-starter.git project
# or to use vanilla js instead of ts
git clone https://github.com/nestjs/javascript-starter.git project

cd project
npm install
npm run start
```

ASIDE: To clone a git repository without the git history, use [degit](https://github.com/Rich-Harris/degit). **degit** makes copies of git repositories. When you run degit some-user/some-repo, it will find the latest commit on https://github.com/some-user/some-repo and download the associated tar file to `~/.degit/some-user/some-repo/commithash.tar.gz` if it doesn't already exist locally. This is much quicker than using git clone, because you're not downloading the entire git history. `npm install -g degit`

## Overview of core files

- `app.controller.ts`      A basic controller with a single route.
- `app.controller.spec.ts` The unit tests for the controller.
- `app.module.ts`          The root module of the app.
- `app.service.ts`         A basic service with a single method.
- `main.ts`                The entry file that creates a new Nest app instance


`main.ts` is the entry file of the app which uses the core function `NestFactory` to create a Nest app instance.
