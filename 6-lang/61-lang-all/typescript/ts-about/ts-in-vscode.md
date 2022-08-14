TypeScript in Visual Studio Code

https://code.visualstudio.com/docs/languages/typescript

Installing the TypeScript compiler
Visual Studio Code includes TypeScript language support but does not include the TypeScript compiler, tsc. You will need to install the TypeScript compiler either globally or in your workspace to transpile TypeScript source code to JavaScript (tsc HelloWorld.ts).

The easiest way to install TypeScript is through npm, the Node.js Package Manager. If you have npm installed, you can install TypeScript globally (-g) on your computer by:

npm install -g typescript
You can test your install by checking the version.

tsc --version
Another option is to install the TypeScript compiler locally in your project (npm install --save-dev typescript) and has the benefit of avoiding possible interactions with other TypeScript projects you may have
