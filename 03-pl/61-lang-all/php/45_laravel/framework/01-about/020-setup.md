# New project

## New project setup

First, install laravel installer, then create the new project using laravel command.

```bash
# install laravel installer
composer global require laravel/installer

# create the new project
laravel new project
```

Or, use composer's `create-project` subcomand:

```bash
composer create-project --prefer-dist laravel/laravel project
```

Either way the name of the project is the name of the folder that will be created.


## Optional step

Every project (or app) has a unique associated key which should have been generated automatically, but if it wasn't:

```bash
# generate the app key
php artisan key:generate
```

Also ther are some permissions to set if they have not been already set: TODO
