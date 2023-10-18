# cats - categories of apps

05-apps
├ apps   <---- source (original) folders
└ cats   <---- class dirs with items that are junctions to src folders


`cats` dir is a classification of apps, so it holds the names of app-classes,each as a 'original' folder, inside of which are junctions to src folders. A particular src folders may have several junctions inside the cats hierarchy (e.g. one junction in class 'shells', another junction in class 'editors', etc.)



- actual (per-app) folders are in `../app`
- here, `./cats` are only folders *junctioned* to there

05-apps
└ app
  ├ conemu
  ├ emacs
  ├ mintty             ...original item, source/own folder
  ├ nano
  ├ nvim
  └ vscode             >───── original ───────┐
    └ cats                                    │
      ├ code-editors                          │
      │ └ vscode¹      <-─── junction ────────┘
      │
      ├ shell
      │ ├ shells
      │ │ ├ zsh
      │ │ ├ fish
      │ │ ├ mksh
      │ │ ├ dash
      │ │ └ bash
      │ │
      │ ├ shell-utils
      │ │ ├ line-editors
      │ │ │ ├ ledit
      │ │ │ └ readline
      │ │ ├ pagers
      │ │ │ ├ less
      │ │ │ └ most
      │ │ └ shell-tools
      │ │   └ rg
      │ ┆
      │
      ├ tty               ...own folder containing either
      │ ├ mintty¹         ...items as junctioned folders (into app)
      │ └ tty-tools       ...own subfolders as subcategory names
      │   └ wsl-bridge
      ┆


¹ ref (junction/symlink/hardlink) to original folder



└ ┴ ┘ ┌ ┬ ┐ ├ ┼ ┤ ─ │ ╌ ┄ ┈ ╎ ┆ ┊ ╴ ╵ ╶  ╷ ⟍ ⟋



(project)
  {debris}
    /05-apps
      /app
        apache
        mysql
        bash
        fish
        zsh
        readline
        sqlite
        readline
        mintty
        vscode
        chrome-browser
      /app-cat
        /atp
        /web-platform
          /browsers
            chrome
            firefox
            edge
          /runtimes
            node
            deno
            bun
          /langs
            /markup-lang
              html
              xml
              markdown
              rst
              mathml
              svg
              dhall
              /template-langs
                pug
                hadlebars
                moustache
                dhall
            /schema-lang
              ini
              yaml
              json
              toml
              xml
            /dynamic-lang
              css
              js
              ts
              xpath
              xlt
          
        /cfam
        /dbs
          sqlite
          mysql
        /pkb
        /notetaking
        /publishing
        /shellements
          /shells
            bash
            zsh
            fish
          /terminal
            mintty
          /line-editors
            readline
