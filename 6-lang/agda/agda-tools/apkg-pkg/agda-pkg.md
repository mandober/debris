# agda-pkg

**agda-pkg** is a simple tool to manage Agda libraries with extra features like installing libraries from different kind of sources.

This tool does not modify Agda at all, it just manages systematically the directory `~/.agda` with `.agda/defaults` and `.agda/libraries` files used by Agda to locate the available libraries.

* Official documentation
https://agda.github.io/agda-pkg/

* Github repo
https://github.com/agda/agda-pkg

* agda/package-index
https://github.com/agda/package-index
index of libraries for the package manager Agda-Pkg

* Agda Wiki: Libraries
https://wiki.portal.chalmers.se/agda/Main/Libraries
https://wiki.portal.chalmers.se/agda/Main/Documentation


## Installation

```bash
# To install Agda-pkg
sudo pip3 install agda-pkg

# To install your lib
cd root_of_your_source_code
apkg install --editable .

# installing from agda/package-index

# do once
apkg init

# update the index every once in a while
apkg upgrade

# install pkgs
apkg install standard-library

# install pkgs, possibly versioned
apkg install plfa@dev-20.07

# install a Github repo with a specific version release
apkg install --github agda/agda-stdlib --version v1.3

# install a lib from Github with a specific branch with a specific lib name
apkg install --github plfa/plfa.github.io --branch dev --name plfa
```




```bash
apkg environment
AGDA_DIR_PATH:                HOME/.agda
AGDA_DEFAULTS_PATH:           HOME/.agda/defaults
AGDA_LIBRARIES_PATH:          HOME/.agda/libraries
AGDA_PKG_PATH:                HOME/.apkg@agda-2.6.2.2
DATABASE_FILE_PATH:           HOME/.apkg@agda-2.6.2.2/package-index.db
DATABASE_SEARCH_INDEXES_PATH: HOME/.apkg@agda-2.6.2.2/search-indexes
INDEX_REPOSITORY_PATH:        HOME/.apkg@agda-2.6.2.2/package-index
PACKAGE_SOURCES_PATH:         HOME/.apkg@agda-2.6.2.2/package-sources
AGDA_VERSION:                 2.6.2.2
DATABASE_FILE_NAME:           package-index.db
GITHUB_USER:                  agda
PKG_SUFFIX:                   .agda-pkg
LIB_SUFFIX:                   .agda-lib
INDEX_REPOSITORY_BRANCH:      master
INDEX_REPOSITORY_NAME:        package-index
INDEX_REPOSITORY_URL:         https://github.com/agda/package-index.git
```
