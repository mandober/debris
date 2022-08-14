# Laravel 6

Laravel 6 (LTS) continues the improvements made in Laravel 5.8 by introducing:
- Improved authorization responses
- Job middleware
- Lazy collections
- Eloquent Subquery Enhancements
- Extraction of frontend scaffolding to `laravel/ui` package
- https://laravel.com/docs/6.x/releases
- Laravel Upgrade Guide: https://laravel.com/docs/6.x/upgrade


## Ignition

- https://github.com/facade/ignition
- https://flareapp.io/ignition

Laravel 6 ships with *Ignition*, an exception detail page which offers detailed info about Blade errors, runnable solutions for common problems, code editing, exception sharing, and an improved UX. Requires Laravel 5.5+

## Laravel UI

The frontend scaffolding provided with previous releases of Laravel has been extracted into a `laravel/ui` Composer package. As a result of this change, no Bootstrap or Vue code is present in default framework scaffolding and the `make:auth` command has been extracted from the framework as well.

In order to restore the traditional Vue/Bootstrap scaffolding, install the `laravel/ui` package and use the `artisan ui` subcommand to install it:

```
composer require laravel/ui --dev

php artisan ui vue --auth
```


