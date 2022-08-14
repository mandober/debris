# Laravel project

- name: dobdb
- Laravel verion: 6.2
- min PHP version: PHP 7.4 (due to the use of lambdas)
- desc: dobermann database
- abs project path: `T:\dev\laragon\bin\www\dobdb`
- abs path to public dir: `T:\dev\laragon\bin\www\dobdb\public_html`

## Create a new Laravel project

First, update the laravel installer
>composer global require laravel/installer

Then init a new project
> cd T:\dev\laragon\bin\www\
> laravel new dobdb
> cd dobdb

When created like this, the project is fully initiated (e.g. .env file is copied, secret key is generated) so no need to do
> php artisan key:generate

Adjust db settings in `.env` file related to mysql (db name, user, pass).

Perhaps, start the PHP server, if no other (apache) is available
> php artisan serve
