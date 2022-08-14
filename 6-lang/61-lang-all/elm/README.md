# Elm

- In 2012, the first versions of Elm released
- Elm is a functional language based on Haskell, designed by Evan Czaplicki

Elm is a functional language that compiles to JavaScript. It helps you make websites and web apps. It has a strong emphasis on simplicity and quality tooling.

In 2018, in v.0.17, Evan Czaplicki has changed the architecture of Elm to make it "easier to learn and use" and to further emphasize concurrency. The creator of Elm says that it is not about functional reactive programming anymore, but rather about concurrency.

Compiler for Elm os written in Haskell.

Latest Elm version in May 2020 is  0.19.1


## Instal on Linux

https://github.com/elm/compiler/blob/master/installers/linux/README.md

```bash
cd ~

curl -L -o elm.gz https://github.com/elm/compiler/releases/download/0.19.1/binary-for-linux-64-bit.gz

gunzip elm.gz
mv elm $HOME/bin/
cd $HOME/bin/
chmod +x $HOME/bin/elm

elm --help

npm install -g elm-test elm-format

# sudo npm install -g elm-format FAILS
# try this workaround:
cd ~
# create this helper npm folder in user dir
mkdir $HOME/.npm/mutable_node_modules
# and point to it in npm config
npm config set prefix $HOME/.npm/mutable_node_modules

# check it
npm config ls -l
```

https://marketplace.visualstudio.com/items?itemName=Elmtooling.elm-ls-vscode
