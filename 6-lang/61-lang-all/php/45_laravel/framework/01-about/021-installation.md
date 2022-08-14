# Laravel Installation

Laravel utilizes Composer to manage its dependencies.

Since Laravel is a robust, big app and not a tiny component, it is not really advisable to require it, as other project dependencies, along the lines of   
composer require laravel/framework


## Laravel Installer

Rather, it's more comfortable to install the Laraver CLI installer globally, so it's always accessible, because it introduces the new command `laraver` that is then used to create new Laravel projects in any directory.

So this is a two-step process in which we first install    
Laravel installer using Composer:    
`composer global require laravel/installer`

Now we have a new command `laravel` that    
- creates the new directory and then
- scaffolds the fresh Laravel project within it.

so, use the laravel command in the future project's *parent* directory, e.g.    
`laravel new PROJECT_NAME`    
first creates the new folder named `PROJECT_NAME` and then sets everything up inside it.

Make sure that composer's global directory, e.g. `$HOME/.config/composer/vendor/bin`, is in PATH for `laravel` command to be located.


## Install with Composer

Alternatively, we can forego using the laravel installer all together, leveraging the composer's `create-project` subcommand instead:

`composer create-project --prefer-dist laravel/laravel blog`

The `--prefer-dist` flag is to require the latest Laravel version.


## Sneak peek

To immediately see the effect, change into project's directory and serve the project using the builtin PHP server:     
`php artisan serve`    
This starts a http server at http://localhost:8000

The `artisan` is the main CLI command, used all the time during development. It can generate new pages that come with the dynamically generated code filled in, thus speeding up development and helping steer the process.



Requirements
* PHP 7.1.3+
* PHP core extensions:
  * MBstring
  * Tokenizer
  * PDO
* PHP external extensions:
  * BCMath
  * JSON
  * XML
  * OpenSSL
  * Ctype



## Installing Laravel

Laravel utilizes Composer to manage its dependencies.

### Via Laravel Installer

First, download the Laravel installer using Composer:
`composer global require laravel/installer`

Make sure to place composer's system-wide `$HOME/.config/composer/vendor/bin` directory in your `$PATH` so the laravel executable can be located by your system.

Once installed, `laravel new blog` will create a directory named `blog` containing a fresh Laravel installation with all of Laravel's dependencies installed,

### Via Composer Create-Project

Alternatively, you may also install Laravel with `create-project` command in your terminal:
`composer create-project --prefer-dist laravel/laravel blog`


### Local Development Server

If you have PHP installed locally and you would like to use PHP's built-in development server to serve your app use:
`php artisan serve`
This command will start a development server at http://localhost:8000
